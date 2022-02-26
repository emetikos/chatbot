<template>
    <div class="chatbot-attached-file-container">
        <span class="chatbot-attached-file-name"
              v-bind:title="$parent.getFilename()">
            {{ $parent.getFilename() }}
        </span>

        <button class="chatbot-attached-file-button"
                title="Upload File"
                @click="$parent.uploadFile">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <rect fill="none"></rect>
                <path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"></path>
            </svg>
        </button>

        <button class="chatbot-attached-file-button"
                title="Remove File"
                @click="$parent.removeFile">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path>
            </svg>
        </button>
    </div>
</template>

<script>

    export default {

    }

</script>

<style scoped>

    .chatbot-attached-file-container {
        display: grid;
        grid-template-rows: 100%;
        grid-template-columns: auto max-content max-content;
        align-items: center;
        grid-gap: 12px;
        width: 100%;
        margin: 4px;
        padding: 12px 20px;
        background-color: var(--background-colour);
        box-shadow: 0 0 4px var(--foreground-colour);
    }

    .chatbot-attached-file-name {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .chatbot-attached-file-button {
        width: 24px;
        height: 24px;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .chatbot-attached-file-button > svg {
        width: 100%;
        height: 100%;
    }

</style>
