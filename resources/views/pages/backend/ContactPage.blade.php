@extends('layouts.Backend.MainLayout')

@section('content')
    <div x-data="adminModal()" class="p-6 space-y-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-white">Contact</h1>
        </div>

        {{-- SEARCH --}}
        <form method="GET" class="flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700">

            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                Search
            </button>

            @if (request('search'))
                <a href="{{ url()->current() }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                    Reset
                </a>
            @endif
        </form>

        {{-- ================= HERO SECTION ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
    <div class="w-full overflow-x-auto">

        <table class="min-w-[1000px] w-full text-sm text-left text-gray-300">

            <thead class="text-gray-400 border-b border-gray-700">
                <tr>
                    <th class="py-2 whitespace-nowrap">FullName</th>
                    <th class="py-2 whitespace-nowrap">Company</th>
                    <th class="py-2 whitespace-nowrap">Country</th>
                    <th class="py-2 whitespace-nowrap">Email</th>
                    <th class="py-2 whitespace-nowrap">Whatsapp</th>
                    <th class="py-2 whitespace-nowrap">Product Name</th>
                    <th class="py-2 whitespace-nowrap">Qty</th>
                    <th class="py-2 whitespace-nowrap">Message</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($contact as $item)
                    <tr class="border-b border-gray-800">

                        <td class="py-2 whitespace-nowrap">{{ $item->fullname }}</td>
                        <td class="py-2 whitespace-nowrap">{{ $item->company }}</td>
                        <td class="py-2 whitespace-nowrap">{{ $item->country }}</td>
                        <td class="py-2 whitespace-nowrap">{{ $item->email }}</td>
                        <td class="py-2 whitespace-nowrap">{{ $item->whatsapp }}</td>
                        <td class="py-2 whitespace-nowrap">{{ $item->product }}</td>
                        <td class="py-2 whitespace-nowrap">{{ $item->qty }}</td>

                        <td class="py-2 max-w-[300px] truncate">
                            {{ $item->message }}
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>




    </div>
@endsection
