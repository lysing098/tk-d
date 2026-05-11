<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <title>Tk & D Supplier</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>

<body class="bg-[#0f172a] text-white">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}
        @include('components.backend.Sidebar')

        {{-- RIGHT CONTENT AREA --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- TOP BAR (optional) --}}
            <header class="h-16 border-b border-white/10 bg-[#111827] flex items-center px-6">
                <div>
                    <h2 class="font-semibold">@yield('page-title')</h2>
                    <p class="text-xs text-gray-400">@yield('page-subtitle')</p>
                </div>
            </header>

            {{-- PAGE CONTENT --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
