<script setup>
import Card from "primevue/card"
import AppLayout from "@/Layouts/AppLayout.vue";
import DataTable from "primevue/datatable"
import Column from "primevue/column"
import Row from "primevue/row";
import Button from "primevue/button"
</script>

<template>
<AppLayout>
    <Card>
        <template #title>
            <div class="text-sm">List Anggota</div>
            <Button size="small" class="text-sm mt-3">Tambah</Button>
        </template>
        <template #content>
            <DataTable :value="$page.props.anggota.data" tableStyle="min-width: 80rem"  stripedRows  size="small" class="text-sm">
                <Column field="id" header="id"></Column>
                <Column field="nama" header="Nama"></Column>
                <Column field="no_telepon" header="Nomor HP"></Column>
                <Column field="email" header="Email"></Column>
                <Column field="jenis_kelamin" header="Gender"></Column>
                <Column field="agama" header="Agama"></Column>
                <Column style="width:30%" field="User" header="User Account">
                    <template #body="slotProps">
                        <div v-if="slotProps.data.User">
                            <Button text size="small">{{slotProps.data.User.email}}</Button>
                        </div>
                        <Button v-else text size="small">Assign Account</Button>
                    </template>
                </Column>
                <Column  header="Simpanan">
                    <template #body="slotProps">
                        Rp. {{slotProps.data.User.jumlah_simpanan.toLocaleString('id-ID')}}
                    </template>
                </Column><Column header="Pinjaman">
                    <template #body="slotProps">
                        Rp. {{slotProps.data.User.jumlah_pinjaman.toLocaleString('id-ID')}}
                    </template>
                </Column>
                <Column header="Action">
                    <template #body="slotProps">
                        <div class="flex items-center" rounded-none>
                            <Button @click="actions.confirm(slotProps)" class="text-xs rounded-none"  size="small" aria-label="Confirm" severity="danger" icon="pi pi-times" />
                            <Button  @click="actions.confirm(slotProps)" class="text-xs rounded-none"  size="small" aria-label="Confirm" severity="success" icon="pi pi-check" />
                              </div>
                    </template>
                </Column>

            </DataTable>
        </template>
    </Card>
</AppLayout>
</template>

<style scoped>

</style>
