<script setup>
import { Link } from '@inertiajs/vue3';
import Logo from '@/Assets/Images/logo.webp';
import FullLogo from '@/Assets/Images/full-logo.webp';
</script>

<template>
    <Link :href="'/'">
    <img :src="Logo" alt="" class="w-32 h-32" v-if="$page.url === '/login'">
    <img :src="FullLogo" alt="" class="w-44 flex items-start" v-if="$page.url === '/register'">
    </Link>
</template>