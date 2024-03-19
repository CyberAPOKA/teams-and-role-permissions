<script setup>
import { computed } from 'vue';

const props = defineProps({
    fillColor: {
        type: String,
        default: 'black',
    },
    size: {
        type: String,
        default: '6',
    },
    direction: {
        type: String,
        default: 'up', // alterar direção: 'up', 'down', 'left', 'right'
    },
});

const fillColor = computed(() => ({
    'black': '#0F172A',
    'white': 'white',
    'gray': '#616161'

}[props.fillColor]));

const size = computed(() => ({
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
}[props.size]));

const rotationClass = computed(() => ({
    'up': '-rotate-90',
    'down': 'rotate-90',
    'left': 'rotate-180',
    'right': ''
}[props.direction]));

</script>

<template>
    <div :class="rotationClass">
        <svg :class="size" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
            height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                <rect fill="#000000" opacity="0.3"
                    transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                    x="7.5" y="7.5" width="2" height="9" rx="1"></rect>
                <path :fill="fillColor"
                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                    fill-rule="nonzero"
                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                </path>
            </g>
        </svg>
    </div>

</template>
