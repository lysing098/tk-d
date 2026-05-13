@extends('layouts.frontend.MainLayout')

@section('content')
    {{-- hero section --}}
    <div id="tabsRoot">

        <!-- HERO -->
        <div class="h-[93vh] bg-cover bg-center text-white relative"
            style="background-image: url('{{ asset('storage/' . $hero->background_image) }}');">

            <div class="absolute inset-0 bg-black/40"></div>

            <!-- HERO CONTENT -->
            <div class="container mx-auto px-5 flex items-center h-full relative z-10">

                <div class="w-full lg:w-1/2 flex flex-col gap-5 text-center md:text-left">

                    <h2 class="text-xl sm:text-2xl md:text-4xl lg:text-[44px] font-bold">
                        {{ $hero->title }}
                    </h2>

                    <p class="text-sm sm:text-base md:text-lg lg:text-[22px]">
                        {{ $hero->sub_title }}
                    </p>

                </div>

            </div>

            <!-- TABS -->
            <div class="absolute bottom-[-50px] left-1/2 -translate-x-1/2 w-full max-w-5xl">

                <div id="tabButtons" class="grid grid-cols-4 gap-6"></div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="container mx-auto text-center py-20">

            <h3 id="tabTitle" class="text-2xl font-bold mb-6"></h3>

            <div id="tabContent"></div>

        </div>

    </div>

    <!-- CTA SECTION -->
    <div class="mt-20 bg-[#0B0B54] text-white py-16 md:py-20 text-center relative overflow-hidden">

    <h2 class="mx-auto max-w-4xl text-lg sm:text-xl md:text-2xl lg:text-[32px] font-bold mb-8 leading-relaxed px-4">

        “From local agricultural resources to global markets,
        TK&D transforms rice into sustainable solutions
        that reduce plastic waste.”

    </h2>

</div>

    {{-- team --}}
    <div class="py-20 relative">

        <!-- SECTION TITLE -->
        <div class="absolute top-10 md:top-20 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    Team Work
                </h1>
            </div>

        </div>

        <!-- TEAM SECTION -->
        <div class="container mx-auto px-5 pt-28">

            {{-- FOUNDERS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">

                @foreach ($teams->whereIn('role', ['Director','Founder', 'Co-Founder']) as $member)
                    <div class="text-center">

                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-[280px] object-cover">

                            <div class="absolute bottom-0 right-0 w-1/2 h-[24px] overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-[#ED1C24]
                            [clip-path:polygon(20%_100%,100%_100%,100%_0%,40%_0%)]">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="text-[#ED1C24] font-semibold">
                                {{ $member->name }}
                            </p>

                            <p class="text-[#0B0B54]text-sm">
                                {{ $member->role }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>

            {{-- TEAM MEMBERS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

                @foreach ($teams->whereNotIn('role', ['Founder', 'Co-Founder','Director'])->take(4) as $member)
                    <div class="text-center">

                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-[240px] object-cover">

                            <div class="absolute bottom-0 right-0 w-1/2 h-[24px] overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-[#ED1C24]
                            [clip-path:polygon(20%_100%,100%_100%,100%_0%,40%_0%)]">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="text-[#ED1C24] font-semibold">
                                {{ $member->name }}
                            </p>

                            <p class="text-[#0B0B54]text-sm">
                                {{ $member->role }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>

            {{-- LAST ROW --}}
            <div class="flex flex-wrap justify-center gap-6 mt-10">

                @foreach ($teams->whereNotIn('role', ['Founder', 'Co-Founder','Director'])->skip(4) as $member)
                    <div class="w-full sm:w-[300px] text-center">

                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-[240px] object-cover">

                            <div class="absolute bottom-0 right-0 w-1/2 h-[24px] overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-[#ED1C24]
                            [clip-path:polygon(20%_100%,100%_100%,100%_0%,40%_0%)]">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="text-[#ED1C24] font-semibold">
                                {{ $member->name }}
                            </p>

                            <p class="text-[#0B0B54]text-sm">
                                {{ $member->role }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

    {{-- certificate --}}
    <div class="bg-[#0B0B54] py-20">

        <div class="container mx-auto px-10 flex flex-wrap gap-8 justify-center items-end">

            @foreach ($certificate as $item)
                <div class="group">
                    <img src="{{ asset('storage/' . $item->image) }}"
                        class="h-[420px] w-auto object-contain
                group-hover:scale-105 transition duration-300">

                    <p class="mt-3 font-semibold text-white">{{ $item->title }}</p>
                </div>
            @endforeach
        </div>

    </div>

    <!-- CTA SECTION -->
    <div class="relative text-white py-20 text-center overflow-hidden mt-20"
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


<!-- PURE JAVASCRIPT -->
<script>
    const tabs = [{
            title: 'Company Overview',
            icon: '/icons/achievement.png',
            type: 'list',
            items: [
                'Founded in 2020',
                'Founder: Mrs. Tit Sokhom',
                'Factory size: 10,900 sqm',
                'Location: Pursat Province'
            ]
        },
        {
            title: 'Vision',
            icon: '/icons/light-bulb.png',
            type: 'text',
            content: 'To become a leading Southeast Asian manufacturer of sustainable drinking straws.'
        },
        {
            title: 'Mission',
            icon: '/icons/research.png',
            type: 'list',
            items: [
                'Produce eco-friendly products',
                'Support Cambodian farmers',
                'Expand globally',
                'Promote sustainability'
            ]
        },
        {
            title: 'Core Values',
            icon: '/icons/values.png',
            type: 'list',
            items: [
                'Sustainability',
                'Quality',
                'Innovation',
                'Integrity',
                'Community Impact'
            ]
        }
    ];

    let active = 0;

    function renderTabs() {
        const container = document.getElementById("tabButtons");

        container.innerHTML = tabs.map((tab, index) => `
        <button onclick="setActive(${index})"
            class="w-full h-[140px] bg-white flex flex-col items-center justify-center gap-2
                   rounded-lg shadow-sm hover:shadow-md transition-all duration-300
                   cursor-pointer select-none
                   ${active === index ? 'text-[#ED1C24] ring-2 ring-[#ED1C24]' : ''}">

            <img src="${tab.icon}" class="w-8 h-8 object-contain pointer-events-none">

            <p class="text-sm font-medium text-center text-black pointer-events-none">
                ${tab.title}
            </p>

        </button>
    `).join("");

        renderContent();
    }

    function renderContent() {
        const title = document.getElementById("tabTitle");
        const content = document.getElementById("tabContent");

        const tab = tabs[active];

        title.innerText = tab.title;

        if (tab.type === "list") {
            content.innerHTML = `
            <ul class="space-y-3 text-gray-700 text-lg text-left list-disc list-inside max-w-3xl mx-auto">
                ${tab.items.map(item => `<li>${item}</li>`).join("")}
            </ul>
        `;
        } else {
            content.innerHTML = `
            <p class="text-gray-700 text-lg max-w-3xl mx-auto">
                ${tab.content}
            </p>
        `;
        }
    }

    function setActive(index) {
        active = index;
        renderTabs();
    }

    // INIT
    document.addEventListener("DOMContentLoaded", () => {
        renderTabs();
    });
</script>
