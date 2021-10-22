<template>
  <div class="col-md-6">
    <form  id="regForm" onsubmit="return false;">
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
          v-text="form.errors().get('email')"
        ></span>
      </div>
      <!-- <input type="text" v-model="form.name" /> -->

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
      <!-- <input type="email" v-model="form.email" /> -->
      <div class="form-group">
        <input
          class="form-control"
          type="password"
          name="password"
          id="password"
          v-model="form.password"
          placeholder="Enter Password"
        />
        <span
          v-if="form.errors().has('password')"
          v-text="form.errors().get('password')"
        ></span>
      </div>

      <!-- <input type="password" v-model="form.password" /> -->
      <div class="form-group">
        <input
          class="form-control"
          type="password"
          name="password_confirmation"
          id="password_confirmation"
          v-model="form.password_confirmation"
          placeholder="Confirm Password"
        />
        <span
          v-if="form.errors().has('password_confirmation')"
          v-text="form.errors().get('password_confirmation')"
        ></span>
      </div>

      <!-- <input type="password" v-model="form.password_confirmation" /> -->

      <button class="btn btn-success" @click="submit">Submit</button>
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
      password: "",
      password_confirmation: "",
    })
      .rules({
        email: "email|min:5|required",
        password: "required|min:5|confirmed",
      })
      .messages({
        "email.email": "Invalid Email !",
        "password.confirmed":
          "Whoops, :attribute value does not match :confirmed value",
      }),
  }),
  mounted() {},

  methods: {
    async submit(e) {
      if (this.form.validate().errors().any()) return;
      const data = this.form.only("email", "password", "name");
      Api.post("/api/register", data)
        .then(function (response) {
          var responseData = response;
          if (responseData.data.data && responseData.data.data.token) {
            notification("success", "Success!", "Registered Successfully!");
                this.form.name='';
                this.form.email='';
                this.form.password='';
                this.form.password_confirmation = '';
            localStorage.setItem("token", responseData.data.data.token);
          }
        })
        .catch((error) => {
          if (error.response) {
                   this.form.name='';
                this.form.email='';
                this.form.password='';
                this.form.password_confirmation = '';
            notification("error", "Error!", error.response.data.message);
          }
        });
    },
  },
};
</script>