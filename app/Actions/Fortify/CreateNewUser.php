<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Auth;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'id' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'id' => ['required', 'string','unique:users'],
            'designation' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
        ])->validate();

        $profile_pic = $input['id'].'.jpg';
        $sign =  $input['id'].'.jpg';

        $new_user = User::create([
            'id' => $input['id'],
            'name' => $input['name'],
            'email' => $input['email'],
            'designation' => $input['designation'],
            'phone' => $input['phone'],
            'profile_pic' => $profile_pic,
            'sign' =>  $sign,
            'password' => Hash::make($input['password']),            
        ]);

        $new_user->profile_pic =  $profile_pic;
        $new_user->sign =  $sign;

        $new_user->save();

        return $new_user;

    }
}
