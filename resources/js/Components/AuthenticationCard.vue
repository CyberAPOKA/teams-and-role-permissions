<script setup>
import { ref } from 'vue';
import BgDotsWhite from '@/Assets/Backgrounds/bg-dots-white.webp';

const bgImageUrl = ref(BgDotsWhite);
</script>

<template>
    <div :style="{ backgroundImage: 'url(' + bgImageUrl + ')' }"
        class="container mx-auto min-h-screen flex flex-col sm:justify-center items-start pt-6 sm:pt-0 px-4 2xl:px-60 bg-no-repeat">
        <div>
            <slot name="logo" />
        </div>
        <div class="hidden lg:block w-full">
            <slot name="steps" />
        </div>
        <div>
            <slot name="welcome" />
        </div>
        <div class="w-full sm:max-w-7xl mt-6 bg-white">
            <slot />
        </div>
    </div>
</template>