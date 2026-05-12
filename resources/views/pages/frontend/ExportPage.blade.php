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

    {{-- our target --}}
    <div class="my-20 bg-[#0B0B54] h-[577px] flex items-center justify-center relative">

        <!-- SECTION TITLE -->
        <div class="absolute top-0 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Our Target Buyers
                </h1>
            </div>

        </div>

        <div class="text-white flex items-center gap-10">
            {{-- text --}}
            <div>
                <p class="mb-2 text-[30px]">We serve:</p>

                <ul class="list-disc pl-5 space-y-1 text-[20px]">
                    <li>Importers &amp; Distributors</li>
                    <li>Supermarkets &amp; Retail Chains</li>
                    <li>F&amp;B brands (coffee, bubble tea, restaurants)</li>
                    <li>Eco-friendly product wholesalers</li>
                </ul>
            </div>
            {{-- images --}}
            <div>
                {{-- ROW 1 --}}
                <div class="grid grid-cols-2 gap-4 max-w-3xl">

                    {{-- TOP LEFT BIG --}}
                    <div>
                        <img src="{{ asset('images/herosection.jpg') }}" class="w-[268.06px] h-[185.18px] object-cover">
                    </div>

                    {{-- TOP RIGHT SMALL --}}
                    <div class="flex items-end">
                        <img src="{{ asset('images/herosection.jpg') }}" class="w-[188.98px] h-[128px] object-cover">
                    </div>

                </div>

                {{-- ROW 2 --}}
                <div class="grid grid-cols-2 gap-4 max-w-3xl pt-5 -ml-10">

                    {{-- BOTTOM LEFT SMALL --}}
                    <div class="flex justify-end">
                        <img src="{{ asset('images/herosection.jpg') }}" class="w-[188.98px] h-[128px] object-cover">
                    </div>

                    {{-- BOTTOM RIGHT BIG --}}
                    <div>
                        <img src="{{ asset('images/herosection.jpg') }}" class="w-[273.42px] h-[185.18px] object-cover">
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- product overview --}}
    <div class="my-20 relative flex items-center justify-center">
        <div class="absolute top-0  right-0 w-2/3 md:w-1/3 overflow-hidden">
            <!-- mirrored background -->
            <div class="absolute inset-0 bg-[#ED1C24] [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)] scale-x-[-1] ">
            </div>

            <!-- normal content -->
            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Product Overview
                </h1>
            </div>

        </div>

        <div class="grid grid-cols-3 gap-30 mt-40 bg-cyan-400">
            {{-- image --}}
            <div class="relative w-[247px] h-[247px] overflow-hidden">
                <img src="{{ asset('images/herosection.jpg') }}" class="w-full h-full object-cover">

                <!-- TOP LEFT -->
                <div class="absolute top-0 left-0 w-[120px] h-5">
                    <div class="w-full h-full bg-[#ED1C24]" style="clip-path: polygon(0 0, 100% 0, 75% 100%, 0 100%);">
                    </div>
                </div>

                <!-- BOTTOM RIGHT -->
                <div class="absolute bottom-0 right-0 w-[120px] h-5">
                    <div class="w-full h-full bg-[#ED1C24]" style="clip-path: polygon(25% 0, 100% 0, 100% 100%, 0 100%);">
                    </div>
                </div>
            </div>
            {{-- Product Specifications --}}
            <div>
                <p class="text-[30px]">Product Specifications</p>
            </div>
            {{-- Rice-Flour Straws --}}
            <div>
                <p class="text-[30px]">Rice-Flour Straws</p>
            </div>
        </div>
    </div>

    {{-- why choose us --}}

    <div class="my-20 relative">

        <!-- SECTION TITLE -->
        <div class="absolute top-0 left-0 w-2/3 md:w-1/3 overflow-hidden z-20">

            <div class="absolute inset-0 bg-[#ED1C24]" style="clip-path: polygon(0 0, 90% 0, 100% 100%, 0 100%);">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    why choose us
                </h1>
            </div>

        </div>

    </div>

    <!-- BACKGROUND CARD -->
    <div class="relative h-[400px] mt-34 overflow-hidden">

        <!-- BLURRED BACKGROUND IMAGE -->
        <div class="absolute inset-0 bg-cover bg-center blur-sm scale-110"
            style="background-image: url('{{ asset('images/herosection.jpg') }}');">
        </div>

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-[#0B0B54E5]"></div>

        <!-- CONTENT -->
        <div class="relative z-10 h-full flex items-center px-10">

            <div class="grid grid-cols-3 gap-10 container mx-auto">

                {{-- 1 --}}
                <div class="flex flex-col items-center">
                    <!-- LEFT -->
                    <div>
                        <p class="text-red-500 text-[50px]">01</p>
                    </div>

                    <!-- CENTER -->
                    <div class="text-white">
                        <h2 class="font-bold mb-4 text-[20px] text-center">Direct manufacturer<br /> (no middleman)</h2>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="flex flex-col items-center">
                    <!-- LEFT -->
                    <div>
                        <p class="text-red-500 text-[50px]">02</p>
                    </div>

                    <!-- CENTER -->
                    <div class="text-white">
                        <h2 class="font-bold mb-4 text-[20px] text-center">Competitive factory pricing</h2>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="flex flex-col items-center">
                    <!-- LEFT -->
                    <div>
                        <p class="text-red-500 text-[50px]">03</p>
                    </div>

                    <!-- CENTER -->
                    <div class="text-white">
                        <h2 class="font-bold mb-4 text-[20px] text-center">Reliable production capacity</h2>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="flex flex-col items-center">
                    <!-- LEFT -->
                    <div>
                        <p class="text-red-500 text-[50px]">04</p>
                    </div>

                    <!-- CENTER -->
                    <div class="text-white">
                        <h2 class="font-bold mb-4 text-[20px] text-center">Export experience <br />(containers shipped)</h2>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="flex flex-col items-center">
                    <!-- LEFT -->
                    <div>
                        <p class="text-red-500 text-[50px]">05</p>
                    </div>

                    <!-- CENTER -->
                    <div class="text-white">
                        <h2 class="font-bold mb-4 text-[20px] text-center">OEM / Private label available</h2>
                    </div>
                </div>

                {{-- 6 --}}
                <div class="flex flex-col items-center">
                    <!-- LEFT -->
                    <div>
                        <p class="text-red-500 text-[50px]">06</p>
                    </div>

                    <!-- CENTER -->
                    <div class="text-white">
                        <h2 class="font-bold mb-4 text-[20px] text-center">ISO & HACCP standards</h2>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Production & Quality --}}
    <div class=" relative">
        <div class="absolute top-0  right-0 w-2/3 md:w-1/3 overflow-hidden">
            <!-- mirrored background -->
            <div class="absolute inset-0 bg-[#ED1C24] [clip-path:polygon(10%_0,100%_0,100%_100%,0_100%)] ">
            </div>

            <!-- normal content -->
            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Production & Quality Assurance
                </h1>
            </div>

        </div>

        <div class="my-10 max-w-7xl container mx-auto grid grid-cols-4 gap-10 pt-30 pb-20">
            {{-- Modern food-grade factory --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center">

                </div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        Modern food-grade<br /> factory
                    </p>
                </div>
            </div>

            {{-- Strict hygiene control --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center">

                </div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        Strict hygiene<br /> control
                    </p>
                </div>
            </div>

            {{-- International compliance --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center">

                </div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        International<br /> compliance
                    </p>
                </div>
            </div>

            {{-- Quality inspection before shipment --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center">

                </div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        Quality inspection<br /> before shipment
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- market we serve --}}
    <div class=" relative">

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

        <div class="flex items-center justify-around ">
            <div>
                {{-- cambodia --}}
                <div>
                    <p class="text-[#ED1C24]">Cambodia</p>
                    <p>Cafes, Hotels, Supermarkets</p>
                </div>
                {{-- cambodia --}}
                <div class="pt-10">
                    <p class="text-[#ED1C24]">International</p>
                    <p>(Australia, Asia, Europe,
                        Global Buyers)</p>
                </div>
            </div>
            <img src="{{ asset('images/map.png') }}" alt="map" class="w-2/3 h-auto">
        </div>
    </div>

    {{-- form --}}
    <div class="max-w-7xl container mx-auto my-20">
        <p class="text-center text-red-500 text-[40px] mb-10 font-bold">Form</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <input type="text" placeholder="Full Name" class="w-full py-2 bg-[#0B0B54] text-white px-3 outline-none">

            <input type="email" placeholder="Email" class="w-full py-2 bg-[#0B0B54] text-white px-3 outline-none">

            <input type="text" placeholder="Company Name"
                class="w-full py-2 bg-[#0B0B54] text-white px-3 outline-none">

            <input type="text" placeholder="WhatsApp" class="w-full py-2 bg-[#0B0B54] text-white px-3 outline-none">

            <select class="w-full py-2 bg-[#0B0B54] text-white px-3 outline-none">
                <option value="" disabled selected>Select Country</option>
                <option value="cambodia">Cambodia</option>
            </select>

            <select class="w-full py-2 bg-[#0B0B54] text-white px-3 outline-none">
                <option value="" disabled selected>Select Product</option>
                <option value="rice-straw">Rice straw</option>
            </select>

        </div>
    </div>

    {{-- gallery --}}
    <div class="my-20">
        <p class="text-[40px] text-red-500 text-center font-bold mb-10">Gallery</p>
        <div class="grid grid-cols-4 gap-10 container mx-auto max-w-7xl">
            <div class="w-[292px] h-[292px] bg-gray-400"></div>
            <div class="w-[292px] h-[292px] bg-gray-400"></div>
            <div class="w-[292px] h-[292px] bg-gray-400"></div>
            <div class="w-[292px] h-[292px] bg-gray-400"></div>
        </div>

    </div>

    {{-- faq --}}
    <div class="my-20 ">
        <p class="text-[40px] text-red-500 text-center font-bold mb-10">FAQ (Buyer-Focused)</p>

        <div class="max-w-7xl container  mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="faq-item border rounded-md p-4 bg-[#0B0B54] text-white self-start">
            <button class="faq-btn w-full flex justify-between font-semibold">
                title
                <span>+</span>
            </button>
            <div class="faq-content hidden mt-3">
                answer
            </div>
        </div>

        <div class="faq-item border rounded-md p-4 bg-[#0B0B54] text-white self-start">
            <button class="faq-btn w-full flex justify-between font-semibold">
                title
                <span>+</span>
            </button>
            <div class="faq-content hidden mt-3">
                answer
            </div>
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

        document.querySelectorAll(".faq-btn").forEach(btn => {
            btn.addEventListener("click", function() {

                const parent = this.parentElement;
                const content = parent.querySelector(".faq-content");

                // close all others
                document.querySelectorAll(".faq-content").forEach(item => {
                    if (item !== content) {
                        item.classList.add("hidden");
                        const icon = item.parentElement.querySelector(".faq-btn span");
                        if (icon) icon.textContent = "+";
                    }
                });

                // toggle current
                content.classList.toggle("hidden");

                this.querySelector("span").textContent =
                    content.classList.contains("hidden") ? "+" : "-";
            });
        });

    });
</script>
