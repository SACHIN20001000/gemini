<template>
  <div class="main">
    <p>Profile Page</p>
    <form>
      <template>
        <div class="errorMsg" v-if="errors && errors != null && errors != ''">{{errors}} </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span
              class="input-group-text"
              id="basic-addon1"
            >
              <i class="flaticon flaticon-group"></i>
            </span>
          </div>
          <input
            type='text'
            name="name"
            v-model='form.name'
            class="form-control"
            placeholder="name"
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
      this.$router.push({path: 'dashboard'})
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
