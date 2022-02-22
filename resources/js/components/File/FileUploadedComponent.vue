<template>
    <div class="chatbot-file-uploaded-container">
        <span v-if="this.$parent.isFileUploaded === true" class="chatbot-file-uploaded-success">File Uploaded! Analysing...</span>
        <span v-if="this.$parent.isFileUploaded !== true" class="chatbot-file-uploaded-failed">File Unable to be uploaded!</span>
    </div>
</template>

<script>

    export default {

    }

</script>

<style scoped>

    .chatbot-file-uploaded-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: auto;
        padding: 8px 16px;
        line-height: 36px;
        background-color: white;
        border: 1px solid var(--foreground-colour);
        border-radius: 3px;
    }

    .chatbot-file-uploaded-container .chatbot-file-uploaded span {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

</style>
