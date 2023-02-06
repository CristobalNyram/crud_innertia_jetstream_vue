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
                            <h3 class="text-lg text-gray-900">List of events</h3>
                            <!-- <p class="text-sm text-gray-600">Toma el registro correcto y ejecuta cualquier función (ver, editar o eliminar)</p> -->
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <div class="flex justify-between">
                                <input type="text" class="form-input rounded-md shadow-sm" placeholder="Buscar..." v-model="query_name">

                                <inertia-link :href="route('events.create')" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">
                                    Crear
                                </inertia-link>
                            </div>
                            <hr class="my-6">
                            <table>
                                <tr v-for="event in events">
                                    <td class="border px-4 py-2">
                                        {{ event.slug }}
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ event.name }}

                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ event.description }}

                                    </td>
                                    <td class="px-4 py-2">

                                    </td>
                                </tr>
                            </table>
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
            events: Array,
        },
        data() {
            return {
                query_name: ''
            }
        },
        watch: {
            query_name: function (value) {
                this.$inertia.replace(this.route('events.index', {name: value}))
            }
        }
    }
</script>
