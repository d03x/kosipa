<script setup lang="js">
import Avatar from 'primevue/avatar';

import Container from '@/Components/Container.vue';
import Logo from '@/Static/logo1.png';
</script>
<template>
    <nav class="bg-white shadow-md">
        <Container>
           <div class="flex items-center justify-between h-16">
                <div class="flex items-center justify-start gap-2">
                    <img class="w-14 aspect-square" :src="Logo" alt="">
                    <div class="flex items-start justify-start flex-col">
                        <span class="font-bold">E-Kosipa</span>
                        <span class="text-xs">Koperasi Simpan Pinjam Digital</span>
                    </div>
                </div>
                <div>
                    <Avatar :src="Logo"/>
                </div>
           </div>
        </Container>
    </nav>
</template>