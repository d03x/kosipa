<script setup>
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import Dropdown from 'primevue/dropdown';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import Textarea from 'primevue/textarea';
import { useToast } from 'primevue/usetoast';

import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import {
  useForm,
  usePage,
} from '@inertiajs/vue3';

const toast = useToast()

const form = useForm({
    nama : null,
    email : null,
    jenis_kelamin : null,
    no_telepon : null,
    alamat : null,
    akun : {
        password : null,
        password_confirmed : null
    }
});
const page = usePage();
function simpan(){
    form.post(route('admin.anggota.store'),{
        onFinish:()=>{
           if(page.props.errors.success){
            visible.value=false;
            toast.add({ severity: 'success', summary: 'Berhasil', detail: 'Data anggota berhasil di simpan', life: 3000 });
           }
        }
    });
}

const visible = defineModel('visible');
</script>
<template>
    <Dialog v-model:visible="visible" modal position="top">
        <template #header>
            <div class='text-md font-semibold'>
                Tambah Data
            </div>
        </template>
        <form action="" method="POST" @submit.prevent="simpan" class="space-y-3">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <Label>Nama Lengkap</Label>
                    <InputText v-model="form.nama" class="w-full" />
                    <InputError :message="$page.props.errors.nama"/>
                </div>
                <div>
                    <Label>Jenis Kelamin</Label>
                    <Dropdown v-model="form.jenis_kelamin" :options="['L', 'P']" class="w-full" />
                    <InputError :message="$page.props.errors.jenis_kelamin"/>
                </div>
            </div>
            <div>
                <Label>No. Telepon</Label>
                <InputText v-model="form.no_telepon" class="w-full" placeholder="No telepon"/>
                <InputError :message="$page.props.errors.no_telepon"/>
            </div>
            <div>
                <Label>Email</Label>
                <InputText v-model="form.email" type="email" class="w-full" placeholder="Email"/>
                <InputError :message="$page.props.errors.email"/>
            </div>
            <div>
                <Label>Alamat</Label>
                <Textarea v-model="form.alamat" class="w-full" placeholder="Ketikan Alamat"/>
                <InputError :message="$page.props.errors.alamat"/>
            </div>
            <span class="block font-semibold text-sm">AKUN</span>
          <div class="grid grid-cols-2 gap-3">
            <div>
                <Label>Password</Label>
                <InputText type="password" :feedback="false" v-model="form.akun.password" class="w-full block" placeholder="Buat password"/>
                <InputError :message="$page.props.errors['akun.password']"/>
            </div>
            <div>
                <Label>Password</Label>
                <InputText type="password" :feedback="false" v-model="form.akun.password_confirmed" class="w-full block" placeholder="Buat password"/>
            </div>
          </div>
            <div>
                <Button type="submit">Tambah</Button>
            </div>
        </form>
    </Dialog>
</template>