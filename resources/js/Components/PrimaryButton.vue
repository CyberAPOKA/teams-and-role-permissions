<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type"
        class="inline-flex items-center px-4 py-2 bg-ag-blue border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-ag-blue-200 focus:bg-ag-gray-dark active:bg-ag-dark focus:outline-none focus:ring-2 focus:ring-ag-blue focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
        <slot />
    </button>
</template>
