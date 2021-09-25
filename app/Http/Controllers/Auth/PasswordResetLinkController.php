<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'email' => 'required|email',
        // ]);

        $rules = [
            'no_kp' => 'required|min:12|max:12',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'no_kp.required' => 'No kad pengenalan perlu diisi',
            'max' => 'No kad pengenalan tidak boleh melebihi atau kurang dari 12 digit',
            'min' => 'No kad pengenalan tidak boleh melebihi atau kurang dari 12 digit',
            'email' => 'Format email salah',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        };

        $user = User::where([
            ['email', '=', $request->email], ['no_kp', '=', $request->no_kp]
        ])->get()->first();

        // dd($user);

        if ($user == null) {
            return Redirect::back()->withErrors('No. kad pengenalan atau email tidak wujud');
        }

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // dd($status);

        return $status == Password::RESET_LINK_SENT
            ? back()->with('success', 'Pautan reset kata laluan telah dihantar ke email anda')
            // ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
