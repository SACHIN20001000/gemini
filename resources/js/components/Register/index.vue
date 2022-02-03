<template>
  <div class="main log_in">
    <p>Register Page</p>
    <form>
      <template>
        <div class="errorMsg" v-if="errors && errors != null && errors != ''">{{errors}} </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span
              class="input-group-text"
              id="basic-addon1"
            >
            <i class="fa fa-user-o" aria-hidden="true"></i>
            </span>
          </div>
          <input
            type='text'
            name="name"
            v-model='form.name'
            class="form-control"
            placeholder="Name"
            aria-describedby="basic-addon1"
            aria-label="Name"
          >
        </div>
        <span
          v-if="form.errors().has('name')"
          v-text="form.errors().get('name')"
          class="errorMsg">
        </span>
        <div class="input-group mt-3">
          <div class="input-group-prepend">
            <span
              class="input-group-text"
              id="basic-addon1"
            >
             <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </span>
          </div>
          <input
            type='email'
            name="email"
            v-model='form.email'
            class="form-control"
            placeholder="Email"
            aria-label=".form-control-lg example"
          >
          <span
            v-if="form.errors().has('email')"
            v-text="form.errors().get('email')"
            class="errorMsg">
          </span>
        </div>
        <div class="input-group mt-3">
          <div class="input-group-prepend">
            <span
              class="input-group-text"
              id="basic-addon1"
            >
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <input
            type='password'
            name="password"
            v-model='form.password'
            class="form-control"
            placeholder="Password"
            aria-label=".form-control-lg example"
          >
          <span
            v-if="form.errors().has('password')"
            v-text="form.errors().get('password')"
            class="errorMsg">
          </span>
        </div>
        <div class="btn_submit">
          <input
            type="button"
            value="Send"
            class="btn btn-blue"
            :disabled='form.empty()'
            @click='submit'
          >
        </div>
      </template>
    </form>
  </div>
</template>
<style>
  @import './register.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import form from 'vuejs-form'

export default {
  name:"Home",
  data: () => ({
    form: form({
      name: '',
      email: '',
      password: ''
    })
      .rules({
        name: 'required',
        email: 'email|min:5|required',
        password: 'required|min:5'
      })
      .messages({
        'name.name': 'Name is required!',
        'email.email': 'Email is required!',
        'password.password': 'password is required!',
      }),
  }),
  watch: {
    ['form.data']: {
      deep: true,
      immediate: false,
      handler: 'onFormChange'
    },
    userDetails() {
      window.location.href='/profile'
    },
  },
  computed: {
    ...mapGetters(['userDetails', 'errors'])
  },
  methods: {
    ...mapActions(['registerUser']),
    onFormChange() {
      this.form.validate()
    },
    submit() {
      this.form.validate()
      if (!this.form.validate().errors().any()) {
        this.registerUser(this.form.data)
      }
    }
  }
}
</script>
