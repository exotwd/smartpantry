<template>
    <AppLayout title="Your Pantry">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Your Pantry
            </h2>
        </template>

        <div v-for="storedProduce in produces" :key="storedProduce.id" class="produce-item">
            <img :src="storedProduce.produce.image" alt="Produce Image" />
            <h2>{{ storedProduce.produce.name }}</h2>
            <p>{{ storedProduce.produce.description }}</p>
            <p>Quantity: {{ storedProduce.quantity }}</p>
            <p>Expires at: {{ storedProduce.expires_at }}</p>
        </div>



    </AppLayout>
</template>

<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';


defineProps<{
    produces: any[];

}>();
</script>
