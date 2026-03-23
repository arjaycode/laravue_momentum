<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { login } from '@/routes';
import Footer from '@/components/Footer.vue';
import { store } from '@/routes/register';
</script>

<template>
    <AuthBase
        title="Create an account"
        description="Enter your details below to create your account"
    >
        <Head title="Register" />

        <Form
            v-bind="store.post()"
            :reset-on-success="['password', 'password_confirmation']"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6 rounded-2xl border border-white/10 bg-gray-900/50 p-8 shadow-2xl backdrop-blur-xl sm:p-10"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="name" class="text-sm font-medium text-gray-200">Name</Label>
                    <Input
                        id="name"
                        type="text"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="name"
                        name="name"
                        placeholder="Full name"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email" class="text-sm font-medium text-gray-200">Email address</Label>
                    <Input
                        id="email"
                        type="email"
                        required
                        :tabindex="2"
                        autocomplete="email"
                        name="email"
                        placeholder="email@example.com"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="password" class="text-sm font-medium text-gray-200">Password</Label>
                    <PasswordInput
                        id="password"
                        required
                        :tabindex="3"
                        autocomplete="new-password"
                        name="password"
                        placeholder="••••••••"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation" class="text-sm font-medium text-gray-200">Confirm password</Label>
                    <PasswordInput
                        id="password_confirmation"
                        required
                        :tabindex="4"
                        autocomplete="new-password"
                        name="password_confirmation"
                        placeholder="••••••••"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.password_confirmation" />
                </div>

                <Button
                    type="submit"
                    :tabindex="5"
                    :disabled="processing"
                    data-test="register-user-button"
                    class="mt-2 w-full border-0 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold shadow-lg shadow-indigo-500/25 transition-all hover:scale-[1.02] hover:from-indigo-400 hover:to-purple-500 hover:shadow-indigo-500/40"
                >
                    <Spinner v-if="processing" class="mr-2 h-4 w-4" />
                    Create account
                </Button>
            </div>

            <div class="text-center text-sm text-gray-400">
                Already have an account?
                <TextLink
                    :href="login()"
                    :tabindex="6"
                    class="font-medium text-indigo-400 underline underline-offset-4 transition-colors hover:text-indigo-300"
                >
                    Log in
                </TextLink>
            </div>
        </Form>
    </AuthBase>
    <Footer />
</template>

<style scoped></style>