<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'User Management',
        href: 'admin/user-management',
    },
];

interface Props {
    users: any
}

const props = defineProps<Props>();

console.log(props.users);
</script>

<template>

    <Head title="User Management" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 overflow-x-auto rounded-xl p-4">
            <Table class="">
                <TableCaption>A list of your recent invoices.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-25">
                            Id
                        </TableHead>
                        <TableHead>Name</TableHead>
                        <TableHead>Email</TableHead>
                        <TableHead>Status</TableHead class="w-25">
                        <TableHead>Role</TableHead class="w-25">
                        <TableHead class="text-center">Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="user in users" :key="user.id">
                        <TableCell class="font-medium">
                            {{user.id}}
                        </TableCell>
                        <TableCell>{{ user.name }}</TableCell>
                        <TableCell>{{ user.email }}</TableCell>
                        <TableCell>{{ user.status }}</TableCell>
                        <TableCell>{{ user.role }}</TableCell>
                        <TableCell class="text-center"><Link class="hover:text-amber-600">Edit</Link> | <Link class="hover:text-red-500">Delete</Link></TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </AppLayout>
</template>
