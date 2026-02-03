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
                <a href="/"><img src="imagini/Logo-Restaurant.svg" alt="poza logo"></a>
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
                <a href class="flex-dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</p>
                </a>
                @if(auth()->user()->canAccessEcommerce())
                <a href="{{ route('ecommerce') }}" class="dashboard-link">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="{{ asset('imagini/kart2.svg') }}" alt="admin">
                        <p class="p-dashboard">E-commerce</p>
                    </div>
                </a>
                @endif
                @if(auth()->user()->canManageUsers())
                <a href="{{ route('users.index') }}" class="flex-dashboard {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="imagini/usericon2.svg" alt="dashboard-icon">
                    <p class="p-dashboard {{ request()->routeIs('users.*') ? 'active' : '' }}">Users</p>
                </a>
             @endif
            </div>

            <div class="right">
                <h2 class="h2-dashboard">Dashboard</h2>
            <div class="up">

                <!-- SMALL STATS ROW -->
                <div class="stats-row">
                    <div class="stat-card">
                        <p class="stat-title">Total Income</p>
                        <h3 class="stat-value">$37,802</h3>
                        <canvas id="incomeMini"></canvas>
                    </div>

                    <div class="stat-card">
                        <p class="stat-title">Orders</p>
                        <h3 class="stat-value">1,245</h3>
                        <canvas id="ordersMini"></canvas>
                    </div>

                    <div class="stat-card">
                        <p class="stat-title">Customers</p>
                        <h3 class="stat-value">892</h3>
                        <canvas id="customersMini"></canvas>
                    </div>

                    <div class="stat-card">
                        <p class="stat-title">Visitors</p>
                        <h3 class="stat-value">12,430</h3>
                        <canvas id="visitorsMini"></canvas>
                    </div>
                </div>
        </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('index.js') }}"></script>

</html>