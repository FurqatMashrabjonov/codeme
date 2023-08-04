<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

import {Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {assert} from "@vue/compiler-core";

const props = defineProps({
    github_repos: Array,
});

const form = useForm({
    repo: '',
    username: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <AppLayout title="Create Project">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Project
            </h2>
        </template>

        <div class="py-12 lg:w-1/2 mx-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 justify-center">
                            <section class="text-gray-600 body-font">
                                <div class="container px-5 mx-auto justify-center align-middle">
                                    <form @submit.prevent="submit">
                                        <div>
                                            <InputLabel for="repo" value="Select Github Repository" />
                                           <div class="flex">
                                               <img src="/icons/github.svg" width="40" class="mr-1" alt="">
                                               <select
                                                   ref="input"
                                                   class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                   v-model="form.repo"
                                               >
                                                   <option v-for="repo in github_repos" :key="repo.id" disabled :value="repo.clone_url">
                                                       {{repo.name}}
                                                   </option>
                                               </select>
                                           </div>
                                            <InputError class="mt-2" :message="form.errors.name" />
                                        </div>
                                        <div class="mt-4">
                                            <InputLabel for="username" value="Project's unique username" />
                                            <TextInput
                                                id="username"
                                                v-model="form.username"
                                                type="text"
                                                clas1s="mt-1 block w-4/5"
                                                required
                                                autocomplete="username"
                                            />
                                            <InputError class="mt-2" :message="form.errors.email" />
                                        </div>


                                        <div class="flex items-center justify-end mt-4">
                                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Register
                                            </PrimaryButton>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
