<template>
    <div>
        <div v-for="link in links">
            <a href="url">{{link}}</a>
            <link-prevue :url="link" />
        </div>
    </div>
</template>

<script>
    import LinkPrevue from 'link-prevue'
    export default {
        name: 'Links',
        props: {
            links: Array
        },
        components: {
            LinkPrevue
        }
}
</script>