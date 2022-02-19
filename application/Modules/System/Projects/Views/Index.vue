<template>
    <initial-layout>
      <template #header> Projects </template>

      <div class="container">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title float-left">Projects</h3>

            <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('createProject')">
              <i class="fa fa-plus"></i> New
            </inertia-link>

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
                  Project Title
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

                  <inertia-link class="btn btn-primary btn-sm" :href="route('viewProject',[item.id])">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </inertia-link>

                  <inertia-link class="btn btn-info btn-sm" :href="route('editProject',[item.id])">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </inertia-link>

                  <a @click="item_id = item.id"
                      class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">
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

        <div class="modal fade" id="delete-modal">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Deleting Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this project?</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button @click="item_id = null"
                    type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <button @click="remove"
                    type="button" class="btn btn-outline-light" >Yes</button>
              </div>
            </div>
          </div>
        </div>
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
                onFinish: () => {
                  this.item_id = null;
                  $('#delete-modal').modal('hide');
                },

            });
        },
    }
}
</script>
