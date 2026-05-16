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
                    <i class="fa-solid fa-phone"></i>
                    <p class="break-all">{{ $company->tel }}</p>
                </div>

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope"></i>
                    <p class="break-all">{{ $company->email }}</p>
                </div>

                <div class="flex items-center gap-2 text-center md:text-left">
                    <i class="fa-solid fa-bullhorn"></i>
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
                        <a href="{{ $hero->btn_primary_link }}"
                            class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center capitalize">
                            {{ $hero->btn_primary_text }}
                        </a>
                    @endif

                    @if ($hero->btn_secondary_text)
                        <a href="{{ $hero->btn_secondary_link }}"
                            class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center capitalize">
                            {{ $hero->btn_secondary_text }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT SECTION -->
    <section id="contact" class="bg-gray-50 py-20 px-4">
        <div class="container mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0B0B54]">
                    Get in Touch
                </h2>

                <p class="text-gray-600 mt-3">
                    Request a quotation or explore our manufacturing solutions
                </p>

                <div class="w-24 h-1 bg-[#ED1C24] mx-auto mt-4 rounded"></div>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">

                <!-- LEFT SIDE -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- CONTACT INFO -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border">
                        <h3 class="font-semibold text-lg text-[#0B0B54] mb-4">
                            Contact Information
                        </h3>

                        <div class="space-y-4 text-sm">

                            <!-- EMAIL -->
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-envelope text-[#ED1C24] mt-1"></i>
                                <div>
                                    <p class="text-gray-500">Email</p>
                                    <a href="mailto:{{ $company->email }}"
                                        class="text-[#ED1C24] font-medium">
                                        {{ $company->email }}
                                    </a>
                                </div>
                            </div>

                            <!-- PHONE -->
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-phone text-[#ED1C24] mt-1"></i>
                                <div>
                                    <p class="text-gray-500">Phone</p>
                                    <a href="tel:{{ $company->tel }}"
                                        class="text-[#ED1C24] font-medium">
                                        {{ $company->tel }}
                                    </a>
                                </div>
                            </div>

                            <!-- LOCATION -->
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-location-dot text-[#ED1C24] mt-1"></i>
                                <div>
                                    <p class="text-gray-500">Location</p>
                                    <p class="font-medium text-gray-800">
                                        {{ $company->location }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>



                    <!-- OFFICE MAP -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm border">
                        <div class="p-4 border-b font-semibold text-[#0B0B54]">
                            Office Location
                        </div>

                        <iframe
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1947.403888714006!2d104.00688138437803!3d12.52888975386584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310fa5e9bfa7bdd3%3A0x7dc60c94e465695d!2sTK%26D%20Manufacturing!5e0!3m2!1sen!2skh!4v1778837513476!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            class="w-full h-56">
                        </iframe>
                    </div>

                </div>

                <!-- RIGHT SIDE FORM -->
                <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow-sm border">

                    <h3 class="text-xl font-semibold text-[#0B0B54] mb-6">
                        Request Quotation
                    </h3>

                    {{-- SUCCESS MESSAGE --}}
                    @if (session('success'))
                        <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}"
                        method="POST"
                        class="grid md:grid-cols-2 gap-4">

                        @csrf

                        {{-- FULL NAME --}}
                        <div>
                            <input type="text"
                                name="fullname"
                                placeholder="Full Name"
                                value="{{ old('fullname') }}"
                                required
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                            @error('fullname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- COMPANY --}}
                        <div>
                            <input type="text"
                                name="company"
                                placeholder="Company Name"
                                value="{{ old('company') }}"
                                required
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                            @error('company')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- COUNTRY --}}
                        <div class="md:col-span-2">
                            <select name="country"
                                required
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                                <option value="">Select Country</option>

                                @php
                                    $countries = [
                                        'Afghanistan',
                                        'Albania',
                                        'Algeria',
                                        'Andorra',
                                        'Angola',
                                        'Argentina',
                                        'Australia',
                                        'Austria',
                                        'Bangladesh',
                                        'Belgium',
                                        'Brazil',
                                        'Cambodia',
                                        'Canada',
                                        'China',
                                        'Denmark',
                                        'Egypt',
                                        'France',
                                        'Germany',
                                        'India',
                                        'Indonesia',
                                        'Italy',
                                        'Japan',
                                        'South Korea',
                                        'Laos',
                                        'Malaysia',
                                        'Mexico',
                                        'Netherlands',
                                        'New Zealand',
                                        'Norway',
                                        'Philippines',
                                        'Portugal',
                                        'Russia',
                                        'Saudi Arabia',
                                        'Singapore',
                                        'Spain',
                                        'Sweden',
                                        'Switzerland',
                                        'Thailand',
                                        'United Kingdom',
                                        'United States',
                                        'Vietnam',
                                    ];
                                @endphp

                                @foreach ($countries as $country)
                                    <option value="{{ $country }}"
                                        {{ old('country') == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach

                            </select>

                            @error('country')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- EMAIL --}}
                        <div>
                            <input type="email"
                                name="email"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- WHATSAPP --}}
                        <div>
                            <input type="text"
                                name="whatsapp"
                                placeholder="WhatsApp"
                                value="{{ old('whatsapp') }}"
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                            @error('whatsapp')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PRODUCT --}}
                        <div class="md:col-span-2">
                            <select name="product"
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                                <option value="">Product Inquiry</option>

                                <option value="Rice-Flour Straws"
                                    {{ old('product') == 'Rice-Flour Straws' ? 'selected' : '' }}>
                                    Rice-Flour Straws
                                </option>

                                <option value="Paper Cups & Bowls"
                                    {{ old('product') == 'Paper Cups & Bowls' ? 'selected' : '' }}>
                                    Paper Cups & Bowls
                                </option>

                                <option value="Recycled Plastic Cups"
                                    {{ old('product') == 'Recycled Plastic Cups' ? 'selected' : '' }}>
                                    Recycled Plastic Cups
                                </option>

                            </select>
                        </div>

                        {{-- QUANTITY --}}
                        <div class="md:col-span-2">
                            <input type="number"
                                name="qty"
                                placeholder="Quantity"
                                value="{{ old('qty') }}"
                                required
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none">

                            @error('qty')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- MESSAGE --}}
                        <div class="md:col-span-2">
                            <textarea name="message"
                                rows="5"
                                placeholder="Your Message"
                                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-[#ED1C24] outline-none resize-none">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- SUBMIT --}}
                        <button type="submit"
                            class="md:col-span-2 bg-[#ED1C24] text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                            🚀 Request Quotation
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection
