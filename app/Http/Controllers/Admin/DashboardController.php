<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function registerAdmin() {
        $data = [
            'title1' => "Register",
            'title2' => "Register"
        ];
        return view('auth.register')->with($data);
    }

    public function profile() {
        $data = [
            'title1' => 'Profile',
            'title2' => 'profile'
        ];
        return view('auth.profile')->with($data);
    }

    public function updateProfile(Request $request) {
        //custom validator to the email bug in updated an already existing email
        Validator::make($request->all(), [
            'email' => [
                'bail',
                'required',
                'email',
                'max:191',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'name' => 'bail|required|string|max:191',
            'password' => 'bail|nullable|string|min:6|confirmed',
            'pic' => 'bail|image|nullable|max:1999'
        ])->validate();
        //returns back if validation fails or use the validate() method on the instance of the Validator as done above
        /*if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }*/

        $user = auth()->user();
        if($request->hasFile('pic')) {
            $extension = $request->file('pic')->getClientOriginalExtension();
            $fileNameToStore = 'user_'.time().'.'.$extension; //make he filename unique
            $path = $request->file('pic')->storeAs('public/user_images', $fileNameToStore);
            if($user->pic != $this->noUser) {
                Storage::delete("public/user_images/".$user->pic);
            }
            $user->pic = $fileNameToStore;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(!empty($request->input('password')))
            $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('profile')->with('success', 'Profile updated');
    }
}
