<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import HorizontalCarousel from '@/Components/HorizontalCarousel.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// Setup form data
const form = useForm({
    produceId: '',
    quantity: '',
});

// Define props
interface Produce {
    id: number;
    name: string;
}

defineProps<{
    produces: Produce[];  // List of available produces for dropdown
    nearToExpiry: any[];  // Items that are near to expiry for the carousel
}>();
</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 dark:text-white">
            <!-- 2 by 2 grid -->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border border-gray-200 dark:border-gray-700">
                        Recipes you may like
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border border-gray-200 dark:border-gray-700">
                        Items close to expiry
                        <HorizontalCarousel :items="nearToExpiry" />
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border border-gray-200 dark:border-gray-700">
                        Trending recipes
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border border-gray-200 dark:border-gray-700">
                        Items that are low in stock
                    </div>
                </div>
            </div>
        </div>

        <!-- Add items to the user's pantry -->
        <div>
            <form @submit.prevent="form.post(route('pantry.store'))">
                <div class="mt-4 text-white mx-1/4">
                    <InputLabel for="produce" value="Produce" />
                    <select id="produce" v-model="form.produceId"
                        class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option v-for="(produce, index) in produces" :key="index" :value="produce.id">
                            {{ produce.name }}
                        </option>
                    </select>

                    <InputLabel for="quantity" value="Quantity" />
                    <input id="quantity" type="number" v-model="form.quantity"
                        class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        Store item in your pantry
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
