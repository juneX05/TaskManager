<template>
  <app-layout>
    <template #header>

    </template>

    <div class="container">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title float-left">
            {{ project.title }} Tasks
          </h3>

          <inertia-link as="button" class="btn btn-primary btn-sm float-right"
                        :href="route('createProjectTask',[project.id])">
            <i class="fa fa-plus"></i> New
          </inertia-link>

        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="row">

        <div class="col-md-6" v-for="(item, index) in data" :key="index">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h5 class="card-title">
                  {{ item.title }} &nbsp;&nbsp;&nbsp;
              </h5>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-link">#{{item.id}}</a>
              </div>
            </div>
            <div class="card-header">
              <div class="badge badge-secondary">31 Steps</div>
              <div class="card-tools">
                <span class="badge bg-primary">
                  <i class="fa fa-dot-circle"></i>
                  Open
                </span>
              </div>
            </div>
            <div class="card-body">
              <div style="max-height: 40px; overflow: hidden">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                3
                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                laborum
                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                nulla
                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                beer
                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                labore sustainable VHS.
              </div>...
            </div>
            <div class="card-footer">
              <inertia-link
                            :href="route('viewProjectTask',[item.id])">
                <i class="fa fa-eye"></i> View More
              </inertia-link>
            </div>
          </div>
        </div>

      </div>

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
                      type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel
              </button>
              <button @click="remove"
                      type="button" class="btn btn-outline-light">Yes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>

import AppLayout from "../../../../Theme/Layouts/AppLayout";

export default {
  name: "ProjectTasksIndex",
  components: {
    AppLayout
  },
  props: {
    data: Array,
    project: Object,
    errors: Object
  },
  mounted() {

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
      this.$inertia.post(route('deleteProjectTask'), {
        id: this.item_id
      }, {
        onFinish: () => {
          this.item_id = null;
          $('#delete-modal').modal('hide');
        },
      });
    },
  }
}
</script>
