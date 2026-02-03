
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
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


</head>

<body class="body-dashboard">


        <nav class="nav-dashboard">
        <div class="poza-logo-dashboard">
           <a href="/"><img src="<?php echo e(asset('imagini/Logo-Restaurant.svg')); ?>" alt="poza logo"></a>
        </div>
            <div class="nav-container">
                <ul class="nav-items">
                    <li><a class="nav-element" href="/">HOME</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#about">ABOUT US</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#menu">MENU</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#contact">CONTACT</a></li>
                    <li><a class="nav-element" href="#">BLOG</a></li>
                    <li><a class="nav-element" href="#">DELIVERY</a></li>
                </ul>
                <div class="order-container-dashboard">
                    <input class="input-nav2" type="text" placeholder="search">
                    <div class="logout-dropdown">
                        <div class="user-log">
                            <img class="user" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                            <img class="arrow" src="<?php echo e(asset('imagini/Vector.svg')); ?>" alt="arrow">
                        </div>
                        <ul class="dropdown-options">
                            <li><span class="user-name">👤Welcome, <?php echo e(Auth::user()->name); ?></span></li>
                            <li><button type="button" onclick="window.location.href='<?php echo e(route('profile.show')); ?>'" class="dropdown-link">My Profile</button></li>
                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
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
                <a href="<?php echo e(route('dashboard')); ?>" class="dashboard-link">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                        <p class="p-dashboard">Dashboard</p>
                    </div>
                </a>
        <div class="users-dropdown">
            <a href class="flex-dashboard <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?> users-dropdown-trigger" onclick="toggleUsersDropdown()">
                <img class="dashboard-icon" src="imagini/usersicon.svg" alt="dashboard-icon">
                <p class="p-dashboard <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">Users</p>

            </a>


        </div>

            </div>

        <div class="right">
        <h2 class="h2-dashboard">Users</h2>

    <button class="btn-create-user" onclick="window.location.href='<?php echo e(route('users.create')); ?>'" type="button">
        Create User
    </button>

    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('users-table', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3553564830-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>

        </div>

        </section>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
<script src="<?php echo e(asset('index.js')); ?>"></script>
</html><?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/users.blade.php ENDPATH**/ ?>