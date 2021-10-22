<template>
  <div>
    <h1>{{ title }}</h1>
    <button v-on:click="hello('test Parameter')" class="btn btn-primary">
      call hello function
    </button>

<table  class="table table-striped" >
	<tr>
		<td>Id</td>
		<td>Name</td>
		<td>Email</td>
	</tr>
	<tr v-for="user in users" :key="user.id">
		<td>{{user.id}}</td>
		<td>{{user.name}}</td>
		<td>{{user.email}}</td>
	</tr>
</table>


  </div>
</template>
<script>
export default {
  name: "TestForm",
  data: function () {
    return {
		users :[
			{id:1, name:"peter" , email:"peter@test.com"},
			{id:2, name:"sam" , email:"sam@test.com"},
			{id:3, name:"tony" , email:"tony@test.com"},
			{id:4, name:"bruce" , email:"bruce@test.com"},
			{id:5, name:"test" , email:"test@test.com"},
		],
      title: "Hello Component",
    };
  },
  methods: {
    hello(Parameter) {
      alert(Parameter);
    },
  },
};
</script>
