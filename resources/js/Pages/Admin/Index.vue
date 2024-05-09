<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
<AppLayout>
    <div class="shadow-sm bg-white rounded p-6">
        <div class="grid grid-cols-2 gap-5 sm:grid-cols-3">
            <div class="text-primary-500">
                <span class="text-xs">Semua Simpanan</span>
                <div class="flex items-center gap-4">
                    <div class="flex gap-1 items-center">
                        <i class="pi pi-file-arrow-up text-xl font-semibold"></i>
                        <h2 class="text-xl font-semibold">Rp. {{$page.props.statistik.jumlah_simpanan.toLocaleString('id-ID')}}</h2>
                    </div>
                </div>
            </div>
            <div class="text-orange-500">
                <span class="text-xs">Semua Simpanan</span>
                <div class="flex items-center gap-4">
                    <div class="flex gap-1 items-center">
                        <i class="pi pi-wallet text-xl font-semibold"></i>
                        <h2 class="text-xl font-semibold">Rp. 190.000</h2>
                    </div>
                </div>
            </div>
            <div class="text-purple-500">
                <span class="text-xs">Total Anggota</span>
                <div class="flex items-center gap-4">
                    <div class="flex gap-1 items-center">
                        <i class="pi pi-users text-xl font-semibold"></i>
                        <h2 class="text-xl font-semibold">{{$page.props.statistik.jumlah_anggota}}</h2>
                    </div>
                </div>
            </div>
            <div class="text-purple-500">
                <span class="text-xs">Angsuran Belum Di bayar</span>
                <div class="flex items-center gap-4">
                    <div class="flex gap-1 items-center">
                        <i class="pi pi-wallet text-xl font-semibold"></i>
                        <h2 class="text-xl font-semibold">Rp. 190.000</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</AppLayout>
</template>

<style scoped>

</style>
