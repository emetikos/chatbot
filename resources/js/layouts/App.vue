<template>
    <section class="chat-bot">
                <Topics/>
                <main-window-component/>
    </section>
</template>

<script>
import Topics from '../components/Topics';
// import ExampleComponent from '../components/ExampleComponent';
import MainWindowComponent from '../components/MainWindowComponent';

export default {
  components: {
    Topics,
    // ExampleComponent
      MainWindowComponent
  }
}
</script>

<!-- global styling -->
<style>
    div {
        font-family: "Helvetica Neue", sans-serif;
    }
</style>
