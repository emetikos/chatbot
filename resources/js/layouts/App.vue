<template>
    <section class="chat-bot">
        <div class="chat-bot__container">
            <div class="chat-bot__header">

            </div>
            <div class="chat-bot__main">
                <!--<example-component/>-->
                <main-window-component/>
            </div>
            <div class="chat-bot__footer">

            </div>
        </div>
    </section>
  <div class="container">
      <Topics/>

  </div>
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
