<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { login, register } from '@/routes';
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

    <div class="relative flex min-h-screen flex-col items-center bg-gray-950 selection:bg-indigo-500 selection:text-white">
        
        <div class="my-background-element absolute inset-0 z-0 opacity-40"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-gray-950/30 via-gray-950/60 to-gray-950"></div>

        <header class="fixed left-0 right-0 top-0 z-50 flex h-20 w-full items-center justify-between border-b border-white/10 bg-black/20 px-6 backdrop-blur-md lg:px-12">
            <div class="text-xl font-black tracking-widest text-white">
                MOMENTUM
            </div>

            <nav class="flex items-center justify-end gap-3 sm:gap-4">
                <Link 
                    v-if="$page.props.auth.user" 
                    :href="$page.props.auth.user.role === 'admin' ? adminDashboard().url : userDashboard().url"
                    class="rounded-full border border-white/20 bg-white/5 px-6 py-2 text-sm font-medium text-white transition-all hover:bg-white/10 hover:border-white/30"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link 
                        :href="login()"
                        class="px-4 py-2 text-sm font-medium text-gray-300 transition-colors hover:text-white"
                    >
                        Log in
                    </Link>
                    <Link 
                        v-if="canRegister" 
                        :href="register()"
                        class="rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-2 text-sm font-medium text-white shadow-lg shadow-indigo-500/25 transition-all hover:scale-105 hover:shadow-indigo-500/40"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>

        <main class="relative z-10 flex w-full max-w-5xl flex-grow flex-col items-center justify-center px-6 pt-24 text-center">
            
            <span class="mb-6 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-indigo-300 backdrop-blur-sm">
                Welcome to
            </span>
            
            <h1 class="mb-6 text-6xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-indigo-200 via-white to-purple-300 sm:text-7xl lg:text-8xl drop-shadow-sm">
                Momentum
            </h1>
            
            <h2 class="mb-8 text-2xl font-medium leading-tight text-gray-200 sm:text-4xl">
                Build better habits, <br class="hidden sm:block" /> track your progress.
            </h2>
            
            <p class="mb-12 max-w-2xl text-lg text-gray-400 sm:text-xl">
                Join thousands of users who have transformed their
                lives through consistent habit tracking and goal achievement.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center sm:w-auto">
                 <Link 
                    v-if="!$page.props.auth.user && canRegister" 
                    :href="register()" 
                    class="rounded-full bg-white px-8 py-4 text-lg font-bold text-gray-900 shadow-xl transition-all hover:scale-105 hover:bg-gray-100"
                >
                    Start Your Journey
                 </Link>
                 <Link 
                    v-if="$page.props.auth.user" 
                    :href="$page.props.auth.user.role === 'admin' ? adminDashboard().url : userDashboard().url" 
                    class="rounded-full bg-white px-8 py-4 text-lg font-bold text-gray-900 shadow-xl transition-all hover:scale-105 hover:bg-gray-100"
                >
                    Go to Dashboard
                 </Link>
            </div>
        </main>

        <div class="relative z-10 w-full">
            <Footer />
        </div>
    </div>
</template>

<style scoped>
.my-background-element {
    background-image: url('/images/background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>