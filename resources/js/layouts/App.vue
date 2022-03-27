<template>
    <section class="chat-bot">

        <div id="main_container" class="chat-bot__container">
            <div id="header-div" class="header-div-show ">
                <div id="header-icon"> <img :src="require('/img/chatbot2.png').default" alt="" ></div>
                <div id="header-title">Chatbot</div>
                <div id="header-close-btn"><input id="hideChatBot" type="button" value="X" v-on:click="hideChatBot"></div>
            </div>

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
                    <div v-if="showFileUpload" class="main-list__upload-file">
                        <FileUploadComponent />
                    </div>
                    <div v-if="showTopics" class="main-list__show-topics">
                        <Topics ref="topics" @chosenTopic="sendChosenTopic"/>
                    </div>
                    <div v-if="showLinks" class="main-list__show-links">
                        <LinksOut :topic="this.chosenTopic"/>
                    </div>
                    <div v-if="showFeedback" class="main-list__show-feedback">
                        <FeedbackComponent @showFeedback="isShowFeedback" />
                    </div>

                </div>
                <TextInputField @messages="getMessages" @readyToSubmit="isFileUploaded" @scroll="scrollDown"/>
            </div>
        </div>
    </section>
</template>

<script>
import Topics from '../components/Topics';
import FileUploadComponent from '../components/File/FileUploadComponent';
import TextInputField from "../components/TextInputField";
import FeedbackComponent from "../components/FeedbackComponent";
import LinksOut from "../components/LinksOut";

export default {
    name: "MainWindowComponent",
    data: () => ({
        messages:[],
        showFileUpload: false,
        showTopics: false,
        showLinks: false,
        showFeedback: false,
        chosenTopic: ''
    }),
    methods: {
        getMessages(values) {
            this.messages.push(values)
            this.$refs.chatBot.scrollTop = this.$refs.chatBot.scrollHeight
        },
        isFileUploaded(values) {
            if (values === 'False') this.showFileUpload = false
            if (values === 'True') this.showFileUpload = true
        },
        isShowFeedback(values) {
            if (values === 'False') this.showFeedback = false
            if (values === 'True') this.showFeedback = true
        },

        scrollDown(values) {
            if (values) this.$refs.chatBot.scrollTop = this.$refs.chatBot.scrollHeight
        },
        hideChatBot() {
           axios.get('/flash')
        },
        sendChosenTopic(chosenTopic){
            this.chosenTopic = chosenTopic
        }
    },
    components: {
        Topics,
        TextInputField,
	    FileUploadComponent,
        FeedbackComponent,
        LinksOut
  },

}
</script>


<style scoped lang="scss">

.main_container_hide{
    display: none;
}
// Messages
.main-list {

    display: flex;
    flex-direction: column;
    list-style-type: none;
    width: 435px;
    height: 533px;
    border-radius:0 0 4px 4px;
    position: fixed;
    left:5px;
    top:50px;
    justify-content: space-between;

}

.main-list__container {
    overflow: auto;
    scrollbar-width: none;  /* Firefox */

    ul {
        margin-block-start: unset;
        margin-block-end: unset;
        margin-inline-start: unset;
        margin-inline-end: unset;
        padding-inline-start: unset;
    }
}

.main-list__messages {
    display: flex;
    flex-direction: column;
    list-style-type: none;

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

// file upload container
.main-list__upload-file {
    display: flex;
    align-items: center;
    justify-content: center;
}

.header-div-show {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    width: 449px;
    height: 50px;
    position: fixed;
    top:0;
    left:0;
    background-color: #404650;
}

#header-icon {
    grid-column: 1/2;
    margin: 0 auto;
    line-height: 50px;
    padding-top: 5px;
}
#header-title {
    line-height: 50px;
    grid-column: 2/6;
    font-size: 20px;
    font-weight: bold;
    color: white;
}
#header-close-btn {
    grid-column: 6/7;
    line-height: 50px;
    margin:0 auto;
}

.main-list__show-topics {
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    display: inline-block;
}

</style>
