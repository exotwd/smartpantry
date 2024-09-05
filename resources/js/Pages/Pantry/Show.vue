<template>
    <AppLayout :title="produce.id">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

            </h2>
        </template>
        <div class="flex flex-wrap">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <img :src="produce.produce.image" :alt="produce.name" class="w-full h-96 object-cover rounded-md">
                </div>
                <div>
                    <p class="text-lg font-medium mb-2">Description:</p>
                    <p>{{ produce.description }}</p>

                    <p class="text-lg font-medium mb-2"></p>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);


defineProps<{ produce: any; }>();
</script>
