<template>
    <div class="Mndmo0__Sk3nD3jedS">
        <button @click="$root.$emit('service-sort-closed')" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Back</span>
        </button>

        <div class="flex justify-between BdriSpoSMdHB items-center">
            <h1>Sort</h1>
            <img src="/svg/Arrow-Down-Grey.svg" alt="">
        </div>

        <div class="mt-3">
            <ul class="h-0">
                <li class="BKSh39SNe3lfSn2 active">Any Sort</li>
                <li class="BKSh39SNe3lfSn2">Sort by high price</li>
                <li class="BKSh39SNe3lfSn2">Sort by low price</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                required: true
            }
        },
        methods: {
            async goto(value) {
                try {
                    const {data} = await axios.get(this.url, { params: { price: value } });
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