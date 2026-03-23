<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { login } from '@/routes';
import { email } from '@/routes/password';

defineProps<{
    status?: string;
}>();
</script>

<template>
    <AuthLayout
        title="Forgot password"
        description="Enter your email to receive a password reset link"
    >
        <Head title="Forgot password" />

        <div
            v-if="status"
            class="mb-6 rounded-lg border border-green-500/20 bg-green-500/10 p-3 text-center text-sm font-medium text-emerald-400"
        >
            {{ status }}
        </div>

        <div class="space-y-6 rounded-2xl border border-white/10 bg-gray-900/50 p-8 shadow-2xl backdrop-blur-xl sm:p-10">
            <Form v-bind="email.form()" v-slot="{ errors, processing }">
                <div class="grid gap-2">
                    <Label for="email" class="text-sm font-medium text-gray-200">Email address</Label>
                    <Input
                        id="email"
                        type="email"
                        name="email"
                        autocomplete="off"
                        autofocus
                        placeholder="email@example.com"
                        class="border-white/10 bg-black/20 text-white placeholder:text-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="my-6 flex items-center justify-start">
                    <Button
                        class="w-full border-0 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold shadow-lg shadow-indigo-500/25 transition-all hover:scale-[1.02] hover:from-indigo-400 hover:to-purple-500 hover:shadow-indigo-500/40"
                        :disabled="processing"
                        data-test="email-password-reset-link-button"
                    >
                        <Spinner v-if="processing" class="mr-2 h-4 w-4" />
                        Email password reset link
                    </Button>
                </div>
            </Form>

            <div class="space-x-1 text-center text-sm text-gray-400">
                <span>Or, return to</span>
                <TextLink 
                    :href="login()"
                    class="font-medium text-indigo-400 underline underline-offset-4 transition-colors hover:text-indigo-300"
                >
                    log in
                </TextLink>
            </div>
        </div>
    </AuthLayout>
</template>