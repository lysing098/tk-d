@extends('layouts.Backend.MainLayout')

@section('content')
    <div x-data="adminModal()" class="p-6 space-y-10">

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
                        {{-- <th>Page</th> --}}
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
                            {{-- <td>{{ $hero->page }}</td> --}}
                            <td>{{ $hero->btn_primary_text }}</td>
                            <td>{{ $hero->btn_primary_link }}</td>
                            <td>{{ $hero->btn_secondary_text }}</td>
                            <td>{{ $hero->btn_secondary_link }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $hero->background_image) }}"
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

        {{-- ================= FAQ ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg text-white">FAQ</h2>
                <button @click="openFaqCreate()" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                    + Add FAQ
                </button>
            </div>

            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-gray-400 border-b border-gray-700">
                    <tr>
                        <th>Title</th>
                        <th>Answer</th>
                        {{-- <th>Order</th> --}}
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr class="border-b border-gray-800">
                            <td>{{ $faq->title }}</td>
                            <td>{{ Str::limit($faq->answer, 50) }}</td>
                            {{-- <td>{{ $faq->order }}</td> --}}
                            <td class="text-right space-x-2">
                                <button @click="openFaqEdit(@js($faq))"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded">
                                    Edit
                                </button>

                                <form x-data @submit.prevent="confirmDelete($el)" action="/admin/faq/{{ $faq->id }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-500 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ================= MODAL ================= --}}
        <div x-show="show" x-cloak class="fixed inset-0 flex items-center justify-center bg-black/60 z-50">
            <div class="bg-white w-[500px] rounded-xl p-6 text-black max-h-[90vh] overflow-auto">

                <h2 class="text-lg font-semibold mb-4" x-text="title"></h2>

                <form :action="actionUrl" method="POST" enctype="multipart/form-data" x-ref="heroForm"
                    class="space-y-4">
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

                    {{-- FAQ FORM --}}
                    <template x-if="type === 'faq'">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Question</label>
                                <input type="text" name="title" x-model="form.title"
                                    class="w-full border p-2 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Answer</label>
                                <textarea name="answer" x-model="form.answer" rows="4" class="w-full border p-2 rounded"></textarea>
                            </div>
                            <div>
                                {{-- <label class="block text-sm font-medium mb-1">Page <span
                                        class="text-red-500">*</span></label> --}}
                                <input type="hidden" name="page" x-model="form.page"
                                    placeholder="home or about or product"
                                    class="w-full border p-2 rounded focus:border-blue-500">
                            </div>
                            {{-- <div>
                                <label class="block text-sm font-medium mb-1">Order</label>
                                <input type="number" name="order" x-model="form.order"
                                    class="w-full border p-2 rounded">
                            </div> --}}
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
                init() {

                },

                form: {
                    title: '',
                    sub_title: '',
                    page: 'home',
                    btn_primary_text: '',
                    btn_primary_link: '',
                    btn_secondary_text: '',
                    btn_secondary_link: '',
                    answer: '',
                    order: 0,
                },

                // ================= HERO =================
                openHeroCreate() {
                    this.reset();

                    this.type = 'hero';
                    this.method = 'POST';
                    this.title = 'Create New Hero';
                    this.actionUrl = '/admin/hero';

                    this.form = {
                        title: '',
                        sub_title: '',
                        page: 'home',
                        btn_primary_text: '',
                        btn_primary_link: '',
                        btn_secondary_text: '',
                        btn_secondary_link: '',
                    };

                    this.show = true;
                },

                openHeroEdit(hero) {
                    this.reset();

                    this.type = 'hero';
                    this.method = 'PUT';
                    this.title = 'Edit Hero';
                    this.actionUrl = `/admin/hero/${hero.id}`;

                    this.form = {
                        title: hero.title ?? '',
                        sub_title: hero.sub_title ?? '',
                        page: hero.page ?? 'home',
                        btn_primary_text: hero.btn_primary_text ?? '',
                        btn_primary_link: hero.btn_primary_link ?? '',
                        btn_secondary_text: hero.btn_secondary_text ?? '',
                        btn_secondary_link: hero.btn_secondary_link ?? '',
                    };

                    this.show = true;
                },

                // ================= FAQ =================
                openFaqCreate() {
                    this.type = 'faq';
                    this.method = 'POST';
                    this.title = 'Create FAQ';
                    this.actionUrl = '/admin/faq';

                    this.form = {
                        title: '',
                        answer: '',
                        order: 0,
                        page: 'home'
                    };

                    this.show = true;
                },

                openFaqEdit(faq) {
                    this.type = 'faq';
                    this.method = 'PUT';
                    this.title = 'Edit FAQ';
                    this.actionUrl = `/admin/faq/${faq.id}`;

                    this.form = {
                        title: faq.title ?? '',
                        answer: faq.answer ?? '',
                        // order: faq.order ?? 0,
                        page: faq.page ?? 'home'
                    };

                    this.show = true;
                },

                reset() {
                    this.form = {
                        title: '',
                        answer: '',
                        // order: 0,
                        page: 'home'
                    };
                },

                confirmDelete(formEl) {
                    if (confirm('Are you sure?')) {
                        formEl.submit();
                    }
                }
            }
        }
    </script>
@endsection
