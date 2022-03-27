<template>
    <div class="main-list__feedback feedback">
        <div class="feedback__buttons">
            <button type="button"
                    class="feedback__btn"
                    @click="sendFeedback"
                    :disabled="isDisabled"
                    data-value="positive">
                <img class="feedback__img" src="img/positive.png">
            </button>
            <button type="button"
                    class="feedback__btn"
                    @click="sendFeedback"
                    :disabled="isDisabled"
                    data-value="negative">
                <img class="feedback__img" src="/img/negative.png">
            </button>
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
.feedback__img {
    width: 80px;
}
</style>
