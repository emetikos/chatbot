<template>
	<div class="chatbot-file-upload-container">
        <AttachFileComponent v-if="currentState === State.ATTACH_FILE" />
        <FileAttachedComponent v-if="currentState === State.FIlE_ATTACHED" />
        <FileUploadingComponent v-if="currentState === State.FILE_UPLOADING" />
        <FileUploadedComponent v-if="currentState === State.FILE_UPLOADED" />
	</div>
</template>

<script>

    import AttachFileComponent from "./AttachFileComponent";
    import FileAttachedComponent from "./FileAttachedComponent";
    import FileUploadingComponent from "./FileUploadingComponent";
    import FileUploadedComponent from "./FileUploadedComponent";


    // Import Vue's Axios for uploading files to the server
    window.axios = require("axios");
    // Set the header's CSRF token value
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] =
        document.getElementById("__token").content;


    /**
     * Sets the state of this component to the attach file state.
     */
    function setAttachFileState() {
        this.currentState = this.State.ATTACH_FILE;
    }

    /**
     * Sets the state of this component to the file attached state.
     */
    function setFileAttachedState() {
        this.currentState = this.State.FIlE_ATTACHED;
    }

    /**
     * Sets the state of this component to the file uploading state.
     */
    function setFileUploadingState() {
        this.currentState = this.State.FILE_UPLOADING;
    }

    /**
     * Sets the state of this component to the file uploaded state.
     */
    function setFileUploadedState() {
        this.currentState = this.State.FILE_UPLOADED;
    }

    /**
     * Uploads the file to the server, returning whether it was successful.
     *
     * If a file is not attached to this component, false will be returned
     * without any attempt at uploading the file.
     *
     * @returns {boolean}  whether the file was uploaded to the server
     */
    function uploadFile() {
        if (!this.hasFile()) {
            return false;
        }

        console.log("Uploading file: " + this.getFilename());

        // Change the component's state to file uploading
        this.setFileUploadingState();

        // Reference this component inside anonymous functions
        let component = this;
        // The form data containing the file to send via post
        let formData = new FormData();
        formData.append("pdf", this.file);
        // The config data containing the file upload progress function
        let config = {
            onUploadProgress(progressEvent) {
                component.onFileUploadProgress(progressEvent);
            },
        };

        // Upload the file with the progress, uploaded and error callback
        // functions
        axios.post(this.uploadURI, formData, config)
             .then(this.onFileUploaded)
             .catch(this.onFileUploadError);
    }

    /**
     * Called when the file has successfully been uploaded.
     *
     * Changes the component's state to file uploaded.
     *
     * @param response  the response from the http request
     */
    function onFileUploaded(response) {
        console.log("File uploaded! Analysing...");

        this.isFileUploaded     = true;
        this.fileUploadProgress = 100;

        this.setFileUploadedState();
    }

    /**
     * Called when the file being uploaded progresses.
     *
     * Updates the progress to the component which will then be displayed to the
     * user.
     *
     * @param progress  the progress of the file
     */
    function onFileUploadProgress(progress) {
        this.uploadProgress = (progress.loaded / progress.total) * 100;

        console.log(`File upload progress: ${this.fileUploadProgress}%`);
    }

    /**
     * Called when the file being uploaded encounters an error.
     *
     * @param error  the error that occurred
     */
    function onFileUploadError(error) {
        console.log(`Error Uploading File: ${error}`);
    }

    /**
     * Returns whether a file is attached to this component.
     *
     * @returns {boolean} whether a file is attached to this component
     */
    function hasFile() {
        return this.file !== null;
    }

    function isValidFile(file) {
        return (file instanceof File) && file.type === this.FileType.PDF;
    }

    /**
     * Returns the name of the file attached to this component, or an empty
     * string if a file is not attached.
     *
     * @returns {string}
     */
    function getFilename() {
        return this.hasFile() ? this.file.name : "";
    }

    /**
     * Sets the file for this component to the one given, changing the
     * component's state to file attached.
     *
     * If the file is not of type File or is not a PDF, the file will not be
     * set and false will be returned.
     *
     * @param file         the file to attach to this component
     * @returns {boolean}  whether or not the file was set
     */
    function setFile(file) {
        // Return false if the file is not of type File or is not a PDF
        if (!this.isValidFile(file)) {
            alert("File must be a PDF!");

            return false;
        }

        this.file = file;
        this.setFileAttachedState();

        return true;
    }

    /**
     * Removes the currently attached file from this component, changing the
     * component's state back to attach file.
     */
    function removeFile() {
        this.file = null;
        this.setAttachFileState();
    }


    export default {
        components: {
            AttachFileComponent,
            FileAttachedComponent,
            FileUploadingComponent,
            FileUploadedComponent,
        },

        methods: {
            setAttachFileState,
            setFileAttachedState,
            setFileUploadingState,
            setFileUploadedState,
            uploadFile,
            onFileUploaded,
            onFileUploadProgress,
            onFileUploadError,
            getFilename,
            hasFile,
            isValidFile,
            setFile,
            removeFile,
        },

        data() {
            return {
                State: {
                    ATTACH_FILE: 0,
                    FIlE_ATTACHED: 1,
                    FILE_UPLOADING: 3,
                    FILE_UPLOADED: 4,
                },
                FileType: {
                    PDF: "application/pdf"
                },

                currentState: 0,

                uploadURI: "/upload/pdf",
                file: null,
                isFileUploaded: false,
                fileUploadProgress: 0,
            }
        }
    }

</script>

<style scoped>

    .chatbot-file-upload-container {
        --background-colour: #FFFFFF;
        --background-colour-hover: #EFEFEF;
        --foreground-colour: #8F8F8F;
        --foreground-colour-hover: #6F6F6F;

        display: flex;
        align-items: center;
        justify-content: center;
        width: 320px;
        height: max-content;
        margin: 8px;
        overflow: hidden;
        box-sizing: border-box;
    }

    .chatbot-file-upload-container * {
        font-family: Verdana, serif;
        fill: var(--foreground-colour);
        color: var(--foreground-colour);
        outline: none;
        box-sizing: border-box;
    }

</style>
