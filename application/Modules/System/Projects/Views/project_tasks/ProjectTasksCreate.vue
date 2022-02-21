<template>
  <app-layout>
    <template #header>

    </template>

    <div class="container">
      <!-- Default box -->
      <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Add Task
            </h3>

<!--            <div class="card-tools">-->
<!--              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">-->
<!--                <i class="fas fa-minus"></i>-->
<!--              </button>-->
<!--            </div>-->
          </div>
          <div class="card-body">
            <form @submit.prevent="submit" method="post">
              <div class="input-group mb-3">
                <input type="text"
                       v-model="form.title"
                       class="form-control"
                       :class="checkErrors('title')? 'is-invalid' : ''"
                       placeholder="Name">
                <span v-if="checkErrors('title')"
                      id="title-error"
                      class="error invalid-feedback"
                >
                {{ errors.title }}
              </span>
              </div>
              <div class="input-group mb-3">
                <input type="date"
                       v-model="form.start_date"
                       class="form-control"
                       :class="checkErrors('start_date')? 'is-invalid' : ''"
                       placeholder="Start Date">
                <span v-if="checkErrors('start_date')"
                      id="start_date-error"
                      class="error invalid-feedback"
                >
                {{ errors.start_date }}
              </span>
              </div>
              <div class="input-group mb-3">
                <input type="date"
                       v-model="form.end_date"
                       class="form-control"
                       :class="checkErrors('end_date')? 'is-invalid' : ''"
                       placeholder="End Date">
                <span v-if="checkErrors('end_date')"
                      id="end_date-error"
                      class="error invalid-feedback"
                >
                {{ errors.end_date }}
              </span>
              </div>
              <div class="input-group mb-3">
                <textarea
                    rows="5"
                    :class="checkErrors('description')? 'is-invalid' : ''"
                    v-model="form.description"
                    class="form-control"
                    placeholder="Module Description"
                ></textarea>
                <span v-if="checkErrors('title')"
                      id="description-error"
                      class="error invalid-feedback"
                >
                  {{ errors.description }}
                </span>
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-4 ">
                  <button class="btn btn-primary btn-block">
                    Save Task
                  </button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
      <!-- /.card -->
  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import InitialLayout from "@/Theme/Layouts/InitialLayout";

export default {
    components: {
      InitialLayout,
        AppLayout,
    },
    props: ['errors','project_id'],
    data() {
        return {
            drawer: null,
            form: {
              project_id: this.project_id
            },
            loading:false
        }
    },

    methods: {
        submit() {
            this.loading = true;
            this.$inertia.form(this.form)
                .transform(data => ({
                    ... data,
                }))
                .post(this.route('saveProjectTask'), {
                    onSuccess: () => {
                        this.$inertia.visit(route('viewProjectTasks', [ this.project_id]))
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
