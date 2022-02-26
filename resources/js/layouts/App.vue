<template>
    <section class="chat-bot">
                <Topics/>
                <main-window-component/>
				<FileUploadComponent />
    </section>
</template>

<script>
import Topics from '../components/Topics';
import MainWindowComponent from '../components/MainWindowComponent';
import FileUploadComponent from '../components/File/FileUploadComponent';

export default {
  components: {
    Topics,
    MainWindowComponent,
	FileUploadComponent
  }
}
</script>

<!-- global styling -->
<style>
    div {
        font-family: "Helvetica Neue", sans-serif;
    }
</style>
