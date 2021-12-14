<template>
  <div class="main">
    <p>Login Page</p>
    <form>
      <template>
        <div class="errorMsg" v-if="errors && errors != null && errors != ''">{{errors}} </div>
        <div class="input-group mt-3">
          <div class="input-group-prepend">
            <span
              class="input-group-text"
              id="basic-addon1"
            >
              &#128274;
            </span>
          </div>
          <input
            type='email'
            name="email"
            v-model='form.email'
            class="form-control"
            placeholder="email"
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
              &#128274;
            </span>
          </div>
          <input
            type='password'
            name="password"
            v-model='form.password'
            class="form-control"
            placeholder="password"
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
  name:"Login",
  data: () => ({
    form: form({
      email: '',
      password: ''
    })
      .rules({
        email: 'email|min:5|required',
        password: 'required|min:5'
      })
      .messages({
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
      this.$router.push({path: 'dashboard'})
    },
  },
  computed: {
    ...mapGetters(['userDetails', 'errors'])
  },
  methods: {
    ...mapActions(['loginUser']),
    onFormChange() {
      this.form.validate()
    },
    submit() {
      this.form.validate()
      if (!this.form.validate().errors().any()) {
        this.loginUser(this.form.data)
      }
    }
  }
}
</script>
