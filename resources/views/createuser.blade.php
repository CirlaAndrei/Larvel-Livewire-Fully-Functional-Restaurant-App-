<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body class="body-dashboard">

        <nav class="nav-dashboard">
        <div class="poza-logo-dashboard">
           <a href="/"><img src="{{ asset('imagini/Logo-Restaurant.svg') }}" alt="poza logo"></a>
        </div>
            <div class="nav-container">
                <ul class="nav-items">
                    <li><a class="nav-element" href="/">HOME</a></li>
                    <li><a class="nav-element" href="{{ url('/') }}#about">ABOUT US</a></li>
                    <li><a class="nav-element" href="{{ url('/') }}#menu">MENU</a></li>
                    <li><a class="nav-element" href="{{ url('/') }}#contact">CONTACT</a></li>
                    <li><a class="nav-element" href="#">BLOG</a></li>
                    <li><a class="nav-element" href="#">DELIVERY</a></li>
                </ul>
                <div class="order-container-dashboard">
                    <input class="input-nav2" type="text" placeholder="search">
                    <div class="logout-dropdown">
                        <div class="user-log">
                            <img class="user" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                            <img class="arrow" src="{{ asset('imagini/Vector.svg') }}" alt="arrow">
                        </div>
                        <ul class="dropdown-options">
                            <li><span class="user-name">👤Welcome, {{ Auth::user()->name }}</span></li>
                            <li><button type="button" onclick="window.location.href='{{ route('profile.show') }}'" class="dropdown-link">My Profile</button></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-button">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <img class="hamburger" id="hamburger-dashboard" src="{{ asset('imagini/Hamburgermenu.svg') }}" alt="poza hamburger">
                    <img class="close" id = "close-dashboard" src="{{ asset('imagini/hamburger-x.svg') }}" alt="poza x">

                </div>
            </div>
        </nav>

    <section class="dashboard1">
        <div class="flex-sectiune-dashboard">
            <!-- Copy your left sidebar from users.blade.php -->
            <div class="left-bar">
                <a href="{{ route('dashboard') }}" >
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="{{ asset('imagini/dashboard-layout_svgrepo.com.svg') }}" alt="dashboard-icon">
                    <p class="p-dashboard">Dashboard</p>
                </div>
                </a>
                <div class="users-dropdown">
                    <a href="{{ route('users.index') }}">
                    <div class="flex-dashboard users-dropdown-trigger">

                        <img class="dashboard-icon" src="{{ asset('imagini/usersicon.svg') }}" alt="dashboard-icon">
                        <p class="p-dashboard">Users</p>

                        <!--<span class="dropdown-arrow-users">▼</span>-->
                    </div>
                    </a>

                    <!--<div id="usersDropdownMenu" class="users-dropdown-menu">
                        <a href="{{ route('users.index') }}" class="users-dropdown-item">
                            View All Users
                        </a>
                        <a href="{{ route('users.create') }}" class="users-dropdown-item">
                            Create New User
                        </a>
                    </div>-->
                </div>
            </div>

            <!-- RIGHT SIDE: CREATE USER FORM -->
            <div class="right-createuser">
                <h2 class="h2-dashboard">Create New User</h2>

                <div>
                    <form class="form-create-users" method="POST" action="{{ route('users.store') }}">
                             
                        @csrf
                        <div class="create-users-elements">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="input-sign-name" placeholder = 'Name' required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="input-sign-email" placeholder ='Email' required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="Password" name="password" class="input-sign-password" placeholder = 'Password' required>
                            <span class="toggle-password-createuser" onclick="togglePasswordVisibility('Password')">
                                <img
                                    src="{{ asset('imagini/Iconita-Ochi.svg') }}"
                                    data-open="{{ asset('imagini/Iconita-Ochi.svg') }}"
                                    data-closed="{{ asset('imagini/Iconita-Ochi.svg') }}"
                                    class="eye-icon"
                                >
                            </span>
                        </div>
                        <div class="custom-dropdown">
                            <div class="dropdown-selected" id="selectedRole">
                                @if(auth()->user()->role === 'manager')
                                    User
                                @else
                                    Role
                                @endif
                            </div>

                            <ul class="dropdown-roles" id="roleList">
                                @if(auth()->user()->role === 'manager')
                                    {{-- Managers can only create regular users --}}
                                    <li data-value="user">User</li>
                                @else
                                    {{-- Admins can create all roles from config --}}
                                    @foreach(config('roles') as $role)
                                        <li data-value="{{ $role }}">{{ ucfirst($role) }}</li>
                                    @endforeach
                                @endif
                            </ul>

                            <input type="hidden" name="role" id="role" value="{{ auth()->user()->role === 'manager' ? 'user' : '' }}">
                        </div>

                        <button type="submit" class="btn-cancel2">Create User</button>
                        <button type="button" class="btn-cancel" onclick="window.location.href='{{ route('users.index') }}'">Cancel</button>
                        </div>                     
                        @if($errors->any())
                        <div class="alert alert-error">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="{{ asset('index.js') }}"></script>
</html>