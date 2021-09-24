<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.change-password');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'current_password' => ['required', new MatchOldPassword],
        //     'new_password' => [
        //         'required',
        //         'min:8',
        //         'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        //         'confirmed'
        //     ],
        //     'new_confirm_password' => [
        //         'same:new_password', 'required',
        //         'min:8',
        //         'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        //         'confirmed'
        //     ],
        // ]);

        $rules = [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'new_confirm_password' => [
                'same:new_password',
                'required',
            ],
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            // 'required' => ':attribute is required',
            // 'captcha' => 'captcha tidak betul',
            'same' => 'New password not match',
            // 'min' => 'Password must be minimum 8 digit',
            // 'regex' => 'Password must be in alphanumeric'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        };

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        // dd('Password change successfully.');
        return redirect('/dashboard');
    }


    public function update(Request $request, $id)
    {
        // dd($id);

        $user = User::find($id);
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => [
                'same:new_password|', 'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'confirmed'
            ],
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/dashboard');
    }

    public function tukar_password_pegawai()
    {
        return view('auth.change-password-pegawai');
    }
}
