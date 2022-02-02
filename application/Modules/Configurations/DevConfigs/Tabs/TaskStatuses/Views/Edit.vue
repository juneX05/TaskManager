<template>
  <app-layout>
    <template #bread-crumbs>
      <inertia-link :href="route('home')" style="text-decoration: none">
        <v-icon size="16" style="margin-top: -2px">home</v-icon>
      </inertia-link>
      /
      <inertia-link :href="route('viewTaskStatuses')" style="text-decoration: none">
        TaskStatuses List
      </inertia-link>
      <span class="text-md">
                / Edit TaskStatus
            </span>

      <br/>
      <inertia-link :href="route('viewTaskStatuses')" as="v-btn" class="mt-2" small
                    style="text-decoration: none">
        <v-icon>arrow_back</v-icon>
        Back
      </inertia-link>
    </template>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        TaskStatuses
      </h2>
    </template>

    <v-row>
      <v-col cols="8">
        <v-card class="mt-2">
          <v-card-title>
            EDIT TaskStatus
          </v-card-title>
          <v-card-text class="pb-0">
            <v-form>
              <v-row>
                <v-col cols="12">
                  <TaskStatusForm
                      :errors="errors"
                      :form="form"

                  ></TaskStatusForm>
                </v-col>
              </v-row>


            </v-form>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn :loading="loading" dark @click="submit">Update TaskStatus</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>

    </v-row>

  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import TaskStatusForm from "@/Configurations/DevConfigs/Tabs/TaskStatuses/Views/TaskStatusForm";

export default {
  components: {
    TaskStatusForm,
    AppLayout,
  },
  props: ['errors', 'task_status', ],
  mounted() {
    console.log(this.task_status)
  },
  data() {
    return {
      drawer: null,
      form: this.$inertia.form({
        key_id: this.task_status.id,
        id: this.task_status.id,
        
        id : this.task_status.id,
        name : this.task_status.name,
        color : this.task_status.color,

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
          .post(this.route('updateTaskStatus'), {
            onSuccess: () => {
              this.form.reset();
              this.$inertia.visit(route('viewTaskStatuses'))
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
