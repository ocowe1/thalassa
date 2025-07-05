<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <link href="{{ asset('/font-awesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/solid.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/app.css?v=' . date("YmdHis")) }}" rel="stylesheet">
    <link href="{{ asset('/css/menuDeContexto.css?v=' . date("YmdHis")) }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


    @livewireStyles
</head>

<body>

    <div id="wrapper">

        <div class="main-container">
            <!-- Animated Background with Mystic Elements -->
            <div class="background-effects">
                <!-- Floating Mystic Lights -->
                <div class="mystic-light light-1"></div>
                <div class="mystic-light light-2"></div>
                <div class="mystic-light light-3"></div>
                <div class="mystic-light light-4"></div>
                <div class="mystic-light light-5"></div>
                <div class="mystic-light light-6"></div>

                <!-- Vine Decorations -->
                <div class="vine vine-1"></div>
                <div class="vine vine-2"></div>
                <div class="vine vine-3"></div>
                <div class="vine vine-4"></div>

                <!-- Floating Pillars -->
                <div class="pillar pillar-1"></div>
                <div class="pillar pillar-2"></div>
                <div class="pillar pillar-3"></div>
                <div class="pillar pillar-4"></div>
                <div class="pillar pillar-5"></div>
                <div class="pillar pillar-6"></div>
                <div class="pillar pillar-7"></div>
                <div class="pillar pillar-8"></div>
            </div>

            <!-- Gradient Overlay -->
            <div class="gradient-overlay"></div>

            <livewire:Components.Header/>

            <!-- Main Content -->
            <main class="main-content">

                {{ $slot }}

                @include('layouts.menuDeContexto')

            </main>


            @include('layouts.footer')

            <!-- Enhanced Floating Elements -->
            <div class="floating-bg bg-1"></div>
            <div class="floating-bg bg-2"></div>
            <div class="floating-bg bg-3"></div>
        </div>

    </div>

    @livewireScripts


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/main-layout.js?v=' . date("YmdHis")) }}"></script>
    <script src="{{ asset('js/views/menuDeContexto.js?v=' . date("YmdHis")) }}"></script>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Add fade-in animation on load
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });

    </script>
</body>

</html>
