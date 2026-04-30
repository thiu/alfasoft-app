<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import LayoutPage from '@/Layouts/LayoutPage.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { useForm } from 'laravel-precognition-vue';

const form = useForm('post', route('contacts.store'), {
    name: '',
    email: '',
    contact: '',
});


const submit = () => form.submit({
    onSuccess: () => {
        form.reset()
        router.get(route('home'))
    }
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
                     <form @submit.prevent="submit" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="name" value="Nome" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                @change="form.validate('name')"
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
                                autofocus
                                @change="form.validate('email')"
                                autocomplete="email"
                            />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div>
                            <InputLabel for="contact" value="Contato" />
                            <TextInput
                                id="contact"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.contact"
                                autofocus
                                @change="form.validate('contact')"
                                autocomplete="contact"
                            />
                            <InputError class="mt-2" :message="form.errors.contact" />
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <PrimaryButton type="submit" :disabled="form.processing">Save</PrimaryButton>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </LayoutPage>
</template>
