<template>
  <app-layout>
    <template #bread-crumbs>
      <inertia-link :href="route('home')" style="text-decoration: none">
        <v-icon size="16" style="margin-top: -2px">home</v-icon>
      </inertia-link>
      /
      <inertia-link :href="route('viewTasks')" style="text-decoration: none">
        Tasks List
      </inertia-link>
      <span class="text-md">
                / Create Task
            </span>

      <br/>
      <inertia-link :href="route('viewTasks')" as="v-btn" class="mt-2" small
                    style="text-decoration: none">
        <v-icon>arrow_back</v-icon>
        Back
      </inertia-link>
    </template>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tasks
      </h2>
    </template>

    <!--        <v-row align="center" justify="center" align-content="center">-->
    <v-row>
      <v-col cols="12">
        <!--                <v-card class="mt-2">-->
        <v-card-title>
          Create New Task
        </v-card-title>
        <v-card-text class="pb-0">
          <v-form>
            <TaskForm
                :errors="errors"
                :form="form"
                :task_statuses='task_statuses'
                :projects='projects'

            ></TaskForm>
          </v-form>
        </v-card-text>
        <v-card-actions class="pt-0">
          <v-btn :loading="loading" dark @click="submit">Save Task</v-btn>
        </v-card-actions>
        <!--                </v-card>-->
      </v-col>

    </v-row>

  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import TaskForm from "@/System/Tasks/Views/TaskForm";

export default {
  components: {
    TaskForm,
    AppLayout,
  },
  props: ['errors','task_statuses','projects',],
  data() {
    return {
      drawer: null,
      form: this.$inertia.form({
        
        name : '',
        description : '',
        start_date : '',
        completion_date : '',
        task_status_id : '',
        project_id : '',

      }),
      loading: false
    }
  },

  methods: {
    submit() {
      this.loading = true;
      this.form
          .transform(data => ({
            ...data,
          }))
          .post(this.route('saveTask'), {
            onSuccess: () => {
              this.form.reset();
              this.$inertia.visit(route('viewTasks'))
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
