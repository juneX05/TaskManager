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
    'project_statuses':Array,

  },
  data() {
    return {}
  }
}
</script>
