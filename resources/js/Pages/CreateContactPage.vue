<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import LayoutPage from '@/Layouts/LayoutPage.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    contact: {
        type: Object,
    }
});

const user = usePage().props.auth.user;

const form = useForm({
    name: '',
    email: '',
    contact: '',
});


</script>

<template>
    <Head title="Profile" />

    <LayoutPage>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Contato</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-end">
                    <Link :href="route('home')">
                        <button class="mb-3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voltar
                        </button>
                    </Link>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                     <form @submit.prevent="form.post(route('contacts.store'))" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="name" value="Nome" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="email"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel for="contact" value="Contato" />
                            <TextInput
                                id="contact"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.contact"
                                required
                                autofocus
                                autocomplete="contact"
                            />
                            <InputError class="mt-2" :message="form.errors.contact" />
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                            <span class="cursor-pointer inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                DELETAR
                            </span>
                        </div>
                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        ><p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                        </Transition>
                </form>
                </div>
            </div>
        </div>
    </LayoutPage>
</template>
