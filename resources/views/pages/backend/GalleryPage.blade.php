@extends('layouts.Backend.MainLayout')

@section('content')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div x-data="galleryModal()" class="p-6 space-y-10">

        {{-- HEADER --}}
        <div class="flex justify-between items-center">
            <h1 class="text-2xl text-white font-semibold">Gallery Dashboard</h1>
            <button @click="openCreate()" class="px-4 py-2 bg-green-500 text-white rounded">
                + Add Gallery
            </button>
        </div>

        {{-- SUCCESS TOAST --}}
        <div x-show="toast" x-cloak x-transition
            class="fixed top-5 right-5 z-50 bg-green-500 text-white px-5 py-3 rounded shadow-lg" x-text="toast">
        </div>

        {{-- TABLE --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
            <table class="w-full text-sm text-gray-300">
                <thead class="border-b border-gray-700 text-gray-400">
                    <tr>
                        <th class="text-left py-2">Images</th>
                        <th class="text-right py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gallery as $product)
                        @php
                            $images = $product->images ?? [];
                        @endphp
                        <tr class="border-b border-gray-800">
                            <td class="py-2">
                                <div class="flex gap-2 flex-wrap">
                                    @foreach ($images as $img)
                                        <img src="{{ asset('storage/' . $img) }}" class="w-10 h-10 rounded object-cover">
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-2 text-right space-x-2">
                                <button @click="openEdit(@js($product))"
                                    class="px-3 py-1 bg-yellow-500 text-black rounded">
                                    Edit
                                </button>
                                <button @click="deletedGallery({{ $product->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-gray-400">No products found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MODAL --}}
        <div x-show="show" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70">
            <div class="bg-white text-black w-[700px] p-6 rounded-xl max-h-[90vh] overflow-auto">

                <h2 class="text-lg font-bold mb-4" x-text="modalTitle"></h2>

                <form @submit.prevent="submitForm()">



                    {{-- IMAGE UPLOAD --}}
                    <div class="mb-3">
                        <label class="font-bold">Images</label>
                        <input type="file" multiple class="w-full border p-2 mt-1 rounded"
                            @change="previewImages($event)">
                        <p x-show="errors.images" x-text="errors.images" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    {{-- IMAGE PREVIEW --}}
                    <div class="flex flex-wrap gap-3 mt-2">
                        <template x-for="(img, index) in form.images" :key="index">
                            <div class="relative">
                                <img :src="img.preview" class="w-20 h-20 object-cover rounded border">
                                <button type="button"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white w-5 h-5 text-xs rounded-full flex items-center justify-center"
                                    @click="removeImage(index)">✕</button>
                            </div>
                        </template>
                    </div>

                    {{-- ACTIONS --}}
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" @click="show = false" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                        <button type="submit" :disabled="loading"
                            class="px-4 py-2 bg-orange-500 text-white rounded disabled:opacity-50">
                            <span x-show="!loading">Save</span>
                            <span x-show="loading">Saving...</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>
    function galleryModal() {
        return {
            show: false,
            loading: false,
            method: 'POST',
            actionUrl: '',
            modalTitle: '',
            toast: '',
            errors: {},

            form: {
                images: [],
            },

            openCreate() {
                this.resetForm();

                this.method = 'POST';
                this.actionUrl = '/admin/gallery';
                this.modalTitle = 'Create Gallery';

                this.show = true;
            },

            openEdit(gallery) {
                this.resetForm();

                this.method = 'PUT';
                this.actionUrl = `/admin/gallery/${gallery.id}`;
                this.modalTitle = 'Edit Gallery';

                let imageData = [];

                try {
                    imageData = typeof gallery.images === 'string'
                        ? JSON.parse(gallery.images)
                        : (gallery.images || []);
                } catch (e) {
                    imageData = [];
                }

                this.form.images = imageData.map(path => ({
                    file: null,
                    preview: `/storage/${path}`,
                    isExisting: true,
                    path: path,
                }));

                this.show = true;
            },

            resetForm() {
                this.errors = {};

                this.form = {
                    images: [],
                };
            },

            previewImages(event) {
                Array.from(event.target.files).forEach(file => {
                    this.form.images.push({
                        file: file,
                        preview: URL.createObjectURL(file),
                        isExisting: false,
                        path: null,
                    });
                });

                event.target.value = '';
            },

            removeImage(index) {
                const img = this.form.images[index];

                if (img && !img.isExisting) {
                    URL.revokeObjectURL(img.preview);
                }

                this.form.images.splice(index, 1);
            },

            async submitForm() {
                this.errors = {};

                const newImages = this.form.images.filter(img => !img.isExisting);

                if (this.method === 'POST' && newImages.length === 0) {
                    this.errors.images = 'Please upload at least one image.';
                    return;
                }

                const fd = new FormData();

                fd.append('_token',
                    document.querySelector('meta[name="csrf-token"]').content
                );

                if (this.method === 'PUT') {
                    fd.append('_method', 'PUT');
                }

                newImages.forEach(img => {
                    fd.append('images[]', img.file);
                });

                this.form.images
                    .filter(img => img.isExisting)
                    .forEach(img => {
                        fd.append('existing_images[]', img.path);
                    });

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

            async deletedGallery(id) {

                if (!confirm('Are you sure you want to delete this gallery?')) {
                    return;
                }

                try {
                    const res = await fetch(`/admin/gallery/${id}`, {
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

                        this.showToast('Gallery deleted!');

                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }

                } catch (err) {
                    console.error(err);
                    alert('Delete failed.');
                }
            },

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
