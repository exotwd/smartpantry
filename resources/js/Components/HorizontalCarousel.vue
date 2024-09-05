<!-- src/components/HorizontalCarousel.vue -->
<template>
    <div class="relative w-full overflow-x-auto py-4">
        <div ref="carousel" class="flex space-x-4 overflow-x-scroll no-scrollbar snap-x snap-mandatory scroll-smooth">
            <div v-for="(item, index) in items" :key="index"
                class="shrink-0 w-60 h-40 bg-blue-500 flex items-center justify-center text-white text-xl snap-start">
                {{ item.produce.name }}
                <br />
                Quantity
                <br />
                {{ item.quantity }}
                <br />
                Expires at
                <br />
            </div>
        </div>

        <!-- Optional: Navigation Buttons -->
        <button @click="scrollLeft"
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
            &larr;
        </button>
        <button @click="scrollRight"
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
            &rarr;
        </button>


    </div>
</template>

<script setup lang="ts">
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

defineProps<{ items: any[]; }>();


function scrollLeft() {
    this.$refs.carousel.scrollBy({
        left: -300,
        behavior: 'smooth',
    });
}
function scrollRight() {
    this.$refs.carousel.scrollBy({
        left: 300,
        behavior: 'smooth',
    });
}

</script>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
