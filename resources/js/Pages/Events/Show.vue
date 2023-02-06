<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Module of notes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Details  of an event</h3>
                            <p class="text-sm text-gray-600"></p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <p class="text-lg text-gray-500">Name: {{ event.name }}</p>
                            <p class="text-lg text-gray-500">Slug: {{ event.slug }}</p>
                            <p class="text-lg text-gray-500">Description: {{ event.description }}</p>

                            <hr class="my-6">

                            <inertia-link :href="route('events.index')" class="bg-yellow-400 text-white font-bold py-2 px-4 rounded-md">
                                Back
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props: {
            event: Object,
        }
    }
</script>
