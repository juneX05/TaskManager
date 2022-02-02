<template>
  <app-layout>
    <template #bread-crumbs>
      <inertia-link :href="route('home')" style="text-decoration: none">
        <v-icon size="16" style="margin-top: -2px">home</v-icon>
      </inertia-link>
      <span class="text-md">
                / TaskStatuses List
            </span>

    </template>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        TaskStatuses
      </h2>
    </template>

    <v-col cols="12">
      <v-row>
        <v-col cols="12">
          <inertia-link :href="route('createTaskStatus')" as="v-btn" class="float-end" small>
            <v-icon>add</v-icon>
            Add TaskStatus
          </inertia-link>
        </v-col>
      </v-row>
      <div class="mt-3">
        <v-data-table v-if="data.length > 0"
                      :headers="headers"
                      :items="data"
                      class="elevation-1"
                      item-key="id"
        >
          <template v-slot:item.SNO="{ index }">
            {{ index + 1 }}
          </template>
          <template v-slot:item.actions="{ item }">
            <div v-if="item_id == null ">
              <inertia-link :href="route('viewTaskStatus',[item.id])" as="v-icon" class="mr-2" small>
                mdi-eye
              </inertia-link>
              <inertia-link :href="route('editTaskStatus',[item.id])" as="v-icon" class="mr-2" small>
                mdi-pencil
              </inertia-link>
              <v-icon
                  small
                  @click="item_id = item.id"
              >
                mdi-delete
              </v-icon>
            </div>

            <div v-if="item_id != null && item_id == item.id" class="mt-5 mb-5">

              <v-row justify="center">
                <b>Are you sure you want to DELETE this item?</b>
              </v-row>
              <v-row justify="end">

                <v-btn dark small @click="item_id = null">No</v-btn>
                <v-spacer></v-spacer>
                <v-btn small @click="remove">I'm Sure</v-btn>
              </v-row>
            </div>
          </template>
        </v-data-table>
        <v-card v-else>
          <v-card-text>
            <v-icon>warning</v-icon>
            <p>
              No Data Available for this table
            </p>
          </v-card-text>
        </v-card>
      </div>
    </v-col>

  </app-layout>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'

export default {
  components: {
    AppLayout,
  },
  props: ['data', 'errors'],
  mounted() {
    console.log(this.$page.props.data);
  },
  data() {
    return {
      item_id: null,
      drawer: null,
      headers: [
        
				 { text: 'ID', align: 'start', sortable: true, value: 'id', }, 
				 { text: 'Name', align: 'start', sortable: true, value: 'name', }, 
				 { text: 'Color', align: 'start', sortable: true, value: 'color', }, 

        {text: 'Actions', value: 'actions', sortable: false},
      ]
    }
  },

  methods: {
    remove() {
      this.$inertia.post(route('deleteTaskStatus'), {
        id: this.item_id
      }, {
        onFinish: () => this.item_id = null
      });
    },
  }
}
</script>
