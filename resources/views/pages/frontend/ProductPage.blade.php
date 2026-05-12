@extends('layouts.frontend.MainLayout')

@section('content')
    {{-- MAIN PRODUCT --}}
    <div class="my-20 relative overflow-hidden">

        {{-- SECTION TITLE --}}
        <div class="absolute top-0 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
                [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Rice-Flour Straws
                </h1>
            </div>

        </div>

        {{-- CONTENT --}}
        <div class="container mx-auto px-5 pt-28">

            <div class="flex flex-col lg:flex-row items-center gap-12">

                {{-- IMAGE --}}
                <div class="w-full lg:w-1/2">

                    <img src="https://th.bing.com/th/id/OIP.GseaIiM9XzUaT1IeS-1TTwHaE8?w=285&h=190&c=7&r=0&o=7&dpr=1.1&pid=1.7&rm=3"
                        class="w-full h-[300px] md:h-[450px] object-cover shadow-lg">

                </div>

                {{-- DETAILS --}}
                <div class="w-full lg:w-1/2 space-y-6">

                    <h2 class="text-3xl md:text-4xl font-bold text-[#0B0B54]">
                        Features
                    </h2>

                    <p class="text-gray-600 leading-relaxed text-lg">
                        100% biodegradable<br />
                        Food-grade & safe<br />
                        No taste impact<br />
                        Strong in hot & cold drinks
                    </p>

                    <h2 class="text-3xl md:text-4xl font-bold text-[#0B0B54]">
                        Product Specifications
                    </h2>

                    <div>
                        <p>Sizes: <span class="px-2 py-1 rounded-full border border-red-500 text-red-500">6mm</span>
                            <span>8mm</span> <span>12mm</span>
                        </p>
                    </div>

                    <div>
                        <p>Colors: <span class="px-2 py-1 rounded-full border border-red-500 text-red-500">6mm</span>
                            <span>8mm</span> <span>12mm</span>
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- other products --}}
    <div class="py-20 relative bg-[#F4F3F3]">

        <!-- SECTION TITLE -->
        <h1 class="text-[30px] text-center text-[#0B0B54]">Other Products</h1>

        <!-- GRID -->
        <div class="container mx-auto px-5 pt-24 md:pt-30">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">

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

                        {{-- <a href="/our-trading-products"
                            class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                            Explore Product
                        </a> --}}

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

                        {{-- <a href="/our-trading-products"
                            class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                            Explore Product
                        </a> --}}

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

                        {{-- <a href="/our-trading-products"
                            class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                            Explore Product
                        </a> --}}

                    </div>

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
