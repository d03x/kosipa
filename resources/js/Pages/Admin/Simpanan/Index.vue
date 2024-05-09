<script setup lang="js">
import AppLayout from "@/Layouts/AppLayout.vue";
import {router, useForm, usePage} from "@inertiajs/vue3";
const page = usePage();
import Card from 'primevue/card'
import Button from "primevue/button"
import DataTable from "primevue/datatable"
import Column from "primevue/column";
const simpanan = page.props.simpanan;
import ColumnGroup from "primevue/columngroup";
import Row from "primevue/row"
import {ref} from "vue";
import SplitButton from "primevue/splitbutton"
import ModalTambahSimpanan from "@/Pages/Admin/Partials/ModalTambahSimpanan.vue";
const jumlah = simpanan.data.map(function(e){
    return e.jumlah;
}).reduce((a,b)=>a+b,0).toLocaleString('id-ID');


const showModal = ref(false);
const first = ref(null)
const actions = {
    confirm : function(e){
        router.patch(route('admin.simpanan.confirm',e.data.id));
    }
}
</script>
<template>
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
                    <Column field="jenisSimpanan" header="Jenis Simpanan">
                        <template #body="slotProps">
                            {{slotProps.data.jenisSimpanan.nama ?? '-'}}
                        </template>
                    </Column>
                    <Column field="status" header="Status">
                        <template #body="slotProps">
                            <span class="text-sm text-green-500" v-if="slotProps.data.status">Accepted</span>
                            <span  class="text-sm text-red-500" v-else>Pending</span>
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
                                <Button class="text-xs rounded-none" text size="small" severity="danger" aria-label="" icon="pi pi-trash" />
                                <Button class="text-xs rounded-none" text size="small" severity="warning" aria-label="" icon="pi pi-pencil" />
                                <Button class="text-xs rounded-none" text size="small" severity="info" aria-label="" icon="pi pi-eye" />
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

