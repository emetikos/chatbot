<template>
    <div class="container__title">
      <h1>{{ title }}</h1>
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
.container__title {
  border: 2px solid grey;
  text-align: center;
}
</style>
