<div>
    <?php
        $current = $users->currentPage();
        $last = $users->lastPage();
        $start = max(1, $current - 2);
        $end = min($last, $current + 2);
        $currentUser = auth()->user();
        $isManager = $currentUser->role === 'manager';
    ?>

    
    <input
        type="text"
        class="input-usersearch"
        placeholder="Search users..."
        wire:model.live.debounce.300ms="search"
    >

    
    <div class="filter-tab">
        <p class="filter-tag">Filters:</p>
            <div class="tabs">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = config('roles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <!--[if BLOCK]><![endif]--><?php if(!($isManager && in_array($role, ['admin', 'manager']))): ?>
                <button type="button" wire:click="toggleRole('<?php echo e($role); ?>')" class="btn-sign role-filter <?php echo e($selectedRole === $role ? 'highlight active' : ''); ?>" id="user-btn-tabs">
                    <?php echo e(ucfirst(str_replace('_', ' ', $role))); ?>

                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    </div>

    
    <div class="table-scroll" x-data="{ isDown: false, startX: 0, scrollLeft: 0 }"
     @mousedown="isDown = true; startX = $event.pageX; scrollLeft = $el.scrollLeft"
     @mouseup="isDown = false"
     @mouseleave="isDown = false"
     @mousemove="
       if (!isDown) return;
       $el.scrollLeft = scrollLeft - ($event.pageX - startX);
    ">
        <table class="down">
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <!--[if BLOCK]><![endif]--><?php if($isManager && in_array($user->role, ['admin', 'manager'])): ?>
                        <?php continue; ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    
                    <tr wire:key="user-<?php echo e($user->id); ?>">
                        <td data-label="ID">#<?php echo e($user->id); ?></td>
                        <td data-label="Name"><?php echo e($user->name); ?></td>
                        <td data-label="Email"><?php echo e($user->email); ?></td>
                        <td data-label="Updated"><?php echo e($user->updated_at->format('d.m.Y')); ?></td>

                        
                        <td data-label="Actions" class="make-delete">
                        <div class="users-parent">
                        <div x-data="{ open: false }" class="dropdown-wrapper">
                        <div class="dropdown-selected-users" @click="open = !open">
                        <?php echo e(ucfirst(str_replace('_', ' ', $user->role ?? 'Select role'))); ?>

                    </div>

                    <ul x-show="open" x-transition @click.outside="open = false">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = config('roles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <!--[if BLOCK]><![endif]--><?php if(!($isManager && in_array($role, ['admin', 'manager']))): ?>
                                <li
                                    wire:key="role-<?php echo e($user->id); ?>-<?php echo e($role); ?>"
                                    class="role-item <?php echo e($user->role === $role ? 'active' : ''); ?>"
                                    x-on:click.stop.prevent="
                                        Livewire.find($el.closest('[wire\\:id]').getAttribute('wire:id'))
                                            .call('updateUserRole', <?php echo e($user->id); ?>, '<?php echo e($role); ?>');
                                        open = false;">
                                    <?php echo e(ucfirst(str_replace('_', ' ', $role))); ?>

                                </li>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                    </div>

                            
                            <form
                                class="form-users"
                                method="POST"
                                action="<?php echo e(route('users.destroy', $user)); ?>"
                            >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    class="btn-delete"
                                    type="submit"
                                    onclick="return confirm('Delete user <?php echo e($user->name); ?>?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">No users found.</td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    
    <div class="pagination-wrapper">
        
        <!--[if BLOCK]><![endif]--><?php if($users->onFirstPage()): ?>
            <span class="page disabled">«</span>
        <?php else: ?>
            <button wire:click="previousPage" class="page">«</button>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        
        <!--[if BLOCK]><![endif]--><?php for($page = $start; $page <= $end; $page++): ?>
            <!--[if BLOCK]><![endif]--><?php if($page === $current): ?>
                <span class="page active"><?php echo e($page); ?></span>
            <?php else: ?>
                <button wire:click="gotoPage(<?php echo e($page); ?>)" class="page">
                    <?php echo e($page); ?>

                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->

        
        <!--[if BLOCK]><![endif]--><?php if($users->hasMorePages()): ?>
            <button wire:click="nextPage" class="page">»</button>
        <?php else: ?>
            <span class="page disabled">»</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

</div><?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/livewire/users-table.blade.php ENDPATH**/ ?>