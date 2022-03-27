<template>
    <div>
        <div class="card" v-for="link in links">
            <link-prevue :url="link" cardWidth="200px"></link-prevue>
        </div>
        <div v-for="link in links">
            <a v-bind:href="link" target="_blank">{{link}}</a>
        </div>
    </div>
</template>

<script>
    import LinkPrevue from 'link-prevue'
    export default {
        name: 'Links',
        props: [
            'links'
        ],
        components: {
            LinkPrevue
        }
}
</script>

<style>
    /*a {*/
    /*    display: table;*/
    /*    margin-left: .5rem;*/
    /*    padding: .5rem;*/
    /*    background: green;*/
    /*    color: blue;*/
    /*    font-size: 1rem;*/
    /*    border-radius: 4px;*/
    /*    max-width: 100%;*/
    /*}*/
    /*.card {*/
    /*    display: inline-block;*/
    /*}*/
</style>
