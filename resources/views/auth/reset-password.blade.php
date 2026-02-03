<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

</head>

<body class="Sign-In-Page">



<div class="formular-sign" style="background:#E9DCC5; padding:2rem 3rem; border-radius:10px; width:30rem;">


    <h2 style="margin-bottom:1rem;">Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        {{-- EMAIL --}}
        <label for="email">Email Address</label>
        <input
            id="email"
            type="email"
            name="email"
            required
            value="{{ old('email', $request->email) }}"
            style="width:100%; padding:0.8rem; border:2px solid #213639; border-radius:6px;"
        >

        {{-- NEW PASSWORD --}}
        <label for="password">New Password</label>
        <input
            id="password"
            type="password"
            name="password"
            required
            style="width:100%; padding:0.8rem; border:2px solid #213639; border-radius:6px;"
        >

        {{-- CONFIRM --}}
        <label for="password_confirmation">Confirm Password</label>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            style="width:100%; padding:0.8rem; border:2px solid #213639; border-radius:6px;"
        >

        <button type="submit" class="btn-sign-in" style="margin-top:1.5rem; width:100%;">
            Reset Password
        </button>
    </form>

    <a href="{{ route('login') }}" style="margin-top:1rem; display:block; text-align:center;">
        Back to Login
    </a>
</div>


</body>
</html>