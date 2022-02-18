<template >
    <div>
        <div class="topics-found" v-if="topics['topicsFound'].length">
            <h4>This is what I found</h4>
            <div class="topics" >
                <ul>
                    <li v-for="topic in topics['topicsFound']">
                        <TopicItem v-on:print-topic="$emit('print-topic', topic)" v-bind:topic="topic"/>
                    </li>
                </ul>
            </div>
        </div>

        <div v-else>

        </div>
    </div>

</template>

<script>
import TopicItem from './TopicItem';
export default {
    name:"topics",
    components:{
      TopicItem
    },
    props:['topics']
}

</script>

<style scoped>

.topics-found {
    display: block;
}

.topics {
    max-width: 12rem;
    border:1px solid black;
    border-radius: 4px;
}

</style>
