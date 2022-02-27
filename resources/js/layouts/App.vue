<template>
    <section class="chat-bot">
        <div class="chat-bot__conainer">
            <Topics ref="topics" />
            <TextInputField/>
            <FileUploadComponent />
            <LinksOut />
        </div>
    </section>
</template>

<script>
import Topics from '../components/Topics';
import FileUploadComponent from '../components/File/FileUploadComponent';
import LinksOut from '../components/LinksOut';
import TextInputField from "../components/TextInputField";

export default {
    components: {
        Topics,
        TextInputField,
	    FileUploadComponent,
        LinksOut,

  }
}
</script>

<!-- global styling -->
<style>
    div {
        font-family: "Helvetica Neue", sans-serif;
    }
</style>
