<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;

class UserController extends Controller{
    

    public function view($id){
        $user = User::find($id);
        $data['user'] = $user;
        return view('cms.user.user')->with($data);
    }

    public function users(){
        $users = User::all();
        $data['users'] = $users;
        return view('cms.user.users')->with($data);
    }


    public function addPermission(Request $request){
        $request->validate([
            'user_id'=>'required',
            'psermission'=>'required'
        ]);

        $user = User::find($request->user_id)->get();
        $user->givePermissionTo($request->psermission);

        Session::flash('success','Permission Added');
        return Redirect::back();
    }
    
    public function remPermission(Request $request){
        Session::flash('success','Permission Removed');
        return Redirect::back();
    }


}
