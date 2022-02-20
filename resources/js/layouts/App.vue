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
</template>

<script>
// import ExampleComponent from '../components/ExampleComponent';
import MainWindowComponent from '../components/MainWindowComponent';

export default {
  components: {
    // ExampleComponent
      MainWindowComponent
  }
}
</script>

<style scoped>

</style>
