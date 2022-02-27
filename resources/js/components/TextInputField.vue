<template>

    <div class="chat-bot__main main-list">
        <MainWindowComponent :messages="messages"></MainWindowComponent>
        <div class="main-list__input">
            <input type ="text"
                   v-model="message"
                   @keyup.enter="sendMessage"/>
            <button @click="sendMessage" :disabled="isDisabled">Send</button>

        </div>
    </div>
</template>

        <script>
        import MainWindowComponent from "./MainWindowComponent";
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
                },
                components: {
                    MainWindowComponent
                }
            }
        </script>

        <style scoped lang="scss">

        .main-list {
            display: flex;
            flex-direction: column;
            list-style-type: none;
            margin-top: 50px;
            border: 1px solid lightgray;
            width: 50vw;
            height: 50vh;
            border-radius: 4px;
            margin-left: auto;
            margin-right: auto;
            justify-content: space-between;

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
