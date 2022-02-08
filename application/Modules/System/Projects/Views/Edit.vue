<template>
    <app-layout>
        <template #bread-crumbs>
            <inertia-link :href="route('home')" style="text-decoration: none">
                <v-icon size="16" style="margin-top: -2px">home</v-icon>
            </inertia-link>
            /
            <inertia-link :href="route('viewProjects')" style="text-decoration: none">
                Projects List
            </inertia-link>
            <span class="text-md">
                / Edit Project
            </span>

            <br/>
            <inertia-link :href="route('viewProjects')" as="v-btn" class="mt-2" small style="text-decoration: none">
                <v-icon>arrow_back</v-icon>
                Back
            </inertia-link>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>

        <v-row align="center" justify="center" align-content="center">
            <v-col cols="8">
                <v-card class="mt-2">
                    <v-card-title>
                        EDIT Project
                    </v-card-title>
                    <v-card-text class="pb-0">
                        <v-form>
                            <v-text-field class="mb-3"
                                          hide-details="auto" :error="checkErrors('name')" :error-messages="errors.name"
                                          hint="Includes alphabets and dots(.) ex project.create"
                                          outlined dense label="Project Name" name="name" type="text" v-model="form.name"></v-text-field>

                            <v-text-field class="mb-3"
                                          hide-details="auto" :error="checkErrors('title')" :error-messages="errors.title"
                                          hint="A general name to make user understand the goal of the project"
                                          outlined dense label="Project Title" name="title" type="text" v-model="form.title"></v-text-field>
                        </v-form>
                    </v-card-text>
                    <v-card-actions class="pt-0">
                        <v-btn dark @click="submit" :loading="loading">Update Project</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>

        </v-row>

    </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    props: ['errors','project'],
    mounted() {
        console.log(this.project)
    },
    data() {
        return {
            drawer: null,
            // form: this.project,
            form: this.$inertia.form({
                id:this.project.id,
                name:this.project.name,
                title:this.project.title
            }),
            loading:false
        }
    },

    methods: {
        submit() {
            this.loading = true;
            this.form
                .transform(data => ({
                    ... data,
                }))
                .post(this.route('updateProject'), {
                    onSuccess: () => {
                        this.form.reset();
                        this.$inertia.visit(route('viewProjects'))
                    },
                    onError: () => {
                        console.log(this.errors)
                    },
                    onFinish: () => {
                        this.loading = false;
                    },
                })
        },
        checkErrors(key) {
            return this.errors[key] !== undefined;
        }
    }
}
</script>
