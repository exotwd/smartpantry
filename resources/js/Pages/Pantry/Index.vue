<template>
    <AppLayout title="Your Pantry">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Your Pantry
            </h2>
        </template>

        <div v-for="storedProduce in   produces  " :key="storedProduce.id" class="produce-item">
            <div
                class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-[10px] border border-gray-100 bg-[#3F5B04] shadow-md">
                <div class="text-red-200 font-bold text-right mr-2 my-4">Expires {{
            dayjs(storedProduce.expires_at).fromNow()
        }}
                </div>
                <a class="relative flex h-60 overflow-hidden" href="#">
                    <img class="object-cover h-full w-full" :src="storedProduce.produce.image" alt="product image" />
                </a>
                <div class="mt-4 px-5 pb-5 z-0">
                    <h5 class="text-5xl text-white font-bold uppercase text-center">
                        {{ storedProduce.produce.name }}
                    </h5>
                    <div class="text-center text-gray-400 font-bold">
                        {{ storedProduce.produce.description }}
                    </div>
                    <div class="mt-2 mb-5 flex items-center justify-between">
                        <span class="text-3xl font-bold text-white mx-auto">{{ storedProduce.quantity }}</span>
                    </div>
                    <a href="#"
                        class="flex items-center justify-center rounded-[10px] bg-[#6A9A06] px-5 py-2.5 text-center text-sm font-medium focus:outline-none focus:ring-4 focus:ring-blue-300">
                        I used this up</a>
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


defineProps<{ produces: any[]; }>();
</script>
