@extends('layouts.Backend.MainLayout')

@section('content')

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div x-data="heroModal()" class="p-6 space-y-10">

    {{-- ================= HERO TABLE ================= --}}
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg text-white">Hero Section</h2>
        </div>

        <table class="w-full text-sm text-left text-gray-300">

            <thead class="text-gray-400 border-b border-gray-700">
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
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

                        <td>{{ $hero->btn_primary_text }}</td>

                        <td>{{ $hero->btn_primary_link }}</td>

                        <td>{{ $hero->btn_secondary_text }}</td>

                        <td>{{ $hero->btn_secondary_link }}</td>

                        <td>
                            <img
                                src="{{ asset('storage/' . $hero->background_image) }}"
                                class="w-24 h-14 object-cover rounded">
                        </td>

                        <td class="text-right">

                            <button
                                @click="openEdit(@js($hero))"
                                class="px-3 py-1 bg-yellow-500 text-black rounded">

                                Edit

                            </button>

                        </td>

                    </tr>

                @endif

            </tbody>

        </table>

    </div>

    {{-- ================= FAQ TABLE ================= --}}
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">

        <div class="flex items-center justify-between mb-4">

            <h2 class="text-lg text-white">FAQ</h2>

            <button
                @click="openFaqCreate()"
                class="px-4 py-2 bg-green-500 text-white rounded-lg">

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

                            <button
                                @click="openFaqEdit(@js($faq))"
                                class="px-3 py-1 bg-yellow-500 text-black rounded">

                                Edit

                            </button>

                            <form
                                x-data
                                @submit.prevent="confirmDelete($el)"
                                action="/admin/faq/{{ $faq->id }}"
                                method="POST"
                                class="inline">

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
    <div
        x-show="show"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70">

        <div class="bg-white text-black w-[700px] p-6 rounded-xl max-h-[90vh] overflow-auto">

            <h2
                class="text-xl font-bold mb-5"
                x-text="modalTitle">
            </h2>

            {{-- ================= HERO FORM ================= --}}
            <template x-if="type === 'hero'">

                <form
                    :action="actionUrl"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-4">

                    @csrf

                    <template x-if="method === 'PUT'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    {{-- TITLE --}}
                    <div>
                        <label>Title</label>

                        <input
                            type="text"
                            name="title"
                            x-model="form.title"
                            class="w-full p-2 border rounded">
                    </div>

                    {{-- SUBTITLE --}}
                    <div>
                        <label>Subtitle</label>

                        <input
                            type="text"
                            name="sub_title"
                            x-model="form.sub_title"
                            class="w-full p-2 border rounded">
                    </div>

                    {{-- PAGE --}}
                    <div>
                        <label>Page</label>

                        <input
                            type="text"
                            name="page"
                            x-model="form.page"
                            class="w-full p-2 border rounded">
                    </div>

                    {{-- BUTTONS --}}
                    <div class="grid grid-cols-2 gap-4">

                        <input
                            type="text"
                            name="btn_primary_text"
                            x-model="form.btn_primary_text"
                            placeholder="Primary Text"
                            class="w-full p-2 border rounded">

                        <input
                            type="text"
                            name="btn_primary_link"
                            x-model="form.btn_primary_link"
                            placeholder="Primary Link"
                            class="w-full p-2 border rounded">

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <input
                            type="text"
                            name="btn_secondary_text"
                            x-model="form.btn_secondary_text"
                            placeholder="Secondary Text"
                            class="w-full p-2 border rounded">

                        <input
                            type="text"
                            name="btn_secondary_link"
                            x-model="form.btn_secondary_link"
                            placeholder="Secondary Link"
                            class="w-full p-2 border rounded">

                    </div>

                    {{-- IMAGE --}}
                    <div>

                        <label>Background Image</label>

                        <input
                            type="file"
                            name="background_image"
                            class="w-full p-2 border bg-white">

                    </div>

                    {{-- ACTION --}}
                    <div class="flex justify-end gap-3 pt-4">

                        <button
                            type="button"
                            @click="closeModal()"
                            class="px-4 py-2 bg-gray-300 rounded">

                            Cancel

                        </button>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-orange-500 text-white rounded">

                            Save

                        </button>

                    </div>

                </form>

            </template>

            {{-- ================= FAQ FORM ================= --}}
            <template x-if="type === 'faq'">

                <form
                    :action="actionUrl"
                    method="POST"
                    class="space-y-4">

                    @csrf

                    <template x-if="method === 'PUT'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    {{-- QUESTION --}}
                    <div>

                        <label class="block text-sm font-medium mb-1">
                            Question
                        </label>

                        <input
                            type="text"
                            name="title"
                            x-model="form.title"
                            class="w-full border p-2 rounded">

                    </div>

                    {{-- ANSWER --}}
                    <div>

                        <label class="block text-sm font-medium mb-1">
                            Answer
                        </label>

                        <textarea
                            name="answer"
                            x-model="form.answer"
                            rows="4"
                            class="w-full border p-2 rounded"></textarea>

                    </div>

                    {{-- PAGE --}}
                    <input
                        type="hidden"
                        name="page"
                        x-model="form.page">

                    {{-- ORDER --}}
                    {{-- <div>

                        <label class="block text-sm font-medium mb-1">
                            Order
                        </label>

                        <input
                            type="number"
                            name="order"
                            x-model="form.order"
                            class="w-full border p-2 rounded">

                    </div> --}}

                    {{-- ACTION --}}
                    <div class="flex justify-end gap-3 pt-4">

                        <button
                            type="button"
                            @click="closeModal()"
                            class="px-4 py-2 bg-gray-300 rounded">

                            Cancel

                        </button>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-orange-500 text-white rounded">

                            Save

                        </button>

                    </div>

                </form>

            </template>

        </div>

    </div>

</div>

{{-- ================= ALPINE ================= --}}
<script>

    function heroModal() {

        return {

            show: false,
            type: '',

            actionUrl: '',
            modalTitle: '',
            method: 'POST',

            form: {},

            // ================= HERO =================

            openEdit(hero) {

                this.type = 'hero';

                this.show = true;

                this.method = 'PUT';

                this.modalTitle = 'Edit Hero';

                this.actionUrl = `/admin/hero/${hero.id}`;

                this.form = {

                    title: hero.title || '',
                    sub_title: hero.sub_title || '',
                    page: hero.page || 'export',

                    btn_primary_text: hero.btn_primary_text || '',
                    btn_primary_link: hero.btn_primary_link || '',

                    btn_secondary_text: hero.btn_secondary_text || '',
                    btn_secondary_link: hero.btn_secondary_link || '',

                };

            },

            // ================= FAQ CREATE =================

            openFaqCreate() {

                this.type = 'faq';

                this.show = true;

                this.method = 'POST';

                this.modalTitle = 'Create FAQ';

                this.actionUrl = '/admin/faq';

                this.form = {

                    title: '',
                    answer: '',
                    // order: 0,
                    page: 'export'

                };

            },

            // ================= FAQ EDIT =================

            openFaqEdit(faq) {

                this.type = 'faq';

                this.show = true;

                this.method = 'PUT';

                this.modalTitle = 'Edit FAQ';

                this.actionUrl = `/admin/faq/${faq.id}`;

                this.form = {

                    title: faq.title || '',
                    answer: faq.answer || '',
                    order: faq.order || 0,
                    page: faq.page || 'export'

                };

            },

            // ================= CLOSE =================

            closeModal() {

                this.show = false;

                this.type = '';

                this.form = {};

            }

        }

    }

</script>

@endsection
