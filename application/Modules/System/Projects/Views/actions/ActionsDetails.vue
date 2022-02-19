<template>
  <initial-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewProjectModule', [action.module.id])">
        <i class="fa fa-arrow-left"></i> Back to (Module Details)
      </inertia-link>
    </template>

    <div class="container">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Actions Detail</h3>
<!--          <div class="card-tools">-->
<!--            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">-->
<!--              <i class="fas fa-minus"></i>-->
<!--            </button>-->
<!--            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">-->
<!--              <i class="fas fa-times"></i>-->
<!--            </button>-->
<!--          </div>-->
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">20</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{action.title }} </h3>
              <p class="text-muted">
                {{action.description}}
              </p>
            </div>
          </div>
        </div>

      </div>

      <tasks-index
        :data="tasks"
        :errors="errors"
        :action_id="action.id"
      ></tasks-index>

    </div>
  </initial-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import InitialLayout from "@/Theme/Layouts/InitialLayout";
import ActionsIndex from "../actions/ActionsIndex";
import TasksIndex from "../tasks/TasksIndex";

export default {
    components: {
      TasksIndex,
      ActionsIndex,

      InitialLayout,
        AppLayout,
    },
    props: ['errors','action', 'tasks'],
    mounted() {
        console.log(this.action)
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
