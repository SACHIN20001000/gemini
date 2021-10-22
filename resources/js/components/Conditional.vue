<template>
  <div>
    <h1 v-if="show">Conditional Rendering in Vue js</h1>
    <h1 v-else>Else</h1>
    <button v-on:click="display">Toggle</button>

    <ol>
      <li v-for='todo in todos' :key='todo._id'>
        {{ todo.text }}
      </li>
    </ol>
  </div>
</template>

<script>
export default {
  data: {
    show: false,
  },
  methods: {
    display() {
      this.show = !this.show;
    },
  },
};
</script>
