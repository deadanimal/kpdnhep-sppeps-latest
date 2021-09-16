<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

use Illuminate\Http\Request;
use App\Models\User;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('auth.change-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        // dd('Password change successfully.');
        return redirect('/dashboard');
    }


    public function update(Request $request ,$id){
        // dd($id);

        $user = User::find($id);
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/dashboard');
    }

    public function tukar_password_pegawai(){
        return view('auth.change-password-pegawai');
    }
}
