<template>
  <div class="container" >
    <div class="container__title">
      <h1>{{ title }}</h1>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      title: 'I am your Chatbot!'
    }
  }
}
</script>

<style scoped>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.container__title {
  border: 2px solid grey;
  text-align: center;
}
</style>
