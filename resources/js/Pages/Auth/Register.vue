<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Arrow from "@/Svgs/Arrow.vue";
import TitleH1 from '@/Components/TitleH1.vue';
import Span from '@/Components/Span.vue';
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const step = ref(1);
</script>

<template>

    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <div>
                <AuthenticationCardLogo />
            </div>
        </template>

        <template #steps>
            <div class="w-full flex justify-between gap-12 pb-8">
                <div class="flex justify-between items-center gap-2">
                    <h1 class="px-4 py-2 bg-gray-100 rounded-xl text-gray-700 font-bold text-lg">1</h1>
                    <div class="flex flex-col">
                        <h2 class="text-sm font-bold">Credencias</h2>
                        <span class="text-xs text-gray-400">Credenciais para sua conta</span>
                    </div>
                    <Arrow :direction="'right'" />
                </div>
                <div class="flex justify-between items-center gap-2">
                    <h1 class="px-4 py-2 bg-gray-100 rounded-xl text-gray-700 font-bold text-lg">1</h1>
                    <div class="flex flex-col">
                        <h2 class="text-sm font-bold">Credencias</h2>
                        <span class="text-xs text-gray-400">Credenciais para sua conta</span>
                    </div>
                    <Arrow :direction="'right'" />
                </div>
                <div class="flex justify-between items-center gap-2">
                    <h1 class="px-4 py-2 bg-gray-100 rounded-xl text-gray-700 font-bold text-lg">1</h1>
                    <div class="flex flex-col">
                        <h2 class="text-sm font-bold">Credencias</h2>
                        <span class="text-xs text-gray-400">Credenciais para sua conta</span>
                    </div>
                    <Arrow :direction="'right'" />
                </div>
            </div>
        </template>

        <template #welcome>
            <TitleH1 value="Bem - vindo ao Agendart!" />
            <Span value="Experimente gratuitamente nossa plataforma. Não requer cartão de crédito!" class="mt-2" />
        </template>

        <form @submit.prevent="submit">
            <div v-if="step === 1">
                <div>
                    <InputLabel for="name" value="Name" :required="true" />
                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="name" placeholder="Your Name" />
                    <InputError class=" mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                        autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                        autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                        class="mt-1 block w-full" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                    <InputLabel for="terms">
                        <div class="flex items-center">
                            <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                            <div class="ms-2">
                                I agree to the <a target="_blank" :href="route('terms.show')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms
                                    of Service</a> and <a target="_blank" :href="route('policy.show')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy
                                    Policy</a>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </InputLabel>
                </div>

                <div class="flex items-center justify-end mt-4" v-if="step === 1">
                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Próximo
                    </PrimaryButton>
                </div>
                <div class="flex items-center justify-end mt-4" v-if="step === 2">
                    <Link :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </div>

        </form>
    </AuthenticationCard>
</template>
