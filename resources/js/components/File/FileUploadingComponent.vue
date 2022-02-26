<template>
	<div class="chatbot-file-uploading-container">
        <span class="chatbot-file-uploading-text">
            Uploading {{ this.$parent.getFilename() }}
        </span>

        <span class="chatbot-file-uploading-progress"
              v-bind:style="{ background: getProgressBackground }"></span>
    </div>
</template>

<script>

    export default {
        computed: {
            getProgressBackground() {
                return `linear-gradient(
                            to right,
                            green ${this.$parent.fileUploadProgress}%,
                            grey 0)`;
            },
        },
    }

</script>

<style scoped>

    .chatbot-file-uploading-container {
        display: grid;
        grid-template-rows: auto max-content;
        grid-template-columns: 100%;
        align-items: center;
        grid-gap: 8px;
        width: 100%;
        height: auto;
        margin: 4px;
        padding: 12px 20px;
        background-color: var(--background-colour);
        box-shadow: 0 0 4px var(--foreground-colour);
        /*border: 1px solid var(--foreground-colour);
        border-radius: 3px;*/
    }

    .chatbot-file-uploading-text {
        width: 100%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .chatbot-file-uploading-progress {
        width: 100%;
        height: 3px;
    }

</style>
