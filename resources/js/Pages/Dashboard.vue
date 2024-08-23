<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import HorizontalCarousel from '@/Components/HorizontalCarousel.vue';


//get the items from the backend
defineProps({
    produces: Array,
    nearToExpiry: Array,
});





</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 dark:text-white">
            <!--2 by 2 grid-->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border
                        border-gray-200 dark:border-gray-700">
                        Recipes you may like
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border
                        border-gray-200 dark:border-gray-700">
                        Items close to expiry
                        <HorizontalCarousel :items="nearToExpiry" />
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border
                        border-gray-200 dark:border-gray-700">
                        Trending recipes
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border
                        border-gray-200 dark:border-gray-700">
                        Items that are low in stock
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>
