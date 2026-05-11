@extends('layouts.Backend.MainLayout')

@section('content')

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div x-data="blogModal()" class="p-6 space-y-10">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-white">Blog Dashboard</h1>
    </div>

    {{-- SEARCH + BUTTON --}}
    <div class="flex justify-between items-center gap-4">

        <form method="GET" class="flex gap-3 w-full">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search..."
                class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700"
            >

            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                Search
            </button>

            @if(request('search'))
                <a href="{{ url()->current() }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                    Reset
                </a>
            @endif

        </form>

        <button
            @click="openCreate()"
            class="px-4 py-2 bg-green-500 text-white rounded-lg whitespace-nowrap"
        >
            + Add Blog
        </button>

    </div>

    {{-- SUCCESS TOAST --}}
    <div
        x-show="toast"
        x-cloak
        x-transition
        class="fixed top-5 right-5 z-50 bg-green-500 text-white px-5 py-3 rounded shadow-lg"
        x-text="toast"
    ></div>

    {{-- TABLE --}}
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-700 overflow-x-auto">

        <table class="w-full text-sm text-gray-300">

            <thead class="border-b border-gray-700 text-gray-400">
                <tr>
                    <th class="text-left py-3">Title</th>
                    <th class="text-left py-3">Description</th>
                    <th class="text-left py-3">Order</th>
                    <th class="text-right py-3">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($blogs as $blog)

                    <tr class="border-b border-gray-800">

                        <td class="py-3">
                            {{ $blog->title }}
                        </td>

                        <td class="py-3">
                            {{ \Illuminate\Support\Str::limit($blog->description, 80) }}
                        </td>

                        <td class="py-3">
                            {{ $blog->order }}
                        </td>

                        <td class="py-3 text-right space-x-2">

                            <button
                                @click='openEdit(@json($blog))'
                                class="px-3 py-1 bg-yellow-500 text-black rounded"
                            >
                                Edit
                            </button>

                            <button
                                @click="deleteBlog({{ $blog->id }})"
                                class="px-3 py-1 bg-red-500 text-white rounded"
                            >
                                Delete
                            </button>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-5 text-gray-400">
                            No blogs found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- MODAL --}}
    <div
        x-show="show"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70"
    >

        <div class="bg-white text-black w-[600px] p-6 rounded-xl max-h-[90vh] overflow-auto">

            <h2
                class="text-xl font-bold mb-5"
                x-text="modalTitle"
            ></h2>

            <form @submit.prevent="submitForm()">

                {{-- TITLE --}}
                <div class="mb-4">

                    <label class="font-bold block mb-1">
                        Title
                    </label>

                    <input
                        type="text"
                        x-model="form.title"
                        class="w-full border p-2 rounded"
                        placeholder="Enter title"
                    >

                    <p
                        x-show="errors.title"
                        x-text="errors.title"
                        class="text-red-500 text-xs mt-1"
                    ></p>

                </div>

                {{-- description --}}
                <div class="mb-4">

                    <label class="font-bold block mb-1">
                        description
                    </label>

                    <textarea
                        x-model="form.description"
                        rows="5"
                        class="w-full border p-2 rounded"
                        placeholder="Enter description"
                    ></textarea>

                    <p
                        x-show="errors.description"
                        x-text="errors.description"
                        class="text-red-500 text-xs mt-1"
                    ></p>

                </div>

                {{-- ORDER --}}
                <div class="mb-4">

                    <label class="font-bold block mb-1">
                        Order
                    </label>

                    <input
                        type="number"
                        x-model="form.order"
                        class="w-full border p-2 rounded"
                        placeholder="Enter order"
                    >

                    <p
                        x-show="errors.order"
                        x-text="errors.order"
                        class="text-red-500 text-xs mt-1"
                    ></p>

                </div>

                {{-- BUTTONS --}}
                <div class="flex justify-end gap-3 mt-6">

                    <button
                        type="button"
                        @click="show = false"
                        class="px-4 py-2 bg-gray-300 rounded"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        :disabled="loading"
                        class="px-4 py-2 bg-orange-500 text-white rounded disabled:opacity-50"
                    >

                        <span x-show="!loading">
                            Save
                        </span>

                        <span x-show="loading">
                            Saving...
                        </span>

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    function blogModal() {

        return {

            show: false,
            loading: false,

            method: 'POST',
            actionUrl: '',

            modalTitle: '',
            toast: '',

            errors: {},

            form: {
                title: '',
                description: '',
                order: '',
            },

            // ================= CREATE =================
            openCreate() {

                this.resetForm();

                this.method = 'POST';

                this.actionUrl = '/admin/blog';

                this.modalTitle = 'Create Blog';

                this.show = true;
            },

            // ================= EDIT =================
            openEdit(blog) {

                this.resetForm();

                this.method = 'PUT';

                this.actionUrl = `/admin/blog/${blog.id}`;

                this.modalTitle = 'Edit Blog';

                this.form.title = blog.title || '';
                this.form.description = blog.description || '';
                this.form.order = blog.order || '';

                this.show = true;
            },

            // ================= RESET =================
            resetForm() {

                this.errors = {};

                this.form = {
                    title: '',
                    description: '',
                    order: '',
                };
            },

            // ================= SUBMIT =================
            async submitForm() {

                this.errors = {};

                if (!this.form.title) {
                    this.errors.title = 'Title is required.';
                }

                if (!this.form.description) {
                    this.errors.description = 'description is required.';
                }

                if (this.form.order === '') {
                    this.errors.order = 'Order is required.';
                }

                if (Object.keys(this.errors).length > 0) {
                    return;
                }

                const fd = new FormData();

                fd.append(
                    '_token',
                    document.querySelector('meta[name="csrf-token"]').content
                );

                if (this.method === 'PUT') {
                    fd.append('_method', 'PUT');
                }

                fd.append('title', this.form.title);
                fd.append('description', this.form.description);
                fd.append('order', this.form.order);

                this.loading = true;

                try {

                    const res = await fetch(this.actionUrl, {

                        method: 'POST',

                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },

                        body: fd,
                    });

                    let data = {};

                    try {
                        data = await res.json();
                    } catch (e) {}

                    if (res.ok && data.success) {

                        this.show = false;

                        this.showToast(
                            data.message || 'Saved successfully!'
                        );

                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);

                    } else if (res.status === 422) {

                        const fieldErrors = data.errors || {};

                        Object.keys(fieldErrors).forEach(key => {
                            this.errors[key] = fieldErrors[key][0];
                        });

                    } else {

                        alert('Something went wrong.');

                    }

                } catch (err) {

                    console.error(err);

                    alert('Network error.');

                } finally {

                    this.loading = false;

                }
            },

            // ================= DELETE =================
            async deleteBlog(id) {

                if (!confirm('Are you sure you want to delete this blog?')) {
                    return;
                }

                try {

                    const res = await fetch(`/admin/blog/${id}`, {

                        method: 'POST',

                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },

                        body: new URLSearchParams({
                            _method: 'DELETE'
                        }),
                    });

                    const data = await res.json();

                    if (res.ok && data.success) {

                        this.showToast('Blog deleted!');

                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }

                } catch (err) {

                    console.error(err);

                    alert('Delete failed.');
                }
            },

            // ================= TOAST =================
            showToast(message) {

                this.toast = message;

                setTimeout(() => {
                    this.toast = '';
                }, 3000);
            },
        }
    }
</script>

@endsection
