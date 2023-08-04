<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    projects: Object,
});


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <section class="text-gray-600 body-font">
                                <div class="container px-5 mx-auto">
                                    <div class="flex flex-col text-center w-full mb-20">
                                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Your Projects</h1>
<!--                                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Wha&lt;!&ndash;&ndash;&gt;tever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them.</p>-->
                                    </div>

                                    <div class="flex flex-wrap -m-2 justify-center">

                                        <div v-for="project in projects" :key="project.id" class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                                <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 title-font font-medium">Holden Caulfield</h2>
                                                    <p class="text-gray-500">UI Designer</p>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full cursor-pointer">
                                        <Link :href="route('projects.create')" class="h-full flex items-center text-center border-gray-200 border p-4 rounded-lg  hover:shadow-md">
                                            <div class="flex-grow">
                                                <h2 class="text-gray-900 title-font font-medium">+ Create Project</h2>
                                            </div>
                                        </Link>
                                    </div>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
