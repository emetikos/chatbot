<template>
    <section class="chat-bot">
        <Topics ref="topics" />
        <main-window-component />
        <TextInputField/>
        <FileUploadComponent />
        <LinksOut />
    </section>
</template>

<script>
import Topics from '../components/Topics';
import MainWindowComponent from '../components/MainWindowComponent';
import FileUploadComponent from '../components/File/FileUploadComponent';
import LinksOut from '../components/LinksOut';
import TextInputField from "../components/TextInputField";

export default {
    components: {
        Topics,
        MainWindowComponent,
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
