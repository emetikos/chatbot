<template>
    <section class="chat-bot">
        <div class="chat-bot__container">
			<FileUploadComponent />
            <div class="chat-bot__header">

            </div>
            <div class="chat-bot__main">
                <!--<example-component/>-->
                <main-window-component/>
            </div>
            <div class="chat-bot__footer">

            </div>
        </div>
    </section>
</template>

<script>
// import ExampleComponent from '../components/ExampleComponent';
import MainWindowComponent from '../components/MainWindowComponent';
import FileUploadComponent from '../components/File/FileUploadComponent';

export default {
  components: {
    // ExampleComponent
      MainWindowComponent,
	  FileUploadComponent
  }
}
</script>

<style scoped>

</style>
