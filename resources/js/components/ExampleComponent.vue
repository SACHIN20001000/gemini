<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">I'm an example component.</div>
        </div>
      </div>
    </div>
    <br />
  </div>
</template>
<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data: {
  numbers: [ 1, 2, 3, 4, 5 ]
  },
computed: {
  evenNumbers: function () {
    return this.numbers.filter(function (number) {
      return number % 2 === 0
    })
  }
}
};
</script>
