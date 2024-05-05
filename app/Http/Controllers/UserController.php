<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Options;
use App\Mail\NewUserEmail;
use App\Models\Registratie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\ExpiredPasswordEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

use function Laravel\Prompts\table;
use function Symfony\Component\String\b;
use App\Http\Controllers\TableController;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\PasswordController;

class UserController extends Controller
{

    public function register(Request $request) {
        // validate the incoming request fields with rules
        $incomingFields = $request->validate([
            'lidnummer' => ['required'],
            'naam' => ['required', 'min:2', 'max:20'],
            'achternaam' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // 'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]
        ]);
        
        // Strip the content of the incoming request from malicious html 
        // with php built in strip_tags function
        $incomingFields['lidnummer'] = strip_tags(($incomingFields['lidnummer']));
        $incomingFields['naam'] = strip_tags(($incomingFields['naam']));
        $incomingFields['achternaam'] = strip_tags(($incomingFields['achternaam']));
        $incomingFields['email'] = strip_tags(($incomingFields['email']));
        $incomingFields['password'] = $this->random_password(8);
        $incomingFields['verified'] = false;
        $incomingFields['password_updated_at'] = Carbon::now();
        
        // registers a user record in the DB
        User::create($incomingFields);

        // sends verification email
        Mail::to($incomingFields['email'])->send(new NewUserEmail(['password' => $incomingFields['password'], 'naam' => $incomingFields['naam'] . $incomingFields['achternaam']]));

        return redirect('/beheerder')->with('success','Account aangemaakt. Er is een verificatie e-mail verzonden naar het betreffende e-mail adres.');
    }

    function random_password( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    public function showCorrectHomepage(User $user, Registratie $registraties) {
        // Shows different homepage based on if the user is logged in 
        // or not
        if(auth()->check()) {
            // auth()->logout();
            return view('/homepage');
        } else {
            // auth()->logout();
            return view('/homepage');
        }
    }

    // public function showProfile(User $user) {
    //     if(session() === NULL) {
    //         return redirect('/');
    //     }
    //     return view('profile-posts', ['username' => $user->naam . " " . $user->achternaam, 'posts' => $user->posts()->latest()->get(), 'postCount' => $user->posts()->count()]);
    // }

    public function profiel(User $user) {
        if(session() === NULL) {
            return redirect('/');
        }
        return view('table-user', ['username' => $user->naam . " " . $user->achternaam, 'registraties' => $user->registraties()->latest()->get(), 'posts' => $user->posts()->latest()->get()]);
    }

    public function logout() {
        // Terminates the current session
        if(session() === NULL) {
            return redirect('/');
        }

        auth()->logout();
        return redirect('/')->with('success','You are logged out');
    }

    public function showModPage(User $users, Options $options, Registratie $registraties) {
        $users = User::with('registraties')->get();
        $registraties = Registratie::with('gebruiker')->get();
        $options = DB::table('options')->get();

        if(session() === NULL) {
            return redirect('/');
        }
        return view('/beheerder', ['users' => $users, 'options' => $options, 'registraties' => $registraties]);
    }

    public function showTableAll(User $user, Registratie $registraties) {
        
        return view('table-all', compact('registraties'));
    }

    public function viewSingleRegistratie (Registratie $registraties) {
        
        return view('single-registratie', ['registraties' => $registraties]);
    }

    public function profilePasswordResetForm() {
        return view('profile-password-reset');
    }

    public function verificationPasswordResetPost(User $user, Request $request) {
              // Validate the incoming request fields
              $request->validate([
                'currentPassword' => 'required',
                'newPassword' => 'required', 'confirmed', Password::min(8)->numbers()->symbols()->uncompromised()
                ]);

            $user = Auth::user();

            if (!Hash::check($request->currentPassword, $user->password)) {
                return back()->with('error', 'Current password is incorrect.');
            }
            
            $user->password = Hash::make($request->newPassword);
            $user->verified = 1;
            
            /** @var \App\Models\User $user **/
            $user->save();
    
            return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function expiredCheck(User $user) {
        $startDay = Carbon::parse($user->password_updated_at);
        $expiryDate = $startDay->addYear();

        if($expiryDate > $startDay) {
            $user->password = $this->random_password(8);
            $user->verified = false;

            $user->save();

            // sends password expired email
            Mail::to($user->email)->send(new ExpiredPasswordEmail(['password' => $user->password, 'naam' => $user->naam . $user->achternaam]));
            return redirect('/')->with('error', 'Uw wachtwoord is verlopen. Er is een email naar u verstuurd met een willekeurig wachtwoord, waarmee u uw wachtwoord opnieuw in dient te stellen om de website te kunnen gebruiken.');
        }
    }

    public function login(Request $request, User $user) {

        // Check if either log in field is empty

        if($request['loginemail'] == NULL || $request['loginpassword'] == NULL ) {
            redirect('/')->with('error', 'Vul alle velden in om in te loggen');
        }

        // Validate the incoming request fields
        $incomingFields = Validator::make($request->all(), [
            'loginemail' => 'required',
            'loginpassword'=> 'required'
        ]);

        $incomingFields = $request->validate([
            'loginemail' => 'required',
            'loginpassword'=> 'required'
        ]);

        // logs user in or not and redirects
        if(auth()->attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();

            $this->expiredCheck($user);
            // $registraties = 

            return redirect('/');

        }
        return redirect('/')->with('error','De ingevoerde referenties werden niet herkend in de database. Probeer het nogmaals of klik op "wachtwoord vergeten"');

    }
}