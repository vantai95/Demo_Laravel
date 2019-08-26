const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Common

// Application
mix.sass('resources/sass/app.scss','public/css/app/app.css' )
    .styles([
        'resources/css/app/theme.css',
    ], 'public/css/app/theme.css')
    .styles([
        'resources/css/app/revolution/settings.css',
        'resources/css/app/revolution/layers.css',
        'resources/css/app/revolution/navigation.css',
    ], 'public/css/app/revolution.css')
    .scripts([
        'resources/js/app/vendor/jquery.min.js',
        'resources/js/app/vendor/bootstrap.min.js',
        'resources/js/app/vendor/function-check-viewport.js',
        'resources/js/app/vendor/slick.min.js',
        'resources/js/app/vendor/select2.full.min.js',
        'resources/js/app/vendor/imagesloaded.pkgd.min.js',
        'resources/js/app/vendor/jquery.mmenu.all.min.js',
        'resources/js/app/vendor/rellax.min.js',
        'resources/js/app/vendor/isotope.pkgd.min.js',
        'resources/js/app/vendor/bootstrap-notify.min.js',
        'resources/js/app/vendor/bootstrap-slider.js',
        'resources/js/app/vendor/in-view.min.js',
        'resources/js/app/vendor/countUp.js',
        'resources/js/app/vendor/animsition.min.js',
    ], 'public/js/app/vendor.js')
    .scripts([
        'resources/js/app/revolution/jquery.themepunch.tools.min.js',
        'resources/js/app/revolution/jquery.themepunch.revolution.min.js',
        'resources/js/app/revolution/revolution.extension.actions.min.js',
        'resources/js/app/revolution/revolution.extension.carousel.min.js',
        'resources/js/app/revolution/revolution.extension.kenburn.min.js',
        'resources/js/app/revolution/revolution.extension.layeranimation.min.js',
        'resources/js/app/revolution/revolution.extension.migration.min.js',
        'resources/js/app/revolution/revolution.extension.navigation.min.js',
        'resources/js/app/revolution/revolution.extension.parallax.min.js',
        'resources/js/app/revolution/revolution.extension.slideanims.min.js',
        'resources/js/app/revolution/revolution.extension.video.min.js',
    ], 'public/js/app/revolution.js')
    .scripts([
        'resources/js/app/theme/global.js',
        'resources/js/app/theme/config-banner-home-1.js',
        'resources/js/app/theme/config-mm-menu.js',
        'resources/js/app/theme/config-set-bg-blog-thumb.js',
        'resources/js/app/theme/config-isotope-product-home-1.js',
        'resources/js/app/theme/config-carousel-thumbnail.js',
        'resources/js/app/theme/config-carousel-product-quickview.js',
        'resources/js/app/theme/config-inview-counter-up.js',
        'resources/js/app/theme/config-carousel.js',
    ], 'public/js/app/theme.js')
    .copyDirectory('resources/images/app', 'public/images/app')
    .copyDirectory('resources/fonts/app', 'public/css/fonts');

// Admin

mix.sass('resources/sass/admin.scss','public/css/admin/admin.css' )
    .styles([
        'node_modules/@coreui/icons/css/coreui-icons.min.css',
        'node_modules/flag-icon-css/css/flag-icon.min.css',
        'node_modules/font-awesome/css/font-awesome.min.css',
        'node_modules/simple-line-icons/css/simple-line-icons.css',
        'node_modules/@coreui/coreui/dist/css/coreui.min.css',
        'node_modules/sweetalert2/dist/sweetalert2.min.css',
        'vendors/pace-progress/css/pace.min.css',
        'node_modules/dropzone/dist/dropzone.css',
        'node_modules/summernote/dist/summernote-bs4.css',
        'node_modules/toastr/build/toastr.min.css',
    ], 'public/css/admin/theme.css')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/pace-progress/pace.min.js',
        'node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js',
        'node_modules/@coreui/coreui/dist/js/coreui.min.js',
        'node_modules/dropzone/dist/dropzone.js',
        'node_modules/sweetalert2/dist/sweetalert2.all.min.js',
        'node_modules/summernote/dist/summernote-bs4.min.js',
        'node_modules/toastr/build/toastr.min.js',
    ], 'public/js/admin/theme.js')
    .scripts([
        'resources/js/admin/common.js',
        'resources/js/admin/agent.js',
    ], 'public/js/admin/admin.js')
    .copyDirectory('node_modules/summernote/dist/font', 'public/css/admin/font')
    .copyDirectory('resources/images/admin', 'public/images/admin')
    .copyDirectory('node_modules/simple-line-icons/fonts', 'public/css/fonts');
