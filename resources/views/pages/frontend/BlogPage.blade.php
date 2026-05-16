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
                    Rice Straws vs Paper Straws
                </h2>

                <p class="text-sm sm:text-base md:text-lg lg:text-[22px] leading-relaxed">
                    Which Is Better for Your Business?
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

    {{-- comparison --}}
    <div class="py-20 relative px-4 lg:px-0">

        <!-- SECTION TITLE -->
        <div class="absolute top-10 md:top-20 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
        [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Rice Straws vs Paper Straws
                </h1>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="my-20 px-2 container mx-auto flex flex-col lg:flex-row items-center justify-center gap-10 lg:gap-20">

            {{-- LEFT --}}
            <div class="w-full lg:w-auto">

                <!-- IMAGE -->
                <div class="relative h-[220px] sm:h-[260px] md:h-[292.87px] overflow-hidden">
                    <img src="{{ asset('images/herosection.jpg') }}" class="w-full h-full object-cover">

                    <div class="absolute top-0 left-0 w-3/4 h-5">
                        <div class="w-full h-full bg-[#0B0B54]" style="clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);">
                        </div>
                    </div>

                    <div class="absolute bottom-0 right-0 w-3/4 h-5">
                        <div class="w-full h-full bg-[#0B0B54]"
                            style="clip-path: polygon(10% 0, 100% 0, 100% 100%, 0 100%);"></div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="mt-5 border-b-8 border-[#0B0B54] w-full max-w-full overflow-x-auto">

                    <table class="w-full min-w-[500px] border-collapse">

                        <thead>
                            <tr class="bg-[#0B0B54] text-white">
                                <th class="px-4 md:px-6 py-4 text-left text-sm md:text-lg font-bold">
                                    Feature
                                </th>
                                <th class="px-4 md:px-6 py-4 text-left text-sm md:text-lg font-bold">
                                    Rice Straws
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-[#2B2B2B] font-semibold text-sm md:text-base">

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Material</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Made from rice flour & tapioca starch</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Durability</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Strong and stable for 40–120 minutes</td>
                            </tr>

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Taste Impact</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">No effect on drink flavor</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Hot Drinks</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Maintains structure in hot beverages</td>
                            </tr>

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Cold Drinks</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Long-lasting performance</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Eco-Friendly</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">100% biodegradable and compostable</td>
                            </tr>

                             <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Customer Experience</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Smooth, pleasant drinking experience</td>
                            </tr>

                             <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Brand Image</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Premium, innovative eco-solution</td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="w-full lg:w-auto">

                <div class="relative h-[220px] sm:h-[260px] md:h-[292.87px] overflow-hidden">
                    <img src="{{ asset('images/herosection.jpg') }}" class="w-full h-full object-cover">

                    <div class="absolute top-0 left-0 w-3/4 h-5">
                        <div class="w-full h-full bg-[#ED1C24]" style="clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);">
                        </div>
                    </div>

                    <div class="absolute bottom-0 right-0 w-3/4 h-5">
                        <div class="w-full h-full bg-[#ED1C24]"
                            style="clip-path: polygon(10% 0, 100% 0, 100% 100%, 0 100%);"></div>
                    </div>
                </div>

                <div class="mt-5 border-b-8 border-[#ED1C24] w-full max-w-full overflow-x-auto">

                    <table class="w-full min-w-[500px] border-collapse">

                        <thead>
                            <tr class="bg-[#ED1C24] text-white">
                                <th class="px-4 md:px-6 py-4 text-left text-sm md:text-lg font-bold">
                                    Feature
                                </th>
                                <th class="px-4 md:px-6 py-4 text-left text-sm md:text-lg font-bold">
                                    Rice Straws
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-[#2B2B2B] font-semibold text-sm md:text-base">

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Material</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Made from paper pulp</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Durability</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Becomes soggy quickly (10–30 minutes)

                                </td>
                            </tr>

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Taste Impact</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">May affect taste after soaking</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Hot Drinks</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Softens and breaks down faster</td>
                            </tr>

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Cold Drinks</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Weakens over time</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Eco-Friendly</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Biodegradable but often chemically processed</td>
                            </tr>

                            <tr class="bg-[#EAEAEA]">
                                <td class="px-4 md:px-6 py-5 md:py-8">Customer Experience</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Can feel soft and unpleasant</td>
                            </tr>

                            <tr class="bg-white">
                                <td class="px-4 md:px-6 py-5 md:py-8">Brand ImageBrand Image</td>
                                <td class="px-4 md:px-6 py-5 md:py-8">Common but less durable option</td>
                            </tr>

                        </tbody>

                    </table>
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
