
Template for the user input and the main window to display response from the chatbot as a text
Author: Vitaly Ivanov

<template>
    <div class="chat-bot__main main-list">
        <div class="main-list__container" ref="chatBot">
            <ul class="main-list__messages">
                <li class="main-list__message"
                    v-for="(message, index) in messages"
                    :key="index"
                    :class="message.author"
                >
                    <p>
                        <span>{{ message.text }}</span>
                    </p>
                </li>
            </ul>
        </div>
        <div class="main-list__input">

                <input
                    type="text"
                    v-model="message"
                    @keyup.enter="sendMessage"
                />
                <button @click="sendMessage" :disabled="isDisabled">Send</button>
        </div>
    </div>

</template>


<script>
export default {
    name: "MainWindowComponent",
    data: () => ({
        message: '',
        messages: [],
        isDisabled: false,
    }),
    methods: {
        sendMessage() {
            this.isDisabled = true

            this.messages.push({
                text: this.message,
                author: 'user'
            })

            this.axios
                .post('/query', {
                    query: this.message

                })
                .then(res => {
                    this.messages.push({
                        text: res.data.response,
                        author: 'bot'
                    })
                })
                .catch(error => {
                    this.messages.push({
                        text: 'Something went wrong. Try again.',
                        author: 'bot'
                    })
                    console.log(error.response.data.errors)
                })
                .finally(() => {
                    this.isDisabled = false
                })
            this.message = ''

            this.$nextTick(() => {
                this.$refs.chatBot.scrollTop = this.$refs.chatBot.scrollHeight
            })


        }
    }
}
</script>

<style scoped lang="scss">
.main-list, .main-list__messages {

    display: flex;
    flex-direction: column;
    list-style-type: none;

}

.main-list {

    margin-top: 50px;
    border: 1px solid lightgray;
    width: 50vw;
    height: 50vh;
    border-radius: 4px;
    margin-left: auto;
    margin-right: auto;
    justify-content: space-between;

}

.main-list__container {
    overflow: scroll;
    ul {
        margin-block-start: unset;
        margin-block-end: unset;
        margin-inline-start: unset;
        margin-inline-end: unset;
        padding-inline-start: unset;
    }

}

.main-list__messages {

    span {
        padding: 8px;
        color: white;
        border-radius: 4px;

    }

    .bot {
        span {
            background: green;
        }

        p {
            float: left
        }
    }

    .user {
        span {
            background: #1722a2;
        }

        p {
            float: right;
        }
    }

}

.main-list__message {
    padding: 0.5rem;
}

.main-list__input {
    display: flex;
}

input {
    flex-grow: 2;
    line-height: 3;
    border: 1px none lightgray;
    border-top-style: solid;
    border-bottom-left-radius: 4px;
    padding-left: 20px;


}
input:focus {
    outline: none;
}

button {
    flex-grow: 1;
    cursor: pointer;
    color: white;
    background: #008cff;
    border-bottom-right-radius: 4px;
    border-width: unset;
    border-style: unset;
    border-color: unset;
}


</style>
