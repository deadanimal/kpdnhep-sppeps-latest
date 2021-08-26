<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('auth.change-password');
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
}
