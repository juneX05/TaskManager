<template>
  <app-layout>
    <template #header> Project Add </template>

    <div class="container-fluid">
      <!-- Default box -->
      <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

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
                      id="exampleInputEmail1-error"
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
                      id="exampleInputPassword1-error"
                      class="error invalid-feedback"
                >
                {{ errors.title }}
              </span>
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-4 ">
                  <button class="btn btn-primary btn-block">
                    Add Project
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

export default {
    components: {
        AppLayout,
    },
    props: ['errors'],
    data() {
        return {
            drawer: null,
            form: this.$inertia.form({
                name: '',
                title: '',
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
                .post(this.route('saveProject'), {
                    onSuccess: () => {
                        this.form.reset();
                        this.$inertia.visit(route('viewProjects'))
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
