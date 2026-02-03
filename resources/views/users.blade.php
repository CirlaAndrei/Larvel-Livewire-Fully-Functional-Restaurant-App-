
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
    @livewireStyles

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
                    <img class="hamburger" id="hamburger-dashboard" src="imagini/Hamburgermenu.svg" alt="poza hamburger">
                    <img class="close" id = "close-dashboard" src="imagini/hamburger-x.svg" alt="poza x">

                </div>
            </div>
        </nav>

        <section class="dashboard">
        <div class="flex-sectiune-dashboard">
            <div class="left-bar">
                <a href="{{ route('dashboard') }}" class="dashboard-link">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                        <p class="p-dashboard">Dashboard</p>
                    </div>
                </a>
                <div class="users-dropdown">
                    <a href class="flex-dashboard {{ request()->routeIs('users.*') ? 'active' : '' }} users-dropdown-trigger" onclick="toggleUsersDropdown()">
                        <img class="dashboard-icon" src="imagini/usersicon.svg" alt="dashboard-icon">
                        <p class="p-dashboard {{ request()->routeIs('users.*') ? 'active' : '' }}">Users</p>
                    </a>
                </div>
            </div>

            <div class="right">
                <h2 class="h2-dashboard">Users</h2>

                <button class="btn-create-user" onclick="window.location.href='{{ route('users.create') }}'" type="button">
                    Create User
                </button>

                {{-- Livewire handles search, filters & table --}}
                <livewire:users-table />
            </div>

        </div>

</section>
@livewireScripts
<!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->




</body>
<script src="{{ asset('index.js') }}"></script>
</html>