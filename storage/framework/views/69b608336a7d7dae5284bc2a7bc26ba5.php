<div class="user-log">
    <img class="user" src="<?php echo e($user->profile_photo_url); ?>" alt="<?php echo e($user->name); ?>">
    <img class="arrow" src="<?php echo e(asset('imagini/Vector.svg')); ?>" alt="arrow">
    <ul class="dropdown-options">
        <li><span>👤 <?php echo e(Auth::user()->name); ?></span></li>
        <li><button type="button" onclick="window.location.href='<?php echo e(route('profile.show')); ?>'" class="dropdown-link">My Profile</button></li>
        <li><button type="button" onclick="window.location.href='<?php echo e(route('api-tokens.show')); ?>'" class="dropdown-link">API</button></li>
        <li>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="logout-button">Logout</button>
        </form>
        </li>
        </ul>
</div><?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/livewire/user-avatar.blade.php ENDPATH**/ ?>