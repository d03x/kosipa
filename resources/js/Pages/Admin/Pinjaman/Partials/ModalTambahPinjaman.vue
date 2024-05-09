<script setup>
//=============================================
import Dialog from "primevue/dialog";
import Dropdown from "primevue/dropdown";
import Label from "@/Components/Label.vue"
import InputText from "primevue/inputtext"
import {useForm} from "@inertiajs/vue3";
const visible = defineModel('visible');
import InputNumber from "primevue/inputnumber"
import TextArea from "primevue/textarea"
import Button from "primevue/button"
//####################FORM######################
const form = useForm({
    user_id : 1,
    jumlah:0,
    bunga : 0,
    tenor : 1,
    biaya_admin : 0,
    keterangan : '',
})
//##############VARIABEL####################
const tenor = [
 {
    key : 12,
    value : "12 Bulan"
}, {
        key: 18,
        value: "18 Bulan"
    }, {
        key: 24,
        value: "24 Bulan"
    }, {
        key: 48,
        value: "48 Bulan"
    }

];
const simpan = ()=>{
    form.post(route('admin.pinjaman.simpan'))
}
</script>

<template>
    <Dialog v-model:visible="visible" header="Dadan" modal position="top">
        <form @submit.prevent="simpan" action="" maximize method="POST">
            <div>
                <Label>Anggota</Label>
                <Dropdown class="w-full" v-model="form.user_id" optionLabel="nama" optionValue="User.id" :options="$page.props.anggota.data"/>
            </div>
            <div>
                <Label>Jumlah Pinjaman</Label>
                <InputNumber class="w-full" v-model="form.jumlah" inputId="currency-id" mode="currency" currency="IDR" locale="id-ID" />
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <Label>Bunga / Tahun</Label>
                    <InputText type="text" class="w-full" v-model="form.bunga"/>
                </div>  <div>
                    <Label>Tenor</Label>
                    <Dropdown :options="tenor" optionLabel="value" optionValue="key" class="w-full" v-model="form.tenor"/>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div>
                    <Label>Biaya Admin</Label>
                    <InputNumber class="w-full" v-model="form.biaya_admin" inputId="currency-id" mode="currency" currency="IDR" locale="id-ID" />
                </div>

            </div>
            <div>
                <Label>Keterangan</Label>
                <TextArea class="w-full" v-model="form.keterangan" />
            </div>
            <Button type="submit">Simpan</Button>
        </form>
    </Dialog>
</template>

<style scoped>

</style>
