<template>
  <v-row>
    <v-col cols="12" lg="6" md="6" sm="6">
      

      <text-input
        :form="form"
        :errors="errors"
        :field="'name'"
        :hint="''"
        :label="'Name'"
        :type="'text'"
      ></text-input>

      <text-area-input
        :label="'Description'"
        :hint="''"
        :field="'description'"
        :errors="errors"
        :form="form"
        :rows="3"
      ></text-area-input>

      <date-picker
        :form="form"
        :errors="errors"
        :field="'start_date'"
        :hint="''"
        :label="'Start Date'"
        :disabled="false"
      ></date-picker>

      <date-picker
        :form="form"
        :errors="errors"
        :field="'completion_date'"
        :hint="''"
        :label="'Completion Date'"
        :disabled="false"
      ></date-picker>

      <select-input
        :label="'Task Status'"
        :hint="''"
        :field="'task_status_id'"
        :errors="errors"
        :form="form"
        :items="task_statuses"
        :item_id="'id'"
        :item_name="'name'"
        :multiple="false"
        :placeholder="''"
      ></select-input>

      <select-input
        :label="'Project'"
        :hint="''"
        :field="'project_id'"
        :errors="errors"
        :form="form"
        :items="projects"
        :item_id="'id'"
        :item_name="'name'"
        :multiple="false"
        :placeholder="''"
      ></select-input>

    </v-col>
  </v-row>
</template>

<script>
import AppLayout from '@/Theme/Layouts/AppLayout'
import textInput from "@/Theme/Components/textInput";
import textAreaInput from "@/Theme/Components/textAreaInput";
import selectInput from "@/Theme/Components/selectInput";
import fileUpload from "@/Theme/Components/fileUpload";
import DatePicker from "@/Theme/Components/datePicker";
import TimePicker from "@/Theme/Components/timePicker";

export default {
  components: {
    TimePicker,
    DatePicker,
    fileUpload,
    selectInput,
    textAreaInput,
    textInput,
    AppLayout,
  },
  props: {
    'errors': Object,
    'form': Object,
    'task_statuses':Array,
    'projects':Array,

  },
  data() {
    return {}
  }
}
</script>
