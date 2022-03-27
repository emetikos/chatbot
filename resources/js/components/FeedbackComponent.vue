<template>
    <div class="main-list__feedback feedback">
        <div class="feedback__text">
            <h1>Provide a feedback please</h1>
        </div>
        <div class="feedback__buttons">

                <img class="feedback__img"
                     @click="sendFeedback"
                     :disabled="isDisabled"
                     data-value="positive"
                     src="img/positive.png">

                <img @click="sendFeedback"
                    :disabled="isDisabled"
                    data-value="negative"
                    class="feedback__img"
                     src="/img/negative.png">
        </div>
    </div>
</template>

<script>
export default {
    name: "FeedbackComponent",
    data: () => ({
        feedback: '',
        isDisabled: false
    }),
    methods: {
        sendFeedback: function (event) {
            this.isDisabled = true
            this.feedback = event.target.getAttribute('data-value')

            this.axios
                .post('/save', {
                    query: this.feedback
                })
                .then(res=> {
                    if(res) {
                        this.$emit("showFeedback", 'False')
                        this.$emit("messages", {
                            text: 'Thanks for your feedback',
                            author: 'bot',
                            type: 'text'
                        })
                    }

                })
                .catch(error => {

                    console.log(error)
                })
                .finally(() => {
                    this.isDisabled = false
                })

        }
    }
}
</script>

<style scoped>
.feedback {
    position: absolute;
    padding: 0;
    margin: 0;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
}

.feedback__buttons{
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    height: 100%;
    margin-top: -3em;

}
.feedback__img {
    width: 80px;
    cursor: pointer;
}

.feedback__text h1 {
    text-align: center;
}
</style>
