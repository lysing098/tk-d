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

    <div class="my-20">
        <div class="container mx-auto px-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 py-20">

            {{-- CARD --}}
            <div
                class="bg-white shadow-lg overflow-hidden flex flex-col gap-4 hover:-translate-y-1 transition duration-300">

                {{-- IMAGE --}}
                <div class="bg-[#0B0B54] h-[260px] relative">
                    {{-- image here --}}
                    {{-- <img src="" class="w-full h-full object-cover"> --}}
                </div>

                {{-- CONTENT --}}
                <div class="bg-[#0B0B54] text-white p-6 flex-1 flex flex-col">

                    <h3 class="text-xl font-semibold text-center mb-5">
                        Manufacturing Process
                    </h3>

                    <div class="space-y-2 text-sm leading-relaxed">
                        <p>• Raw material sourcing (local rice)</p>
                        <p>• Production with food-grade machinery</p>
                        <p>• Quality control</p>
                        <p>• Packaging & export</p>
                        <p>• Daily production (add your number)</p>
                        <p>• Export-ready logistics</p>
                        <p>• International compliance</p>
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
