<script setup>
import {useForm} from "@inertiajs/vue3";

const showModal = defineModel('showModal');
import Dialog from "primevue/dialog"
import Label from "@/Components/Label.vue"
import Button from "primevue/button"
import Dropdown from "primevue/dropdown"
import InputNumber from 'primevue/inputnumber'
import InputMask from "primevue/inputmask"
import InputError from "@/Components/InputError.vue"
import TextArea from "primevue/textarea"
import {ref, watch} from "vue";
//const data
const data = useForm({
    jumlah:0,
    jenis_simpanan_id : null,
    keterangan : "-",
});


const simpan = async () => {
    data.post(route('anggota.simpanan.store'),{
        onFinish:()=> {
            showModal.value = false;
            data.reset();
        },
    });
}
</script>

<template>
    <Dialog  position="top" v-model:visible="showModal" maximizable modal header="Tambah Simpanan Baru" :style="{ width: '30rem' }" :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
        <form @submit.prevent="simpan" action="" method="POST">
            <div class="mb-3">
                <Label>Jumlah</Label>
                <InputNumber class="w-full" v-model="data.jumlah"  mode="currency" currency="IDR" locale="id-ID" />
                <InputError :message="$page.props.errors.jumlah"/>
            </div>
            <div>
                <Label>Jenis Pinjaman</Label>
                <Dropdown optionLabel="nama" optionValue="id" :options="$page.props.jenisSimpanan.data" class="w-full" v-model="data.jenis_simpanan_id"/>
                <InputError :message="$page.props.errors.jenis_simpanan_id"/>
            </div>
            <div>
                <Label>Catatan</Label>
                <TextArea class="w-full" v-model="data.keterangan"/>
                <InputError :message="$page.props.errors.keterangan"/>
            </div>
            <div class="mt-4">
                <Button type="submit">Simpan</Button>
            </div>
        </form>
    </Dialog>
</template>

<style scoped>

</style>
