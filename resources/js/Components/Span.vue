<script setup>
defineProps({
    value: String,
})
</script>

<template>
    <span class="text-ag-muted font-semibold text-xs" v-if="value">
        {{ value }}
    </span>
</template>