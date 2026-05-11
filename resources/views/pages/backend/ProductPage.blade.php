@extends('layouts.Backend.MainLayout')

@section('content')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div x-data="productModal()" class="p-6 space-y-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-white">Product</h1>
        </div>

        {{-- HEADER --}}
        <div class="flex justify-between items-center">
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
            <button @click="openCreate()" class="px-4 py-2 bg-green-500 text-white rounded">
                + Add Product
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
                        <th class="text-left py-2">Title</th>
                        <th class="text-left py-2">Size</th>
                        <th class="text-left py-2">Color</th>
                        <th class="text-left py-2">Images</th>
                        <th class="text-right py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        @php
                            $colors = json_decode($product->color, true) ?? [];
                            $images = json_decode($product->images, true) ?? [];
                        @endphp
                        <tr class="border-b border-gray-800">
                            <td class="py-2">{{ $product->title }}</td>
                            <td class="py-2">{{ $product->size }}</td>
                            <td class="py-2">{{ implode(', ', $colors) }}</td>
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
                                <button @click="deleteProduct({{ $product->id }})"
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

                    {{-- TITLE --}}
                    <div class="mb-3">
                        <label class="font-bold">Title</label>
                        <input type="text" x-model="form.title" placeholder="Title"
                            class="w-full border p-2 mt-1 rounded">
                        <p x-show="errors.title" x-text="errors.title" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="mb-3">
                        <label class="font-bold">Description</label>
                        <textarea x-model="form.description" placeholder="Description" class="w-full border p-2 mt-1 rounded"></textarea>
                    </div>

                    {{-- SIZE --}}
                    <div class="mb-3">
                        <label class="font-bold">Size</label>
                        <select x-model="form.size" class="w-full border p-2 mt-1 rounded">
                            <option value="">Select Size</option>
                            <option value="6mm">6mm</option>
                            <option value="8mm">8mm</option>
                            <option value="12mm">12mm</option>
                        </select>
                        <p x-show="errors.size" x-text="errors.size" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    {{-- COLOR --}}
                    <div class="mb-3">
                        <label class="font-bold">Color</label>
                        <select x-model="form.color" class="w-full border p-2 mt-1 rounded">
                            <option value="">Select Color</option>
                            <option value="white">White</option>
                            <option value="pink">Pink</option>
                            <option value="green">Green</option>
                        </select>
                        <p x-show="errors.color" x-text="errors.color" class="text-red-500 text-xs mt-1"></p>
                    </div>

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
                        <button type="button" @click="show = false"
                            class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
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
        function productModal() {
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
                    size: '',
                    color: '',
                    images: [], // { file, preview, isExisting, path }
                },

                openCreate() {
                    this.resetForm();
                    this.method = 'POST';
                    this.actionUrl = '/admin/product';
                    this.modalTitle = 'Create Product';
                    this.show = true;
                },

                openEdit(product) {
                    this.resetForm();
                    this.method = 'PUT';
                    this.actionUrl = `/admin/product/${product.id}`;
                    this.modalTitle = 'Edit Product';

                    this.form.title = product.title || '';
                    this.form.description = product.description || '';
                    this.form.size = product.size || '';

                    // color is stored as JSON array e.g. ["white"]
                    const colorData = typeof product.color === 'string' ?
                        JSON.parse(product.color) :
                        (product.color || []);
                    this.form.color = colorData[0] || '';

                    // images is stored as JSON array of paths
                    const imageData = typeof product.images === 'string' ?
                        JSON.parse(product.images) :
                        (product.images || []);
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
                        title: '',
                        description: '',
                        size: '',
                        color: '',
                        images: []
                    };
                },

                previewImages(e) {
                    Array.from(e.target.files).forEach(file => {
                        this.form.images.push({
                            file: file,
                            preview: URL.createObjectURL(file),
                            isExisting: false,
                            path: null,
                        });
                    });
                    e.target.value = '';
                },

                removeImage(index) {
                    const img = this.form.images[index];
                    if (img && !img.isExisting) URL.revokeObjectURL(img.preview);
                    this.form.images.splice(index, 1);
                },

                async submitForm() {
                    this.errors = {};

                    // Client-side validation
                    if (!this.form.title) {
                        this.errors.title = 'Title is required.';
                    }
                    if (!this.form.size) {
                        this.errors.size = 'Size is required.';
                    }
                    if (!this.form.color) {
                        this.errors.color = 'Color is required.';
                    }

                    const newImages = this.form.images.filter(i => !i.isExisting);
                    if (this.method === 'POST' && newImages.length === 0) {
                        this.errors.images = 'Please upload at least one image.';
                    }

                    if (Object.keys(this.errors).length > 0) return;

                    const fd = new FormData();
                    fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                    if (this.method === 'PUT') fd.append('_method', 'PUT');

                    fd.append('title', this.form.title);
                    fd.append('description', this.form.description || '');
                    fd.append('size', this.form.size);
                    fd.append('color', this.form.color);

                    newImages.forEach(img => fd.append('images[]', img.file));

                    this.form.images
                        .filter(i => i.isExisting)
                        .forEach(img => fd.append('existing_images[]', img.path));

                    this.loading = true;

                    try {
                        const res = await fetch(this.actionUrl, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: fd,
                        });

                        let data;
                        try {
                            data = await res.json();
                        } catch (e) {
                            data = {};
                        }

                        if (res.ok && data.success) {
                            this.show = false;
                            this.showToast(data.message || 'Saved successfully!');
                            setTimeout(() => window.location.reload(), 1000);
                        } else if (res.status === 422) {
                            // Laravel validation errors
                            const fieldErrors = data.errors || {};
                            Object.keys(fieldErrors).forEach(key => {
                                this.errors[key] = fieldErrors[key][0];
                            });
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                    } catch (err) {
                        console.error(err);
                        alert('Network error. Please try again.');
                    } finally {
                        this.loading = false;
                    }
                },

                async deleteProduct(id) {
                    if (!confirm('Are you sure you want to delete this product?')) return;

                    try {
                        const res = await fetch(`/admin/product/${id}`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: new URLSearchParams({
                                _method: 'DELETE'
                            }),
                        });

                        const data = await res.json();
                        if (res.ok && data.success) {
                            this.showToast('Product deleted!');
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    } catch (err) {
                        console.error(err);
                        alert('Delete failed.');
                    }
                },

                showToast(msg) {
                    this.toast = msg;
                    setTimeout(() => this.toast = '', 3000);
                },
            }
        }
    </script>

@endsection
