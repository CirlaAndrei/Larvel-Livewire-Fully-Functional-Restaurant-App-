<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

      <title><?php echo e(config('app.name', 'Laravel')); ?></title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

      <!-- Tailwind + JS (via Vite) -->
      <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

       <!-- ✅ Force custom CSS to override Tailwind -->
       <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>?v=<?php echo e(filemtime(public_path('style.css'))); ?>">

      <!-- Livewire Styles -->
      <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


  </head>

  <body class="font-sans antialiased body-dashboard">
      <?php if (isset($component)) { $__componentOriginalff9615640ecc9fe720b9f7641382872b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff9615640ecc9fe720b9f7641382872b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $attributes = $__attributesOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__attributesOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $component = $__componentOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__componentOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>

      <!-- ✅ Navbar -->
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

              <?php if(auth()->guard()->check()): ?>
              <div class="order-container-dashboard">
                  <div class="logout-dropdown">
                  <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user-avatar');

$__html = app('livewire')->mount($__name, $__params, 'lw-4125559254-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


                  </div>
              </div>
              <?php endif; ?>

              <img class="hamburger" src="<?php echo e(asset('imagini/Hamburgermenu.svg')); ?>" alt="poza hamburger">
              <img class="close" src="<?php echo e(asset('imagini/hamburger-x.svg')); ?>" alt="poza x">
          </div>
      </nav>

      <!-- ✅ Page Heading -->
      <?php if(isset($header)): ?>
          <header class="bg-white shadow">
              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  <?php echo e($header); ?>

              </div>
          </header>
      <?php endif; ?>

      <!-- ✅ Page Content -->
      <main id="jetstream-profile" class="body-dashboard-content">
          <?php echo e($slot); ?>

      </main>

      <?php echo $__env->yieldPushContent('modals'); ?>
      <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


      <script src="<?php echo e(asset('index.js')); ?>" defer></script>








  </body>

</html><?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/layouts/app.blade.php ENDPATH**/ ?>