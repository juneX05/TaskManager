<template>
    <initial-layout>
      <template #header> Projects </template>

      <div class="container">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Projects</h3>

<!--            <div class="card-tools">-->
<!--              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">-->
<!--                <i class="fas fa-minus"></i>-->
<!--              </button>-->
<!--              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">-->
<!--                <i class="fas fa-times"></i>-->
<!--              </button>-->
<!--            </div>-->
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
              <tr>
                <th style="width: 1%">
                  #
                </th>
                <th style="width: 20%">
                  Project Name
                </th>
                <th style="width: 20%">
                </th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(item, index) in this.$page.props.data" :key="index">
                <td>
                  # {{item.id}}
                </td>
                <td>
                  <a>
                    {{ item.title }}
                  </a>
                  <br/>
                  <small>
                    Created {{ item.created_at }}
                  </small>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm" href="#">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </a>
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="#">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </initial-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import CustomDataTable from "@/Theme/Components/customDataTable";
import InitialLayout from "../../../Theme/Layouts/InitialLayout";

export default {
    components: {
      InitialLayout,
      CustomDataTable,
      AppLayout,
    },
    props: ['data', 'errors'],
    mounted() {
        console.log(this.$page.props.projects);
    },
    data() {
        return {
            item_id: null,
            drawer: null,
            headers: [
              {text: 'SNO', value: 'SNO', sortable: false},
              {
                text: 'Name', align: 'start',
                sortable: true, value: 'name',
              },
              {
                text: 'Title', align: 'start',
                sortable: true, value: 'title',
              },
              {text: 'Actions', value: 'actions', sortable: false},
            ],
          page_start: 0
        }
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ... data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        },
        remove() {
            this.$inertia.post(route('deleteProject'), {
                id: this.item_id
            },{
                onFinish: () => this.item_id = null
            });
        },
    }
}
</script>
