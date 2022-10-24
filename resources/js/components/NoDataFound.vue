<template>
    <div id="_SHik3urjKSo2">
        <img src="/images/no-data.jpg" :alt="title">
        <h1 v-html="title"></h1>
        <h4 v-if="subtitle" v-html="subtitle"></h4>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                required: true,
            },
            subtitle: {
                required: false,
            },
        } 
    }
</script>

<style scoped>
    
</style>