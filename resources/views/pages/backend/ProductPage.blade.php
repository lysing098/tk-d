@extends('layouts.Backend.MainLayout')

@section('content')

    <style>
        [x-cloak] {
            display: none !important;
        }
        /* Smooth scrolling for horizontal tables on mobile */
        .table-container {
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <div x-data="productModal()" class="p-4 md:p-6 space-y-6 md:space-y-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <h1 class="text-xl md:text-2xl font-semibold text-white">Product</h1>
        </div>

        {{-- SEARCH & ADD ACTION --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            {{-- SEARCH --}}
            <form method="GET" class="flex flex-wrap md:flex-nowrap gap-2 w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                    class="flex-1 md:w-64 px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">

                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ url()->current() }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Reset
                    </a>
                @endif
            </form>

            <button @click="openCreate()" class="w-full md:w-auto px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition font-medium">
                + Add Product
            </button>
        </div>


        {{-- SUCCESS TOAST --}}
        <div x-show="toast" x-cloak x-transition
            class="fixed top-5 right-5 z-[100] bg-green-500 text-white px-5 py-3 rounded-xl shadow-2xl" x-text="toast">
        </div>

        {{-- TABLE CONTAINER --}}
        <div class="bg-gray-900 rounded-xl border border-gray-700 overflow-hidden">
            <div class="overflow-x-auto table-container">
                <table class="w-full text-sm text-gray-300 min-w-[700px]">
                    <thead class="bg-gray-800/50 border-b border-gray-700 text-gray-400">
                        <tr>
                            <th class="text-left p-4">Title</th>
                            <th class="text-left p-4">Size</th>
                            <th class="text-left p-4">Color</th>
                            <th class="text-left p-4">Images</th>
                            <th class="text-right p-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            @php
                                $colors = json_decode($product->color, true) ?? [];
                                $images = json_decode($product->images, true) ?? [];
                            @endphp
                            <tr class="border-b border-gray-800 hover:bg-white/5 transition">
                                <td class="p-4 font-medium text-white">{{ $product->title }}</td>
                                <td class="p-4">{{ $product->size }}</td>
                                <td class="p-4">
                                    <span class="capitalize">{{ implode(', ', $colors) }}</span>
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-2 flex-wrap">
                                        @foreach (array_slice($images, 0, 3) as $img)
                                            <img src="{{ asset('storage/' . $img) }}" class="w-10 h-10 rounded border border-gray-700 object-cover">
                                        @endforeach
                                        @if(count($images) > 3)
                                            <span class="text-xs text-gray-500 self-center">+{{ count($images) - 3 }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                    <button @click="openEdit(@js($product))"
                                        class="px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-md transition">
                                        Edit
                                    </button>
                                    <button @click="deleteProduct({{ $product->id }})"
                                        class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white font-medium rounded-md transition">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-500 italic">No products found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL --}}
        <div x-show="show" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">

            <div class="bg-white text-black w-full max-w-2xl rounded-2xl shadow-2xl max-h-[90vh] flex flex-col" @click.away="show = false">

                {{-- Modal Header --}}
                <div class="px-6 py-4 border-b flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800" x-text="modalTitle"></h2>
                    <button @click="show = false" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>

                {{-- Modal Body --}}
                <div class="p-6 overflow-y-auto">
                    <form id="productForm" @submit.prevent="submitForm()" class="space-y-4">
                        {{-- TITLE --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Title</label>
                            <input type="text" x-model="form.title" placeholder="Enter product title"
                                class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none transition">
                            <p x-show="errors.title" x-text="errors.title" class="text-red-500 text-xs mt-1"></p>
                        </div>

                        {{-- GRID FOR SIZE & COLOR --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- SIZE --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Size</label>
                                <select x-model="form.size" class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                                    <option value="">Select Size</option>
                                    <option value="6mm">6mm</option>
                                    <option value="8mm">8mm</option>
                                    <option value="12mm">12mm</option>
                                </select>
                                <p x-show="errors.size" x-text="errors.size" class="text-red-500 text-xs mt-1"></p>
                            </div>

                            {{-- COLOR --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Color</label>
                                <select x-model="form.color" class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                                    <option value="">Select Color</option>
                                    <option value="white">White</option>
                                    <option value="pink">Pink</option>
                                    <option value="green">Green</option>
                                </select>
                                <p x-show="errors.color" x-text="errors.color" class="text-red-500 text-xs mt-1"></p>
                            </div>
                        </div>

                        {{-- IMAGE UPLOAD --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Upload Images</label>
                            <div class="relative group cursor-pointer border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-orange-500 transition">
                                <input type="file" multiple class="absolute inset-0 opacity-0 cursor-pointer"
                                    @change="previewImages($event)">
                                <div class="text-center">
                                    <span class="text-gray-500">Click to upload or drag images here</span>
                                </div>
                            </div>
                            <p x-show="errors.images" x-text="errors.images" class="text-red-500 text-xs mt-1"></p>
                        </div>

                        {{-- IMAGE PREVIEW GRID --}}
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3 mt-2">
                            <template x-for="(img, index) in form.images" :key="index">
                                <div class="relative group">
                                    <img :src="img.preview" class="w-full aspect-square object-cover rounded-lg border shadow-sm">
                                    <button type="button"
                                        class="absolute -top-2 -right-2 bg-red-600 text-white w-6 h-6 text-xs rounded-full flex items-center justify-center shadow-lg hover:bg-red-700 transition"
                                        @click="removeImage(index)">✕</button>
                                </div>
                            </template>
                        </div>
                    </form>
                </div>

                {{-- Modal Footer --}}
                <div class="px-6 py-4 border-t bg-gray-50 flex justify-end gap-3 rounded-b-2xl">
                    <button type="button" @click="show = false"
                        class="px-5 py-2 text-gray-700 font-medium hover:bg-gray-200 rounded-lg transition">Cancel</button>
                    <button type="submit" form="productForm" :disabled="loading"
                        class="px-5 py-2 bg-orange-600 hover:bg-orange-700 text-white font-bold rounded-lg disabled:opacity-50 transition shadow-md">
                        <span x-show="!loading">Save Product</span>
                        <span x-show="loading" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>

    </div>

    {{-- Script remains largely the same, just ensured logic handles the UI states --}}
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
                    size: '',
                    color: '',
                    images: [],
                },

                openCreate() {
                    this.resetForm();
                    this.method = 'POST';
                    this.actionUrl = '/admin/product';
                    this.modalTitle = 'Create New Product';
                    this.show = true;
                },

                openEdit(product) {
                    this.resetForm();
                    this.method = 'PUT';
                    this.actionUrl = `/admin/product/${product.id}`;
                    this.modalTitle = 'Edit Product';

                    this.form.title = product.title || '';
                    this.form.size = product.size || '';

                    const colorData = typeof product.color === 'string' ?
                        JSON.parse(product.color) : (product.color || []);
                    this.form.color = colorData[0] || '';

                    const imageData = typeof product.images === 'string' ?
                        JSON.parse(product.images) : (product.images || []);
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

                    if (!this.form.title) this.errors.title = 'Title is required.';
                    if (!this.form.size) this.errors.size = 'Size is required.';
                    if (!this.form.color) this.errors.color = 'Color is required.';

                    const newImages = this.form.images.filter(i => !i.isExisting);
                    if (this.method === 'POST' && newImages.length === 0) {
                        this.errors.images = 'Please upload at least one image.';
                    }

                    if (Object.keys(this.errors).length > 0) return;

                    const fd = new FormData();
                    fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                    if (this.method === 'PUT') fd.append('_method', 'PUT');

                    fd.append('title', this.form.title);
                    fd.append('size', this.form.size);
                    fd.append('color', this.form.color);

                    newImages.forEach(img => fd.append('images[]', img.file));
                    this.form.images.filter(i => i.isExisting)
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

                        const data = await res.json();

                        if (res.ok && data.success) {
                            this.show = false;
                            this.showToast(data.message || 'Saved successfully!');
                            setTimeout(() => window.location.reload(), 1000);
                        } else if (res.status === 422) {
                            const fieldErrors = data.errors || {};
                            Object.keys(fieldErrors).forEach(key => {
                                this.errors[key] = fieldErrors[key][0];
                            });
                        } else {
                            alert(data.message || 'Something went wrong.');
                        }
                    } catch (err) {
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
                            body: new URLSearchParams({ _method: 'DELETE' }),
                        });

                        const data = await res.json();
                        if (res.ok && data.success) {
                            this.showToast('Product deleted!');
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    } catch (err) {
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
