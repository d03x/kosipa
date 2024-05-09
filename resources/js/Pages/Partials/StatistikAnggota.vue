<script setup>
import {usePage} from "@inertiajs/vue3";

const statistik = usePage().props.statistik;


</script>
<template>
         <div class="shadow-sm bg-white rounded p-6">
                <div class="grid grid-cols-2 gap-5 sm:grid-cols-3">
                    <div class="text-primary-500">
                        <span class="text-xs">SIMPANAN</span>
                        <div class="flex items-center gap-4">
                            <div class="flex gap-1 items-center">
                            <i class="pi pi-file-arrow-up text-xl font-semibold"></i>
                            <h2 class="text-xl font-semibold">Rp. {{statistik.jumlah_simpanan.toLocaleString('id-ID')}}</h2>
                        </div>
                        </div>
                    </div>
                    <div class="text-orange-500">
                        <span class="text-xs">PINJAMAN</span>
                        <div class="flex items-center gap-4">
                            <div class="flex gap-1 items-center">
                            <i class="pi pi-wallet text-xl font-semibold"></i>
                            <h2 class="text-xl font-semibold">Rp. 190.000</h2>
                        </div>
                        </div>
                    </div>
                    <div class="text-purple-500">
                        <span class="text-xs">ANGSURAN</span>
                        <div class="flex items-center gap-4">
                            <div class="flex gap-1 items-center">
                            <i class="pi pi-wallet text-xl font-semibold"></i>
                            <h2 class="text-xl font-semibold">Rp. 190.000</h2>
                        </div>
                        </div>
                    </div>
                </div>
               </div>
</template>
