<script setup>

import Navbar from "@/Pages/Partials/Navbar.vue";
import Container from "@/Components/Container.vue";
import Button from "primevue/button";
import SidebarMenu from "@/Pages/Partials/SidebarMenu.vue";
import Card from "primevue/card";
import StatistikAnggota from "@/Pages/Partials/StatistikAnggota.vue";
</script>

<template>
    <Navbar/>
    <Container>
        <SidebarMenu/>
        <!-- Halaman Pemesanan -->
        <div class="sm:ml-[15em] mt-3 rounded-lg">
            <slot/>
        </div>
        <!-- Halaman Pemesanan -->
    </Container>
</template>

<style scoped>

</style>
