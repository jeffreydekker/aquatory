<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{

    // Gets the view for email form
    public function forgotPassword() {
        return view('forgot-password');
    }

    // Sends reset form link to the email adres
    public function forgotPasswordPost(Request $request) {
        $request->validate(['email' => 'required|email']);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status), 'success' => 'Er is een email verstuurd met een reset link naar het opgegeven mail adres.'])
                    : back()->withErrors(['email' => __($status), 'error' => 'didnt work']);
    }

    // Gets the reset form from email link
    public function getResetForm(String $token) {
        return view('password-reset-form', ['token' => $token]);
    }

    // Resets and saves the new password
    public function passwordReset(Request $request) {
        $request->validate([
            // 'token' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
            ? redirect('/')->with(['status' => __($status), 'success' => 'Password reset voltooid. Log in met uw nieuwe wachtwoord.'])
            : back()->withErrors(['email' => __($status), 'error' => 'Er is iets mis gegaan, probeer het opnieuw.']);
    }
}

