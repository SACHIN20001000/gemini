<template>
    <div>        
        <input type='text' v-model='form.name' />
        <span v-if="form.errors().has('name')" v-text="form.errors().get('email')"></span>

        <input type='email' v-model='form.email' />
        <span v-if="form.errors().has('email')" v-text="form.errors().get('email')"></span>

        <input type='password' v-model='form.password' />
        <span v-if="form.errors().has('password')" v-text="form.errors().get('password')"></span>

        <input type='password' v-model='form.password_confirmation' />
        <span v-if="form.errors().has('password_confirmation')" v-text="form.errors().get('password_confirmation')"></span>
 
        <hr>

        <button class="btn btn-success" @click='submit'>
            Complete
        </button>
        <button class="btn btn-success" @click='posts'>
            post
        </button>
    </div>
</template>

<script>
import form from 'vuejs-form'
import Api from '../helpers/auth'
export default {
    data: () => ({
        form: form({
            email: '',
            password: '',
            password_confirmation: ''
        })
        .rules({
            email: 'email|min:5|required',
            password: 'required|min:5|confirmed'
        })
        .messages({
            'email.email': 'Email field must be an email (durr)',
            'password.confirmed': 'Whoops, :attribute value does not match :confirmed value',
        }),
   }),

    methods: {
        async submit() {
            if (this.form.validate().errors().any()) return;
            const data = this.form.only('email', 'password')
            Api.post('/api/login', data)
          .then(function (response) {
                    
          if(response.data && response.data.token)
          {
          localStorage.setItem('token', response.data.token)
          }
          })
          .catch(error => {
        if (error.response) {
          console.log(error.response);
        }
      });
        },
        async posts() {
            
            Api.get('/api/posts')
          .then(function (response) {
          console.log(response)
          })
          .catch(error => {
        if (error.response) {
          console.log(error.response);
        }
      });
        },
    }
}
</script>