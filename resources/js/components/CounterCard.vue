<script setup lang="ts">
interface Props {
  title: string;
  icon: Object | Function;
  count: string | number;
}
defineProps<Props>();


</script>

<template>
  <div class="absolute top-0 left-0 right-0 bottom-0 bg-white dark:bg-[#1a1a1a] p-4 flex flex-col">
    <div class="flex flex-1 justify-between items-center">
      <span class="text-slate-700 dark:text-amber-50 md:text-xs sm:text-lg font-semibold">{{title}}</span>
      <div class="p-2 bg-slate-200 dark:bg-[#2d2d2d] rounded-lg">
        <component :is="icon" :size="24" :stroke-width="2"/>
      </div>
    </div>
    <div class="text-3xl font-semibold">
      {{count}}
    </div>
  </div>
</template>