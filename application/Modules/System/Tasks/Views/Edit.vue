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
                / Edit Task
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

    <v-row>
      <v-col cols="8">
        <v-card class="mt-2">
          <v-card-title>
            EDIT Task
          </v-card-title>
          <v-card-text class="pb-0">
            <v-form>
              <v-row>
                <v-col cols="12">
                  <TaskForm
                      :errors="errors"
                      :form="form"
                      :task_statuses='task_statuses'
                      :projects='projects'

                  ></TaskForm>
                </v-col>
              </v-row>


            </v-form>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn :loading="loading" dark @click="submit">Update Task</v-btn>
          </v-card-actions>
        </v-card>
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
  props: ['errors', 'task', 'task_statuses','projects',],
  mounted() {
    console.log(this.task)
  },
  data() {
    return {
      drawer: null,
      form: this.$inertia.form({
        key_id: this.task.id,
        id: this.task.id,
        
        name : this.task.name,
        description : this.task.description,
        start_date : this.task.start_date,
        completion_date : this.task.completion_date,
        task_status_id : this.task.task_status_id,
        project_id : this.task.project_id,

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
          .post(this.route('updateTask'), {
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
