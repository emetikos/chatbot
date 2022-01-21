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

<style>
.container__title {
  border: 2px solid grey;
  text-align: center;
}
</style>
