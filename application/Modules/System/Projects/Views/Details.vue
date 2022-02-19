<template>
  <app-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewProjects')">
        <i class="fa fa-arrow-left"></i> Back to All Projects
      </inertia-link>
    </template>

    <div class="container">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
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
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{project.title }} </h3>
              <p class="text-muted">
                {{project.description}}
              </p>
              <br>
<!--              <div class="text-muted">-->
<!--                <p class="text-sm">Client Company-->
<!--                  <b class="d-block">Deveint Inc</b>-->
<!--                </p>-->
<!--                <p class="text-sm">Project Leader-->
<!--                  <b class="d-block">Tony Chicken</b>-->
<!--                </p>-->
<!--              </div>-->
              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <modules-index
        :data="project.modules"
        :errors="errors"
        :project_id="project.id"
      >
      </modules-index>

    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import InitialLayout from "../../../Theme/Layouts/InitialLayout";
import ModulesIndex from "./modules/ModulesIndex";

export default {
    components: {
      ModulesIndex,
        AppLayout,
    },
    props: ['errors','project',],
    mounted() {
        console.log(this.project)
    },
    data() {
        return {
            drawer: null,
            // form: this.project,
            form: this.$inertia.form({
                key_id:this.project.id,
                name:this.project.name,
                title:this.project.title,
                description:this.project.description,
            }),
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
