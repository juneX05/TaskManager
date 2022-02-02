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
                / View viewTaskStatus
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
      <v-col cols="12">
        <v-card class="mt-2">
          <v-card-text>
            <inertia-link :href="route('editTaskStatus',[this.task_status.id])" as="v-btn"
                          small>
              Edit TaskStatus
            </inertia-link>
          </v-card-text>
          <v-card-title>
            <!--            {{ this.task_status.name }}-->
            TaskStatus
          </v-card-title>
          <v-card-text
              v-for="(key, index) in Object.keys(task_status)"
              :key="index">
            <b> {{ key }}: </b> {{ task_status[key] }}
          </v-card-text>
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
  props: ['errors', 'task_status',],
  mounted() {
    console.log(this.task_status)
  },
  data() {
    return {
      drawer: null,
      loading: false,
    }
  },
  computed: {},
  methods: {}
}
</script>
