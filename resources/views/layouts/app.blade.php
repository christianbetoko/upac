<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        

       

    {{--     @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        @livewireStyles
        <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="template-version" content="1.0.1">
     <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo.png')}}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	@if(View::hasSection('meta_tags'))
        @yield('meta_tags')
    @else
        {{-- Valeurs par défaut (ex: Accueil) --}}
        <meta property="og:title" content="U.PA.C - Université Panafricaine du Congo">
        <meta property="og:description" content="Bienvenue sur le site officiel de l'Université Panafricaine du Congo (U.PA.C). Découvrez nos programmes académiques, nos actualités et nos événements.">
        <meta property="og:image" content="{{asset('assets/images/logo.png')}}">
        <meta name="twitter:image" content="{{asset('assets/images/logo.png')}}">
    @endif

    </head>
    <body class="rs-smoother-yes">
         <!-- preloader start -->
    <div id="pre-load">
        <div id="loader" class="loader">
            <div class="loader-container has-theme-blue">
                <div class="loader-icon"><img src="{{asset('assets/images/logo.png')}}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- cursor start -->
    <div id="rs-mouse">
        <div id="cursor-ball"></div>
    </div>

    <!-- cursor end -->
    <livewire:components.header />
        {{ $slot }}
    <livewire:components.footer />
     <!-- back to top -->
    <div id="backtotop-wrap" class="rs-backtotop has-theme-blue">
        <svg class="arrowicon" viewBox="0 0 24 24" width="18" height="18">
            <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z" fill="#000">
            </path>
        </svg>
        <svg class="scrollprogress" width="40" height="40">
            <circle class="progress-circle" cx="20" cy="20" r="18" stroke-width="2" fill="none" stroke="#fff" stroke-dasharray="113.1" stroke-dashoffset="113.1"></circle>
        </svg>
    </div>
 <!-- JS here -->
    <script src="{{asset('assets/js/vendor/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jarallax.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/ajax-form.js')}}"></script>
    <script src="{{asset('assets/css/main.css')}}"></script>
    <script src="{{asset('assets/js/plugins/gsap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/rs-anim-int.js')}}"></script>
    <script src="{{asset('assets/js/plugins/rs-scroll-trigger.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/rs-splitText.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.appear.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/odometer.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    
        @livewireScripts
    </body>
</html>
