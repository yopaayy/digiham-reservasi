<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: '',
    price: '',
    duration: '',
});

const submit = () => {
    form.post(route('admin.services.store'), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Tambah Layanan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">✨ Tambah Layanan Baru</h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-2xl p-8">

                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                            <input
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm"
                                placeholder="Contoh: Konsultasi Hukum"
                            />
                            <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea
                                v-model="form.description"
                                rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm"
                                placeholder="Jelaskan detail layanan..."
                            ></textarea>
                            <div v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                                <input
                                    v-model="form.price"
                                    type="number"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm"
                                    placeholder="500000"
                                />
                                <div v-if="form.errors.price" class="text-red-500 text-xs mt-1">{{ form.errors.price }}</div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Durasi (Menit)</label>
                                <input
                                    v-model="form.duration"
                                    type="number"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm"
                                    placeholder="60"
                                />
                                <div v-if="form.errors.duration" class="text-red-500 text-xs mt-1">{{ form.errors.duration }}</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-4 border-t border-gray-100 gap-4">
                            <Link :href="route('admin.services.index')" class="text-sm text-gray-600 hover:underline">
                                Batal
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 disabled:opacity-50"
                            >
                                <span v-if="form.processing">Menyimpan...</span>
                                <span v-else>Simpan Layanan</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
