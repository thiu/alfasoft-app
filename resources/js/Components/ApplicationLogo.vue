<script setup>
import { Link } from '@inertiajs/vue3';

</script>
<template>

    <Link
        :href="route('home')"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        ><img src="https://www.alfasoft.pt/assets/images/logo.png" alt=""></Link
    >


</template>
