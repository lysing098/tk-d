<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <title>Tk & D Supplier</title>

    <!-- Scripts and Styles -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>

<body class="bg-[#0f172a] text-white" x-data="{ sidebar: false }">

    @php
        $menus = [
            ['name' => 'Home Page', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'url' => '/admin/home'],
            ['name' => 'About Us Page', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4', 'url' => '/admin/about-us'],
            ['name' => 'Export Page', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4', 'url' => '/admin/export'],
            ['name' => 'Business Activities Page', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4', 'url' => '/admin/business-activities'],
            ['name' => 'Product', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4', 'url' => '/admin/product'],
            ['name' => 'Gallery', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4', 'url' => '/admin/gallery'],
            ['name' => 'Contact', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 01-2-2v-4m16 0H4', 'url' => '/admin/contact'],
            ['name' => 'Company', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'url' => '/admin/company'],
        ];
    @endphp

    <div class="flex h-screen overflow-hidden">

        {{-- MOBILE OVERLAY --}}
        <div x-show="sidebar" x-transition.opacity @click="sidebar = false"
            class="fixed inset-0 bg-black/50 z-40 md:hidden">
        </div>

        {{-- SIDEBAR --}}
        <aside class="fixed md:static z-50 h-screen bg-[#111827] border-r border-white/10 flex flex-col w-64 transform transition-transform duration-300 ease-in-out md:translate-x-0"
            :class="sidebar ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

            {{-- TOP SIDEBAR --}}
            <div class="h-16 flex items-center justify-between px-4 border-b border-white/10">
                <img src="{{ asset('images/logo.jpg') }}" class="w-10">
                <button @click="sidebar = false" class="md:hidden text-white text-xl">✕</button>
            </div>

            {{-- NAV --}}
            <nav class="flex-1 p-3 space-y-2 overflow-y-auto">
                @foreach ($menus as $menu)
                    @php $active = request()->is(trim($menu['url'], '/')); @endphp
                    <a href="{{ $menu['url'] }}" @click="sidebar = false"
                        class="flex items-center gap-3 px-3 py-3 rounded-xl transition {{ $active ? 'bg-orange-500/10 text-orange-400 border border-orange-500/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon'] }}" />
                        </svg>
                        <span class="text-sm font-medium">{{ $menu['name'] }}</span>
                    </a>
                @endforeach
            </nav>

            {{-- USER --}}
            {{-- <div class="p-3 border-t border-white/10">
                <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-white/5">
                    <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-white text-sm">Admin</p>
                        <p class="text-gray-400 text-xs">admin@email.com</p>
                    </div>
                </div>
            </div> --}}
        </aside>

        {{-- RIGHT CONTENT AREA --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- HEADER / TOP BAR --}}
            <header class="h-16 border-b border-white/10 bg-[#111827] flex items-center justify-between px-6">
                <div class="flex items-center gap-4">
                    {{-- MOBILE MENU BUTTON --}}
                    <button @click="sidebar = true" class="md:hidden text-white text-2xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div>
                        <h2 class="font-semibold">@yield('page-title')</h2>
                        <p class="text-xs text-gray-400">@yield('page-subtitle')</p>
                    </div>
                </div>
                {{-- Logo for mobile header if needed --}}
                <img src="{{ asset('images/logo.jpg') }}" class="w-8 md:hidden">
            </header>

            {{-- PAGE CONTENT --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
