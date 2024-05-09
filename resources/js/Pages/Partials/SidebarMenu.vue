<script setup>
import {Link} from "@inertiajs/vue3"

</script>
<template>
    <div class="fixed sm:block hidden max-w-[220px] w-full">

    <aside class="shadow-md bg-white rounded-md">
        <h1 class="text-left px-4 pt-3 font-bold">MENU</h1>
         <ul class="flex flex-col py-4">
            <li>
                <Link :href="route('dashboard')" class="px-3 py-2 text-sm transition hover:bg-primary-50 gap-1 flex items-center block" href="">
                    <span>
                        <i class="pi pi-home"></i>
                    </span>
                    <span>Home</span>
                </Link>
            </li>
            <li>
                <Link :href="route('anggota.simpanan')" class="px-3 py-2 text-sm transition hover:bg-primary-50 gap-1 flex items-center block" href="">
                    <span>
                        <i class="pi pi-file-arrow-up"></i>
                    </span>
                    <span>Simpanan Saya</span>
                </Link>
            </li>
            <li>
                <Link :href="route('anggota.pinjaman')" class="px-3 py-2 text-sm transition hover:bg-primary-50 gap-1 flex items-center block" href="">
                    <span>
                        <i class="pi pi-arrow-circle-down"></i>
                    </span>
                    <span>Pinjaman</span>
                </Link>
            </li>
            <li>
                <a class="px-3 py-2 text-sm transition hover:bg-primary-50 gap-1 flex items-center block" href="">
                    <span>
                        <i class="pi pi-file"></i>
                    </span>
                    <span>Laporan</span>
                </a>
            </li>

         </ul>
    </aside>
    </div>
</template>
