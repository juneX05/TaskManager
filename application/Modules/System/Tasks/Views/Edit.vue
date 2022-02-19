<template>
  <initial-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewTasks')">
        <i class="fa fa-arrow-left"></i> Back to All Tasks
      </inertia-link>
    </template>

    <div class="container">
      <!-- Default box -->
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                Edit Task
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
                         v-model="form.name"
                         class="form-control"
                         :class="checkErrors('name')? 'is-invalid' : ''"
                         placeholder="Name">
                  <span v-if="checkErrors('name')"
                        id="name-error"
                        class="error invalid-feedback"
                  >
                {{ errors.name }}
              </span>
                </div>
                <div class="input-group mb-3">
                  <input
                      type="text"
                      :class="checkErrors('title')? 'is-invalid' : ''"
                      v-model="form.title"
                      class="form-control"
                      placeholder="Title"
                  >
                  <span v-if="checkErrors('title')"
                        id="title-error"
                        class="error invalid-feedback"
                  >
                  {{ errors.title }}
                </span>
                </div>
                <div class="input-group mb-3">
                <textarea
                    rows="5"
                    :class="checkErrors('description')? 'is-invalid' : ''"
                    v-model="form.description"
                    class="form-control"
                    placeholder="Task Description"
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
                      Update Task
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
  </initial-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import InitialLayout from "../../../Theme/Layouts/InitialLayout";

export default {
    components: {
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
            // form: this.task,
            form: this.$inertia.form({
                key_id:this.task.id,
                name:this.task.name,
                title:this.task.title,
                description:this.task.description,
            }),
            loading:false
        }
    },

    methods: {
        submit() {
            this.loading = true;
            this.form
                .transform(data => ({
                    ... data,
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
