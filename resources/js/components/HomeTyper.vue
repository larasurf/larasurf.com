<script>
import VueWriter from 'vue-writer';

export default {
    components: {
        VueWriter,
    },
    data() {
        return {
            items: [
                'A way to run Laravel projects locally using Docker',
                'A way to run Laravel projects on AWS',
                'A way to test and deploy Laravel projects using CircleCI',
            ],
        };
    },
    computed: {
    },
    mounted() {
    },
    methods: {
    },
}
</script>

<template>
    <VueWriter :array="items" :type-speed="50" :erase-speed="5" :intervals="1000" :start="1000" :delay="3000"/>
</template>

<style scoped>
</style>
