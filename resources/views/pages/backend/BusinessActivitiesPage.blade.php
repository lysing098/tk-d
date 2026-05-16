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

            {{-- CREATE BUTTON --}}
            {{-- <button
                @click="openCreate()"
                class="px-4 py-2 bg-green-500 text-white rounded-lg">

                + Create Hero

            </button> --}}

        </div>

        <div class="w-full overflow-x-auto">
    <table class="min-w-[900px] w-full text-sm text-left text-gray-300">

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

                @else

                    <tr>

                        <td colspan="8" class="text-center py-6 text-gray-400">
                            No hero found
                        </td>

                    </tr>

                @endif

            </tbody>

            </table>
</div>

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

                        <label class="block mb-1">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            x-model="form.title"
                            class="w-full p-2 border rounded">

                    </div>

                    {{-- SUBTITLE --}}
                    <div>

                        <label class="block mb-1">
                            Subtitle
                        </label>

                        <input
                            type="text"
                            name="sub_title"
                            x-model="form.sub_title"
                            class="w-full p-2 border rounded">

                    </div>

                    {{-- PAGE --}}
                    <div>

                        <label class="block mb-1">
                            Page
                        </label>

                        <input
                            type="text"
                            name="page"
                            x-model="form.page"
                            class="w-full p-2 border rounded">

                    </div>

                    {{-- BUTTONS --}}
                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="block mb-1">
                                Primary Button Text
                            </label>

                            <input
                                type="text"
                                name="btn_primary_text"
                                x-model="form.btn_primary_text"
                                class="w-full p-2 border rounded">

                        </div>

                        <div>

                            <label class="block mb-1">
                                Primary Button Link
                            </label>

                            <input
                                type="text"
                                name="btn_primary_link"
                                x-model="form.btn_primary_link"
                                class="w-full p-2 border rounded">

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="block mb-1">
                                Secondary Button Text
                            </label>

                            <input
                                type="text"
                                name="btn_secondary_text"
                                x-model="form.btn_secondary_text"
                                class="w-full p-2 border rounded">

                        </div>

                        <div>

                            <label class="block mb-1">
                                Secondary Button Link
                            </label>

                            <input
                                type="text"
                                name="btn_secondary_link"
                                x-model="form.btn_secondary_link"
                                class="w-full p-2 border rounded">

                        </div>

                    </div>

                    {{-- IMAGE --}}
                    <div>

                        <label class="block mb-1">
                            Background Image
                        </label>

                        <input
                            type="file"
                            name="background_image"
                            class="w-full p-2 border bg-white rounded">

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

            // ================= CREATE =================

            openCreate() {

                this.type = 'hero';

                this.show = true;

                this.method = 'POST';

                this.modalTitle = 'Create Hero';

                this.actionUrl = '/admin/hero';

                this.form = {

                    title: '',
                    sub_title: '',
                    page: 'activity',

                    btn_primary_text: '',
                    btn_primary_link: '',

                    btn_secondary_text: '',
                    btn_secondary_link: '',

                };

            },

            // ================= EDIT =================

            openEdit(hero) {

                this.type = 'hero';

                this.show = true;

                this.method = 'PUT';

                this.modalTitle = 'Edit Hero';

                this.actionUrl = `/admin/hero/${hero.id}`;

                this.form = {

                    title: hero.title || '',
                    sub_title: hero.sub_title || '',
                    page: hero.page || 'activity',

                    btn_primary_text: hero.btn_primary_text || '',
                    btn_primary_link: hero.btn_primary_link || '',

                    btn_secondary_text: hero.btn_secondary_text || '',
                    btn_secondary_link: hero.btn_secondary_link || '',

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
