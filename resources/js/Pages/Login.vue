<script setup>
import Button from "primevue/button"
import Card from 'primevue/card'
import InputText from 'primevue/inputtext'
import Container from "@/Components/Container.vue";
import Password from "primevue/password"
import Label from "@/Components/Label.vue"
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import InputError from "@/Components/InputError.vue";
//login
const form = useForm({
    email : null,
    password : null
});

const loading = ref(false);

const login = async () =>{
    form.post('', {
        onFinish:()=>loading.value = false,
        onStart:()=>loading.value = true,
    })
}

</script>

<template>
<Container>
    <div class="mx-auto w-full sm:max-w-sm  ">
        <Card class="mt-24">
            <template #title>Login</template>
            <template #subtitle>
                <span class="text-sm">Silahkan login ke akun anda</span>
            </template>
            <template #content>
                <form action="" method="post" class="space-y-3">
                    <div class="grid grid-cols-1">
                        <Label>E-Mail</Label>
                        <InputText type="email" placeholder="Ketikan alamat email anda" v-model="form.email"/>
                        <InputError :message="$page.props.errors.email"/>
                    </div>
                    <div class="w-full">
                        <Label>Password</Label>
                        <InputText placeholder="Ketikan password" v-model="form.password" class="w-full"/>
                        <InputError :message="$page.props.errors.password"/>
                    </div>
                    <div class="mt-4">
                        <Button @click="login" :loading="loading" class="w-full block">Login</Button>
                    </div>

                </form>
            </template>
        </Card>
    </div>
</Container>
</template>

<style scoped>

</style>
