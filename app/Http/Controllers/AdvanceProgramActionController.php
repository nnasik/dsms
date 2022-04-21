<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceProgram;
use App\Models\Note;
use Auth as Auth;
use Redirect as Redirect;
use Session as Session;


class AdvanceProgramActionController extends Controller
{
    public function checkDate(Request $request)
    {

        $request->validate([
            'ap_id' => 'required',
            'date' => 'required'
        ]);

        $advance_program = AdvanceProgram::where('id', $request->ap_id)->first();

        $data = $advance_program->days()->updateExistingPivot($request->date, [
            'is_correct' => true,
            'checked_on' => NOW(),
            'checked_by' => Auth::user()->id
        ]);
        echo $request->date;
    }

    public function addDateNote(Request $request)
    {
        $request->validate([
            'ap_id' => 'required',
            'date' => 'required',
            'note' => 'required'
        ]);

        $advance_program = AdvanceProgram::where('id', $request->ap_id)->first();

        $advance_program->days()->updateExistingPivot($request->date, [
            'is_correct' => false,
            'note' => $request->note,
            'checked_on' => NOW(),
            'checked_by' => Auth::user()->id
        ]);
        echo $request->date;
    }

    public function checkAP(Request $request)
    {
        $checking_user = Auth::user();

        $request->validate([
            'advance_program_id' => 'required',
            'note' => 'required',
            'action' => 'required'
        ]);


        $advance_program = AdvanceProgram::where('id', $request->advance_program_id)->where('status', 'Submitted')->first();

        if ($request->action == 'Correct') {
            $advance_program->is_correct = true;
            $advance_program->status = 'Checked';
            $advance_program->checked_note = $request->note;

            //
        } elseif ($request->action == 'Not Correct') {
            $advance_program->is_correct = false;
            $advance_program->status = 'Not Correct';
            $advance_program->checked_note = $request->note;
        }

        // 
        $advance_program->checked_by = $checking_user->id;
        $advance_program->checked_on = NOW();
        $advance_program->save();


        // Creating Note
        $note = new Note;
        $note->user_id = $checking_user->id;
        $note->body = $request->note;
        $advance_program->notes()->save($note);



        Session::flash('success', $request->note);
        return Redirect::back();
    }



    public function recommendAP(Request $request)
    {
        $recommending_user = Auth::user();

        // Validating Request
        $request->validate([
            'advance_program_id' => 'required',
            'note' => 'required',
            'action' => 'required'
        ]);

        // Getting Advance Program
        $advance_program = AdvanceProgram::where('id', $request->advance_program_id)->where('status', 'Checked')->first();

        if ($request->action == 'Recommended') {
            $advance_program->is_recommended = true;
            $advance_program->status = 'Recommended';
            $advance_program->recommendation_note = $request->note;
        } elseif ($request->action == 'Not Recommended') {
            $advance_program->is_recommended = false;
            $advance_program->status = 'Not Correct';
            $advance_program->recommendation_note = $request->note;
        }

        // 
        $advance_program->recommended_by = $recommending_user->id;
        $advance_program->recommended_on = NOW();
        $advance_program->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $recommending_user->id;
        $note->body = $request->note;
        $advance_program->notes()->save($note);


        Session::flash('success', $request->note);
        return Redirect::back();
    }

    public function approveAP(Request $request)
    {
        $approving_user = Auth::user();

        if (!$approving_user->hasPermissionTo('ap.approve')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'advance_program_id' => 'required',
            'note' => 'required',
            'action' => 'required'
        ]);

        // Getting Advance Program
        $advance_program = AdvanceProgram::where('id', $request->advance_program_id)->where('status', 'Recommended')->first();

        if ($request->action == 'Approved') {
            $advance_program->is_approved = true;
            $advance_program->status = 'Approved';
            $advance_program->approval_note = $request->note;
        } elseif ($request->action == 'Not Approved') {
            $advance_program->is_approved = false;
            $advance_program->status = 'Not Approved';
            $advance_program->approval_note = $request->note;
        }

        $advance_program->approved_by = $approving_user->id;
        $advance_program->approved_on = NOW();
        $advance_program->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $approving_user->id;
        $note->body = $request->note;
        $advance_program->notes()->save($note);

        Session::flash('success', $request->note);
        return Redirect::back();
    }

    public function submit(Request $request)
    {
        // Cheking for Permission
        $current_user = Auth::user();


        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'advance_program_id' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $advance_program = AdvanceProgram::where('id', $request->advance_program_id)->where('user', $user_id)->first();
        $advance_program->status = 'Submitted';
        $advance_program->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $current_user->id;
        $note->body = 'Advance programme submitted for checking';
        $advance_program->notes()->save($note);

        Session::flash('success', 'Advance Programme Submitted!');
        return Redirect::back();
    }
}
