<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for your applications Livewire
    | component classes. This is primarily used by the Livewire component
    | generator command. You are welcome to change this value.
    |
    */

    'class_namespace' => 'App\\Livewire',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | The layout that page components should use when rendered. This is only
    | used when rendering full-page components without a Blade view wrapper.
    |
    */

    'layout' => 'components.layouts.app',

    /*
    |--------------------------------------------------------------------------
    | Legacy Model Binding
    |--------------------------------------------------------------------------
    |
    | If your Livewire components used direct model binding (e.g. public
    | Post $post), Livewire v3 disables this by default. Setting this to
    | true restores Livewire v2 behavior. You are NOT using model binding,
    | so this should stay false.
    |
    */

    'legacy_model_binding' => false,

    /*
    |--------------------------------------------------------------------------
    | Inject Assets
    |--------------------------------------------------------------------------
    |
    | Livewire can automatically inject its JavaScript assets into the page
    | via @livewireScripts. You almost always want this set to true.
    |
    */

    'inject_assets' => true,

    /*
    |--------------------------------------------------------------------------
    | Inject Morph Markers
    |--------------------------------------------------------------------------
    |
    | Adds morph markers for Livewire morphdom operations. Keep this true.
    |
    */

    'inject_morph_markers' => true,

    /*
    |--------------------------------------------------------------------------
    | Navigate
    |--------------------------------------------------------------------------
    |
    | Whether to enable SPA-like navigation with wire:navigate. Disabled by
    | default to preserve Livewire 2 behavior.
    |
    */

    'navigate' => false,

    /*
    |--------------------------------------------------------------------------
    | Pagination Theme
    |--------------------------------------------------------------------------
    |
    | Sets the default pagination theme for Livewire components.
    |
    */

    'pagination_theme' => 'tailwind',

];