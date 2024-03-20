<script setup>
import { computed } from 'vue';

const props = defineProps({
    fillColor: {
        type: String,
        default: 'ag-dark',
    },
    size: {
        type: String,
        default: '6',
    },
    strokeColor: {
        type: String,
        default: 'ag-light',
    },
    strokeWidth: {
        type: String,
        default: '2',
    }
});

const fillColor = computed(() => {
    return {
        'ag-light': '#F3F6F9',
        'ag-dark': '#181C32',
        'ag-green-light': '#C9F7F5',
        'ag-green': '#28A745',
        'ag-green-success': '#1BC5BD'
    }[props.fillColor];
});

const size = computed(() => {
    return {
        '1': 'w-1 h-1',
        '2': 'w-2 h-2',
        '3': 'w-3 h-3',
        '4': 'w-4 h-4',
        '5': 'w-5 h-5',
        '6': 'w-6 h-6',
        '7': 'w-7 h-7',
        '8': 'w-8 h-8',
        '9': 'w-9 h-9',
        '10': 'w-10 h-10',
        '11': 'w-11 h-11',
        '12': 'w-12 h-12'
    }[props.size];
});

const strokeColor = computed(() => {
    return {
        'ag-light': '#F3F6F9',
        'ag-dark': '#181C32',
        'ag-green-light': '#C9F7F5',
        'ag-green': '#28A745',
        'ag-green-success': '#1BC5BD'
    }[props.strokeColor];
});

const strokeWidth = computed(() => {
    return {
        '1': '1',
        '1.5': '1.5',
        '2': '2',
        '2.5': '2.5',
        '3': '3',
        '3.5': '3.5',
        '4': '4'
    }[props.strokeWidth];
});
</script>
<template>
    <svg :class="size" :fill="fillColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
        :stroke-width="strokeWidth" :stroke="strokeColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
    </svg>
</template>
