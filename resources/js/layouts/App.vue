<template>
    <section class="chat-bot">
        <div class="chat-bot__container">
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

                    <FileUploadComponent />
                    <Topics ref="topics" />
                    <LinksOut/>

                </div>
                <TextInputField @messages="getMessages"/>
            </div>
        </div>
    </section>
</template>

<script>
import Topics from '../components/Topics';
import FileUploadComponent from '../components/File/FileUploadComponent';
import LinksOut from '../components/LinksOut';
import TextInputField from "../components/TextInputField";

export default {
    name: "MainWindowComponent",
    data: () => ({
        messages:[],
    }),
    methods: {
        getMessages(values) {
            this.messages.push(values);
        }
    },
    components: {
        Topics,
        TextInputField,
	    FileUploadComponent,
        LinksOut,
  },

}
</script>

<!-- global styling -->
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

</style>
