<script setup>
defineProps({
    value: String,
    required: Boolean
});
</script>

<template>
    <label class="block font-semibold text-xs text-ag-dark">
        <span v-if="value">{{ value }}</span>
        <span v-if="required" class="text-ag-danger">*</span>
        <span v-else>
            <slot />
        </span>
    </label>
</template>
