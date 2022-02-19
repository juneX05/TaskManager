<template>
  <initial-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewProjectModule', [action.module.id])">
        <i class="fa fa-arrow-left"></i> Back to (Module Details)
      </inertia-link>
    </template>

    <div class="container">
      <!-- Default box -->
      <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Edit Action
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
                    Update Action
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
import InitialLayout from "@/Theme/Layouts/InitialLayout";

export default {
    components: {
      InitialLayout,
        AppLayout,
    },
    props: ['errors','action'],
    data() {
        return {
            drawer: null,
            form: {
              key_id: this.action.id,
              module_id: this.action.module.id
            },
            loading:false
        }
    },
  created() {
    let keys = Object.keys(this.action);
    for (let i = 0; i < keys.length; i++) {
      let key = keys[i];
      this.form[key] = this.action[key];
    }

    console.log(this.form);
  },
    methods: {
        submit() {
            this.loading = true;
            this.$inertia.form(this.form)
                .transform(data => ({
                    ... data,
                }))
                .post(this.route('updateProjectModuleAction'), {
                    onSuccess: () => {
                        this.$inertia.visit(route('viewProjectModule', [ this.action.module.id]))
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
