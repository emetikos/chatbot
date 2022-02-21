<template>
  <div class="container">
      <example-component/>
      <Topics/>
      <Logo/>

  </div>
</template>

<script>
import ExampleComponent from '../components/ExampleComponent';
import Topics from '../components/Topics';
import Logo from '../components/Logo';

export default {
  components: {
    ExampleComponent,
    Topics,
    Logo,
  }
}
</script>

<!-- global styling -->
<style>
    div {
        font-family: "Helvetica Neue", sans-serif;
    }
</style>
