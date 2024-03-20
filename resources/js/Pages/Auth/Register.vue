<script setup>
import { ref, onMounted, watch } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Arrow from "@/Svgs/Arrow.vue";
import Check from "@/Svgs/Check.vue";
import TitleH1 from '@/Components/TitleH1.vue';
import Span from '@/Components/Span.vue';
import MazPhoneNumberInput from "maz-ui/components/MazPhoneNumberInput";
import { hasFlag, countries } from 'country-flag-icons'
import Dropdown from 'primevue/dropdown';
import Button from 'primevue/button';
import Languages from '@/Components/Languages.vue';

const step = ref(1);
const countryCode = ref('BR');

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
    professional_type: '',
    country_code: countryCode.value,
    phone: '',
    how_meet_us: ''
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />

    <div class="flex flex-col gap-1 fixed right-5 top-5">
        <Languages @clearErrors="form.clearErrors()" />
    </div>

    <AuthenticationCard>
        <template #logo>
            <div>
                <AuthenticationCardLogo />
            </div>
        </template>

        <template #steps>
            <div class="w-full flex justify-between gap-12 pb-8">
                <div class="flex justify-between items-center gap-2">
                    <h1 class="h-12 w-12 flex justify-center items-center rounded-xl font-bold text-lg"
                        :class="{ 'bg-ag-blue-light text-ag-blue': step === 1, 'bg-ag-green-light': step > 1 }">
                        <span v-if="step === 1">1</span>
                        <Check :fillColor="'ag-light'" :strokeColor="'ag-green-success'" :strokeWidth="'3'" v-else />
                    </h1>

                    <div class="flex flex-col">
                        <h2 class="text-sm font-bold">Credencias</h2>
                        <span class="text-xs text-gray-400">Credenciais para sua conta</span>
                    </div>
                    <Arrow :direction="'right'" />
                </div>
                <div class="flex justify-between items-center gap-2">
                    <h1 class="h-12 w-12 flex justify-center items-center rounded-xl font-bold text-lg"
                        :class="{ 'bg-ag-blue-light text-ag-blue': step === 2, 'bg-ag-green-light': step > 2, 'bg-ag-light text-ag-gray-dark': step < 2 }">
                        <span v-if="step <= 2">2</span>
                        <Check :fillColor="'ag-light'" :strokeColor="'ag-green-success'" :strokeWidth="'3'" v-else />
                    </h1>
                    <div class="flex flex-col">
                        <h2 class="text-sm font-bold">Seu Perfil</h2>
                        <span class="text-xs text-gray-400">Credenciais para sua conta</span>
                    </div>
                    <Arrow :direction="'right'" />
                </div>
                <div class="flex justify-between items-center gap-2">
                    <h1 class="h-12 w-12 flex justify-center items-center bg-ag-light rounded-xl font-bold text-lg">
                        3
                    </h1>
                    <div class="flex flex-col">
                        <h2 class="text-sm font-bold">Começar o Teste</h2>
                        <span class="text-xs text-gray-400">Experimente o Agendart</span>
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
            <div v-if="step === 1" class="grid lg:grid-cols-2 gap-x-4 gap-y-4 lg:gap-y-8">

                <div>
                    <InputLabel for="name" :value="$t('name')" :required="true" />
                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" autofocus
                        autocomplete="name" placeholder="Your Name" />
                    <InputError class=" mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <InputLabel for="email" value="Email" :required="true" />
                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full"
                        autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="password" value="Password" :required="true" />
                    <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full"
                        autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div>
                    <InputLabel for="password_confirmation" value="Confirm Password" :required="true" />
                    <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
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
            </div>
            <div v-if="step === 2" class="grid gap-y-4 lg:gap-y-8">
                <div>
                    <InputLabel for="professional_type" value="Tipo de Profissional" :required="true" />
                    <select id="professional_type" v-model="form.professional_type" placeholder="Selecione..."
                        class="mt-1 block w-full border bg-ag-light border-ag-light rounded-md text-xs placeholder:text-xs p-3"
                        required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="dentist">Dentista</option>
                        <option value="physiotherapist">Fisioterapeuta</option>
                        <option value="ppeech therapist">Fonoaudiólogo</option>
                        <option value="doctor">Médico</option>
                        <option value="nutritionist">Nutricionista</option>
                        <option value="psychoanalyst">Psicanalista</option>
                        <option value="psychologist">Psicólogo</option>
                        <option value="therapist">Terapeuta</option>
                        <option value="other">Outro</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.professional_type" />
                </div>
                <div>
                    <InputLabel for="phone" value="Telefone" :required="true" />
                    <MazPhoneNumberInput id="phone" v-model="form.phone" v-model:country-code="countryCode"
                        show-code-on-list @update="results = $event" no-validation-success no-validation-error>
                        <template #selector-flag="{ countryCode }">
                            <img :src="`http://purecatamphetamine.github.io/country-flag-icons/3x2/${countryCode}.svg`"
                                :alt="countryCode" style="width: 20px; height: 15px;">
                        </template>
                        <template #country-list-flag="{ countryCode }">
                            <img :src="`http://purecatamphetamine.github.io/country-flag-icons/3x2/${countryCode}.svg`"
                                :alt="countryCode" style=" width: 26px; height: 20px;">
                        </template>
                    </MazPhoneNumberInput>
                </div>
                <div>
                    <InputLabel for="how_meet_us" value="Como conheceu?" />
                    <select id="how_meet_us" v-model="form.how_meet_us" placeholder="Selecione..."
                        class="mt-1 block w-full border bg-ag-light border-ag-light rounded-md text-xs placeholder:text-xs p-3">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="google">Google</option>
                        <option value="friend">Colega/Amigo</option>
                        <option value="email">Email</option>
                        <option value="partner program">Programa de Parceiros</option>
                        <option value="social network">Rede Social</option>
                        <option value="youtube">YouTube</option>
                        <option value="other">Outro</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.how_meet_us" />
                </div>
            </div>
            <div class="flex items-center justify-end mt-4" v-if="step === 1">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                    type="submit">
                    Próximo
                </PrimaryButton>
                <Button label="Submit" @click="step++" />
            </div>
            <div class="flex items-center justify-between mt-4" v-if="step > 1">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="step--">
                    Voltar
                </PrimaryButton>
                <PrimaryButton v-if="step === 2" class="ms-4" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Próximo
                </PrimaryButton>
            </div>
            <!-- <Link :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Already registered?
            </Link> -->
        </form>
    </AuthenticationCard>
</template>
<style>
.m-phone-number-input__country-flag {
    position: absolute;
    bottom: 5;
    left: 0;
    margin-bottom: 7px !important;
}

.m-phone-number-input__select .m-select-input .maz-rounded {
    background-color: #e7e9ec !important;
}

.m-input-wrapper {
    background-color: #F3F6F9 !important;
}

.--default-border {
    border: none !important;
}

.maz-rounded {
    border-radius: 0.3rem !important;
}
</style>