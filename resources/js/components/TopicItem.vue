<template>
    <section>
        <div class="topic-item">
            <p class="btn" @click="$emit('print-topic', topic);

                            $parent.$emit('messages', {
                            text: 'Let me see what I can find about ' + topic + '....',
                            author:'bot',
                            type: 'text'
                        });

                        ">{{ topic }}</p>
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

.btn {
    display: table;
    background-color: #c99d30;
    color: white;
    text-align: left;
    text-decoration: none;
    font-style: italic;
    font-family: "Helvetica Neue", sans-serif;
    margin-right: 1rem;
    padding: .5rem;
    font-size: 1rem;
    border-radius: 4px;
}

.btn:hover {
    cursor: pointer;
    background-color: #3c444f;
    font-weight: bold;
}
</style>
