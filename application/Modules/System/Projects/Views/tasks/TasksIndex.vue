<template>
  <div>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title float-left">
          Tasks
        </h3>

        <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('createProjectModuleActionTask',[action_id])">
          <i class="fa fa-plus"></i> New
        </inertia-link>

      </div>
      <div class="card-body p-0">
        <table class="table table-striped actions">
          <thead>
          <tr>
            <th style="width: 1%">
              #
            </th>
            <th style="width: 30%">
              Task Name
            </th>
            <th style="width: 40%">
              Description
            </th>
            <th style="width: 20%">
            </th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(item, index) in data" :key="index">
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
            <td>
              <a>
                {{ item.description }}
              </a>
            </td>
            <td class="action-actions text-right">

              <inertia-link class="btn btn-primary btn-sm" :href="route('viewProjectModuleActionTask',[item.id])">
                <i class="fas fa-folder">
                </i>
                View
              </inertia-link>

              <inertia-link class="btn btn-info btn-sm" :href="route('editProjectModuleActionTask',[item.id])">
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
            <h4 class="modal-title">Deleting Action</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this task?</p>
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
</template>

<script>

export default {
  name:"TasksIndex",
    components: {
    },
    props:{
      data: Array,
      action_id : {
        type: Number,
      },
      errors: Object
    },
    mounted() {
        console.log(this.$page.props.actions);
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
        remove() {
            this.$inertia.post(route('deleteProjectModuleActionTask'), {
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
