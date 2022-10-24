<template>
    <section id="event__filter">
        <div class="app__container JBskpSwjaks93S">
            <div class="flex" id="Bkd9Sj2dS2bddcSHgsc">
                <div class="w-10/12 mx-auto">
                    <div class="flex">
                        <button @click="goto" class="Hdg9873yhdGDt3nd3">Sell an item</button>
                        <div class="Ret8JBSj2Sk2S relative">
                            <input type="text" placeholder="Search for anything">
                            <img src="/svg/Search-Grey.svg" alt="search icon svg" class="JGSh287dKDhgSn absolute">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    export default {
        props: {
            postUrl: {
                required: true
            }
        },
        components: {

        },
        methods: {
            goto() {
                window.location.href = this.postUrl
            }
        },
        data() {
            return {}
        },
        created() {
            
        },
    }
</script>

<style lang="scss" scoped>

</style>