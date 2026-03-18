<script setup lang="ts">
import { Head, Link} from '@inertiajs/vue3';
import {login, register } from '@/routes';
import { dashboard as userDashboard } from '@/routes/user';
import { dashboard as adminDashboard } from '@/routes/admin';
import Footer from '@/components/Footer.vue';


withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center my-background-element">
        <header
            class="flex h-15 items-center px-5 justify-end mb-6 w-full text-sm  bg-transparent fixed top-0 left-0 right-0">
            <nav class="flex items-center justify-end gap-4">
                <Link v-if="$page.props.auth.user" :href="$page.props.auth.user.role === 'admin' ? adminDashboard().url : userDashboard().url"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
                    Dashboard
                </Link>
                <template v-else>
                    <Link :href="login()"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal bg-[#e0682b] text-[#d9d9d4] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Log in
                    </Link>
                    <Link v-if="canRegister" :href="register()"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal bg-[#570d39] text-[#cececb] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                        Register
                    </Link>
                </template>
            </nav>
        </header>
        <div class="flex-grow text-white w-full flex flex-col justify-center items-center">
            <p>welcome to</p>
            <h1 class="text-6xl font-bold mt-5 mb-7">Momentum</h1>
            <h4 class="text-4xl">Build better habits, track your progress</h4>
            <p class="text-center mt-5">Join thousands of users who have transformed their
                lives through consistent habit tracking and goal
                achievement.</p>
        </div>
        <Footer />
    </div>

</template>

<style scoped>
.my-background-element {
    background-image: url('/images/background.jpg');
    background-size: cover;
    background-position: center;
}
</style>
