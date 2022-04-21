<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Spatie\Permission\Models\Permission as Permission;
use Session as Session;
use Redirect as Redirect;
use Hash as Hash;
use Validator as Validator;

class UserController extends Controller{
    

    public function users(){
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.users')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }
        

        $users = User::all();
        $data['users'] = $users;
        return view('cms.user.users')->with($data);
    }

    public function view($id){
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }
        

        //
        $data['permissions'] = Permission::all();
        $user = User::find($id);
        $data['user'] = $user;
        return view('cms.user.user')->with($data);
    }

    


    public function addPermission(Request $request){
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'user_id'=>'required',
            'permission'=>'required'
        ]);

        $user = User::find($request->user_id);
        $user->givePermissionTo($request->permission);

        Session::flash('success','Permission Added');
        return Redirect::back();
    }
    
    public function remPermission(Request $request){
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'user_id'=>'required',
            'permission'=>'required'
        ]);


        $user = User::find($request->user_id);
        $user->revokePermissionTo($request->permission);

        Session::flash('success','Permission Removed');
        return Redirect::back();
    }

    public function activateUser(Request $request){
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'user_id'=>'required',
            'action'=>'required'
        ]);

        $user = User::find($request->user_id);
        $user->status = $request->action;
        $user->save();

        Session::flash('success','Status Changed!');
        return Redirect::back();
    }

    public function resetPassword(Request $request){
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $request->validate([
            'user_id'=>'required',
        ]);
        $user = User::find($request->user_id);

        $new_password = $this->generateRandomString(8);
        $user->password = Hash::make($new_password);
        $user->save();

        Session::flash('success','Password Reset. New password is '.$new_password);
        return Redirect::back();

    }

    public function updateDP(Request $request){

        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }

        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'dp'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($request->user_id);
        
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
        // Cheking for Permission
        $current_user = Auth::user();
        if(!$current_user->hasPermissionTo('users.manage')){
            Session::flash('danger',"Access Restricted");
            return Redirect::back();
        }
        
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'sign'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $user = User::find($request->user_id);
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

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
