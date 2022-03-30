<template>
    <ul class="link-previews-container">
        <slot></slot>
    </ul>
</template>

<script>

    import LinkPreviewComponent from "./LinkPreviewComponent";


    export default {
        components: {
            LinkPreviewComponent
        },
    }
</script>

<style scoped>
    .link-previews-container {
        display: block;
        width: 100%;
        height: max-content;
        overflow-y: hidden;
        overflow-x: auto;
        white-space: nowrap;
    }

</style>
