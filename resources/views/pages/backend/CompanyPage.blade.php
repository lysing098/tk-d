@extends('layouts.Backend.MainLayout')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div x-data="companyModal()" class="p-6 space-y-10">

        {{-- HEADER --}}
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-white">Company</h1>

            <button @click="openCreate()" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                + Add Company
            </button>
        </div>

        {{-- TOAST --}}
        <div x-show="toast" x-cloak x-transition
            class="fixed top-5 right-5 z-50 bg-green-500 text-white px-5 py-3 rounded shadow-lg" x-text="toast">
        </div>

        {{-- TABLE --}}
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">

            <table class="w-full text-sm text-gray-300">
                <thead class="border-b border-gray-700 text-gray-400">
                    <tr>
                        <th class="py-2 text-left">Title</th>
                        <th class="py-2 text-left">Email</th>
                        <th class="py-2 text-left">Tel</th>
                        <th class="py-2 text-left">Description</th>
                        <th class="py-2 text-left">Location</th>
                        <th class="py-2 text-right">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($company)
                        <tr class="border-b border-gray-800">
                            <td class="py-2">{{ $company->title }}</td>
                            <td class="py-2">{{ $company->email }}</td>
                            <td class="py-2">{{ $company->tel }}</td>
                            <td class="py-2">{{ $company->description }}</td>
                            <td class="py-2">{{ $company->location }}</td>

                            <td class="py-2 text-right space-x-2">
                                <button @click='openEdit(@json($company))'
                                    class="px-3 py-1 bg-yellow-500 text-black rounded">
                                    Edit
                                </button>

                                <button @click="deleteCompany({{ $company->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-5 text-gray-400">
                                No company found
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>

        {{-- MODAL --}}
        <div x-show="show" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70">

            <div class="bg-white text-black w-[600px] p-6 rounded-xl">

                <h2 class="text-xl font-bold mb-4" x-text="modalTitle"></h2>

                <form @submit.prevent="submitForm()">

                    <div class="space-y-3">

                        <input x-model="form.title" placeholder="Title" class="w-full border p-2 rounded">

                        <input x-model="form.email" placeholder="Email" class="w-full border p-2 rounded">

                        <input x-model="form.tel" placeholder="Tel" class="w-full border p-2 rounded">

                        <input x-model="form.location" placeholder="Location" class="w-full border p-2 rounded">

                        <textarea x-model="form.description" placeholder="Description" class="w-full border p-2 rounded"></textarea>

                    </div>

                    <p x-show="errors.title" x-text="errors.title" class="text-red-500 text-xs mt-2"></p>

                    <div class="flex justify-end gap-3 mt-5">

                        <button type="button" @click="show = false" class="px-4 py-2 bg-gray-300 rounded">
                            Cancel
                        </button>

                        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">
                            Save
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        function companyModal() {
            return {
                show: false,
                loading: false,
                toast: '',
                method: 'POST',
                actionUrl: '',
                modalTitle: '',
                errors: {},

                form: {
                    title: '',
                    description: '',
                    email: '',
                    tel: '',
                    location: ''
                },

                // ================= CREATE =================
                openCreate() {
                    this.reset();
                    this.method = 'POST';
                    this.actionUrl = '/admin/company';
                    this.modalTitle = 'Create Company';
                    this.show = true;
                },

                // ================= EDIT =================
                openEdit(company) {
                    this.reset();
                    this.method = 'PUT';
                    this.actionUrl = `/admin/company/${company.id}`;
                    this.modalTitle = 'Edit Company';

                    this.form = {
                        title: company.title ?? '',
                        description: company.description ?? '',
                        email: company.email ?? '',
                        tel: company.tel ?? '',
                        location: company.location ?? '',
                    };

                    this.show = true;
                },

                // ================= RESET =================
                reset() {
                    this.errors = {};
                    this.form = {
                        title: '',
                        description: '',
                        email: '',
                        tel: '',
                        location: ''
                    };
                },

                // ================= SUBMIT =================
                async submitForm() {

                    this.errors = {};

                    if (!this.form.title) this.errors.title = 'Title is required';
                    if (!this.form.email) this.errors.email = 'Email is required';
                    if (!this.form.tel) this.errors.tel = 'Tel is required';
                    if (!this.form.location) this.errors.location = 'Location is required';
                    if (!this.form.description) this.errors.description = 'Description is required';

                    if (Object.keys(this.errors).length > 0) return;

                    this.loading = true;

                    const fd = new FormData();

                    fd.append('title', this.form.title);
                    fd.append('description', this.form.description);
                    fd.append('email', this.form.email);
                    fd.append('tel', this.form.tel);
                    fd.append('location', this.form.location);

                    fd.append('_token',
                        document.querySelector('meta[name="csrf-token"]').content
                    );

                    if (this.method === 'PUT') {
                        fd.append('_method', 'PUT');
                    }

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
                        } catch (e) {
                            console.error('Invalid JSON response');
                        }

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
                async deleteCompany(id) {
                    if (!confirm('Delete this company?')) return;

                    const res = await fetch(`/admin/company/${id}`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: new URLSearchParams({
                            _method: 'DELETE'
                        })
                    });

                    const data = await res.json();

                    if (data.success) {
                        this.showToast('Deleted successfully');
                        setTimeout(() => location.reload(), 800);
                    }
                },

                // ================= TOAST =================
                showToast(msg) {
                    this.toast = msg;
                    setTimeout(() => this.toast = '', 3000);
                }
            }
        }
    </script>
@endsection
