<template>
	<div class="chatbot-file-uploading-container">
        <span class="chatbot-file-uploading-text">Uploading {{ this.$parent.getFilename() }}</span>
        <span class="chatbot-file-uploading-progress" v-bind:style="{ background: getProgressBackground }"></span>
    </div>
</template>

<script>

    export default {
        computed: {
            getProgressBackground() {
                return `linear-gradient(to right, green ${this.$parent.fileUploadProgress}%, white 0)`;
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
        grid-gap: 0;
        width: 100%;
        height: auto;
        padding: 8px 16px;
        line-height: 36px;
        background-color: white;
        border: 1px solid var(--foreground-colour);
        border-radius: 3px;
    }

    .chatbot-file-uploading-container .chatbot-file-uploading-text {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .chatbot-file-uploading-container .chatbot-file-uploading-progress {
        width: 100%;
        height: 3px;
    }

</style>
