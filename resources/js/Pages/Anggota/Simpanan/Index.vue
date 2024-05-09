<script setup lang="js">
import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
const page = usePage();
import Card from 'primevue/card'
import DataTable from "primevue/datatable"
import Column from "primevue/column";
const simpanan = page.props.simpanan;
import ColumnGroup from "primevue/columngroup";
import Row from "primevue/row"
import {ref} from "vue";

const jumlah = simpanan.data.map(function(e){
    return e.jumlah;
}).reduce((a,b)=>a+b,0).toLocaleString('id-ID');

const showModal = ref(false);
import Button from "primevue/button"
import ModalTambahSimpanan from "@/Pages/Anggota/Simpanan/Partials/ModalTambahSimpanan.vue";
</script>
<template>
    <AppLayout>

        <Card class="shadow-sm">
            <template #title>
                <div class="text-sm">List Simpanan Anda</div>
            </template>
            <template #subtitle>
                <Button size="small" @click="showModal = !showModal">Tambah Simpanan</Button>
            </template>
            <template #content>
                <ModalTambahSimpanan v-model:showModal="showModal"/>
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
                    <Column field="jumlah" header="Jumlah">
                        <template #body="slotProps">
                            Rp.{{slotProps.data.jumlah.toLocaleString('id-ID')}}
                        </template>
                    </Column>
                    <ColumnGroup type="footer">
                        <Row>
                            <Column footer="Total:" :colspan="4" footerStyle="text-align:right" />
                            <Column :footer="jumlah" />
                        </Row>
                    </ColumnGroup>
                </DataTable>
            </template>
        </Card>
    </AppLayout>
</template>

