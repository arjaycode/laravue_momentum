<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import CounterCard from '@/components/CounterCard.vue';
import { Flag, Goal, ScrollText, Users, UserX, } from 'lucide-vue-next';
import NewUsersChart from '@/components/admin/NewUsersChart.vue';
import HabitsChart from '@/components/HabitsChart.vue';
import ActiveUserChart from '@/components/admin/ActiveUserChart.vue';
import RecentUsers from '@/components/admin/RecentUsers.vue';
import BannedUsers from '@/components/admin/BannedUsers.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: 'admin/dashboard',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 sm:grid-cols-2 xl:grid-cols-5">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <CounterCard :title="'Created Habits'" :icon="Goal" :count="77" />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <CounterCard :title="'Notes Created'" :icon="ScrollText" :count="10" />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <CounterCard :title="'Total Users'" :icon="Users" :count="151" />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <CounterCard :title="'Inactive Users'" :icon="UserX" :count="11" />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <CounterCard :title="'Banned Users'" :icon="Flag" :count="15" />
                </div>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-2">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <HabitsChart />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <NewUsersChart />
                </div>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <BannedUsers />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <RecentUsers />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <ActiveUserChart />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
