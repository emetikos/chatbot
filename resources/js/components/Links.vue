<template>
    <div>
        <div v-for="link in links">
            <a href="url">{{link}}</a>
            <link-prevue :url="link" />
        </div>

    </div>
</template>

<script>
    import LinkPrevue from 'link-prevue'
    export default {
        name: 'Links',

        props: [
            'topic',
            'links'
        ],
        components: {
            LinkPrevue
        },
        methods: {
            sendTopic(topic){

                this.$emit("messages", {
                    text: this.message,
                    author: 'user'
                })

                //get a response from bot
                this.axios
                    .post('/query', {
                        topic: this.topic
                    })
                    .then(res=> {
                        this.$emit("messages", {
                            text: res.data.response,
                            author: 'bot'
                        })
                        this.$emit("readyToSubmit", res.data.readySubmit)
                    })
                    .catch(error => {
                        this.$emit("messages", {
                            text: 'Something went wrong. Try again.',
                            author: 'bot'
                        })
                        console.log(error.response.data.errors)
                    })
                    .finally(() => {

                    })
                //clear message space after text is sent
                this.message =  ''

                this.$nextTick(() => {
                    this.$emit("scroll", true)
                })
            },

        }

}
</script>
