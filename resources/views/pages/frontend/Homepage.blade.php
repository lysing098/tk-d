@extends('layouts.frontend.MainLayout')

@section('content')
    {{-- hero section --}}
    <div class="h-[93vh] bg-cover bg-center text-white relative"
        style="background-image: url('{{ asset('storage/' . $hero->background_image) }}');">

        <div class="absolute inset-0 bg-black/40"></div>

        <!-- RED STRIP -->
        <div class="absolute bottom-0 right-0 w-full lg:w-8/10 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
        [clip-path:polygon(10%_0,100%_0,100%_100%,0_100%)]">
            </div>

            <div
                class="relative z-10 px-5 md:pl-15 lg:pl-20 2xl:px-40 py-4 md:py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm md:text-base">

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone "></i>
                    <p class="break-all">{{ $company->tel }}</p>
                </div>

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope "></i>
                    <p class="break-all">{{ $company->email }}</p>
                </div>

                <div class="flex items-center gap-2 text-center md:text-left">
                    <i class="fa-solid fa-bullhorn "></i>
                    <p class="text-xs md:text-sm lg:text-base">
                        {{ $company->description }}
                    </p>
                </div>

                <div class="flex items-center gap-2 text-center md:text-left">
                    <i class="fa-solid fa-location-dot text-white"></i>
                    <p class="text-xs md:text-sm lg:text-base">
                        {{ $company->location }}
                    </p>
                </div>

            </div>
        </div>

        <!-- HERO CONTENT -->
        <div class="container mx-auto px-5 flex items-center h-full relative z-10">
            <div class="w-full lg:w-1/2 flex flex-col gap-5 text-center md:text-left">

                <h2
                    class="text-xl sm:text-2xl md:text-4xl lg:text-[44px]
                       leading-snug md:leading-tight font-bold break-words">
                    {{ $hero->title }}
                </h2>

                <p class="text-sm sm:text-base md:text-lg lg:text-[22px] leading-relaxed">
                    {{ $hero->sub_title }}
                </p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 w-full">
                    @if ($hero->btn_primary_text)
                        <a href={{ $hero->btn_primary_link }}
                            class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center capitalize">
                            {{ $hero->btn_primary_text }}
                        </a>
                    @endif

                    @if ($hero->btn_secondary_text)
                        <a href={{ $hero->btn_secondary_link }}
                            class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center capitalize">
                            {{ $hero->btn_secondary_text }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- our key product --}}
    <div class="py-20 relative">

        <!-- SECTION TITLE -->
        <div class="absolute top-10 md:top-20 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    our key products
                </h1>
            </div>

        </div>

        <!-- GRID -->
        <div class="container mx-auto px-5 pt-24 md:pt-30">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">
                {{--
                @foreach ($products as $item)
                    <!-- CARD -->
                    <div class="group">

                        <div class="relative">

                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="w-full h-[220px] sm:h-[260px] md:h-[300px] object-cover"
                                alt="{{ $item->title_en ?? 'Product Image' }}">
                            <!-- TOP BAR -->
                            <div
                                class="absolute top-[-10px] right-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,100%_0,100%_100%,10%_100%)]">
                            </div>

                            <!-- BOTTOM BAR -->
                            <div
                                class="absolute bottom-[-10px] left-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,90%_0,100%_100%,0_100%)]">
                            </div>

                        </div>

                        <!-- INFO -->
                        <div class="flex flex-col justify-center items-center gap-3 py-6 px-4">

                            <p class="font-semibold text-[17px] md:text-[19px] line-clamp-1">{{ $item->title_en }}</p>

                            <p class="line-clamp-3 text-center text-sm md:text-base">
                                {{ $item->description_en }}
                            </p>

                            <a href=""
                                class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                                Explore Product
                            </a>

                        </div>

                    </div>
                @endforeach --}}

                {{-- Rice Flour Drinking Straws --}}
                <div class="group">

                    <div class="relative">

                        <img src="https://th.bing.com/th/id/OIP.GseaIiM9XzUaT1IeS-1TTwHaE8?w=285&h=190&c=7&r=0&o=7&dpr=1.1&pid=1.7&rm=3"
                            class="w-full h-[220px] sm:h-[260px] md:h-[300px] object-cover"
                            alt="Rice Flour Drinking Straws">
                        <!-- TOP BAR -->
                        <div
                            class="absolute top-[-10px] right-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,100%_0,100%_100%,10%_100%)]">
                        </div>

                        <!-- BOTTOM BAR -->
                        <div
                            class="absolute bottom-[-10px] left-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,90%_0,100%_100%,0_100%)]">
                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="flex flex-col justify-center items-center gap-3 py-6 px-4">

                        <p class="font-semibold text-[17px] md:text-[19px] line-clamp-1">Rice Flour Drinking Straws</p>

                        <a href="/our-trading-products"
                            class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                            Explore Product
                        </a>

                    </div>

                </div>

                {{-- Paper Cups & Food Packaging --}}
                <div class="group">

                    <div class="relative">

                        <img src="https://th.bing.com/th/id/OIP.GseaIiM9XzUaT1IeS-1TTwHaE8?w=285&h=190&c=7&r=0&o=7&dpr=1.1&pid=1.7&rm=3"
                            class="w-full h-[220px] sm:h-[260px] md:h-[300px] object-cover"
                            alt="Rice Flour Drinking Straws">
                        <!-- TOP BAR -->
                        <div
                            class="absolute top-[-10px] right-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,100%_0,100%_100%,10%_100%)]">
                        </div>

                        <!-- BOTTOM BAR -->
                        <div
                            class="absolute bottom-[-10px] left-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,90%_0,100%_100%,0_100%)]">
                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="flex flex-col justify-center items-center gap-3 py-6 px-4">

                        <p class="font-semibold text-[17px] md:text-[19px] line-clamp-1">Paper Cups & Food Packaging</p>

                        <a href="/our-trading-products"
                            class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                            Explore Product
                        </a>

                    </div>

                </div>

                {{-- Plastic Products (Recycled) --}}
                <div class="group">

                    <div class="relative">

                        <img src="https://th.bing.com/th/id/OIP.GseaIiM9XzUaT1IeS-1TTwHaE8?w=285&h=190&c=7&r=0&o=7&dpr=1.1&pid=1.7&rm=3"
                            class="w-full h-[220px] sm:h-[260px] md:h-[300px] object-cover"
                            alt="Rice Flour Drinking Straws">
                        <!-- TOP BAR -->
                        <div
                            class="absolute top-[-10px] right-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,100%_0,100%_100%,10%_100%)]">
                        </div>

                        <!-- BOTTOM BAR -->
                        <div
                            class="absolute bottom-[-10px] left-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,90%_0,100%_100%,0_100%)]">
                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="flex flex-col justify-center items-center gap-3 py-6 px-4">

                        <p class="font-semibold text-[17px] md:text-[19px] line-clamp-1">Plastic Products (Recycled)</p>

                        <a href="/our-trading-products"
                            class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                            Explore Product
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- why choose us --}}
    <div class="relative bg-cover bg-top" style="background-image: url('{{ asset('images/herosection.jpg') }}');">

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-[#0B0B54]/75"></div>

        <!-- CONTENT -->
        <div class="relative z-10 text-white py-16">

            <div class="container mx-auto flex flex-col lg:flex-row items-center gap-10 lg:gap-20 px-5">

                {{-- LEFT --}}
                <div class="w-full lg:w-auto">

                    {{-- ROW 1 --}}
                    <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-3xl">

                        {{-- TOP LEFT BIG --}}
                        <div>
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover">
                        </div>

                        {{-- TOP RIGHT SMALL --}}
                        <div class="flex items-end">
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-3/4 h-[120px] sm:h-[150px] lg:h-[180px] object-cover">
                        </div>

                    </div>

                    {{-- ROW 2 --}}
                    <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-3xl pt-3 sm:pt-5 lg:-ml-10">

                        {{-- BOTTOM LEFT SMALL --}}
                        <div class="flex justify-end">
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-3/4 h-[120px] sm:h-[150px] lg:h-[180px] object-cover">
                        </div>

                        {{-- BOTTOM RIGHT BIG --}}
                        <div>
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-full h-[180px] sm:h-[220px] lg:h-[260px] object-cover">
                        </div>

                    </div>
                </div>

                {{-- RIGHT: TEXT --}}
                <div class="w-full lg:w-1/2 flex flex-col gap-6">

                    <div>
                        <p
                            class="pb-6 lg:pb-10 font-bold text-[30px] sm:text-[36px] lg:text-[40px] text-center lg:text-left">
                            Why Choose Us
                        </p>
                    </div>

                    {{-- ICON GRID --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">

                        {{-- 100% biodegradable products --}}
                        <div class="flex flex-col gap-3 items-center lg:items-start text-center lg:text-left">

                            <img src="{{ asset('icons/biodegradable.png') }}"
                                class="w-10 h-10 lg:w-12 lg:h-12 object-contain filter brightness-0 invert">

                            <div>
                                <p class="text-base lg:text-[19px] font-bold">
                                    100% biodegradable products
                                </p>
                            </div>

                        </div>

                        {{-- Competitive pricing --}}
                        <div class="flex flex-col gap-3 items-center lg:items-start text-center lg:text-left">

                            <img src="{{ asset('icons/badge.png') }}" class="w-10 h-10 lg:w-12 lg:h-12 object-contain filter brightness-0 invert">

                            <div>
                                <p class="text-base lg:text-[19px] font-bold">
                                    Competitive pricing
                                </p>
                            </div>

                        </div>

                        {{-- Custom branding --}}
                        <div class="flex flex-col gap-3 items-center lg:items-start text-center lg:text-left">

                            <img src="{{ asset('icons/development.png') }}"
                                class="w-10 h-10 lg:w-12 lg:h-12 object-contain filter brightness-0 invert">

                            <div>
                                <p class="text-base lg:text-[19px] font-bold">
                                    Custom branding (OEM/ODM)
                                </p>
                            </div>

                        </div>

                        {{-- Strong & durable --}}
                        <div class="flex flex-col gap-3 items-center lg:items-start text-center lg:text-left">

                            <img src="{{ asset('icons/security (1).png') }}"
                                class="w-10 h-10 lg:w-12 lg:h-12 object-contain filter brightness-0 invert">

                            <div>
                                <p class="text-base lg:text-[19px] font-bold">
                                    Strong & durable (hot & cold drinks)
                                </p>
                            </div>

                        </div>

                        {{-- Export-ready --}}
                        <div class="flex flex-col gap-3 items-center lg:items-start text-center lg:text-left">

                            <img src="{{ asset('icons/global-shipping.png') }}"
                                class="w-10 h-10 lg:w-12 lg:h-12 object-contain filter brightness-0 invert">

                            <div>
                                <p class="text-base lg:text-[19px] font-bold">
                                    Export-ready production
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- Production & Quality --}}
    <div class="relative">

        {{-- TITLE --}}
        <div class="absolute top-0 right-0 w-2/3 md:w-1/3 overflow-hidden">

            <!-- mirrored background -->
            <div
                class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]
            scale-x-[-1]">
            </div>

            <!-- content -->
            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Production & Quality
                </h1>
            </div>

        </div>

        {{-- CARDS --}}
        <div
            class="container max-w-7xl mx-auto
        grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4
        gap-6 lg:gap-10
        px-5
        pt-24 sm:pt-28 lg:pt-30
        pb-16 lg:pb-20">

            {{-- CARD --}}
            <div
                class="bg-[#0B0B54]
            w-full max-w-[264px]
            h-[220px] sm:h-[240px] lg:h-[264px]
            mx-auto
            relative flex items-end justify-center">

                <p class="text-white text-center pb-5 px-3">
                    ISO & HACCP aligned
                </p>
            </div>

            {{-- CARD --}}
            <div
                class="bg-[#0B0B54]
            w-full max-w-[264px]
            h-[220px] sm:h-[240px] lg:h-[264px]
            mx-auto
            relative flex items-end justify-center">

                <p class="text-white text-center pb-5 px-3">
                    ISO & HACCP aligned
                </p>
            </div>

            {{-- CARD --}}
            <div
                class="bg-[#0B0B54]
            w-full max-w-[264px]
            h-[220px] sm:h-[240px] lg:h-[264px]
            mx-auto
            relative flex items-end justify-center">

                <p class="text-white text-center pb-5 px-3">
                    ISO & HACCP aligned
                </p>
            </div>

            {{-- CARD --}}
            <div
                class="bg-[#0B0B54]
            w-full max-w-[264px]
            h-[220px] sm:h-[240px] lg:h-[264px]
            mx-auto
            relative flex items-end justify-center">

                <p class="text-white text-center pb-5 px-3">
                    ISO & HACCP aligned
                </p>
            </div>

        </div>
    </div>

    {{-- market we serve --}}
    <div class="relative">

        <!-- SECTION TITLE -->
        <div class="absolute top-0 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Markets We Serve
                </h1>
            </div>

        </div>

        {{-- CONTENT --}}
        <div
            class="container mx-auto
        flex flex-col lg:flex-row
        items-center justify-around
        gap-10 lg:gap-16
        px-5
        pt-24 sm:pt-28 lg:pt-32
        pb-10">

            {{-- LEFT TEXT --}}
            <div class="w-full lg:w-auto text-center lg:text-left">

                {{-- cambodia --}}
                <div>
                    <p class="text-[#ED1C24] text-lg md:text-xl font-semibold">
                        Cambodia
                    </p>

                    <p class="text-sm md:text-base">
                        Cafes, Hotels, Supermarkets
                    </p>
                </div>

                {{-- international --}}
                <div class="pt-8 md:pt-10">
                    <p class="text-[#ED1C24] text-lg md:text-xl font-semibold">
                        International
                    </p>

                    <p class="text-sm md:text-base leading-relaxed">
                        (Australia, Asia, Europe,
                        Global Buyers)
                    </p>
                </div>

            </div>

            {{-- MAP --}}
            <div class="w-full lg:w-2/3 flex justify-center">

                <img src="{{ asset('images/map.png') }}" alt="map"
                    class="w-full max-w-[900px] h-auto object-contain">

            </div>

        </div>
    </div>

    {{-- faq --}}
    <div id="faqSection" class="relative bg-[#0B0B54] bg-cover bg-top text-white transition-all duration-500">

        <div class="relative z-10 container mx-auto px-5 lg:px-0 pt-20 pb-20">

            {{-- TITLE --}}
            <div class="text-center lg:text-left">
                <p class="text-[#ED1C24] text-sm md:text-base">
                    Frequently Asked Questions
                </p>

                <h1 class="text-[28px] sm:text-[34px] lg:text-[40px] leading-tight pb-10">
                    Have any question for us?
                </h1>
            </div>

            {{-- FAQ GRID --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                <!-- FIRST 6 FAQ -->
                @foreach ($faq->take(6) as $item)
                    <div class="border border-white/30 rounded-md p-4 h-fit">

                        <button class="faq-btn w-full flex justify-between items-start gap-4 text-left font-semibold">

                            <span class="text-sm sm:text-base">
                                {{ $item->title }}
                            </span>

                            <span class="shrink-0 text-lg faq-icon">
                                +
                            </span>

                        </button>

                        <div class="faq-content hidden mt-3 text-sm sm:text-base leading-relaxed">
                            {{ $item->answer }}
                        </div>

                    </div>
                @endforeach

                <!-- EXTRA FAQ -->
                <div class="extra-faq hidden contents">

                    @foreach ($faq->skip(6) as $item)
                        <div class="border border-white/30 rounded-md p-4 h-fit">

                            <button class="faq-btn w-full flex justify-between items-start gap-4 text-left font-semibold">

                                <span class="text-sm sm:text-base">
                                    {{ $item->title }}
                                </span>

                                <span class="shrink-0 text-lg faq-icon">
                                    +
                                </span>

                            </button>

                            <div class="faq-content hidden mt-3 text-sm sm:text-base leading-relaxed">
                                {{ $item->answer }}
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="text-center mt-8">
                <button id="faqToggleBtn" class="px-6 py-3 bg-[#ED1C24] text-white rounded-md text-sm sm:text-base">
                    View More
                </button>
            </div>

        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="relative text-white py-20 text-center overflow-hidden"
        style="background-image: url('{{ asset('images/herosection.jpg') }}');
           background-size: cover;
           background-position: center;">


        <div class="absolute inset-0 bg-[#0B0B54]/75"></div>

        <!-- TEXT -->
        <h2 class="text-[40px]  font-bold mb-8 relative z-10">
            Looking for a<br />
            reliable eco-friendly supplier?
        </h2>

        <!-- BUTTON -->
        <a href="/contact-us"
            class="inline-block mt-10 bg-[#ED1C24] w-[269px]  py-3 font-semibold relative z-10 hover:bg-red-700 transition text-[20px] capitalize">
            contact us
        </a>


    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // FAQ accordion
        document.querySelectorAll(".faq-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector(".faq-icon");

                content.classList.toggle("hidden");

                if (icon) {
                    icon.textContent = content.classList.contains("hidden") ? "+" : "-";
                }
            });
        });

        // View More / View Less
        const btn = document.getElementById("faqToggleBtn");
        const extra = document.querySelector(".extra-faq");

        btn.addEventListener("click", function() {
            extra.classList.toggle("hidden");

            const isOpen = !extra.classList.contains("hidden");
            btn.textContent = isOpen ? "View Less" : "View More";
        });

    });
</script>
