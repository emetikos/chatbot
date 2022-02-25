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
                // THIS WILL STORE TOPICS AFTER FETCHING FROM THE API
                topicsFound: [],
            }
        }
    },
    methods: {

        /**
         * Picks the topic that the user has chosen
         * @if there are no topics the user cannot click the button
         * @else the selected topic will be displayed into the chat for the user to confirm that
         * is the correct topic he chose.
         *
         * @param topic
         */
        showTopic(topic) {

            if (topic === TOPICS_NOT_FOUND) {
                // TODO: this should lead back to chatbot and asking the user if he want to search for something else.
            }else{
                // TODO: this should be displayed to the user chat area for confirmation.
                console.log("Let me see what i can find about "+ "'"+ topic +"'");
                this.topics['topicsFound'] = [];
            }
        },

        /**
         *
         * @axios will call the route for the API to get the topics after the given file has been upload and analyzed.
         *
         * @return list of topics relevant to the user's query for him to use one.
         */
        fetchTopics() {

            axios.get('/topicFound')
                 .then(res => {
                     var topicsFound = res.data['topicFound']

                     console.log(topicsFound)
                     if(topicsFound === 'False') {
                         this.topics['topicsFound'] = [TOPICS_NOT_FOUND]
                     }else{
                         this.topics['topicsFound'] = topicsFound
                     }
                 }).catch(e => {
                     this.topics['topicsFound'] = e.error;
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
