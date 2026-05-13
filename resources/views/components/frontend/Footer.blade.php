<div class="pt-5 relative overflow-hidden mt-20 bg-[#0B0B54]">

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-5 py-16 lg:py-20">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-20">

            {{-- LEFT --}}
            <div class="flex items-center justify-center">

                <img src="{{ asset('images/logo.jpg') }}" alt="logo"
                    class="w-[220px] sm:w-[280px] md:w-[340px] lg:w-[374px] h-auto object-contain">

            </div>

            {{-- RIGHT --}}
            <div class="text-white">

                {{-- COMPANY --}}
                <div>

                    <h1 class="text-2xl md:text-3xl font-bold">
                        TK&D Manufacturing
                    </h1>

                    <p class="pt-5 text-sm md:text-base leading-8 text-gray-200">
                        {{ $company->title }}
                    </p>

                </div>

                {{-- LINKS --}}
                <div class="pt-10 grid grid-cols-1 sm:grid-cols-2 gap-10">

                    {{-- NAVIGATION --}}
                    <div>

                        <h2 class="text-xl font-bold capitalize">
                            Information
                        </h2>

                        <div class="capitalize flex flex-col gap-4 pt-5 text-gray-200">

                            <a href="/" class="hover:text-[#ED1C24] transition">
                                home
                            </a>

                            <a href="/about-us" class="hover:text-[#ED1C24] transition">
                                about us
                            </a>

                            <a href="/our-trading-products" class="hover:text-[#ED1C24] transition">
                                our trading products
                            </a>

                            <a href="/export" class="hover:text-[#ED1C24] transition">
                                export
                            </a>

                            <a href="/business-activities" class="hover:text-[#ED1C24] transition">
                                business activities
                            </a>

                            <a href="/blog" class="hover:text-[#ED1C24] transition">
                                blog
                            </a>

                            <a href="/contact-us" class="hover:text-[#ED1C24] transition">
                                contact us
                            </a>

                        </div>

                    </div>

                    {{-- CONTACT --}}
                    <div>

                        <h2 class="text-xl font-bold capitalize">
                            Keep in touch
                        </h2>

                        <div class="flex flex-col gap-4 pt-5 text-gray-200 text-sm md:text-base">

                            <p>{{ $company->location }}</p>

                            <p>{{ $company->tel }}</p>

                            <p class="break-all">
                                {{ $company->email }}
                            </p>

                            {{-- <p class="break-all">
                                www.tkd.manufacturing.com
                            </p> --}}

                        </div>

                        {{-- SOCIAL --}}
                        <h2 class="text-xl font-bold capitalize pt-8">
                            Follow us
                        </h2>

                        <div class="flex flex-wrap items-center gap-4 pt-5">

                            {{-- Facebook --}}
                            @if ($company->facebook)
                                <a href="{{ $company->facebook }}" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#1877F2] hover:scale-110 transition duration-300">

                                    <i class="fa-brands fa-facebook-f text-white"></i>

                                </a>
                            @endif

                            {{-- Telegram --}}
                            @if ($company->telegram)
                                <a href="https://t.me/yourusername" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#229ED9] hover:scale-110 transition duration-300">
                                    <i class="fa-brands fa-telegram text-white"></i>
                                </a>
                            @endif

                            {{-- WhatsApp --}}
                            @if ($company->whatsapp)
                                <a href="https://wa.me/85512590666" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#25D366] hover:scale-110 transition duration-300">
                                    <i class="fa-brands fa-whatsapp text-white"></i>
                                </a>
                            @endif

                            {{-- Instagram --}}
                            @if ($company->instagram)
                                <a href="https://instagram.com" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 hover:scale-110 transition duration-300">
                                    <i class="fa-brands fa-instagram text-white"></i>
                                </a>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
