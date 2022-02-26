<template>
    <section class="chat-bot">
        <Topics ref="topics" />
        <main-window-component />
        <FileUploadComponent />
        <LinksOut />
    </section>
</template>

<script>
import Topics from '../components/Topics';
import MainWindowComponent from '../components/MainWindowComponent';
import FileUploadComponent from '../components/File/FileUploadComponent';
import LinksOut from '../components/LinksOut';

export default {
    components: {
        Topics,
        MainWindowComponent,
	    FileUploadComponent,
        LinksOut
  }
}
</script>

<!-- global styling -->
<style>
    div {
        font-family: "Helvetica Neue", sans-serif;
    }
</style>
