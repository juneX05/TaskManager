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
      <inertia-link :href="route('viewProjects')" as="v-btn" class="mt-2" small
                    style="text-decoration: none">
        <v-icon>arrow_back</v-icon>
        Back
      </inertia-link>
    </template>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projects
      </h2>
    </template>

    <v-row>
      <v-col cols="8">
        <v-card class="mt-2">
          <v-card-title>
            EDIT Project
          </v-card-title>
          <v-card-text class="pb-0">
            <v-form>
              <v-row>
                <v-col cols="12">
                  <ProjectForm
                      :errors="errors"
                      :form="form"
                      :project_statuses='project_statuses'

                  ></ProjectForm>
                </v-col>
              </v-row>


            </v-form>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn :loading="loading" dark @click="submit">Update Project</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>

    </v-row>

  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import ProjectForm from "@/System/Projects/Views/ProjectForm";

export default {
  components: {
    ProjectForm,
    AppLayout,
  },
  props: ['errors', 'project', 'project_statuses',],
  mounted() {
    console.log(this.project)
  },
  data() {
    return {
      drawer: null,
      form: this.$inertia.form({
        key_id: this.project.id,
        id: this.project.id,
        
        name : this.project.name,
        description : this.project.description,
        project_status_id : this.project.project_status_id,

      }),
      loading: false,
    }
  },
  computed: {},
  methods: {
    submit() {
      this.loading = true;
      this.form
          .transform(data => ({
            ...data,
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
