<template>
    <div class="chatbot-analyse-file-container">
        <span class="chatbot-analyse-file-text"
              v-bind:class="{ 'error': isError }">
            {{ text }}
        </span>
    </div>
</template>

<script>

    /**
     * Sets the text displayed on this component.
     *
     * @param text     the text to display
     * @param isError  whether the text being displayed represents an error
     */
    function setText(text="", isError=false) {
        this.text    = text;
        this.isError = isError === true;
    }

    export default {
        methods: {
            setText,
        },

        data() {
            return {
                text: "",
                isError: false,
            }
        }
    }

</script>

<style scoped>

    .chatbot-analyse-file-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: auto;
        margin: 4px;
        padding: 12px 20px;
        background-color: var(--background-colour);
        box-shadow: 0 0 4px var(--foreground-colour);
        /*border: 1px solid var(--foreground-colour);
        border-radius: 3px;*/
    }

    .chatbot-analyse-file-text {
        width: 100%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .chatbot-analyse-file-text.error {
        color: red;
    }

</style>
