<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { register } from '@/routes';

import { request } from '@/routes/password';
import Footer from '@/components/Footer.vue';
import { store } from '@/routes/login';

defineProps<{
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
}>();
</script>

<template>
    <AuthBase
        title="Log in to your account"
        description="Enter your email and password below to log in"
    >
        <Head title="Log in" />

        <div
            v-if="status"
            class="mb-4 rounded-lg bg-green-500/10 p-3 text-center text-sm font-medium text-emerald-400 border border-green-500/20"
        >
            {{ status }}
        </div>

        <Form
            v-bind="store.post()"
            :reset-on-success="['password']"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6 rounded-2xl border border-white/10 bg-gray-900/50 p-8 shadow-2xl backdrop-blur-xl sm:p-10"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email" class="text-sm font-medium text-gray-200">Email address</Label>
                    <Input
                        id="email"
                        type="email"
                        name="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        placeholder="email@example.com"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="password" class="text-sm font-medium text-gray-200">Password</Label>
                        <TextLink
                            v-if="canResetPassword"
                            :href="request()"
                            class="text-sm font-medium text-indigo-400 transition-colors hover:text-indigo-300"
                            :tabindex="5"
                        >
                            Forgot password?
                        </TextLink>
                    </div>
                    <PasswordInput
                        id="password"
                        name="password"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.password" />
                </div>

                <div class="flex items-center justify-between">
                    <Label for="remember" class="flex items-center space-x-2 text-sm text-gray-300 cursor-pointer">
                        <Checkbox 
                            id="remember" 
                            name="remember" 
                            :tabindex="3" 
                            class="border-white/20 bg-black/20 data-[state=checked]:bg-indigo-500 data-[state=checked]:border-indigo-500"
                        />
                        <span>Remember me</span>
                    </Label>
                </div>

                <Button
                    type="submit"
                    class="mt-4 w-full border-0 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold shadow-lg shadow-indigo-500/25 transition-all hover:scale-[1.02] hover:from-indigo-400 hover:to-purple-500 hover:shadow-indigo-500/40"
                    :tabindex="4"
                    :disabled="processing"
                    data-test="login-button"
                >
                    <Spinner v-if="processing" class="mr-2 h-4 w-4" />
                    Log in
                </Button>
            </div>

            <div
                class="text-center text-sm text-gray-400"
                v-if="canRegister"
            >
                Don't have an account?
                <TextLink 
                    :href="register()" 
                    :tabindex="5" 
                    class="font-medium text-indigo-400 underline underline-offset-4 transition-colors hover:text-indigo-300"
                >
                    Sign up
                </TextLink>
            </div>
        </Form>
    </AuthBase>
    <Footer />
</template>