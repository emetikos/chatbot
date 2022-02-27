
Template for the  main window to display response from the chatbot as a text
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

    </div>


</template>


<script>
export default {
    name: "MainWindowComponent",
    props: ['messages'],
}
</script>

<style scoped lang="scss">

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
