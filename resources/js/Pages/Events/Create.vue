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
                            <h3 class="text-lg text-gray-900">Create an event</h3>
                            <p class="text-sm text-gray-600"></p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">

                        <form @submit.prevent="submit">
                                <label class="block font-medium text-sm text-gray-700">
                                    Slug
                                </label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.slug"
                                    name="slug"

                                ></textarea>
                                <label class="block font-medium text-sm text-gray-700">
                                    Name
                                </label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    name="name"
                                    v-model="form.name"
                                ></textarea>
                                <label class="block font-medium text-sm text-gray-700">
                                    Description
                                </label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    name="description"

                                    v-model="form.description"
                                ></textarea>

                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                                >Create</button>
                            </form>

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
        },
        data () {
            return {
                form: {
                    slug: '',
                    description: '',
                    name: '',

                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post(this.route('events.store'), this.form)
            },

        }
    }
</script>
