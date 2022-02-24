<template >
    <div>
        <!--      THIS IS JUST FOR TESTING -->
        <input type="button" value="fetch data" v-on:click="fetchTopics">

        <div class="topics-found" v-if="topics['topicsFound'].length">
            <h4>This is what I found</h4>
            <div class="topics" >
                <ul>
                    <li v-for="topic in topics['topicsFound']">
                        <TopicItem v-on:print-topic="showTopic" v-bind:topic="topic"/>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</template>

<script>
import TopicItem from './TopicItem';

    const TOPICS_NOT_FOUND = 'No topics found';
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
        showTopic(topic) {

            if (topic === TOPICS_NOT_FOUND) {

            }else{
                console.log("Let me see what i can find about "+ "'"+ topic +"'");
                this.topics['topicsFound'] = [];
            }

        },
        // THIS WILL FETCH THE DATA
        fetchTopics() {
            // FOR NOW PASSING DATA MANUALLY FOR TESTING
            // this.topics['topicsFound'] = ['Topic one','Topic two','Topic three','Topic four','Topic five']

            axios.get('/topicFound')
                 .then(res => {
                     var topicsFound = res.data['topicFound']

                     console.log(topicsFound)
                     if(topicsFound === 'False') {
                         this.topics['topicsFound'] = [TOPICS_NOT_FOUND]
                     }else{
                         this.topics['topicsFound'] = topicsFound
                     }
                 })
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
