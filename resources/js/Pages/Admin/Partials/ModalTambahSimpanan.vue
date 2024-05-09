<script setup>
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import Dropdown from 'primevue/dropdown';
import InputNumber from 'primevue/inputnumber';
import { useToast } from 'primevue/usetoast';

import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import { useForm } from '@inertiajs/vue3';

const visible = defineModel('visible');

const simpanan = useForm({
    user_id : null,
    jumlah : 0,
    jenis_simpanan_id : null,
})
const toast = useToast()

const simpan = async () =>{
    simpanan.post(route('admin.simpanan.store'),{
        onFinish:()=> {
            toast.add({ severity: 'success', summary: 'Berhasil', detail: 'Data simpanan berhasil di simpan', life: 3000 });
            visible.value = false
        },
    });
}
</script>

<template>
    <Dialog v-model:visible="visible" modal header="Tambah Simpanan" position="top">
        <form @submit.prevent="simpan" action="" method="POST">
            <div class="mb-3">
                <Label for="jenis_simpanan" class="font-semibold w-6rem">Jenis</Label>
                <Dropdown placeholder="Pilih jenis simpanan" v-model="simpanan.jenis_simpanan_id" :options="$page.props.jenis_simpanan.data" optionLabel="nama" optionValue="id" id="jenis_simpanan" class="flex-auto w-full" autocomplete="off" />
                <InputError :message="$page.props.errors.jenis_simpanan_id"/>

            </div>
            <div class="mb-3">
                <Label for="username" class="font-semibold w-6rem">Anggota</Label>
                <Dropdown placeholder="Pilih anggota" v-model="simpanan.user_id" :options="$page.props.anggota.data" optionLabel="nama" optionValue="User.id" id="username" class="flex-auto w-full" autocomplete="off" />
                <InputError :message="$page.props.errors.user_id"/>

            </div>

            <div class="mb-3">
                <Label for="jumlah" class="font-semibold w-6rem">Jumlah</Label>
                <InputNumber class="w-full" v-model="simpanan.jumlah" inputId="currency-id" mode="currency" currency="IDR" locale="id-ID" />
                <InputError :message="$page.props.errors.jumlah"/>

            </div>

            <div class="flex justify-content-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
                <Button type="submit" label="Save"></Button>
            </div>
        </form>
    </Dialog>
</template>

<style scoped>

</style>
