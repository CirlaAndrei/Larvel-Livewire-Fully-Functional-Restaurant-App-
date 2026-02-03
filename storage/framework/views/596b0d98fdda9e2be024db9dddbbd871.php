<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'navigation',
]));

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

foreach (array_filter(([
    'navigation',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $openSidebarClasses = 'fi-sidebar-open w-[--sidebar-width] translate-x-0 shadow-xl ring-1 ring-gray-950/5 dark:ring-white/10 rtl:-translate-x-0';
    $isRtl = __('filament-panels::layout.direction') === 'rtl';
?>


<aside>
<section class="dashboard">
        <div class="flex-sectiune-dashboard">
            <div class="left-bar">
                <a href="<?php echo e(url('/dashboard')); ?>">
                <div class="flex-dashboard">
                    <img class="dashboard-icon" src="imagini/dashboard-layout_svgrepo.com.svg" alt="dashboard-icon">
                    <p class="p-dashboard">Dashboard</p>
                </div>
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
        </section>

        <script>
            var collapsedGroups = JSON.parse(
                localStorage.getItem('collapsedGroups'),
            )

            if (collapsedGroups === null || collapsedGroups === 'null') {
                localStorage.setItem(
                    'collapsedGroups',
                    JSON.stringify(<?php echo \Illuminate\Support\Js::from(
                        collect($navigation)
                            ->filter(fn (\Filament\Navigation\NavigationGroup $group): bool => $group->isCollapsed())
                            ->map(fn (\Filament\Navigation\NavigationGroup $group): string => $group->getLabel())
                            ->values()
                    )->toHtml() ?>),
                )
            }

            collapsedGroups = JSON.parse(
                localStorage.getItem('collapsedGroups'),
            )

            document
                .querySelectorAll('.fi-sidebar-group')
                .forEach((group) => {
                    if (
                        !collapsedGroups.includes(group.dataset.groupLabel)
                    ) {
                        return
                    }

                    // Alpine.js loads too slow, so attempt to hide a
                    // collapsed sidebar group earlier.
                    group.querySelector(
                        '.fi-sidebar-group-items',
                    ).style.display = 'none'
                    group
                        .querySelector('.fi-sidebar-group-collapse-button')
                        .classList.add('rotate-180')
                })
        </script>

        <?php echo e(\Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_NAV_END)); ?>

    </nav>

    <?php echo e(\Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_FOOTER)); ?>

</aside>

<?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/vendor/filament-panels/components/sidebar/index.blade.php ENDPATH**/ ?>