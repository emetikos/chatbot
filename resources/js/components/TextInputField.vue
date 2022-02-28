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
                }),
                methods: {
                    //send message to bot from user
                    sendMessage(){
                        this.isDisabled = true
                        this.$emit("messages", {
                            text: this.message,
                            author: 'user'
                        })

                        //get a response from bot
                        this.axios
                            .post('/query', {
                            query: this.message
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
                                this.isDisabled = false
                            })
                        //clear message space after text is sent
                        this.message =  ''

                        this.$nextTick(() => {
                            this.$emit("scroll", true)
                        })
                    },
                },
            }
        </script>

        <style scoped lang="scss">

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
