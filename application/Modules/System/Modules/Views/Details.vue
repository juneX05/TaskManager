<template>
  <initial-layout>
    <template #header>
      <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('viewModules')">
        <i class="fa fa-arrow-left"></i> Back to All Modules
      </inertia-link>
    </template>

    <div class="container">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Modules Detail</h3>
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
                      <span class="info-box-text text-center text-muted">Estimated module duration</span>
                      <span class="info-box-number text-center text-muted mb-0">20</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
<a href="#">Jonathan Burke Jr.</a>
</span>
                      <span class="description">Shared publicly - 7:45 PM today</span>
                    </div>

                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore.
                    </p>
                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                    </p>
                  </div>
                  <div class="post clearfix">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="/img/user7-128x128.jpg" alt="User Image">
                      <span class="username">
<a href="#">Sarah Ross</a>
</span>
                      <span class="description">Sent you a message - 3 days ago</span>
                    </div>

                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore.
                    </p>
                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                    </p>
                  </div>
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
<a href="#">Jonathan Burke Jr.</a>
</span>
                      <span class="description">Shared publicly - 5 days ago</span>
                    </div>

                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore.
                    </p>
                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{module.title }} </h3>
              <p class="text-muted">
                {{module.description}}
              </p>
              <br>
<!--              <div class="text-muted">-->
<!--                <p class="text-sm">Client Company-->
<!--                  <b class="d-block">Deveint Inc</b>-->
<!--                </p>-->
<!--                <p class="text-sm">Module Leader-->
<!--                  <b class="d-block">Tony Chicken</b>-->
<!--                </p>-->
<!--              </div>-->
              <h5 class="mt-5 text-muted">Module files</h5>
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
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title float-left">Modules</h3>

          <inertia-link as="button" class="btn btn-primary btn-sm float-right" :href="route('createModule')">
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
          <table class="table table-striped modules">
            <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                Module Name
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
              <td class="module-actions text-right">

                <inertia-link class="btn btn-primary btn-sm" :href="route('viewModule',[item.id])">
                  <i class="fas fa-folder">
                  </i>
                  View
                </inertia-link>

                <inertia-link class="btn btn-info btn-sm" :href="route('editModule',[item.id])">
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

    </div>


    <div class="modal fade" id="delete-modal">
      <div class="modal-dialog">
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title">Deleting Module</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this module?</p>
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
    props: ['errors','module'],
    mounted() {
        console.log(this.module)
    },
    data() {
        return {
            drawer: null,
            // form: this.module,
            form: this.$inertia.form({
                key_id:this.module.id,
                name:this.module.name,
                title:this.module.title,
                description:this.module.description,
            }),
            loading:false
        }
    },

    methods: {
        checkErrors(key) {
            return this.errors[key] !== undefined;
        }
    }
}
</script>
