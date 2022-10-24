<template>
    <div class="Mndmo0__Sk3nD3jedS">
        <button @click="$root.$emit('event-category-closed')" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Back</span>
        </button>

        <div class="flex justify-between BdriSpoSMdHB items-center">
            <h1>Category</h1>
            <img src="/svg/Arrow-Down-Grey.svg" alt="">
        </div>

        <div class="mt-3">
            <ul class="h-0">
                <li @click="goto('')" class="BKSh39SNe3lfSn2">Any Category</li>
                <li @click="goto(category.id)" v-for="(category, index) in categories" :key="index" class="BKSh39SNe3lfSn2 cursor-pointer">{{ category.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            categories: {required: true},
            url: {
                required: false
            },
            generateUrl: {
                required: false
            },
        },
        methods: {
            async goto(value) {
                try {
                    const {data} = await axios.get(this.url, { params: { category: value } });
                    window.location.href = data.url
                } catch (error) {
                    console.log(error);
                }
            }
        },
    }
</script>

<style scoped>

</style>