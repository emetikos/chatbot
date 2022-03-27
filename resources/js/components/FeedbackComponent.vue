<template>
    <div class="main-list__feedback feedback">
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
            const value = event.target.getAttribute('data-value')
            console.log(value)
            this.isDisabled = false

            // this.axios
            //     .post('/save', {
            //         query: this.feedback
            //     })
            //     .then(res=> {
            //
            //     })
            //     .catch(error => {
            //
            //         console.log(error.response.data.errors)
            //     })
            //     .finally(() => {
            //         this.isDisabled = false
            //     })

        }
    }
}
</script>

<style scoped>

.feedback__buttons{
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}
.feedback__img {
    width: 50px;
    cursor: pointer;
}
</style>
