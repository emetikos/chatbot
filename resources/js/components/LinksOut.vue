<template>
    <Links :links="links" />
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
                links: ["Please wait..."]
            }
        },
        components: {
            Links
        },
        created(){
            //get a response from bot
            /** - checks database for topic
            this.axios
                .post('/retrieve_same', {
                    in: this.topic
                })
                .then(res=> {
                    this.links = res.data["links"]
                })
            */
            //if(this.links == ["NULL"]) {
            this.axios
                .post('/query', {
                    topic: 'neuron',
                })
                .then(res=> {
                    //console.log(res)
                    //console.log(res.data.resource)
                    this.links = res.data.resource
                }).finally(() => {
                this.$parent.showTopics = false
                })

            this.$nextTick(() => {
                this.$emit("scroll", true)
            })
            //}
            /**
            this.axios
                .post('/store', {
                    query: this.topic,
                    link: this.links
                })
            */
        }
    }
</script>
