<script setup>
import LayoutPage from '@/Layouts/LayoutPage.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    contacts: {
        type: Object
    }
});

</script>

<template>
    <Head title="Contatos" />

    <LayoutPage :canLogin="canLogin">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contatos</h2>
        </template>

        <div class="py-6">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-end">
                    <button class="mb-3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Novo
                    </button>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Telefone
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        E-mail
                                    </th>
                                    <th scope="col" class="flex justify-center px-6 py-3 font-medium">
                                        Ações
                                    </th>
                                </tr>
                             </thead>
                            <tbody>
                                <tr class="bg-neutral-primary border-b border-default" v-for="(contact, i) in contacts">
                                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                     {{ contact.id }}
                                    </th>
                                    <td class="px-6 py-4">
                                    {{ contact.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{ contact.contact }}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{ contact.email }}
                                    </td>
                                    <td class="px-6 py-4 flex justify-center px-6 py-3 font-medium">
                                        <button class="mr-2 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Editar
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                                <tr class="bg-neutral-primary border-b border-default">
                                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                        2
                                    </th>
                                    <td class="px-6 py-4">
                                        Natalia
                                    </td>
                                    <td class="px-6 py-4">
                                        +55 11 99999-9999
                                    </td>
                                    <td class="px-6 py-4">
                                        natalia@gmail.com
                                    </td>
                                    <td class="px-6 py-4 flex justify-center px-6 py-3 font-medium">
                                        <button class="mr-2 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Editar
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </LayoutPage>

</template>
