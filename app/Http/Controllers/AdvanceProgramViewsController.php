<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceProgram;
use App\Models\User;
use App\Models\Calendar;
use Auth;
use Redirect;
use Session;
use DateTime;
use Validator;

class AdvanceProgramViewsController extends Controller
{
    public function index()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }
        // Month & year name for Heading
        $data['month_name'] = $this->monthName(date('m'));
        $data['year'] = date('Y');

        $data['count_ap_month_approved'] = AdvanceProgram::where('status', 'Approved')->where('month', $this->apMonth())->where('year', $this->apYear())->count();
        $data['count_ap_month_to_be_approved'] = AdvanceProgram::where('status', 'Recommended')->where('month', $this->apMonth())->where('year', $this->apYear())->count();
        $data['count_ap_month_to_be_recommended'] = AdvanceProgram::where('status', 'Checked')->where('month', $this->apMonth())->where('year', $this->apYear())->count();
        $data['count_ap_month_to_be_checked'] = AdvanceProgram::where('status', 'Submitted')->where('month', $this->apMonth())->where('year', $this->apYear())->count();

        $user_count = User::where('status', 'Active')->where('require_advance_program', true)->count();
        $data['count_ap_month_not_submitted'] = $user_count - $data['count_ap_month_approved'] - $data['count_ap_month_to_be_approved'] - $data['count_ap_month_to_be_recommended'] - $data['count_ap_month_to_be_checked'];

        // Getting Advance Programs to show in My Advance Programme
        $user_id = $current_user->id;
        $data['my_advance_programs'] = AdvanceProgram::where('user', $user_id)->get()->reverse();
        return view('cms.advanceprogram.dashboard')->with($data);
    }

    public function view($id)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;

        $advanceProgram = AdvanceProgram::where('id', $id)->where('user', $user_id)->first();

        if ($current_user->hasPermissionTo('ap.check') || $current_user->hasPermissionTo('ap.recommend') || $current_user->hasPermissionTo('ap.approve')) {
            $advanceProgram = AdvanceProgram::where('id', $id)->first();
        }
        if ($advanceProgram == NULL) {
            return redirect('ap/new');
        }

        $monthNum  = $advanceProgram->month;
        $data['days'] = $advanceProgram->days;
        $data['notes'] = $advanceProgram->notes->reverse();

        $advanceProgram['month_name'] = $this->monthName($monthNum);

        $data['advance_program'] = $advanceProgram;

        return view('cms.advanceprogram.view')->with($data);
    }

    public function new()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        return view('cms.advanceprogram.new');
    }

    public function header($id)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }


        $user_id = Auth::user()->id;
        $data['user_name'] = Auth::user()->name;
        $data['user_designation'] = Auth::user()->designation;
        $advanceProgram = AdvanceProgram::where('id', $id)->where('user', $user_id)->first();

        if ($advanceProgram == NULL) {
            return redirect('ap/new');
        }

        $monthNum  = $advanceProgram->month;
        $advanceProgram['month_name'] = $this->monthName($monthNum);

        $data['advance_program'] = $advanceProgram;

        return view('cms.advanceprogram.header')->with($data);
    }

    public function footer($id)
    {

        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;
        $advanceProgram = AdvanceProgram::where('id', $id)->where('user', $user_id)->first();

        if ($advanceProgram == NULL) {
            return redirect('ap/new');
        }

        $monthNum  = $advanceProgram->month;
        $advanceProgram['month_name'] = $this->monthName($monthNum);

        $data['advance_program'] = $advanceProgram;

        return view('cms.advanceprogram.footer')->with($data);
    }

    public function table($id)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;
        $advanceProgram = AdvanceProgram::where('id', $id)->where('user', $user_id)->first();

        if ($advanceProgram == NULL) {
            return redirect('ap/new');
        }

        $monthNum  = $advanceProgram->month;
        $advanceProgram['month_name'] = $this->monthName($monthNum);

        $data['advance_program'] = $advanceProgram;


        return view('cms.advanceprogram.table')->with($data);
    }

    public function calendar($id)
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.ap')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $user_id = Auth::user()->id;
        $advanceProgram = AdvanceProgram::where('id', $id)->where('user', $user_id)->first();

        if ($advanceProgram == NULL) {
            return redirect('ap/new');
        }

        $monthNum  = $advanceProgram->month;
        $advanceProgram['month_name'] = $this->monthName($monthNum);

        $data['days'] = $advanceProgram->days;
        $data['advance_program'] = $advanceProgram;

        //dd($advanceProgram);

        return view('cms.advanceprogram.calendar')->with($data);
    }

    public function approvedAPs()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.summary')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $data['aps'] = AdvanceProgram::where('status', 'Approved')->where('month', $this->apMonth())->where('year', $this->apYear())->get();
        $data['heading'] = 'Approved';

        return view('cms.advanceprogram.advance_programs')->with($data);
    }

    public function toBeApprovedAPs()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.summary')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $data['aps'] = AdvanceProgram::where('status', 'Recommended')->where('month', $this->apMonth())->where('year', $this->apYear())->get();
        $data['heading'] = 'Recommended';

        return view('cms.advanceprogram.advance_programs')->with($data);
    }

    public function toBeRecommended()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.summary')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $data['aps'] = AdvanceProgram::where('status', 'Checked')->where('month', $this->apMonth())->where('year', $this->apYear())->get();
        $data['heading'] = 'Checked';

        return view('cms.advanceprogram.advance_programs')->with($data);
    }

    public function toBeChecked()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.summary')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $data['aps'] = AdvanceProgram::where('status', 'Submitted')->where('month', $this->apMonth())->where('year', $this->apYear())->get();
        $data['heading'] = 'Submitted';

        return view('cms.advanceprogram.advance_programs')->with($data);
    }

    public function notSubmitted()
    {
        // Cheking for Permission
        $current_user = Auth::user();
        if (!$current_user->hasPermissionTo('ap.summary')) {
            Session::flash('danger', "Access Restricted");
            return Redirect::back();
        }

        $apRequiredUsers = User::where('status', 'Active')->where('require_advance_program', true)->get();
        $submittedAPs = AdvanceProgram::where('month', $this->apMonth())->where('year', $this->apYear())
            ->where('status', 'Submitted')
            ->orWhere('status', 'Checked')
            ->orWhere('status', 'Recommended')
            ->orWhere('status', 'Approved')->get();

        foreach ($submittedAPs as $ap) {
            foreach ($apRequiredUsers as $user) {
                if ($user->id == $ap->user) {
                    $apRequiredUsers = $apRequiredUsers->except($user->id);
                }
            }
        }

        $data['notSubmittedUsers'] = $apRequiredUsers;
        $data['heading'] = 'Not Submitted';

        return view('cms.advanceprogram.advance_programs')->with($data);
    }

    private function apMonth()
    {
        $currentDay = date("d");
        $currentMonth = date("m");

        if ($currentMonth < 12) {
            if ($currentDay >= 25) {
                return $currentMonth + 1;
            } else {
                return $currentMonth;
            }
        } else {
            if ($currentDay >= 25) {
                return 1;
            } else {
                return $currentMonth;
            }
        }
    }

    private function apYear()
    {
        $currentDay = date("d");
        $currentMonth = date("m");
        $currentYear = date("Y");

        if ($currentMonth < 12) {
            return $currentYear;
        } else {
            if ($currentDay >= 25) {
                return $currentYear + 1;
            } else {
                return $currentYear;
            }
        }
    }

    private function monthName($monthNum)
    {
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        return $dateObj->format('F'); // March
    }
}
