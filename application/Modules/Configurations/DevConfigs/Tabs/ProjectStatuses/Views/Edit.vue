<template>
  <app-layout>
    <template #bread-crumbs>
      <inertia-link :href="route('home')" style="text-decoration: none">
        <v-icon size="16" style="margin-top: -2px">home</v-icon>
      </inertia-link>
      /
      <inertia-link :href="route('viewProjectStatuses')" style="text-decoration: none">
        ProjectStatuses List
      </inertia-link>
      <span class="text-md">
                / Edit ProjectStatus
            </span>

      <br/>
      <inertia-link :href="route('viewProjectStatuses')" as="v-btn" class="mt-2" small
                    style="text-decoration: none">
        <v-icon>arrow_back</v-icon>
        Back
      </inertia-link>
    </template>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ProjectStatuses
      </h2>
    </template>

    <v-row>
      <v-col cols="8">
        <v-card class="mt-2">
          <v-card-title>
            EDIT ProjectStatus
          </v-card-title>
          <v-card-text class="pb-0">
            <v-form>
              <v-row>
                <v-col cols="12">
                  <ProjectStatusForm
                      :errors="errors"
                      :form="form"

                  ></ProjectStatusForm>
                </v-col>
              </v-row>


            </v-form>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn :loading="loading" dark @click="submit">Update ProjectStatus</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>

    </v-row>

  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import ProjectStatusForm from "@/Configurations/DevConfigs/Tabs/ProjectStatuses/Views/ProjectStatusForm";

export default {
  components: {
    ProjectStatusForm,
    AppLayout,
  },
  props: ['errors', 'project_status', ],
  mounted() {
    console.log(this.project_status)
  },
  data() {
    return {
      drawer: null,
      form: this.$inertia.form({
        key_id: this.project_status.id,
        id: this.project_status.id,
        
        id : this.project_status.id,
        name : this.project_status.name,
        color : this.project_status.color,

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
          .post(this.route('updateProjectStatus'), {
            onSuccess: () => {
              this.form.reset();
              this.$inertia.visit(route('viewProjectStatuses'))
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
