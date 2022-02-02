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
                / View viewTask
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
      <v-col cols="12">
        <v-card class="mt-2">
          <v-card-text>
            <inertia-link :href="route('editTask',[this.task.id])" as="v-btn"
                          small>
              Edit Task
            </inertia-link>
          </v-card-text>
          <v-card-title>
            <!--            {{ this.task.name }}-->
            Task
          </v-card-title>
          <v-card-text
              v-for="(key, index) in Object.keys(task)"
              :key="index">
            <b> {{ key }}: </b> {{ task[key] }}
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
  props: ['errors', 'task',],
  mounted() {
    console.log(this.task)
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
