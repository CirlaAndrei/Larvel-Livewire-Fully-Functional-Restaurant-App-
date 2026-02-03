<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'actions' => [],
    'breadcrumbs' => [],
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
    'actions' => [],
    'breadcrumbs' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    // These are passed through in the bag otherwise Laravel converts View objects to strings prematurely.
    $heading = $attributes->get('heading');
    $subheading = $attributes->get('subheading');
    $attributes = $attributes->except(['heading', 'subheading']);
?>
<body class="body-dashboard ">

<section class="dashboard dashboard--full">
<div class="dashboard-inner">
    <div class="right">
    <h2 class="h2-dashboard">Dashboard</h2>
    <div class="up">
        <div class="graphs">
            <img class="graph" src="imagini/image 22.svg" alt="graph">
            <img class="graph" src="imagini/image 23.svg" alt="graph">
        </div>
    </div>
</div>

</div>
</section>




</body>


<?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/vendor/filament-panels/components/header/index.blade.php ENDPATH**/ ?>