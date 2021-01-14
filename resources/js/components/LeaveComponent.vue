<template>
  <div class="container">
    <form @submit.prevent="created">
      <div class="form-group required">
        <label class="control-label" for="personale_id">የሰራተኛ ሥም</label>
        <div class="input-group-sm">
          <input
            type="text"
            class="form-control"
            placeholder=""
            v-model="form.title"
          />
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <span class="invalid-feedback" role="alert"></span>
      </div>
    </form>
  </div>
</template>

<script>
// import axios from "axios";
export default {
  data() {
    return {
      form: new Form({
        title: "",
      }),
    };
  },
  methods: {
    created() {
      console.log("Form Submited");
    },
  },

  mounted() {
    console.log("Component mounted.");
  },
};
</script>
