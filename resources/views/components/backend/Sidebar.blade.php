@php
    $menus = [
        // [
        //     'name' => 'Dashboard',
        //     'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        //     'url' => '/admin',
        // ],
        [
            'name' => 'Home Page',
            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
            'url' => '/admin/home',
        ],
        [
            'name' => 'About Us',
            'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4',
            'url' => '/admin/about-us',
        ],
        [
            'name' => 'Product',
            'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4',
            'url' => '/admin/product',
        ],
        [
            'name' => 'Gallery',
            'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16 0H4',
            'url' => '/admin/gallery',
        ],
        [
            'name' => 'Blogs',
            'icon' =>
                'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'url' => '/admin/blog',
        ],
        [
            'name' => 'Company',
            'icon' =>
                'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'url' => '/admin/company',
        ],
        [
            'name' => 'Team',
            'icon' =>
                'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'url' => '/admin/team',
        ],
    ];
@endphp
<aside x-data="{ open: true }" :class="open ? 'w-64' : 'w-20'"
    class="h-screen bg-[#111827] border-r border-white/10 flex flex-col transition-all duration-300 overflow-hidden">

    <!-- Logo -->
    <div class="h-16 flex items-center justify-between px-4 border-b border-white/10">

        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center text-white font-bold">
                A
            </div>

            <div x-show="open" x-transition>
                <h1 class="text-sm font-semibold text-white">Admin Panel</h1>
                <p class="text-[11px] text-gray-400">Management</p>
            </div>
        </div>

        <!-- Toggle -->
        <button @click="open = !open"
            class="w-9 h-9 rounded-lg hover:bg-white/10 flex items-center justify-center text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-3 space-y-2 overflow-y-auto">

        @foreach ($menus as $menu)
            @php
                $active = request()->is(trim($menu['url'], '/'));
            @endphp

            <a href="{{ $menu['url'] }}"
                class="flex items-center gap-3 px-3 py-3 rounded-xl transition
           {{ $active
               ? 'bg-orange-500/10 text-orange-400 border border-orange-500/20'
               : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">

                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon'] }}" />
                </svg>

                <span x-show="open" x-transition class="text-sm font-medium">
                    {{ $menu['name'] }}
                </span>
            </a>
        @endforeach

    </nav>

    <!-- Bottom User -->
    <div class="p-3 border-t border-white/10">

        <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-white/5 cursor-pointer">

            <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">

            <div x-show="open" x-transition class="min-w-0">
                <p class="text-sm font-medium text-white truncate">Admin</p>
                <p class="text-xs text-gray-500 truncate">admin@email.com</p>
            </div>

        </div>

    </div>

</aside>
