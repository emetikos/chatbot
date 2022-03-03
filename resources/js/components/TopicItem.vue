<template>
    <section>
        <div class="topic-item">
            <button class="btn" @click="$emit('print-topic', topic)" type="submit">{{ topic }}</button>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'topicItem',
        props:['topic'],

    }
</script>

<style scoped>

.topic-item {
    margin: .3rem;
    width: 100%;

}

.btn {
    background-color: white;
    color: black;
    border: none;
    padding: 4px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    font-style: italic;
    font-family: "Helvetica Neue", sans-serif;
}
</style>
