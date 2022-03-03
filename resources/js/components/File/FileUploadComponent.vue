<template>
	<div class="chatbot-file-upload-container">
        <AttachFileComponent ref="attach-file"
                             v-if="currentState === State.ATTACH_FILE" />
        <FileAttachedComponent ref="file-attached"
                               v-if="currentState === State.FIlE_ATTACHED" />
        <FileUploadingComponent ref="file-uploading"
                                v-if="currentState === State.FILE_UPLOADING" />
        <AnalyseFileComponent ref="analyse-file"
                              v-if="currentState === State.ANALYSE_FILE" />
	</div>
</template>

<script>

    import AttachFileComponent from "./AttachFileComponent";
    import FileAttachedComponent from "./FileAttachedComponent";
    import FileUploadingComponent from "./FileUploadingComponent";
    import AnalyseFileComponent from "./AnalyseFileComponent";


    /**
     * Sets the state of this component to the one specified.
     *
     * Waits for the next tick so the component is rendered.
     *
     * @param state  the new state of this component
     */
    async function setState(state) {
        if (Object.values(this.State).includes(state)) {
            this.currentState = state;

            // Wait for the component to render before continuing
            await this.$nextTick();

            return true;
        }

        return false;
    }

    /**
     * Sets the state of this component to the attach file state.
     */
    async function setAttachFileState() {
        return await this.setState(this.State.ATTACH_FILE);
    }

    /**
     * Sets the state of this component to the file attached state.
     */
    async function setFileAttachedState() {
        return await this.setState(this.State.FIlE_ATTACHED);
    }

    /**
     * Sets the state of this component to the file uploading state.
     */
    async function setFileUploadingState() {
        return await this.setState(this.State.FILE_UPLOADING);
    }

    /**
     * Sets the state of this component to the file uploaded state.
     */
    async function setAnalyseFileState() {
        return await this.setState(this.State.ANALYSE_FILE);
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

        // Change the component's state to file uploading
        this.setFileUploadingState();

        // Reference this component inside anonymous/embedded functions
        let component = this;
        // The form data containing the file to send via post
        let formData  = new FormData();
        formData.append("pdf", this.file);
        // The config data containing the file upload progress function
        let config    = {
            onUploadProgress(progressEvent) {
                component.onFileUploadProgress(progressEvent);
            },
        };

        // Upload the file with the progress, uploaded and error callback
        // functions
        axios.post(this.URL.UPLOAD_FILE, formData, config)
             .then(this.onFileUploaded)
             .catch(this.onFileUploadError);
    }

    /**
     * Called when the file being uploaded progresses.
     *
     * Updates the progress bar to display how much of the file has been
     * uploaded.
     *
     * @param progress  the progress event from the http request
     */
    function onFileUploadProgress(progress) {
        this.fileUploadProgress = (progress.loaded / progress.total) * 100;
    }

    /**
     * Called when the file has successfully been uploaded.
     *
     * Changes the component's state to file uploaded.
     *
     * If an error occurred uploading the file, a file upload error will be
     * displayed.
     *
     * @param response  the response from the http request
     */
    async function onFileUploaded(response) {
        let filePath = response.data;

        if (!(filePath instanceof String) || !filePath.trim()) {
            await this.onFileUploadError("Error uploading file!");
        }

        this.fileUploadProgress = 100;
        this.isFileUploaded     = true;

        await this.setAnalyseFileState();

        this.$refs["analyse-file"].setText("Analysing file!");

        // The form data containing the file to send via post
        let formData  = new FormData();
        formData.append("pdf", response.data);

        console.log(response.data);

        // Analyse the uploaded file
        axios.post(this.URI.ANALYSE_FILE, formData)
             .then(this.onFileAnalysed)
             .catch(this.onFileAnalyseError);
    }

    /**
     * Called when the file being uploaded encounters an error.
     *
     * Displays a file upload error, logging the error to the console.
     *
     * @param error  the error that occurred
     */
    async function onFileUploadError(error) {
        await this.setAnalyseFileState();

        this.$refs["analyse-file"].setText("Error uploading file!", true);

        console.log("Error Uploading File: ", error);
    }

    /**
     * Called when the uploaded file has been analysed.
     *
     * Displays the returned topics for the user to select, or an error if
     * the topics array was not returned in the response.
     *
     * @param response  the response from the http request
     */
    async function onFileAnalysed(response) {
        let topics = response.data["possibleTopics"];

        // Displays the topics returned and remove this component
        if (Array.isArray(topics)) {
            if (topics.length > 0) {
                this.$refs["analyse-file"].setText("File analysed!");
                this.isFileAnalysed = true;

                this.$parent.showTopics = true;

                await this.$nextTick();

                this.$parent.$refs["topics"].topics.topicsFound = topics;

                this.$parent.showFileUpload = false;
            }
            else {
                this.$refs["analyse-file"].setText("No topics found!");
            }
        }
        // Displays an error if the topics array was not returned
        else {
            this.onFileAnalyseError("Topics array was not returned!");
        }
    }

    /**
     * Called when the uploaded file being analysed encounters an error.
     *
     * Displays a file analyse error, logging the error to the console
     *
     * @param error  the error that occurred
     */
    function onFileAnalyseError(error) {
        this.$refs["analyse-file"].setText("Error analysing file!", true);

        console.log("Error Analysing File: ", error);
    }

    /**
     * Returns whether a file is attached to this component.
     *
     * @returns {boolean}  whether a file is attached to this component
     */
    function hasFile() {
        return this.file !== null;
    }

    /**
     * Returns whether the given file is a File object and a PDF.
     *
     * @param file         the file to check
     * @returns {boolean}  whether the given file is valid
     */
    function isValidFile(file) {
        return (file instanceof File) && (file.type === this.FileType.PDF);
    }

    /**
     * Returns the name of the file attached to this component, or a file not
     * found string if a file is not attached.
     *
     * @returns {string}  the name of the file attached, or a file not found
     *                    string
     */
    function getFilename() {
        return this.hasFile() ? this.file.name : "File not found!";
    }

    /**
     * Sets the file for this component to the one given, changing the
     * component's state to file attached.
     *
     * If the file is not a File object or is not a PDF, the file will not be
     * set and false will be returned.
     *
     * @param file         the file to attach to this component
     * @returns {boolean}  whether or not the file was attached
     */
    function setFile(file) {
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
            AnalyseFileComponent,
        },

        methods: {
            setState,
            setAttachFileState,
            setFileAttachedState,
            setFileUploadingState,
            setAnalyseFileState,
            uploadFile,
            onFileUploaded,
            onFileUploadProgress,
            onFileUploadError,
            onFileAnalysed,
            onFileAnalyseError,
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
                    FILE_UPLOADING: 2,
                    ANALYSE_FILE: 3,
                },
                FileType: {
                    PDF: "application/pdf"
                },
                URL: {
                    UPLOAD_FILE: "https://chatbot-educ-api.herokuapp.com/upload/pdf",
                },
                URI: {
                    ANALYSE_FILE: "/analyse",
                },

                currentState: 0,
                file: null,
                isFileUploaded: false,
                isFileAnalysed: false,
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

    * {
        font-family: Verdana, serif;
        fill: var(--foreground-colour);
        color: var(--foreground-colour);
        outline: none;
        box-sizing: border-box;
    }

</style>
