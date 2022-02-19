<template>
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand-md navbar-dark ">
        <div class="container">
          <a href="/" class="navbar-brand">
            <img src="/img/avatar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">
              TaskManager
            </span>
          </a>
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse order-3" id="navbarCollapse">

          </div>

          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">


            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <!--            <i class="far fa-bell"></i>-->
                <!--            <span class="badge badge-warning navbar-badge">15</span>-->
                {{ this.$page.props.user.name }} <i class="right fas fa-angle-down"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">
              {{ this.$page.props.user.name }}
            </span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> Profile
                  <!--              <span class="float-right text-muted text-sm">3 mins</span>-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> Change Password
                  <!--              <span class="float-right text-muted text-sm">12 hours</span>-->
                </a>
                <!--            <div class="dropdown-divider"></div>-->
                <!--            <a href="#" class="dropdown-item">-->
                <!--              <i class="fas fa-file mr-2"></i> 3 new reports-->
                <!--              <span class="float-right text-muted text-sm">2 days</span>-->
                <!--            </a>-->
                <!--            <div class="dropdown-divider"></div>-->
                <!--            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
              </div>
            </li>
            <!--        <li class="nav-item">-->
            <!--          <a class="nav-link" data-widget="fullscreen" href="#" role="button">-->
            <!--            <i class="fas fa-expand-arrows-alt"></i>-->
            <!--          </a>-->
            <!--        </li>-->
            <!--        <li class="nav-item">-->
            <!--          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">-->
            <!--            <i class="fas fa-power-off"></i>-->
            <!--          </a>-->
            <!--        </li>-->
            <li class="nav-item">
              <a class="nav-link text-red" href="#" role="button" @click="logout">
                <i class="fas fa-power-off"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">
                  <slot name="header"></slot>
                </h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <slot></slot>
        </div>
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
<!--      <aside class="control-sidebar control-sidebar-dark">-->
<!--        &lt;!&ndash; Control sidebar content goes here &ndash;&gt;-->
<!--        <div class="p-3">-->
<!--          <h5>Title</h5>-->
<!--          <p>Sidebar content</p>-->
<!--        </div>-->
<!--      </aside>-->
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Version 0.0.1
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="/">{{ this.$page.props.APP_NAME }}</a>.</strong> All rights reserved.
      </footer>
    </div>
</template>

<script>
import Sidebar from "@/Theme/Components/sidebar";
export default {
  components: {Sidebar},
  data() {
    return {
      drawer: false,
      items: [
        {title: 'Dashboard', icon: 'mdi-view-dashboard', link: '/dashboard', permission: "dashboard.view"},
        {title: 'Permissions', icon: 'mdi-forum', link: '/permissions', permission: "permissions.view"},
        {title: 'Users', icon: 'mdi-account', link: '/users', permission: "users.view"},
      ],
      user_items: [
        {title: 'Profile', icon: 'mdi-view-dashboard'},
        {title: 'Logout', icon: 'mdi-forum',},
      ],
    }
  },

  mounted() {
    $('body')
        .removeClass('sidebar-mini')
        .addClass('layout-top-nav');
  },
  methods: {
    switchToTeam(team) {
      this.$inertia.put(route('current-team.update'), {
        'team_id': team.id
      }, {
        preserveState: false
      })
    },

    logout() {
      this.$inertia.post(route('logout'));
    },

    profile() {
      this.$inertia.post(route('userProfile'));
    },

    manageDrawer() {
      if (this.drawer) {
        this.drawer = false;
      }
    }
  }
}
</script>

<style>
html {
  overflow-y: auto
}
.v-application--is-ltr .v-list-item__action:first-child, .v-application--is-ltr .v-list-item__icon:first-child {
  margin-right: 16px;
}
.v-select.v-input--dense .v-chip {
  margin: 4px 4px;
}

.up_icon > span {
  display: flex;
  flex-direction: column;
}
</style>
