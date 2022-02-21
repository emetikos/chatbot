<template >
    <div>
        <!--      THIS IS JUST FOR TESTING -->
        <input type="button" value="fetch data" v-on:click="fetchData">

        <div class="topics-found" v-if="topics['topicsFound'].length">
            <h4>This is what I found</h4>
            <div class="topics" >
                <ul>
                    <li v-for="topic in topics['topicsFound']">
                        <TopicItem v-on:print-topic="printTopic" v-bind:topic="topic"/>
                    </li>
                </ul>
            </div>
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
