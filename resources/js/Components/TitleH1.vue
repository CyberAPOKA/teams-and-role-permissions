<script setup>
defineProps({
    value: String,
})
</script>

<template>
    <h1 class="text-ag-dark font-semibold text-lg" v-if="value">
        {{ value }}
    </h1>
</template>