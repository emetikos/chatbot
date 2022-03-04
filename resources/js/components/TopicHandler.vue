<template>
    <section>
        <p class="chosenTopic"> Let me see what I can find about '<span id="topic">{{chosenTopic}}</span>' </p>
    </section>
</template>


<script>
export default {
    name:'topicHandler',
    props:['chosenTopic']
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
