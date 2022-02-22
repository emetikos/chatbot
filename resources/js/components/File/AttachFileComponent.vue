<template>
    <div class="chatbot-attach-file-area"
         v-bind:class="{ 'drag-over' : this.isDragEvent } "
         @click="onClick"
         @dragover="onDragOver"
         @drop="onDrop">

        <input ref="file-input" class="chatbot-file-input"
               type="file" accept=".pdf"
               @change="onFileSelect">

        <span class="chatbot-attach-file-icon">&plus;</span>

        <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             class="chatbot-attach-file-icon">

            <path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"></path>
        </svg>-->

        <span class="chatbot-attach-file-text">
            Click or drag PDF here to upload
        </span>
    </div>
</template>

<script>

    /**
     * Called when the component is clicked.
     *
     * Opens the file input so the user can select a file from their device.
     *
     * @param event  the click event
     */
    function onClick(event) {
        this.$refs["file-input"].click();
    }

    /**
     * Called when something being dragged is over the component.
     *
     * Cancels the default event and updates the drop effect depending on
     * whether the item(s) being dragged is a file and is a PDF.
     *
     * @param event  the drag over event
     */
    function onDragOver(event) {
        event.preventDefault();

        if (!this.hasDraggedFilesGotPDFs(event.dataTransfer)) {
            event.dataTransfer.dropEffect = "none";
        }
    }

    /**
     * Called when something being dropped on the component.
     *
     * Cancels the default event and if the dropped item(s) is/contains a PDF
     * file, it will be added to the parent component and the parent's state
     * will change to file attached.
     *
     * @param event  the drop event
     */
    function onDrop(event) {
        event.preventDefault();

        // Attach the file to the parent component
        this.$parent.setFile(this.getPDFFileFromDrag(event.dataTransfer));
    }

    /**
     * Called when a file is added to the file input by the user.
     *
     * If the file is a PDF it will be attached to the parent component and the
     * parent's state will change to file attached.
     *
     * @param event
     */
    function onFileSelect(event) {
        // Attach the file to the parent component
        this.$parent.setFile(this.$refs["file-input"].files[0] ?? null);
        // Clear the file from the input
        this.$refs["file-input"].value = null;
    }

    /**
     * Returns a list of PDF files from those being dragged.
     *
     * If no PDF files were present, an empty list will be returned.
     *
     * @param dataTransfer  the DataTransfer object from the drag event
     * @returns {*[]}       the list of PDF files
     */
    function getPDFFilesFromDrag(dataTransfer) {
        let pdfFiles = [];

        if ((dataTransfer instanceof DataTransfer)) {
            // Whether the files are being retrieved from dataTransfer.items or
            // dataTransfer.files
            let isDataItems = dataTransfer.items !== null;
            let items = isDataItems ? dataTransfer.items : dataTransfer.files;
            let item;

            for (let i in items) {
                item = items[i];

                // If the dragged item is a file and a PDF, append it to the
                // list
                if ((item.kind === "file")
                        && (item.type === this.$parent.FileType.PDF)) {

                    pdfFiles.push(item);
                }
            }
        }

        return pdfFiles;
    }

    /**
     * Returns a PDF file from the dragged file(s).
     *
     * If no PDFs were present, null will be returned.
     *
     * @param dataTransfer   the DataTransfer object from the drag event
     * @returns {File|null}  the PDF file, or null
     */
    function getPDFFileFromDrag(dataTransfer) {
        let file = this.getPDFFilesFromDrag(dataTransfer)[0] ?? null;

        if (file === null) {
            return null;
        }
        else if (file instanceof File) {
            return file;
        }
        else {
            return file.getAsFile();
        }
    }

    /**
     * Returns whether the dragged files contain at least one PDF.
     *
     * @param dataTransfer  the DataTransfer object from the drag event
     * @returns {boolean}   whether the dragged files contain at least one PDF
     */
    function hasDraggedFilesGotPDFs(dataTransfer) {
        return this.getPDFFilesFromDrag(dataTransfer).length > 0;
    }


    export default {
        methods: {
            onClick,
            onDragOver,
            onDrop,
            onFileSelect,
            getPDFFilesFromDrag,
            getPDFFileFromDrag,
            hasDraggedFilesGotPDFs,
        },

        data() {
            return {
                isDragEvent: false,
            }
        }
    }
</script>

<style scoped>

    .chatbot-attach-file-area {
        display: flex;
        flex-flow: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        height: 180px;
        margin: 0;
        padding: 8px;
        background-color: var(--background-colour);
        border: 3px dashed var(--foreground-colour);
        border-radius: 8px;
        cursor: pointer;
    }

    .chatbot-attach-file-area:hover {
        background-color: var(--background-colour-hover);
    }

    .chatbot-attach-file-area:hover * {
        fill: var(--foreground-colour-hover);
        color: var(--foreground-colour-hover);
    }

    .chatbot-attach-file-area .chatbot-file-input {
        display: none !important;
    }

    .chatbot-attach-file-area .chatbot-attach-file-icon,
    .chatbot-attach-file-area .chatbot-attach-file-text {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .chatbot-attach-file-area .chatbot-attach-file-icon {
        font-size: 6em;
    }

    .chatbot-attach-file-area .chatbot-attach-file-text {
        font-size: 1em;
    }

</style>
