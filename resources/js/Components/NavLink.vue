<script setup>
defineProps({
    icon : {
        required:true,
        type : String,
    },
    href : {
        required:true,
        type:String,
    }
})
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <li>
        <Link :href="href" class="px-3 py-2 text-sm transition hover:bg-primary-50 gap-1 flex items-center block" href="">
                    <span>
                        <i :class="icon"></i>
                    </span>
            <span>
                <slot/>
            </span>
        </Link>
    </li>

</template>

<style scoped>

</style>
