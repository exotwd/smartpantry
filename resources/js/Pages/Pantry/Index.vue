<template>
    <AppLayout title="Your Pantry">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Your Pantry
            </h2>
        </template>
        <div class="flex flex-wrap">
            <div v-for="storedProduce in produces" :key="storedProduce.id" class="produce-item mx-16">
                <div
                    class="relative m-10 flex w-full max-w-md flex-col overflow-hidden rounded-[10px] border border-gray-100 bg-[#3F5B04] shadow-md">
                    <div class="text-red-200 font-bold text-right mr-2 my-4">Expires {{
                dayjs(storedProduce.expires_at).fromNow()
            }}
                    </div>
                    <a class="relative flex h-60 overflow-hidden" href="#">
                        <img class="object-cover h-full w-full" :src="storedProduce.produce.image"
                            alt="product image" />
                    </a>
                    <div class="mt-4 px-5 pb-5 z-0">
                        <h5 class="text-6xl text-white font-bold uppercase text-center mb-4">
                            {{ storedProduce.produce.name }}
                        </h5>
                        <div class="text-center text-gray-400 font-bold text-xl mb-4">
                            {{ storedProduce.produce.description }}
                        </div>
                        <div class="mt-2 flex items-center justify-between mb-4">
                            <span class="text-4xl font-bold text-white mx-auto">{{ storedProduce.quantity }}x</span>
                        </div>
                        <a :href="route('pantry.show', storedProduce.produce.id)"
                            class="flex items-center text-white justify-center rounded-[10px] bg-[#6A9A06] px-5 py-2.5 text-center text-xl font-black focus:outline-none focus:ring-4 focus:ring-blue-300">
                            I used this up</a>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);


defineProps<{ produces: any[]; }>();
</script>
