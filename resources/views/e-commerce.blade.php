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
                <a href="{{ route('dashboard') }}" class="dashboard-link">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                        <p class="p-dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</p>
                    </div>
                </a>
                <a href class="flex-dashboard {{ request()->routeIs('ecommerce') ? 'active' : '' }}">
                    <img class="dashboard-icon" src="{{ asset('imagini/kart2.svg') }}" alt="admin">
                    <p class="p-dashboard {{ request()->routeIs('ecommerce') ? 'active' : '' }}">E-commerce</p>
                </a>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/online-delivery_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">My Orders</p>
                </div>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/food-restaurant_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Menu Items</p>
                </div>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/payment-bitcoin_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Transactions</p>
                </div>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/report-data_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Reports</p>
                </div>
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/settings_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Settings</p>
                </div>  
            </div>
            <div class="right">
                <h2 class="h2-dashboard">Dashboard</h2>
            <div class="up">
                            <!-- BIG GRAPHS -->
            <div class="graphs">
    <!-- Orders Chart -->
    <div class="graph">
        <div class="graph-header">
            <h3 class="graph-title1">Recent Orders</h3>
        </div>
        <div class="chart-container orders-chart">  <!-- Has orders-chart class -->
            <canvas id="ordersChart"></canvas>
        </div>
    </div>
    
    <!-- Revenue Chart -->
    <div class="graph">
        <div class="graph-header">
            <h3 class="graph-title">Weekly Revenue</h3>
            <div class="time-period-buttons">
                <button class="period-btn" data-period="daily">Daily</button>
                <button class="period-btn active" data-period="weekly">Weekly</button>
                <button class="period-btn" data-period="monthly">Monthly</button>
                <button class="period-btn" data-period="yearly">Yearly</button>
            </div>
        </div>
                <div class="chart-container revenue-chart">  <!-- Should have revenue-chart class -->
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
            </div>
                <div class="table-scroll">
                <table class="down">
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>#2334</td>
                            <td>Joe Schmidt</td>
                            <td>10/10/2025</td>
                            <td>12:34</td>
                            <td>$124</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td>#2335</td>
                            <td>Jane Doe</td>
                            <td>10/10/2025</td>
                            <td>12:54</td>
                            <td>$103</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td>#2336</td>
                            <td>Mark Kane</td>
                            <td>10/10/2025</td>
                            <td>13:12</td>
                            <td>$87</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <a href="#">See all</a>
                            </td>
                        </tr>
                    </table>
                    </div>
                    <div class="table-scroll">
                    <table class="down">
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>#2334</td>
                            <td>Joe Schmidt</td>
                            <td>10/10/2025</td>
                            <td>12:34</td>
                            <td>$124</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td>#2335</td>
                            <td>Jane Doe</td>
                            <td>10/10/2025</td>
                            <td>12:54</td>
                            <td>$103</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td>#2336</td>
                            <td>Mark Kane</td>
                            <td>10/10/2025</td>
                            <td>13:12</td>
                            <td>$87</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <a href="#">See all</a>
                            </td>
                        </tr>
                    </table>
                    </div>

                    <div class="table-scroll">
                    <table class="down">
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>#2334</td>
                            <td>Joe Schmidt</td>
                            <td>10/10/2025</td>
                            <td>12:34</td>
                            <td>$124</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td>#2335</td>
                            <td>Jane Doe</td>
                            <td>10/10/2025</td>
                            <td>12:54</td>
                            <td>$103</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td>#2336</td>
                            <td>Mark Kane</td>
                            <td>10/10/2025</td>
                            <td>13:12</td>
                            <td>$87</td>
                            <td>Online</td>
                            <td>
                                <a href="#" class="red">Accept</a>
                                <a href="#">Reject</a>
                            </td>
                            <td><a href="#">👁️</a></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <a href="#">See all</a>
                            </td>
                        </tr>
                    </table>
                    </div>
            </div>
        </div>
        
        </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('index.js') }}"></script>

</html>