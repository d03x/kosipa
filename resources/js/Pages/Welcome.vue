<script setup>
import Button from 'primevue/button';
import Calendar from 'primevue/calendar';
import Card from 'primevue/card';
import Dropdown from 'primevue/dropdown';

import Container from '@/Components/Container.vue';
import { useForm } from '@inertiajs/vue3';

const tikets = useForm({
    jenis_tiket: null,
});
</script>
<template>
    <Container>
        <Card class="max-w-xl mx-auto">
            <template #title>E-Tiket Ancol</template>
            <template #subtitle> Pemesanan tiket online ancol </template>
            <!-- end:content -->
            <template #content>
                <!-- Pilih Tipe Tiket -->
                <div>
                    <label class="text-sm font-bold text-surface-500" for="tipe"
                        >Jenis Tiket</label
                    >
                    <div class="grid grid-cols-2 gap-3">
                        <button
                            @click="tikets.jenis_tiket = 'perorangan'"
                            :class="`w-full transition active:bg-primary-50 focus:bg-primary-100 p-3 bg-white rounded-lg ring-1 ring-primary ${
                                tikets.jenis_tiket === 'perorangan'
                                    ? 'bg-primary-100'
                                    : 'bg-white'
                            }`"
                        >
                            Perorangan
                        </button>
                        <button
                            @click="tikets.jenis_tiket = 'rombongan'"
                            :class="`w-full transition active:bg-primary-50 focus:bg-primary-100 p-3 bg-white rounded-lg ring-1 ring-primary ${
                                tikets.jenis_tiket === 'rombongan'
                                    ? 'bg-primary-100'
                                    : 'bg-white'
                            }`"
                        >
                            Rombongan
                        </button>
                    </div>
                </div>
                <!-- End:pilih tipe tiket -->
                <div v-show="tikets.jenis_tiket">
                    <div class="my-4">
                        <!-- Form Isi Data -->
                        <form action="">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="grid grid-cols-1">
                                    <label for="tanggal">Tanggal Masuk</label>
                                    <Calendar />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="tanggal">Tanggal Masuk</label>
                                    <Calendar timeOnly/>
                                </div>
                            </div>
                        </form>
                        <!-- Form Isi Data -->
                    </div>
                </div>
            </template>
            <!-- end:content -->
            <template #footer>
                <Button>Bayar</Button>
            </template>
        </Card>
    </Container>
</template>
