<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceProgram;
use Auth;
use Redirect;
use Session;

class AdvanceProgramActionController extends Controller{
    public function checkDate(Request $request){
        $request->validate([
            'advance_program_id'=>'required'
        ]);
        $message=null;
        Session::flash('success',$message);
        Redirect::back();
    }

    public function checkAP(Request $request){
        $request->validate([
            'advance_program_id'=>'required'
        ]);
        $message=null;
        Session::flash('success',$message);
        Redirect::back();
    }

    public function recommendAP(Request $request){
        $request->validate([
            'advance_program_id'=>'required'
        ]);
        $message=null;
        Session::flash('success',$message);
        Redirect::back();
    }

    public function approveAP(Request $request){
        $request->validate([
            'advance_program_id'=>'required'
        ]);
        $message=null;
        Session::flash('success',$message);
        Redirect::back();
    }

    private function getAP($ap_id,$user_id){
        // checking the advance program with user id 
        $advanceProgram = AdvanceProgram::where('id',$ap_id)->where('user',$user_id)->first();
       
        // cheking status (for unlock)
        if ($advanceProgram->is_locked==true || $advanceProgram->status=='Submitted') {
           Session::flash('danger',"Your Advance Programme has been locked & waiting to be reviewed. You can't make any changes after submition.");
           return redirect()->back();
        }
        return $advanceProgram;
    }

}
