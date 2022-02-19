<template>
    <initial-layout>
      <template #header> Modules </template>

      <div class="container">
          <module-main
            :errors="errors"
            :data="data"
          ></module-main>
      </div>
    </initial-layout>
</template>

<script>
import ModuleMain from "../../Modules/Views/components/Main";
import InitialLayout from "../../../Theme/Layouts/InitialLayout";

export default {
    components: {
      InitialLayout,
      ModuleMain,
    },
    props: ['data', 'errors'],
    mounted() {
        console.log(this.$page.props.modules);
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
            this.$inertia.post(route('deleteModule'), {
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
