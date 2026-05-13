@extends('layouts.Backend.MainLayout')

@section('content')
    <div x-data="adminModal()" x-init="init()" class="p-6 space-y-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-white">Dashboard</h1>
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

        @if ($errors->any())
            <div class="bg-red-500 text-white p-2">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- ================= HERO SECTION ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg text-white">Hero Section</h2>
                {{-- <button @click="openHeroCreate()" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                    + Add Hero
                </button> --}}
            </div>

            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-gray-400 border-b border-gray-700">
                    <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Page</th>
                        <th>Button Primary</th>
                        <th>Button Primary Link</th>
                        <th>Button Secondary</th>
                        <th>Button Secondary Link</th>
                        <th>Image</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hero)
                        <tr class="border-b border-gray-800">
                            <td>{{ Str::limit($hero->title, 20) }}</td>
                            <td>{{ Str::limit($hero->sub_title, 20) }}</td>
                            <td>{{ $hero->page }}</td>
                            <td>{{ $hero->btn_primary_text }}</td>
                            <td>{{ $hero->btn_primary_link }}</td>
                            <td>{{ $hero->btn_secondary_text }}</td>
                            <td>{{ $hero->btn_secondary_link }}</td>
                            <td>
                                <img src="{{ $hero->background_image ? asset('storage/' . $hero->background_image) : '' }}"
                                    class="w-20 h-12 object-cover rounded">
                            </td>
                            <td class="text-right space-x-2">
                                <button @click="openHeroEdit(@js($hero))"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded">
                                    Edit
                                </button>

                                {{-- <form x-data @submit.prevent="confirmDelete($el)" action="/admin/hero/{{ $hero->id }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-500 text-white rounded">
                                        Delete
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- ================= TEAM SECTION ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg text-white">Team Section</h2>

                <button @click="openteamCreate()" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                    + Add Team
                </button>
            </div>

            <table class="w-full text-sm text-left text-gray-300">

                <thead class="text-gray-400 border-b border-gray-700">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Order</th>
                        <th>Image</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($teams as $team)
                        <tr class="border-b border-gray-800">

                            <td>{{ $team->name }}</td>

                            <td>{{ $team->role }}</td>

                            <td>{{ $team->order }}</td>

                            <td>
                                <img src="{{ asset('storage/' . $team->image) }}" class="w-20 h-20 object-cover rounded">
                            </td>

                            <td class="text-right space-x-2">

                                <button @click="openteamEdit(@js($team))"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded">
                                    Edit
                                </button>

                                <form x-data @submit.prevent="confirmDelete($el)" action="/admin/team/{{ $team->id }}"
                                    method="POST" class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-500 text-white rounded">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-gray-400">
                                No team found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- ================= CERTIFICATE SECTION ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">

            <div class="flex items-center justify-between mb-4">

                <h2 class="text-lg text-white">Certificate Section</h2>

                <button @click="opencertificateCreate()" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                    + Add Certificate
                </button>

            </div>

            <table class="w-full text-sm text-left text-gray-300">

                <thead class="text-gray-400 border-b border-gray-700">
                    <tr>
                        <th>Title</th>
                        <th>Order</th>
                        <th>Image</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($certificates as $certificate)
                        <tr class="border-b border-gray-800">

                            <td>{{ $certificate->title }}</td>
                            <td>{{ $certificate->order }}</td>

                            <td>
                                <img src="{{ asset('storage/' . $certificate->image) }}"
                                    class="w-20 h-20 object-cover rounded">
                            </td>

                            <td class="text-right space-x-2">

                                <button @click="opencertificateEdit(@js($certificate))"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded">
                                    Edit
                                </button>

                                <form x-data @submit.prevent="confirmDelete($el)"
                                    action="/admin/certificate/{{ $certificate->id }}" method="POST" class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-500 text-white rounded">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-gray-400">
                                No certificate found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- ================= MODAL ================= --}}
        <div x-show="show" x-cloak class="fixed inset-0 flex items-center justify-center bg-black/60 z-50">

            <div class="bg-white w-[500px] rounded-xl p-6 text-black max-h-[90vh] overflow-auto">

                <h2 class="text-lg font-semibold mb-4" x-text="title"></h2>

                <form :action="actionUrl" method="POST" enctype="multipart/form-data" class="space-y-4">

                    @csrf

                    <template x-if="method === 'PUT'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    {{-- HERO FORM --}}
                    <template x-if="type === 'hero'">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Title <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="title" x-model="form.title" class="w-full border p-2 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Subtitle <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="sub_title" x-model="form.sub_title"
                                    class="w-full border p-2 rounded">
                            </div>

                            <!-- Most Important Fix -->
                            <div>
                                {{-- <label class="block text-sm font-medium mb-1">Page <span
                                        class="text-red-500">*</span></label> --}}
                                <input type="hidden" name="page" x-model="form.page"
                                    placeholder="home or about or product"
                                    class="w-full border p-2 rounded focus:border-blue-500">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Primary Button Text</label>
                                    <input type="text" name="btn_primary_text" x-model="form.btn_primary_text"
                                        class="w-full border p-2 rounded">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Primary Button Link</label>
                                    <input type="text" name="btn_primary_link" x-model="form.btn_primary_link"
                                        class="w-full border p-2 rounded">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Secondary Button Text</label>
                                    <input type="text" name="btn_secondary_text" x-model="form.btn_secondary_text"
                                        class="w-full border p-2 rounded">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Secondary Button Link</label>
                                    <input type="text" name="btn_secondary_link" x-model="form.btn_secondary_link"
                                        class="w-full border p-2 rounded">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Background Image <span
                                        class="text-red-500">*</span></label>
                                <input type="file" name="background_image" class="w-full border p-2 rounded bg-white">
                            </div>
                        </div>
                    </template>

                    {{-- TEAM FORM --}}
                    <template x-if="type === 'team'">

                        <div class="space-y-3">

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Name
                                </label>

                                <input type="text" name="name" x-model="form.name"
                                    class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Role
                                </label>

                                <input type="text" name="role" x-model="form.role"
                                    class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Order
                                </label>

                                <input type="text" name="order" x-model="form.order"
                                    class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Image
                                </label>

                                <input type="file" name="image" class="w-full border p-2 rounded bg-white">
                            </div>

                        </div>

                    </template>

                    {{-- CERTIFICATE FORM --}}
                    <template x-if="type === 'certificate'">

                        <div class="space-y-3">

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Title
                                </label>

                                <input type="text" name="title" x-model="form.title"
                                    class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Order
                                </label>

                                <input type="text" name="order" x-model="form.order"
                                    class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Image
                                </label>

                                <input type="file" name="image" class="w-full border p-2 rounded bg-white">
                            </div>

                        </div>

                    </template>

                    <div class="flex justify-end gap-3 pt-4 border-t">

                        <button type="button" @click="show = false"
                            class="px-5 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
                            Cancel
                        </button>

                        <button type="submit"
                            class="px-5 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        function adminModal() {
            return {

                show: false,
                type: '',
                method: 'POST',
                actionUrl: '',
                title: '',
                form: {},

                init() {

                },

                // ================= HERO =================
                openHeroCreate() {
                    this.type = 'hero';
                    this.method = 'POST';
                    this.title = 'Create New Hero';
                    this.actionUrl = '/admin/hero';
                    this.form = {
                        title: '',
                        sub_title: '',
                        page: 'about',
                        btn_primary_text: '',
                        btn_primary_link: '',
                        btn_secondary_text: '',
                        btn_secondary_link: ''
                    };
                    this.show = true;
                },

                openHeroEdit(hero) {
                    this.type = 'hero';
                    this.method = 'PUT';
                    this.title = 'Edit Hero';
                    this.actionUrl = `/admin/hero/${hero.id}`;
                    this.form = {
                        ...hero
                    }; // spread to avoid reference issues
                    this.show = true;
                },

                // ================= TEAM =================
                openteamCreate() {

                    this.type = 'team';
                    this.method = 'POST';
                    this.title = 'Create Team';
                    this.actionUrl = '/admin/team';

                    this.form = {
                        name: '',
                        role: '',
                        order: ''
                    };

                    this.show = true;
                },

                openteamEdit(team) {

                    this.type = 'team';
                    this.method = 'PUT';
                    this.title = 'Edit Team';
                    this.actionUrl = `/admin/team/${team.id}`;
                    this.form = {
                        ...team
                    };

                    this.show = true;
                },

                // ================= CERTIFICATE =================
                opencertificateCreate() {

                    this.type = 'certificate';
                    this.method = 'POST';
                    this.title = 'Create Certificate';
                    this.actionUrl = '/admin/certificate';

                    this.form = {
                        title: '',
                        order: ''
                    };

                    this.show = true;
                },

                opencertificateEdit(certificate) {

                    this.type = 'certificate';
                    this.method = 'PUT';
                    this.title = 'Edit Certificate';
                    this.actionUrl = `/admin/certificate/${certificate.id}`;

                    this.form = {
                        ...certificate
                    };

                    this.show = true;
                },

                confirmDelete(formEl) {

                    if (confirm('Are you sure you want to delete this?')) {
                        formEl.submit();
                    }

                }

            }
        }
    </script>
@endsection
