<template>

    <div class="text-inputs">
        <label><b>Hi there, im your educational bot, here to help</b></label>
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
                    messages:[],
                    isDisabled: false,
                }),
                methods: {
                    //send message to bot from user
                    sendMessage(){
                        this.isDisabled = true

                        this.messages.push({
                            text: this.message,
                            author: 'user'
                        })


                        //get a response from bot
                        this.axios
                            .post('/query', {
                            query: this.message
                        })
                            .then(res=> {
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
                        //clear message space after text is sent
                        this.message =  ''
                    }
                }
            }
        </script>

        <style scoped lang="scss">
            .chat-box,
            .chat-box-list {
                display: flex;
                flex-direction: column;
                list-style-type: none;
            }

            .chat-box-list-container{
                overflow:scroll;
            }

            .chat-box-list{
                padding-left: 10px;
                padding-right: 10px;

                span{
                    color: white;
                }
                .server{
                    span{
                        background: lightblue;
                    }
                    p{
                        float: left;
                    }
                }
                .user{
                    span{
                        background: #5f6368;
                    }
                    p{
                        float: right;
                    }
                }
            }

            .chat-box {
                margin: 10px;
                border: 2px solid #1a202c;
                width: 60vw;
                height: 60vh;
                border-radius: 5px;
                margin-left: auto;
                margin-right: auto;
                justify-content: space-between;
            }

            .chat-inputs{
                display:flex;
                input {
                    line-height: 4;
                    width: 100%;
                    border: 1px solid #1a202c ;
                    border-left: #718096;
                    border-bottom: #718096;
                    border-right: #718096;
                    border-bottom-left-radius: 5px;
                    padding-left: 15px;
                }
            }

            button{
                width: 150px;
                color: #e2e8f0;
                background: #1a202c;
                border-bottom-right-radius: 5px;
            }

        </style>
