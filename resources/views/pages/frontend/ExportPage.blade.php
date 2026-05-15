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
    <div
        class="my-20 bg-[#0B0B54] min-h-[577px] flex flex-col lg:flex-row items-center justify-center relative px-4 lg:px-0">

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

        <div class="text-white flex flex-col md:flex-row items-center gap-10 w-full max-w-6xl px-5">

            {{-- text --}}
            <div class="text-center md:text-left">

                <p class="mb-2 text-[22px] md:text-[30px]">We serve:</p>

                <ul class="list-disc pl-5 space-y-1 text-[16px] md:text-[20px] text-left">
                    <li>Importers &amp; Distributors</li>
                    <li>Supermarkets &amp; Retail Chains</li>
                    <li>F&amp;B brands (coffee, bubble tea, restaurants)</li>
                    <li>Eco-friendly product wholesalers</li>
                </ul>

            </div>

            {{-- images --}}
            <div class="w-full flex justify-center">

                <div>

                    {{-- ROW 1 --}}
                    <div class="grid grid-cols-2 gap-4 max-w-3xl">

                        <div>
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-full max-w-[268px] h-auto object-cover">
                        </div>

                        <div class="flex items-end">
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-full max-w-[188px] h-auto object-cover">
                        </div>

                    </div>

                    {{-- ROW 2 --}}
                    <div class="grid grid-cols-2 gap-4 max-w-3xl pt-5">

                        <div class="flex justify-end">
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-full max-w-[188px] h-auto object-cover">
                        </div>

                        <div>
                            <img src="{{ asset('images/herosection.jpg') }}"
                                class="w-full max-w-[273px] h-auto object-cover">
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- product overview --}}
    <div class="my-20 relative flex items-center justify-center" x-data="productOverview({
        products: @js($product),
        main: @js($main)
    })">

        {{-- TITLE --}}
        <div class="absolute top-0 right-0 w-2/3 md:w-1/3 overflow-hidden">
            <div class="absolute inset-0 bg-[#ED1C24] [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)] scale-x-[-1]"></div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Product Overview
                </h1>
            </div>
        </div>

        {{-- GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-40 px-2">

            {{-- IMAGE --}}
            <div class="relative w-[247px] h-[247px] overflow-hidden mx-auto">
                <img :src="currentImage" class="w-full h-full object-cover">

                <div class="absolute top-0 left-0 w-[120px] h-5">
                    <div class="w-full h-full bg-[#ED1C24]" style="clip-path: polygon(0 0, 100% 0, 75% 100%, 0 100%);">
                    </div>
                </div>

                <div class="absolute bottom-0 right-0 w-[120px] h-5">
                    <div class="w-full h-full bg-[#ED1C24]" style="clip-path: polygon(25% 0, 100% 0, 100% 100%, 0 100%);">
                    </div>
                </div>
            </div>

            {{-- SPEC --}}
            <div>
                <p class="text-[30px] mb-5">Product Specifications</p>

                {{-- SIZE --}}
                <div class="mb-4">
                    <p class="mb-2">Sizes:</p>

                    <template x-for="size in sizes" :key="size">
                        <span @click="selectSize(size)" class="px-3 py-1 border rounded-full cursor-pointer mr-2"
                            :class="selectedSize === size ?
                                'bg-[#ED1C24] text-white border-[#ED1C24]' :
                                'border-gray-300'">
                            <span x-text="size"></span>
                        </span>
                    </template>
                </div>

                {{-- COLOR --}}
                <div>
                    <p class="mb-2">Colors:</p>

                    <template x-for="color in colors" :key="color">
                        <span @click="selectColor(color)"
                            class="px-3 py-1 border rounded-full cursor-pointer mr-2 capitalize"
                            :style="selectedColor === color ?
                                (color.toLowerCase() === 'white' ?
                                    'background:black; color:white; border-color:black' :
                                    'background:' + color + '; color:white; border-color:' + color) :
                                (color.toLowerCase() === 'white' ?
                                    'border-color:#ccc; background:white; color:black' :
                                    'border-color:#ccc')">
                            <span x-text="color"></span>
                        </span>
                    </template>
                </div>
            </div>

            {{-- DESCRIPTION --}}
            <div>
                <p class="text-[30px] mb-5">Rice-Flour Straws</p>

                <div>
                    100% biodegradable<br />
                    Food-grade & safe<br />
                    Strong in hot & cold drinks<br />
                    No taste impact
                </div>
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
<div class="relative mt-20 md:mt-32 py-16 md:py-20 overflow-hidden">

    <!-- BLURRED BACKGROUND IMAGE -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm scale-110"
         style="background-image: url('{{ asset('images/herosection.jpg') }}');">
    </div>

    <!-- DARK OVERLAY -->
    <div class="absolute inset-0 bg-[#0B0B54E5]"></div>

    <!-- CONTENT -->
    <div class="relative z-10 px-5 md:px-10">
        <div class="container mx-auto">

            <div class="grid grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12 md:gap-y-16">

                {{-- 1 --}}
                <div class="flex flex-col items-center">
                    <div class="mb-3">
                        <p class="text-red-500 text-5xl md:text-[50px] font-bold">01</p>
                    </div>
                    <div class="text-white text-center">
                        <h2 class="font-bold text-lg md:text-[20px] leading-tight">
                            Direct manufacturer<br>(no middleman)
                        </h2>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="flex flex-col items-center">
                    <div class="mb-3">
                        <p class="text-red-500 text-5xl md:text-[50px] font-bold">02</p>
                    </div>
                    <div class="text-white text-center">
                        <h2 class="font-bold text-lg md:text-[20px] leading-tight">
                            Competitive factory pricing
                        </h2>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="flex flex-col items-center">
                    <div class="mb-3">
                        <p class="text-red-500 text-5xl md:text-[50px] font-bold">03</p>
                    </div>
                    <div class="text-white text-center">
                        <h2 class="font-bold text-lg md:text-[20px] leading-tight">
                            Reliable production capacity
                        </h2>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="flex flex-col items-center">
                    <div class="mb-3">
                        <p class="text-red-500 text-5xl md:text-[50px] font-bold">04</p>
                    </div>
                    <div class="text-white text-center">
                        <h2 class="font-bold text-lg md:text-[20px] leading-tight">
                            Export experience <br>(containers shipped)
                        </h2>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="flex flex-col items-center">
                    <div class="mb-3">
                        <p class="text-red-500 text-5xl md:text-[50px] font-bold">05</p>
                    </div>
                    <div class="text-white text-center">
                        <h2 class="font-bold text-lg md:text-[20px] leading-tight">
                            OEM / Private label available
                        </h2>
                    </div>
                </div>

                {{-- 6 --}}
                <div class="flex flex-col items-center">
                    <div class="mb-3">
                        <p class="text-red-500 text-5xl md:text-[50px] font-bold">06</p>
                    </div>
                    <div class="text-white text-center">
                        <h2 class="font-bold text-lg md:text-[20px] leading-tight">
                            ISO & HACCP standards
                        </h2>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

    {{-- Production & Quality --}}
    <div class="relative overflow-x-hidden my-20">

        <div class="absolute top-0 right-0 w-2/3 md:w-1/3 overflow-hidden">
            <!-- mirrored background -->
            <div class="absolute inset-0 bg-[#ED1C24] [clip-path:polygon(10%_0,100%_0,100%_100%,0_100%)]"></div>

            <!-- normal content -->
            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize break-words">
                    Production & Quality Assurance
                </h1>
            </div>
        </div>

        <div
            class="my-10 max-w-7xl container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-10 pt-30 pb-20 px-4">

            {{-- Card 1 --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center"></div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        Modern food-grade<br /> factory
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center"></div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        Strict hygiene<br /> control
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center"></div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        International<br /> compliance
                    </p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="flex flex-col gap-2">
                <div class="bg-[#0B0B54] w-full h-[264px] relative flex items-end justify-center"></div>
                <div class="bg-[#0B0B54] flex items-center justify-center py-3">
                    <p class="text-white text-center">
                        Quality inspection<br /> before shipment
                    </p>
                </div>
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

    {{-- form --}}
    <div class="max-w-7xl container mx-auto my-20 px-2">
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
    <div class="my-20 px-4">

        <p class="text-[40px] text-red-500 text-center font-bold mb-10">
            Gallery
        </p>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-10 container mx-auto max-w-7xl">

            @foreach ($galleries as $gallery)
                @php
                    $images = is_string($gallery->images) ? json_decode($gallery->images, true) : $gallery->images;
                @endphp

                @if (is_array($images))
                    @foreach ($images as $img)
                        <div class="w-full aspect-square overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover"
                                alt="gallery image">
                        </div>
                    @endforeach
                @else
                    <div class="w-full aspect-square overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/' . $gallery->images) }}" class="w-full h-full object-cover"
                            alt="gallery image">
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    {{-- faq --}}
    <div class="my-20 ">
        <p class="text-[40px] text-red-500 text-center font-bold mb-10">FAQ (Buyer-Focused)</p>

        <div class="max-w-7xl container  mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 px-2">
            @foreach ($faq as $item)
                <div class="faq-item border rounded-md p-4 bg-[#0B0B54] text-white self-start">
                    <button class="faq-btn w-full flex justify-between font-semibold">
                        {{ $item->title }}
                        <span>+</span>
                    </button>
                    <div class="faq-content hidden mt-3">
                        {{ $item->answer }}
                    </div>
                </div>
            @endforeach
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

    function productOverview(data) {

        return {

            products: data.products,
            selected: data.main ?? data.products[0],
            selectedSize: (data.main ?? data.products[0])?.size,
            selectedColor: JSON.parse((data.main ?? data.products[0])?.color || '[""]')[0],

            get sizes() {
                return [...new Set(this.products.map(p => p.size))];
            },

            get colors() {
                return this.products
                    .filter(p => p.size === this.selectedSize)
                    .map(p => JSON.parse(p.color)[0]);
            },

            get currentImage() {
                let images = JSON.parse(this.selected.images || '[]');

                return images.length ?
                    '/storage/' + images[0] :
                    '';
            },

            selectSize(size) {

                this.selectedSize = size;

                let matched = this.products.find(p => p.size === size);

                if (matched) {
                    this.selected = matched;
                    this.selectedColor = JSON.parse(matched.color)[0];
                }
            },

            selectColor(color) {

                this.selectedColor = color;

                let matched = this.products.find(p =>
                    p.size === this.selectedSize &&
                    JSON.parse(p.color)[0] === color
                );

                if (matched) {
                    this.selected = matched;
                }
            }
        }
    }
</script>
