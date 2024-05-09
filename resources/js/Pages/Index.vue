<script setup lang="js">
import Button from 'primevue/button';
import calendar from 'primevue/calendar';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';

import Container from '@/Components/Container.vue';
import StatisticCard from '@/Components/StatisticCard.vue';
import SidebarMenu from '@/Pages/Partials/SidebarMenu.vue';
import { useForm } from '@inertiajs/vue3';

import Navbar from './Partials/Navbar.vue';
import StatistikAnggota from './Partials/StatistikAnggota.vue';
import AppLayout from "@/Layouts/AppLayout.vue";

const form = useForm({
    tanggal: null,
})
</script>

<template>
 <AppLayout>
     <StatistikAnggota/>
     <Card class="mt-3 shadow-sm">
         <template #subtitle>
             <div class="flex items-center justify-between">
                 <div class="flex items-center justify-start gap-1">
                    <span>
                        <i class="pi pi-history"></i>
                    </span>
                     <span>Transaksi Terakhir</span>
                 </div>
                 <Button>
                     <i class="pi pi-refresh"></i>
                 </Button>
             </div>
         </template>
         <template #content>
             <ul class="flex flex-col gap-4">
                 <li>
                     <p class="text-sm font-semibold">29 Oktober 2023 18:00</p>
                     <div class="text-xs">
                         #TRX-11982  Melakukan transaksi simpanan sebesar Rp.50.000  Pada tanggal
                     </div>
                 </li>
                 <li>
                     <p class="text-sm font-semibold">29 Oktober 2023 18:00</p>
                     <div class="text-xs">
                         Peminjaman Rp.100.000 selamat 4 bulan
                     </div>
                 </li>

                 <li>
                     <p class="text-sm font-semibold">29 Oktober 2023 18:00</p>
                     <div class="text-xs">
                         Membayar Angsuran Rp.190.000
                     </div>
                 </li>
             </ul>
         </template>
     </Card>
 </AppLayout>
</template>
