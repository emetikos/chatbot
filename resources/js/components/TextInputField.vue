<template>
<!--    //chat button to open text field -->
<!--    <button class="open-button" onclick="openForm()">Chat</button>-->
<!--//chat pop up -->
    <Conversation :responses="chatResponse" :messages="messages"/>





    <div class="chat-popup" id="myForm">
        <form action="/query" class="form-container">
            <h1>CHATBOT</h1>

            <label><b>Hi there, how can i help?</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

<!--            </button>-->
<!--            send button-->
            <button type="submit" class="btn" onclick="getInputValue();">Send</button>

<!--            //send button Icon-->
            <button style="font-size:24px"> <i class="material-icons">send</i></button>
<!--close chat box once close button is clicked -->
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "TextInputField",
        data () {
            return {
                title: 'Chat to Chatbot',
                chatResponse: null,
                messages:[]
            }
            // mounted()
            // {
            //     axios.get('/responses')
            //     .then((response))
            //     {
            //         this.chatResponse = response.data
            //     }
            // }
        }
    }

// function openForm() {
//     document.getElementById("myForm").style.display = "block";
// }

//close chat on click
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function getInputValue()
{
    // Selecting the input element and get its value
    document.getElementById("myInput").value;
}

</script>

<style scoped>

</style>
