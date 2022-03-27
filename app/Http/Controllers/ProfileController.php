<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Session;
use Redirect;
use Hash;

class ProfileController extends Controller{

    public function profile(){
        $user = Auth::user();
        $data['user'] = $user;
        return view('cms.profile.profile')->with($data);
    }


    public function updateDP(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(),[
            'dp'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        if (isset($request->dp)) {
            $imageName = $user->id.".".$request->dp->extension();
            $request->dp->storeAs('public/user/dp/', $imageName);
            $user->profile_pic = $imageName;
            $user->save();
        }

        Session::flash('success','Updated');
        return Redirect::back();
    }

    public function updateSign(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(),[
            'sign'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //dd($request);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        if (isset($request->sign)) {
            $imageName = $user->id.".".$request->sign->extension();
            $request->sign->storeAs('public/user/sign/', $imageName);
            $user->sign = $imageName;
            $user->save();
        }

        Session::flash('success','Updated');
        return Redirect::back();
    }

    public function updateProfile(Request $request){
        $requst->validate([
            'user_id'=>'required',
        ]);

        $user = User::find($request->user_id)->get();
        //Fields 

        $user->save();

        Session::flash('success','User Profile Updated');
        return Redirect::back();
    }

    public function updatepassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required'
        ]);

        if ($request->new_password != $request->confirm_password) {
            Session::flash('danger','New password mismatch');
            return Redirect::back();
        }

        $user = Auth::user();
        if(Hash::check($request->current_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Session::flash('success','Password changed!');
            return Redirect::back();
        }
        else {
            Session::flash('danger','Current Password is wrong!');
            return Redirect::back();
        }
    }


}
