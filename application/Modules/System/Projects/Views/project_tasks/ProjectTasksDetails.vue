<template>
  <app-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewProjectTasks', [task.project.id])">
        <i class="fa fa-arrow-left"></i> Back to (Tasks List)
      </inertia-link>
    </template>

    <div class="container">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tasks Detail</h3>
        </div>
        <div class="card-body">
          <div class="row">
            Hello World
          </div>
        </div>

      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import InitialLayout from "@/Theme/Layouts/InitialLayout";
import ActionsIndex from "../actions/ActionsIndex";

export default {
    components: {
      ActionsIndex,

      InitialLayout,
        AppLayout,
    },
    props: ['errors','task'],
    mounted() {
        console.log(this.task)
    },
    data() {
        return {
            drawer: null,
            loading:false
        }
    },

    methods: {
        checkErrors(key) {
            return this.errors[key] !== undefined;
        },
    }
}
</script>
