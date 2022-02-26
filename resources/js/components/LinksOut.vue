<template>
    <Links :links="links" />
</template>

<script>
    import Links from './Links';
    export default {
        name: 'LinksOut',
        data() {
            return {
                links: []
            }
        },
        // Should call python function, placeholder links for now
        created() {
            this.links = ['temporary','values','for','testing','https://www.nhs.uk/conditions/coronavirus-covid-19/testing/', 'https://justflipacoin.com/']
        },
        components: {
            Links
        }
    }
</script>