
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['navigation']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['navigation']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<nav class="nav-dashboard">
            <div class="poza-logo-dashboard">
                <img src="imagini/Logo-Restaurant.svg" alt="poza logo">
            </div>
            <div class="nav-container">
                <ul class="nav-items">
                    <li><a class="nav-element" href="<?php echo e(url('dashboard')); ?>#about">HOME</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#about">ABOUT US</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#menu">MENU</a></li>
                    <li><a class="nav-element" href="<?php echo e(url('/')); ?>#contact">CONTACT US</a></li>
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
<script src="<?php echo e(asset('index.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/vendor/filament-panels/components/topbar/index.blade.php ENDPATH**/ ?>