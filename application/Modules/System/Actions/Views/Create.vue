<template>
  <initial-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewActions')">
        <i class="fa fa-arrow-left"></i> Back to All Actions
      </inertia-link>
    </template>

    <div class="container">
      <!-- Default box -->
      <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Add Action
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
                    placeholder="Action Description"
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
                    Add Action
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
    props: ['errors'],
    data() {
        return {
            drawer: null,
            form: {},
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
                .post(this.route('saveAction'), {
                    onSuccess: () => {
                        this.$inertia.visit(route('viewActions'))
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
