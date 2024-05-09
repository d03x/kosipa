<script setup>
defineProps({
    message : {
        required:true,
        type : String
    }
})
</script>

<template>
<span class="text-xs mt-0.5 text-red-500">{{message}}</span>
</template>

<style scoped>

</style>
