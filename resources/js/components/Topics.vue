<template >
    <section>
        <div>
            <div class="topics-found" v-if="topics['topicsFound'].length">
<!--                <p class="chosenTopic">This is what I found! Please select one of the topics</p>-->
                <div class="topics" >
                    <ul>
                        <li v-for="topic in topics['topicsFound']">
                            <TopicItem v-on:print-topic="showTopic" v-bind:topic="topic"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div >

        </div >
        <TopicHandler v-if="topics['isTopicSelected']" :chosenTopic="topics['selectedTopic']"/>
    </section>
</template>

<script>
import TopicItem from './TopicItem';
import TopicHandler from './TopicHandler'

    const TOPICS_NOT_FOUND = 'No topics found';
export default {
    name:"topics",
    components:{
      TopicItem,
        TopicHandler

    },
    data() {
        return {
            topics :{
                // THIS WILL STORE TOPICS AFTER FETCHING FROM THE API
                topicsFound: [],
                selectedTopic: '',
                isTopicSelected: false,
                response: ''
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
                this.topics['selectedTopic'] = topic
                this.topics['isTopicSelected'] = true
                this.$parent.showLinks = true;
                this.topics['topicsFound'] = [];

                this.$emit('chosenTopic' , topic)
            }
        },

        /**
         *
         * @axios will call the route for the API to get the topics after the given file has been upload and analyzed.
         *
         * @return list of topics relevant to the user's query for him to use one.
         */
        // fetchTopics() {
        //
        //     axios.get('/topicFound')
        //          .then(res => {
        //              var topicsFound = res.data['topicFound']
        //
        //
        //              this.$emit("messages", {
        //                  text: res.data.response,
        //                  author: 'bot'
        //              })
        //
        //              console.log(topicsFound)
        //              if(topicsFound === 'False') {
        //                  this.topics['topicsFound'] = [TOPICS_NOT_FOUND]
        //              }else{
        //                  this.topics['topicsFound'] = topicsFound
        //              }
        //          }).catch(e => {
        //              this.topics['topicsFound'] = e.error;
        //     })
        // }
    }
}

</script>

<style scoped>


ul {
    list-style-type: none;
    margin-left: -2rem;
}

li {
    float: left;
}



.chosenTopic{
    display: table;
    padding: .5rem;
    background: green;
    color: white;
    font-size: 1rem;
    border-radius: 4px;
    max-width: 100%;
}

</style>
