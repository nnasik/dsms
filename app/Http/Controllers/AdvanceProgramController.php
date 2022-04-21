<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceProgram;
use App\Models\Calendar;
use App\Models\Note;
use Auth;
use Redirect;
use Session;
use DateTime;
use Validator;

class AdvanceProgramController extends Controller
{

    public function add(Request $request)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id =  $current_user->id;

        // validating request
        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'month' => 'required|unique:advance_programs,month,NULL,NULL,month,' . $request->month . ',year,' . $request->year . ',user,' . $user_id,
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Creating new Advance Program & setting parameters
        $advanceProgram = new AdvanceProgram();
        $advanceProgram->user = $user_id;
        $advanceProgram->month = $request->month;
        $advanceProgram->year = $request->year;
        $advanceProgram->status = 'Created';
        $advanceProgram->save();


        // Filling the Pivot Table
        $date_from = date($advanceProgram->year . '-' . $advanceProgram->month . '-01');
        $date_to =  date($advanceProgram->year . '-' . $advanceProgram->month . '-t', strtotime(strval($date_from)));
        $calendar = Calendar::wherebetween('date', [$date_from, $date_to])->get();

        foreach ($calendar as $day) {
            $advanceProgram->days()->attach($day->date, [
                'user_id' => $user_id,
                'day' => $day->day,
                'nature_of_work' => $day->note,
                'note' => null,
                'is_correct' => null,
                'checked_on' => null,
                'checked_by' => null
            ]);
        }

        $dateObj   = DateTime::createFromFormat('!m', $request->month);
        $monthName = $dateObj->format('F'); // March

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = " Created advance programme for " . $monthName . " " . $advanceProgram->year;
        $advanceProgram->notes()->save($note);

        Session::flash('success', 'Advance programme successfully created for ' . $monthName . ' ' . $request->year);

        return redirect('/ap/header/' . $advanceProgram->id);
    }

    public function update_header(Request $request)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;
        $imageName = NULL;

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'format' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // checking the advance program with user id 
        $advanceProgram = $this->getAPforEdit($request->id, $user_id);

        if (isset($request->logo)) {
            $imageName = $user_id . "_" . $request->month . "_" . $request->year . "." . $request->logo->extension();
            $request->logo->storeAs('ap_logo', $imageName);
        }

        $advanceProgram->header_format = $request->format;

        /* Format 1*/
        $advanceProgram->show_from = isset($request->show_from);
        $advanceProgram->from = $request->from;
        $advanceProgram->show_through = isset($request->show_through);
        $advanceProgram->through = $request->through;
        $advanceProgram->show_to = isset($request->show_to);
        $advanceProgram->to = $request->to;
        $advanceProgram->show_heading = isset($request->show_heading);
        $advanceProgram->heading = $request->heading;

        /*Format 2*/
        $advanceProgram->show_form_no = isset($request->show_form_no);
        $advanceProgram->form_no = $request->form_no;
        $advanceProgram->show_logo = isset($request->show_logo);
        $advanceProgram->logo = $imageName;
        $advanceProgram->show_header_text = isset($request->show_header_text);
        $advanceProgram->header_text = $request->header_text;

        $advanceProgram->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = "Header informations updated.";
        $advanceProgram->notes()->save($note);

        Session::flash('success', 'Header details updated');
        return Redirect::back();
    }

    public function update_footer(Request $request)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;
        $imageName = NULL;

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'format' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // checking the advance program with user id 
        $advanceProgram = $this->getAPforEdit($request->id, $user_id);

        $advanceProgram->footer_format = $request->format;

        /* Format 1*/
        $advanceProgram->show_footer_text = isset($request->show_footer);
        $advanceProgram->footer_text = $request->footer;
        $advanceProgram->show_sign = isset($request->show_sign);
        $advanceProgram->sign = $request->sign;
        $advanceProgram->show_recommended = isset($request->show_recommended);
        $advanceProgram->recommended = $request->recommended;
        $advanceProgram->show_approval = isset($request->show_approval);
        $advanceProgram->approval = $request->approval;
        $advanceProgram->show_copy_to = isset($request->show_copy_to);
        $advanceProgram->copy_to = $request->copy_to;

        $advanceProgram->save();

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = "Footer informations updated .";
        $advanceProgram->notes()->save($note);

        Session::flash('success', 'Footer updated');
        return Redirect::back();
    }

    public function update_table(Request $request)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = $current_user->id;
        $imageName = NULL;

        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // checking the advance program with user id 
        $advanceProgram = $this->getAPforEdit($request->id, $user_id);

        $advanceProgram->show_col_date = isset($request->show_col_date);
        $advanceProgram->show_col_day = isset($request->show_col_day);
        $advanceProgram->show_col_time = isset($request->show_col_time);
        $advanceProgram->show_col_nature_of_work = isset($request->show_col_nature_of_work);
        $advanceProgram->show_col_working_place = isset($request->show_col_working_place);
        $advanceProgram->show_col_beneficiaries = isset($request->show_col_beneficiaries);
        $advanceProgram->show_col_field_no = isset($request->show_col_field_no);
        $advanceProgram->show_col_target = isset($request->show_col_target);
        $advanceProgram->show_col_km = isset($request->show_col_km);
        $advanceProgram->col_date = $request->col_date;
        $advanceProgram->col_day = $request->col_day;
        $advanceProgram->col_time = $request->col_time;
        $advanceProgram->col_nature_of_work = $request->col_nature_of_work;
        $advanceProgram->col_working_place = $request->col_working_place;
        $advanceProgram->col_beneficiaries = $request->col_beneficiaries;
        $advanceProgram->col_field_no = $request->col_field_no;
        $advanceProgram->col_target = $request->col_target;
        $advanceProgram->col_km = $request->col_km;

        $advanceProgram->save();


        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = "Updated Table Fields";
        $advanceProgram->notes()->save($note);

        Session::flash('success', 'Table columns updated.');
        return Redirect::back();
    }


    public function update_calendar(Request $request)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // checking the advance program with user id 
        $advanceProgram = $this->getAPforEdit($request->id, $user_id);

        foreach ($advanceProgram->days as $day) {

            $time = NULL;
            $nature_of_work = NULL;
            $working_place = NULL;
            $beneficiaries = NULL;
            $field_no = NULL;
            $target = NULL;
            $km = NULL;

            if ($request->input('time-' . $day->date) !== NULL) {
                $time = $request->input('time-' . $day->date);
            }

            if ($request->input('nature-of-work-' . $day->date) !== NULL) {
                $nature_of_work = $request->input('nature-of-work-' . $day->date);
            }

            if ($request->input('place-of-work-' . $day->date) !== NULL) {
                $working_place = $request->input('place-of-work-' . $day->date);
            }

            if ($request->input('field_no-' . $day->date) !== NULL) {
                $field_no = $request->input('field-no-' . $day->date);
            }

            if ($request->input('target-' . $day->date) !== NULL) {
                $target = $request->input('target-' . $day->date);
            }

            if ($request->input('km-' . $day->date) !== NULL) {
                $km = $request->input('km-' . $day->date);
            }

            $advanceProgram->days()->detach($day->date);

            $advanceProgram->days()->attach($day->date, [
                'user_id' => $user_id,
                'day' => $day->day,
                'time' => $time,
                'nature_of_work' => $nature_of_work,
                'nature_of_work' => $nature_of_work,
                'working_place' => $working_place,
                'beneficiaries' => $beneficiaries,
                'field_no' => $field_no,
                'target' => $target,
                'km' => $km
            ]);

            //$day->advanceprograms()->detach($advanceProgram->id);
            //$day->advanceprograms()->attach([$advanceProgram->id=>['date'=>$day->date,'user_id'=>$user_id,'nature_of_work'=>$nature_of_work]]);

        }

        // Creating Note
        $note = new Note;
        $note->user_id = $user_id;
        $note->body = "Advance programme calendar updated.";
        $advanceProgram->notes()->save($note);

        Session::flash('success', 'Calendar updated');
        return Redirect::back();
    }





    private function getAPforEdit($ap_id, $user_id)
    {
        // checking the advance program with user id 
        $advanceProgram = AdvanceProgram::where('id', $ap_id)->where('user', $user_id)->first();

        // cheking status (for unlock)
        if (!$advanceProgram->status == 'Created' || !$advanceProgram->status == 'Not Correct') {
            Session::flash('danger', "Your Advance Programme has been already submitted. You can't make any changes after submition.");
            return redirect()->back();
        }
        return $advanceProgram;
    }
}
