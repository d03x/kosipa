<script setup>
import {ref} from "vue";
import AppLayout from "@/Layouts/AppLayout.vue"
import Card from "primevue/card"
import Button from 'primevue/button'
//modal tambah pinjaman
const visible = ref(false)
import ModalTambahPinjaman from "@/Pages/Admin/Pinjaman/Partials/ModalTambahPinjaman.vue";
</script>

<template>
    <AppLayout>
        <Card>
            <template #title>List Pinjaman</template>
            <template #content>
                <div class="flex items-center justify-start gap-2">
                    <Button @click="visible = !visible" size="small">Tambah Baru</Button>
                    <Button size="small">Print</Button>
                </div>
                <ModalTambahPinjaman v-model:visible="visible"/>
            </template>
        </Card>
    </AppLayout>
</template>

<style scoped>

</style>
