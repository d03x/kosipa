<script setup>
import Card from "primevue/card"
import AppLayout from "@/Layouts/AppLayout.vue";
import DataTable from "primevue/datatable"
</script>

<template>
<AppLayout>
<Card>
    <template #title>
        <div class="text-sm">List Pinjaman Anda</div>
    </template>
    <template #content>
        <DataTable>

        </DataTable>
    </template>
</Card>
</AppLayout>
</template>

<style scoped>

</style>
