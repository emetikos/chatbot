<template>
<!--    //chat button to open text field -->
<!--    <button class="open-button" onclick="openForm()">Chat</button>-->
<!--//chat pop up -->
    <div class="">
    <Conversation :responses="chatResponse" :messages="messages"/>

        <!--chat button to open chat-->
<!--        <button class="open-button" v-on:click="openForm()">Chat</button>-->

    <div class="chat-popup" id="myForm">
        <form action="/query.php" class="form-container">


            <h1>CHATBOT</h1>
            <br>
            <label><b>Hi there, how can i help?</b></label>
            <br/>
            <textarea placeholder="Type message.." name="msg" required></textarea>

<!--            </button>-->
<!--            send button-->
            <button type="submit" class="btn" onclick.native="getInputValue();">Send</button>
            <br>
<!--            //send button Icon-->
<!--            <button style="font-size:24px"> <i class="material-icons">send</i></button>-->
<!--close chat box once close button is clicked -->

            <button type="button" class="btn cancel" onclick.native="closeForm()">Close</button>
<!--            <form v-on:submit.prevent="submitForm">-->




        </form>
    </div>
    </div>
</template>

<script>
export default {
    name: "TextInputField",
    data() {
        return {
            title: 'Chat to Chatbot',
            chatResponse: null,
            messages: []
        }
        // methods:
        // {
        //
        //     //if user doesn't input message it won't allow for user to send
        //     sendMessage() {
        //         if( this.message == ''){
        //             return;
        //         }
        //         //get response from right class
        //         axios.post('/chat/responses',{
        //             message: this.message
        //         })
        // }
        // }


// function openForm() {
//     document.getElementById("myForm").style.display = "block";
// }

//close chat on click
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function getInputValue() {
            // Selecting the input element and get its value
            document.getElementById("myInput").value;
        }

    }
}

</script>

<style scoped>
/*send button icon */
/*insert here*/


/*inner chat box sizing*/
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
/*.open-button {*/
/*    background-color: #555;*/
/*    color: white;*/
/*    padding: 16px 20px;*/
/*    border: none;*/
/*    cursor: pointer;*/
/*    opacity: 0.8;*/
/*    position: fixed;*/
/*    bottom: 23px;*/
/*    right: 28px;*/
/*    width: 280px;*/
/*}*/

/* The popup chat button */
/*.chat-popup {*/
/*    display: none;*/
/*    position: fixed;*/
/*    bottom: 0;*/
/*    right: 15px;*/
/*    border: 3px solid #f1f1f1;*/
/*    z-index: 9;*/
/*}*/

/*text box border*/
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/*text container*/
.form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
}

/* Add a red background color to the cancel button */
.close button  {
    background-color: royalblue;
}

/* Set a style for the submit/send button */
.send button {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
}


/*hover effect over buttons*/
/*.form-container .btn:hover, .open-button:hover {*/
/*    opacity: 1;*/
/*}*/

</style>
