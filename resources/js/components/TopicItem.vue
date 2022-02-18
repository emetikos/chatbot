<template>
<div class="topic-item">

        <button @click="$emit('print-topic', topic)" type="submit">{{ topic }}</button>

</div>

</template>

<script>
    export default {
        name: 'topicItem',
        props:['topic']
    }
</script>

<style scoped>

.topic-item {
    margin: .3rem;
    width: 100%;
    padding:.5rem  .5rem;

}
</style>
