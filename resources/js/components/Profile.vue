<template>
  <div class="col-md-12">
    <form onsubmit="return false">
      <div class="form-group">
        <input
          class="form-control"
          type="text"
          name="name"
          id="name"
          v-model="form.name"
          placeholder="Enter Name"
        />
        <span
          v-if="form.errors().has('name')"
          v-text="form.errors().get('name')"
        ></span>
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="email"
          name="email"
          id="email"
          v-model="form.email"
          placeholder="Enter Email"
        />
        <span
          v-if="form.errors().has('email')"
          v-text="form.errors().get('email')"
        ></span>
      </div>
      <button class="btn btn-success" @click="submit">Update</button>
    </form>
  </div>
</template>
<script>
import form from "vuejs-form";
import Api from "../helpers/auth";
import notification from "../helpers/notification";
export default {
  data: () => ({
    form: form({
      email: "",
      name: "",
    })
      .rules({
        name: "required",
        email: "email|min:5|required",
      })
      .messages({
        "name.required": "Name is Required",
        "email.email": "Invalid Email !",
      }),
  }),
  created() {
    this.getProfile();
  },
  methods: {
    getProfile() {
      Api.get("/api/profile")
        .then((response) => {
          this.form.email = response.data.data.email;
          this.form.name = response.data.data.name;
        })
        .catch((error) => {
          if (error.response) {
            notification("error", "Error!", error.response.data.message);
          }
        });
    },
    async submit(e) {
      if (this.form.validate().errors().any()) return;
      const data = this.form.only("email", "name");

      Api.put("/api/update", data)
        .then((response) => {
          this.form.email = response.data.data.email;
          this.form.name = response.data.data.name;
		  notification('success' , 'Successfull!','Profile Updated Successfully');
        })
        .catch((error) => {
          if (error.response) {
            notification("error", "Error!", error.response.data.message);
          }
        });
    },
  },
};
</script>
