<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
    $googleUser = Socialite::driver('google')
        ->stateless()
        ->setHttpClient(new \GuzzleHttp\Client([
            'verify' => 'C:\xampp\php\extras\ssl\cacert.pem'
        ]))
        ->user();


        // Check if user exists by email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {

            // If a normal user logs in via Google, attach google_id
            if (!$user->google_id) {
                $user->google_id = $googleUser->id;
                $user->save();
            }

        } else {
            // Create new user
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => bcrypt(Str::random(16)), // random password
                'email_verified_at' => now(),
            ]);
        }

        // Login
        Auth::login($user);

        return redirect('/dashboard');
    }
}