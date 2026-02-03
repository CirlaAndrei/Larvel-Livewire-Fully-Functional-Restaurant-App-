<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\Api\CustomApiTokenManager;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\FacebookController;
use App\Livewire\Newsletter;
use App\Livewire\ReservationForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});


//  Ruta catre pagina de Login si transormarea din pagica statica in pagina dinamica pentru autentificare

// Redirect logged-in users away from login/register pages
Route::middleware('guest')->group(function () {
    Route::get('/login', [LogInController::class, 'index'])->name('login');
    Route::post('/login', [LogInController::class, 'authenticate'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.post');
});

// -------------------------------
// Impiedica user-ul sa se conecteze direct din browser in /dashboard fara sa se autentifice
// User-ul va trebui sa se autentifice pentru a avea acces la dashboard
// -------------------------------

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // E-commerce
    Route::get('/e-commerce', [EcommerceController::class, 'index'])
    ->name('ecommerce');
    
    // Users
    Route::middleware(['admin_manager'])->group(function () {
    Route::get('/users', function () {
        return view('users');
    })->name('users.index');

// UPDATE: Toggle user role (admin/user)
Route::patch('/users/{user}/role', function (App\Models\User $user) {
    request()->validate([
        'role' => ['required', Rule::in(config('roles'))],
    ]);
    
    $currentUser = auth()->user();
    $newRole = request('role');
    
    // If current user is a manager, they cannot modify admin or manager users
    if ($currentUser->role === 'manager') {
        // Check if target user is an admin or manager
        if (in_array($user->role, ['admin', 'manager'])) {
            return back()->with('error', 'Managers cannot modify admin or manager users.');
        }
        
        // Check if manager is trying to set role to 'admin' or 'manager'
        if (in_array($newRole, ['admin', 'manager'])) {
            return back()->with('error', 'Managers can only assign user role.');
        }
    }
    
    $user->update([
        'role' => $newRole,
    ]);
    return back()->with('success', 'User role updated!');
})->name('users.update-role');

        // DELETE: Delete user
        Route::delete('/users/{user}', function ($id) {
            $user = App\Models\User::findOrFail($id);
            $user->delete();
            
            return redirect()->route('users.index')->with('success', 'User deleted!');
        })->name('users.destroy');

        // CREATE: Show form to create new user
        Route::get('/users/create', function () {
            return view('createuser'); // Loads resources/views/createuser.blade.php
        })->name('users.create');

  // STORE: Handle form submission to create new user
Route::post('/users', function () {
    request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'role' => ['required', Rule::in(config('roles'))],
    ]);
    
    $currentUser = auth()->user();
    $newRole = request('role');
    
    // If current user is a manager, they can only create regular users
    if ($currentUser->role === 'manager') {
        if ($newRole !== 'user') {
            return back()->with('error', 'Managers can only create regular users.')
                         ->withInput();
        }
    }

    App\Models\User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password')),
        'role' => $newRole,
    ]);

    return redirect()->route('users.index')->with('success', 'User created!');
})->name('users.store');

        // EDIT: Show form to edit a specific user
        Route::get('/users/{user}/edit', function ($id) {
            $user = App\Models\User::findOrFail($id);
            return view('edituser', ['user' => $user]); // Loads resources/views/edituser.blade.php
        })->name('users.edit');

        // UPDATE: Handle form submission to update user (different from role toggle)
        Route::patch('/users/{user}', function ($id) {
            $user = App\Models\User::findOrFail($id);
            // Update user details (name, email, etc.)
            // You'll need to add the update logic here
            return redirect()->route('users.index')->with('success', 'User updated!');
        })->name('users.update-profile');
    });

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('/api-tokens', function () {
        return view('api.index');
    })
    ->name('api-tokens.show');

    // Password reset link request form
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// Email the reset link
Route::post('/forgot-password', [\Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, 'store'])
    ->middleware('guest')->name('password.email');

// Reset password form
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['request' => request()]);
})->middleware('guest')->name('password.reset');

// Handle reset
Route::post('/reset-password', [\Laravel\Fortify\Http\Controllers\NewPasswordController::class, 'store'])
    ->middleware('guest')->name('password.update');

Route::get('/test-mail', function () {
    Mail::raw('Test email', function ($m) {
        $m->to('you@example.com')->subject('Hello from Laravel');
        });

        return 'Email sent!';
    });
    // Terms of Service
Route::get('/terms-of-service', function () {
    return view('auth.terms', [
        'terms' => Jetstream::localizedMarkdownPath('terms.md')
            ? Str::markdown(file_get_contents(Jetstream::localizedMarkdownPath('terms.md')))
            : '',
    ]);
})->name('terms.show');

// Privacy Policy
Route::get('/privacy-policy', function () {
    return view('auth.policy', [
        'policy' => Jetstream::localizedMarkdownPath('policy.md')
            ? Str::markdown(file_get_contents(Jetstream::localizedMarkdownPath('policy.md')))
            : '',
    ]);
})->name('policy.show');

//Google Api
Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('google/callback', [GoogleController::class, 'callback'])->name('google.callback');

//Rute catre Facebook API
Route::get('/facebook/redirect', [FacebookController::class, 'redirect'])->name('facebook.redirect');
Route::get('/facebook/callback', [FacebookController::class, 'callback'])->name('facebook.callback');

// Restaurant Validation
Route::view('/Restaurant-Validation', 'Restaurant-Validation');
Route::view('/Newsletter-Validation', 'Newsletter-Validation');

// Ruta catre pagina principala a proiectului index.blade.php
Route::get('/', function () {
    return view('index');
});