<script setup lang="js">
import AppLayout from "@/Layouts/AppLayout.vue";
import {router, useForm, usePage} from "@inertiajs/vue3";
const page = usePage();
import Badge from "primevue/badge"
import Card from 'primevue/card'
import Button from "primevue/button"
import DataTable from "primevue/datatable"
import Dialog from "primevue/dialog"
import Column from "primevue/column";
const simpanan = page.props.simpanan;
import ColumnGroup from "primevue/columngroup";
import Row from "primevue/row"
import {ref} from "vue";
import { useConfirm } from "primevue/useconfirm";
import SplitButton from "primevue/splitbutton"
import ModalTambahSimpanan from "@/Pages/Admin/Partials/ModalTambahSimpanan.vue";
const jumlah = simpanan.data.map(function(e){
    return e.jumlah;
}).reduce((a,b)=>a+b,0).toLocaleString('id-ID');
const detail = ref();
// const confirm = useConfirm();
const showDetail = ref(false)
const showModal = ref(false);
const first = ref(null)
const actions = {
    confirm : function(e){
       if(confirm("Apakah anda yakin?")) {
           router.patch(route('admin.simpanan.confirm',e.data.id));
       }
    },
    delete:(e)=>{
        if(confirm("Apakah anda yakin ingin menghapus?")){
            router.delete(route('admin.simpanan.delete',e.data.id))
        }
    },
    detail:(e)=>{
        showDetail.value = true
    detail.value = e.data;
    }
}
</script>
<template>

    <Dialog v-model:visible="showDetail" modal header="Edit Profile" :style="{ width: '25rem' }">
            <div class="bg-white">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="">
                        <p class="text-gray-700">Nama Anggota:</p>
                        <p class="font-bold">{{detail.user.name}}</p>
                    </div>
                    <div class="">
                        <p class="text-gray-700">Jenis Simpanan:</p>
                        <p class="font-bold">{{detail.jenisSimpanan.nama}}</p>
                    </div>
                    <div class="">
                        <p class="text-gray-700">Tanggal:</p>
                        <p class="font-bold">{{detail.tanggal}}</p>
                    </div>
                    <div class="">
                        <p class="text-gray-700">Satus</p>
                        <p class="font-bold">
                              <span  v-if="detail.status">
                                <Badge class="text-xs font-normal"  value="Dikonfirmasi"/>
                            </span>
                            <span   v-else>
                                <Badge  class="text-xs font-normal" severity="danger" value="Pending"/>
                            </span>
                        </p>
                    </div>
                    <div class="">
                        <p class="text-gray-700">Jumlah:</p>
                        <p class="font-bold text-green-500">Rp. {{detail.jumlah.toLocaleString('id-ID')}}</p>
                    </div>
                </div>

            </div>

    </Dialog>


    <AppLayout>
        <Card class="shadow-sm">
            <template #title>
                <div class="text-sm">List Simpanan Anda</div>
            </template>
            <template #content>
                <Button @click="showModal = !showModal" class="mb-4" label="Tambah" icon="pi pi-plus" size="small">Tambah</Button>
                <ModalTambahSimpanan v-model:visible="showModal"/>
                <DataTable class="text-sm" size="small"  :value="$page.props.simpanan.data" stripedRows tableStyle="min-width: 50rem">
                    <Column field="id" header="ID"></Column>
                    <Column field="tanggal" header="Tanggal"></Column>
                    <Column field="jenisSimpanan" header="Jenis">
                        <template #body="slotProps">
                            {{slotProps.data.jenisSimpanan.nama ?? '-'}}
                        </template>
                    </Column>
                    <Column field="status" header="Status">
                        <template #body="slotProps">
                            <span  v-if="slotProps.data.status">
                                <Badge class="text-xs font-normal"  value="Dikonfirmasi"/>
                            </span>
                            <span   v-else>
                                <Badge  class="text-xs font-normal" severity="danger" value="Pending"/>
                            </span>
                        </template>
                    </Column>

                    <Column field="user" header="Anggota">
                        <template #body="slotProps">
                            {{slotProps.data.user.name}}
                        </template>
                    </Column>
                    <Column field="jumlah" header="Jumlah">
                        <template #body="slotProps">
                            Rp.{{slotProps.data.jumlah.toLocaleString('id-ID')}}
                        </template>
                    </Column>
                    <Column field="action" header="Action">
                        <template #body="slotProps">

                            <div class="flex items-center" rounded-none>
                                <Button v-if="slotProps.data.status" @click="actions.confirm(slotProps)" class="text-xs rounded-none" text size="small" aria-label="Confirm" severity="danger" icon="pi pi-times" />
                                <Button v-else="slotProps.data.status" @click="actions.confirm(slotProps)" class="text-xs rounded-none" text size="small" aria-label="Confirm" severity="success" icon="pi pi-check" />
                                <Button class="text-xs rounded-none" text size="small" @click="actions.delete(slotProps)" severity="danger" aria-label="" icon="pi pi-trash" />
                                <Button class="text-xs rounded-none" text size="small" severity="warning" aria-label="" icon="pi pi-pencil" />
                                <Button class="text-xs rounded-none" @click="actions.detail(slotProps)" text size="small" severity="info" aria-label="" icon="pi pi-eye" />
                            </div>
                        </template>
                    </Column>
                    <ColumnGroup type="footer">
                        <Row>
                            <Column footer="Total:" :colspan="6" footerStyle="text-align:right" />
                            <Column :footer="jumlah" />
                        </Row>
                    </ColumnGroup>
                </DataTable>
            </template>
        </Card>
    </AppLayout>
</template>

