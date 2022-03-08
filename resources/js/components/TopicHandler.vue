<template>
    <section>
        <p class="chosenTopic"> Let me see what I can find about '<span id="topic">{{chosenTopic}}</span>' </p>
        <Links :topic="chosenTopic"/>
    </section>
</template>


<script>
import Links from "./Links";

export default {
    name:'topicHandler',
    props:['chosenTopic'],
    components: {
        Links
    }
}

</script>


<style>

 .chosenTopic{
     display: table;
     margin-left: .5rem;
     padding: .5rem;
     background: green;
     color: white;
     font-size: 1rem;
     border-radius: 4px;
     max-width: 100%;
 }
 #topic{
     font-weight: bold;
 }

</style>
