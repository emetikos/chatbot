<template>
  <div class="container">
      <example-component/>

<!--      THIS IS JUST FOR TESTING -->
      <input type="button" value="fetch data" v-on:click="fetchData">
<!--      SEND PROCS IN THE COMPONENT -->
      <Topics v-bind:topics="topics" v-on:print-topic="printTopic"/>

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
  },
    data() {
        return {
            topics :{
                // THIS WILL STORE DATA AFTER FETCH
                topicsFound: [],
            }

        }
    },
    methods: {
      // TEST METHOD TO CHEKC OUTPUT
      printTopic(topic) {
          alert("Let me see what i can find about "+ "'"+ topic +"'");
          this.topics['topicsFound'] = [];
      },
        // THIS WILL FETCH THE DATA
        fetchData() {
          // FOR NOW PASSING DATA MANUALLY FOR TESTING
            this.topics['topicsFound'] = ['This is topic one','This is topic two','This is topic three','This is topic four','This is topic five']
        }
    }
}
</script>

<!-- global styling -->
<style>
    div {
        font-family: "Helvetica Neue", sans-serif;
    }

</style>
