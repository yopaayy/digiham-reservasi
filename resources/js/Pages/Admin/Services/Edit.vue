<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    service: Object,
});

const form = useForm({
    name: props.service.name,
    description: props.service.description,
    price: props.service.price,
    duration: props.service.duration,
});

const submit = () => {
    form.put(route("admin.services.update", props.service.id));
};
</script>

<template>
    <Head title="Edit Layanan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                🔨 Edit Layanan: {{ service.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white shadow-sm border border-gray-100 sm:rounded-2xl p-8"
                >
                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700"
                                >Nama Layanan</label
                            >
                            <input
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            />
                            <div
                                v-if="form.errors.name"
                                class="text-red-500 text-xs mt-1"
                            >
                                {{ form.errors.name }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700"
                                >Deskripsi</label
                            >
                            <textarea
                                v-model="form.description"
                                rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            ></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Harga (Rp)</label
                                >
                                <input
                                    v-model="form.price"
                                    type="number"
                                    class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                />
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Durasi (Menit)</label
                                >
                                <input
                                    v-model="form.duration"
                                    type="number"
                                    class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                />
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end pt-4 border-t gap-4"
                        >
                            <Link
                                :href="route('admin.services.index')"
                                class="text-sm text-gray-600 hover:underline"
                                >Batal</Link
                            >
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition disabled:opacity-50"
                            >
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
