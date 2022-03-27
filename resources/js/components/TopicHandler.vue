<template>
    <section>
        <p class="chosenTopic"> Let me see what I can find about '<span id="topic">{{chosenTopic}}</span>' </p>
<!--        <LinksOut :topic="chosenTopic"/>-->
    </section>
</template>


<script>
import LinksOut from "./LinksOut";

export default {
    name:'topicHandler',
    props:['chosenTopic'],
    components: {
        LinksOut
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
