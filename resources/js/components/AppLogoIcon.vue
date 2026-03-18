<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { Activity } from 'lucide-vue-next';
defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();
</script>

<template>
    <Activity  class="dark:text-black"/>
</template>
