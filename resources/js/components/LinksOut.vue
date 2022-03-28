<template>
    <!--    <Links :links="links" />-->
</template>

<script>
import Links from './Links';

export default {
    name: 'LinksOut',
    props: [
        'topic'
    ],
    data() {
        return {
            links: []
        }
    },
    components: {
        Links
    },
    created() {
        //get a response from bot
        this.axios
            .post('/query', {
                topic: this.topic,
            })
            .then(res => {
                this.links = res.data.resource

                this.$emit("messages", {
                    text: this.links,
                    author: 'bot',
                    type: 'link'
                })

                this.$emit("messages", {
                    text: res.data.response,
                    author: 'bot',
                    type: 'text'
                })

            })
            .finally(() => {

                this.$parent.showTopics = false
                this.$parent.showLinks = false


            })
    }
}
</script>
