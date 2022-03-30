<template>
    <a class="link-preview-card" v-bind:href="this.URL" target="_blank"
       v-bind:title="(this.title != null) ? this.title : this.URL">

        <img class="link-preview-icon" v-bind:src="this.icon" />
        <span v-bind:class="(this.title != null)
                            ? 'link-preview-title'
                            : 'link-preview-url'">
            {{(this.title != null) ? this.title : this.URL}}
        </span>
    </a>
</template>

<script>

    /**
     * Loads the preview data from the given URL.
     *
     * @param url  the url of the webpage
     */
    function loadPreviewData(url) {
        let formData  = new FormData();
        formData.append("url", url);

        axios.post("/linkPreviewData", formData)
             .then(this.onPreviewDataLoaded)
             .catch(this.onPreviewDataError);
    }

    /**
     * Updates the icon and title to the ones retrieved if they are not null.
     *
     * @param response  the response from the HTTP POST request
     * @returns {Promise<void>}
     */
    async function onPreviewDataLoaded(response) {
        if (response.data.icon != null) {
            this.icon = response.data.icon;
        }

        if (response.data.title != null) {
            this.title = response.data.title;
        }
    }

    /**
     * Logs the error that occurred whilst retrieving the preview data.
     *
     * @param error  the error that occurred
     */
    function onPreviewDataError(error) {
        console.log("ERROR GETTING PREVIEW DATA");
        console.log(error);
    }

    export default {
        mounted() {
            this.loadPreviewData(this.$props.url);
        },

        methods: {
            loadPreviewData,
            onPreviewDataLoaded,
            onPreviewDataError,
        },

        props: [
            "url",
        ],

        data() {
            return {
                URL: this.$props.url,
                icon: "/images/image-placeholder.svg",
                title: null,
            }
        }
    }
</script>

<style scoped>
    .link-preview-card {
        display: inline-grid;
        grid-template-rows: 100%;
        grid-template-columns: max-content auto;
        grid-template-areas: "icon title";
        align-items: center;
        height: 100px;
        grid-gap: 12px;
        width: 80%;
        padding: 16px;
        margin: 8px 0;
        border: 1px solid var(--grey);
        border-radius: 5px;
        background-color: white;
        white-space: initial;
    }

    .link-preview-card:not(:first-child) {
        margin-left: 20px;
    }

    .link-preview-card:hover {
        background-color: #EFEFEF;
    }

    .link-preview-icon {
        height: inherit;;
        border-radius: 6px;
        grid-area: icon;
    }

    .link-preview-title, .link-preview-url {
        height: max-content;
        max-height: 100%;
        font-size: 15px;
        font-weight: bold;
        color: var(--grey);
        overflow: hidden;
        grid-area: title;
    }

    .link-preview-title {
        word-break: break-word;
    }

    .link-preview-url {
        word-break: break-all;
    }
</style>
