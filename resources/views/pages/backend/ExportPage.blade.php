@extends('layouts.Backend.MainLayout')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Added for smoother table scrolling on mobile */
        .table-responsive {
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <div x-data="heroModal()" class="p-4 md:p-6 space-y-10">

        {{-- ================= HERO TABLE ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg text-white font-semibold">Hero Section</h2>
            </div>

            <div class="overflow-x-auto table-responsive">
                <table class="w-full text-sm text-left text-gray-300 min-w-[800px]">
                    <thead class="text-gray-400 border-b border-gray-700">
                        <tr>
                            <th class="pb-3 px-2">Title</th>
                            <th class="pb-3 px-2">Subtitle</th>
                            <th class="pb-3 px-2">Button Primary</th>
                            <th class="pb-3 px-2">Link</th>
                            <th class="pb-3 px-2">Button Secondary</th>
                            <th class="pb-3 px-2">Image</th>
                            <th class="pb-3 px-2 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($hero)
                            <tr class="border-b border-gray-800 hover:bg-white/5 transition">
                                <td class="py-3 px-2">{{ Str::limit($hero->title, 20) }}</td>
                                <td class="py-3 px-2">{{ Str::limit($hero->sub_title, 20) }}</td>
                                <td class="py-3 px-2">{{ $hero->btn_primary_text }}</td>
                                <td class="py-3 px-2 text-xs text-gray-500">{{ $hero->btn_primary_link }}</td>
                                <td class="py-3 px-2">{{ $hero->btn_secondary_text }}</td>
                                <td class="py-3 px-2">
                                    <img src="{{ asset('storage/' . $hero->background_image) }}"
                                        class="w-20 h-12 object-cover rounded shadow-lg">
                                </td>
                                <td class="py-3 px-2 text-right">
                                    <button @click="openEdit(@js($hero))"
                                        class="px-4 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-lg transition">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ================= FAQ TABLE ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg text-white font-semibold">FAQ</h2>
                <button @click="openFaqCreate()"
                    class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition text-sm flex items-center gap-2">
                    <span class="text-lg">+</span> Add FAQ
                </button>
            </div>

            <div class="overflow-x-auto table-responsive">
                <table class="w-full text-sm text-left text-gray-300 min-w-[600px]">
                    <thead class="text-gray-400 border-b border-gray-700">
                        <tr>
                            <th class="pb-3 px-2">Title</th>
                            <th class="pb-3 px-2">Answer</th>
                            <th class="pb-3 px-2 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr class="border-b border-gray-800 hover:bg-white/5 transition">
                                <td class="py-3 px-2 font-medium">{{ $faq->title }}</td>
                                <td class="py-3 px-2 text-gray-400">{{ Str::limit($faq->answer, 50) }}</td>
                                <td class="py-3 px-2 text-right space-x-2">
                                    <button @click="openFaqEdit(@js($faq))"
                                        class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-black rounded transition">
                                        Edit
                                    </button>
                                    <form x-data @submit.prevent="confirmDelete($el)"
                                        action="/admin/faq/{{ $faq->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ================= Export TABLE ================= --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg text-white font-semibold">Export Section</h2>
            </div>

            <div class="overflow-x-auto table-responsive">
                <table class="w-full text-sm text-left text-gray-300 min-w-[600px]">
                    <thead class="text-gray-400 border-b border-gray-700">
                        <tr>
                            <th class="pb-3 px-2">Title</th>
                            <th class="pb-3 px-2">Description</th>
                            <th class="pb-3 px-2 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($export)
                            <tr class="border-b border-gray-800 hover:bg-white/5 transition">
                                <td class="py-3 px-2 font-medium">{{ Str::limit($export->title, 30) }}</td>
                                <td class="py-3 px-2 text-gray-400">{{ Str::limit($export->description, 50) }}</td>
                                <td class="py-3 px-2 text-right">
                                    <button @click="openExportEdit(@js($export))"
                                        class="px-4 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg transition">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ================= MODAL ================= --}}
        <div x-show="show" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/75 backdrop-blur-sm"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">

            <div class="bg-white text-black w-full max-w-2xl p-6 rounded-2xl max-h-[90vh] overflow-y-auto shadow-2xl"
                @click.away="closeModal()">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold" x-text="modalTitle"></h2>
                    <button @click="closeModal()" class="text-gray-400 hover:text-black">&times;</button>
                </div>

                {{-- HERO FORM --}}
                <template x-if="type === 'hero'">
                    <form :action="actionUrl" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <template x-if="method === 'PUT'"><input type="hidden" name="_method" value="PUT"></template>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Title</label>
                            <input type="text" name="title" x-model="form.title"
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Subtitle</label>
                            <input type="text" name="sub_title" x-model="form.sub_title"
                                class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">Primary Button Text</label>
                                <input type="text" name="btn_primary_text" x-model="form.btn_primary_text"
                                    class="w-full p-2 border rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Primary Link</label>
                                <input type="text" name="btn_primary_link" x-model="form.btn_primary_link"
                                    class="w-full p-2 border rounded-lg">
                            </div>
                        </div>
                        

                        <div>
                            <label class="block text-sm font-semibold mb-1">Background Image</label>
                            <input type="file" name="background_image"
                                class="w-full p-2 border bg-gray-50 rounded-lg">
                        </div>
                        <div class="flex justify-end gap-3 pt-6 border-t">
                            <button type="button" @click="closeModal()"
                                class="px-5 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium">Cancel</button>
                            <button type="submit"
                                class="px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-medium">Save
                                Changes</button>
                        </div>
                    </form>
                </template>

                {{-- FAQ FORM --}}
                <template x-if="type === 'faq'">
                    <form :action="actionUrl" method="POST" class="space-y-4">
                        @csrf
                        <template x-if="method === 'PUT'"><input type="hidden" name="_method"
                                value="PUT"></template>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Question</label>
                            <input type="text" name="title" x-model="form.title"
                                class="w-full border p-2 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Answer</label>
                            <textarea name="answer" x-model="form.answer" rows="4" class="w-full border p-2 rounded-lg"></textarea>
                        </div>
                        <input type="hidden" name="page" x-model="form.page">
                        <div class="flex justify-end gap-3 pt-6 border-t">
                            <button type="button" @click="closeModal()"
                                class="px-5 py-2 bg-gray-100 rounded-lg">Cancel</button>
                            <button type="submit" class="px-5 py-2 bg-orange-500 text-white rounded-lg">Save FAQ</button>
                        </div>
                    </form>
                </template>

                {{-- EXPORT FORM --}}
                <template x-if="type === 'export'">
                    <form :action="actionUrl" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <template x-if="method === 'PUT'"><input type="hidden" name="_method"
                                value="PUT"></template>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Title</label>
                            <input type="text" name="title" x-model="form.title"
                                class="w-full border p-2 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Description</label>
                            <textarea name="description" x-model="form.description" rows="4" class="w-full border p-2 rounded-lg"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Image</label>
                            <input type="file" name="image" class="w-full p-2 border bg-gray-50 rounded-lg">
                        </div>
                        <div class="flex justify-end gap-3 pt-6 border-t">
                            <button type="button" @click="closeModal()"
                                class="px-5 py-2 bg-gray-100 rounded-lg">Cancel</button>
                            <button type="submit" class="px-5 py-2 bg-orange-500 text-white rounded-lg">Save
                                Export</button>
                        </div>
                    </form>
                </template>
            </div>
        </div>
    </div>

    <script>
        function heroModal() {
            return {
                show: false,
                type: '',
                actionUrl: '',
                modalTitle: '',
                method: 'POST',
                form: {},

                openEdit(hero) {
                    this.type = 'hero';
                    this.show = true;
                    this.method = 'PUT';
                    this.modalTitle = 'Edit Hero Section';
                    this.actionUrl = `/admin/hero/${hero.id}`;
                    this.form = {
                        title: hero.title || '',
                        sub_title: hero.sub_title || '',
                        page: hero.page || 'home',

                        btn_primary_text: hero.btn_primary_text || '',
                        btn_primary_link: hero.btn_primary_link || '',

                        btn_secondary_text: hero.btn_secondary_text || '',
                        btn_secondary_link: hero.btn_secondary_link || '',
                    };
                },

                openFaqCreate() {
                    this.type = 'faq';
                    this.show = true;
                    this.method = 'POST';
                    this.modalTitle = 'Create New FAQ';
                    this.actionUrl = '/admin/faq';
                    this.form = {
                        title: '',
                        answer: '',
                        page: 'export'
                    };
                },

                openFaqEdit(faq) {
                    this.type = 'faq';
                    this.show = true;
                    this.method = 'PUT';
                    this.modalTitle = 'Edit FAQ';
                    this.actionUrl = `/admin/faq/${faq.id}`;
                    this.form = {
                        title: faq.title || '',
                        answer: faq.answer || '',
                        page: faq.page || 'export'
                    };
                },

                openExportEdit(exportData) {
                    this.type = 'export';
                    this.show = true;
                    this.method = 'PUT';
                    this.modalTitle = 'Edit Export Details';
                    this.actionUrl = `/admin/export/${exportData.id}`;
                    this.form = {
                        title: exportData.title || '',
                        description: exportData.description || '',
                    };
                },

                closeModal() {
                    this.show = false;
                    setTimeout(() => {
                        this.type = '';
                        this.form = {};
                    }, 300);
                }
            }
        }

        // Global delete confirmation
        window.confirmDelete = function(formElement) {
            if (confirm('Are you sure you want to delete this item?')) {
                formElement.submit();
            }
        }
    </script>
@endsection
