<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="@yield('title', 'INSREAL')" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="@yield('cover', asset('/img/logoinsreal.png'))" />
    <meta property="og:description" content="@yield('desc', 'บริษัท อินเรียลเอสเตท จำกัด')" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <title>{{ config('app.name', 'IDSS') }}</title>

    <!-- icon  -->
    <link rel="icon" href="/img/logoinsreal.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet" />

    {{-- jQuery  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    {{-- owl carousel --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    {{-- <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> --}}

    {{-- aos animations --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}

    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />

    <script src="https://cdn.websitepolicies.io/lib/cconsent/cconsent.min.js" defer></script>
    <script>
        window.addEventListener("load", function() {
            window.wpcb.init({
                "colors": {
                    "popup": {
                        "background": "#ffe8ff",
                        "text": "#000000",
                        "border": "#9f5ec2"
                    },
                    "button": {
                        "background": "#9f5ec2",
                        "text": "#ffffff"
                    }
                },
                "position": "bottom",
                "border": "thin",
                "corners": "normal"
            })
        });
    </script>

    @livewireScripts

    <!-- Scripts -->
    @vite([
        // CSS
        'resources/css/app.css',
        'resources/css/pavo/fontawesome-all.css',
        'resources/css/pavo/magnific-popup.css',
        'resources/css/pavo/styles.css',
        'resources/css/pavo/swiper.css',
        // JS
        'resources/js/app.js',
        'resources/js/pavo/scripts.js',
    ])
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <livewire:layout.land_nav />

    {{ $slot }}

    <footer class="py-6 bg-gray-800 text-gray-50">
        <div class="container px-6 mx-auto space-y-6 divide-y divide-gray-400 md:space-y-12 divide-opacity-50">
            <div class="pb-6 col-span-full md:pb-0 md:col-span-6">
                <div class="flex flex-col items-center gap-2 justify-center space-x-3 md:justify-start">
                    <div class="bg-white rounded-full px-4">
                        <img src="/img/logoinsreal.png" width="80" alt="">
                    </div>
                    <span class="self-center text-2xl font-semibold">{{ __('messages.insr') }}</span>
                    <p class=" md:px-8 lg:px-24">{{ __('messages.addr_id') }}</p>
                </div>
            </div>
            <div class="grid justify-center pt-6 lg:justify-between">
                <div class="flex flex-col self-center text-sm text-center md:block lg:col-start-1 md:space-x-6">
                    <span>©2024 {{ __('messages.iddrives') }}</span>
                </div>
                @php
                    $last_visitor = \App\Models\Visitor::orderBy('id', 'desc')->first();
                @endphp
                <div class="flex justify-center items-center pt-4 space-x-4 lg:pt-0 lg:col-start-6">
                    <p class="m-0 p-0">Visitors: {{ number_format($last_visitor->id, 0, ',', ',') }}</p>
                </div>
            </div>
            </div>
        </div>
    </footer>



    <script src="https://kit.fontawesome.com/872d5aa762.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    {{-- Load Other Dependencies After jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}

    {{-- aos animations --}}
    {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script>
        AOS.init();
    </script> --}}
</body>

</html>
