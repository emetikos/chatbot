<template>
    <div class ="chat-bot-list-container" ref="chatbot">
        <li class="message" v-for="(message, idx) in messages" :key="idx" :class="message.author">
            <p>
                <span>{{message.text}}</span>
            </p>
        </li>
    </div>

    <

    <div class="text-input">
        <input type ="text" v-model="message" @keyup.enter="sendMessage"/>
        <form action="/query" class="form-container">

            <h1>CHATBOT</h1>
            <br>
            <label><b>Hi there, im your educational bot. How can i help?</b></label>
            <br/>

            <textarea placeholder="Type message.." name="msg" required></textarea>
            <button type="submit" @click="sendMessage" >Send</button>
        </form>

        <template/>

        <script>
            export default {
                name: "TextInputTESTING",
                data: () => ({
                    message: '',
                    messages:[]
                }),
                methods: {
                    //send message to bot from user
                    sendMessage(){
                        this.message.push({
                            text: this.message,
                            author: 'user'
                        })
                        //clear message space after text is sent
                        this.message =  ''

                        //get a response from bot
                        this.$axios.get()
                            .then(res=> {
                                this.messages.push({
                                    text: res.data.output,
                                    author: 'server'
                                })

                            })
                        this.messages
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





        <!--<template>-->
<!--&lt;!&ndash;    //chat button to open text field &ndash;&gt;-->
<!--&lt;!&ndash;    <button class="open-button" onclick="openForm()">Chat</button>&ndash;&gt;-->
<!--&lt;!&ndash;//chat pop up &ndash;&gt;-->
<!--    <div class="">-->
<!--&lt;!&ndash;    <Conversation :responses="chatResponse" :messages="messages"/>&ndash;&gt;-->

<!--        &lt;!&ndash;chat button to open chat&ndash;&gt;-->
<!--&lt;!&ndash;        <button class="open-button" v-on:click="openForm()">Chat</button>&ndash;&gt;-->

<!--    <div class="chat-popup" id="myForm">-->
<!--        <form action="/query" class="form-container">-->


<!--            <h1>CHATBOT</h1>-->
<!--            <br>-->
<!--            <label><b>Hi there, how can i help?</b></label>-->
<!--            <br/>-->
<!--            <textarea placeholder="Type message.." name="msg" required></textarea>-->

<!--&lt;!&ndash;            </button>&ndash;&gt;-->
<!--&lt;!&ndash;            send button&ndash;&gt;-->
<!--            <button type="submit" class="btn" onclick.native="getInputValue();">Send</button>-->
<!--            <br>-->
<!--&lt;!&ndash;            //send button Icon&ndash;&gt;-->
<!--&lt;!&ndash;            <button style="font-size:24px"> <i class="material-icons">send</i></button>&ndash;&gt;-->
<!--&lt;!&ndash;close chat box once close button is clicked &ndash;&gt;-->

<!--            <button type="button" class="btn cancel" onclick.native="closeForm()">Close</button>-->
<!--&lt;!&ndash;            <form v-on:submit.prevent="submitForm">&ndash;&gt;-->




<!--        </form>-->
<!--    </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--export default {-->
<!--    name: "TextInputField",-->
<!--    data() {-->
<!--        return {-->
<!--            title: 'Chat to Chatbot',-->
<!--            chatResponse: null,-->
<!--            messages: []-->
<!--        }-->
<!--        // methods:-->
<!--        // {-->
<!--        //-->
<!--        //     //if user doesn't input message it won't allow for user to send-->
<!--        //     sendMessage() {-->
<!--        //         if( this.message == ''){-->
<!--        //             return;-->
<!--        //         }-->
<!--        //         //get response from right class-->
<!--        //         axios.post('/chat/responses',{-->
<!--        //             message: this.message-->
<!--        //         })-->
<!--        // }-->
<!--        // }-->


<!--// function openForm() {-->
<!--//     document.getElementById("myForm").style.display = "block";-->
<!--// }-->

<!--//close chat on click-->
<!--        function openForm() {-->
<!--            document.getElementById("myForm").style.display = "block";-->
<!--        }-->

<!--        function closeForm() {-->
<!--            document.getElementById("myForm").style.display = "none";-->
<!--        }-->

<!--        function getInputValue() {-->
<!--            // Selecting the input element and get its value-->
<!--            document.getElementById("myInput").value;-->
<!--        }-->

<!--    }-->
<!--}-->

<!--</script>-->

<!--<style scoped>-->
<!--/*send button icon */-->
<!--/*insert here*/-->


<!--/*inner chat box sizing*/-->
<!--body {font-family: Arial, Helvetica, sans-serif;}-->
<!--* {box-sizing: border-box;}-->

<!--/* Button used to open the chat form - fixed at the bottom of the page */-->
<!--/*.open-button {*/-->
<!--/*    background-color: #555;*/-->
<!--/*    color: white;*/-->
<!--/*    padding: 16px 20px;*/-->
<!--/*    border: none;*/-->
<!--/*    cursor: pointer;*/-->
<!--/*    opacity: 0.8;*/-->
<!--/*    position: fixed;*/-->
<!--/*    bottom: 23px;*/-->
<!--/*    right: 28px;*/-->
<!--/*    width: 280px;*/-->
<!--/*}*/-->

<!--/* The popup chat button */-->
<!--/*.chat-popup {*/-->
<!--/*    display: none;*/-->
<!--/*    position: fixed;*/-->
<!--/*    bottom: 0;*/-->
<!--/*    right: 15px;*/-->
<!--/*    border: 3px solid #f1f1f1;*/-->
<!--/*    z-index: 9;*/-->
<!--/*}*/-->

<!--/*text box border*/-->
<!--body {font-family: Arial, Helvetica, sans-serif;}-->
<!--* {box-sizing: border-box;}-->

<!--/*text container*/-->
<!--.form-container textarea {-->
<!--    width: 100%;-->
<!--    padding: 15px;-->
<!--    margin: 5px 0 22px 0;-->
<!--    border: none;-->
<!--    background: #f1f1f1;-->
<!--    resize: none;-->
<!--    min-height: 200px;-->
<!--}-->

<!--/* Add a red background color to the cancel button */-->
<!--.close button  {-->
<!--    background-color: royalblue;-->
<!--}-->

<!--/* Set a style for the submit/send button */-->
<!--.send button {-->
<!--    background-color: #04AA6D;-->
<!--    color: white;-->
<!--    padding: 16px 20px;-->
<!--    border: none;-->
<!--    cursor: pointer;-->
<!--    width: 100%;-->
<!--    margin-bottom:10px;-->
<!--    opacity: 0.8;-->
<!--}-->


<!--/*hover effect over buttons*/-->
<!--/*.form-container .btn:hover, .open-button:hover {*/-->
<!--/*    opacity: 1;*/-->
<!--/*}*/-->

<!--</style>-->
