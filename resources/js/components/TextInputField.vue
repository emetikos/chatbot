<template>
        <div class="main-list__input">
            <input type ="text"
                   v-model="message"
                   @keyup.enter="sendMessage"/>
            <button @click="sendMessage" :disabled="isDisabled">Send</button>

        </div>
</template>

        <script>
            export default {
                name: "TextInputField",
                data: () => ({
                    message: '',
                    isDisabled: false,
                    loading:false,
                }),
                mounted() {
                    this.welcomeMessage()
                },
                methods: {
                    welcomeMessage(){

                        setTimeout( () => this.$emit('messages', {
                            text: 'Hello ! I am a sophisticated ( Intelligent) bot',
                            author:'bot',
                            type: 'text'
                        }), 2000)

                    },
                    //send message to bot from user
                    sendMessage(){
                        this.isDisabled = true
                        this.$emit("messages", {
                            text: this.message,
                            author: 'user',
                            type: 'text'
                        })

                        //get a response from bot
                        this.axios
                            .post('/query', {
                            query: this.message
                        })
                            .then(res=> {
                                this.$emit("messages", {
                                    text: res.data.response,
                                    author: 'bot',
                                    type: 'text'
                                })
                                this.$emit("readyToSubmit", res.data.readySubmit)
                                this.$emit("showFeedback", res.data.conversationFinished)
                            })
                            .catch(error => {
                                this.$emit("messages", {
                                    text: 'Something went wrong. Try again.',
                                    author: 'bot',
                                    type: 'text'
                                })
                                console.log(error.response.data.errors)
                            })
                            .finally(() => {
                                this.isDisabled = false
                            })
                        //clear message space after text is sent
                        this.message =  ''

                    },
                },
            }
        </script>

        <style scoped lang="scss">

        .main-list__input {
            display: flex;
        }

        input {
            flex-grow: 3;
            line-height: 3;
            border: 1px none lightgray;
            border-top-style: solid;
            border-radius: 4px 0 0 4px;
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
            border-radius: 0 4px 4px 0;
            border-width: unset;
            border-style: unset;
            border-color: unset;
        }

        </style>
