<template>
    <section id="event__filter">
        <div class="app__container JBskpSwjaks93S">
            <div class="flex" id="Bkd9Sj2dS2bddcSHgsc">
                <button class="jHSow9dSKh2vi vrGSbodH4SHl px-0-i">
                    <span>List Service</span>
                </button>
                <button @click="categoryOpen = !categoryOpen" class="jHSow9dSKh2vi HgsoasHSo3hdo">
                    <span v-if="!selectedCategory">Search by category</span>
                    <span v-else>{{ selectedCategory }}</span>
                    <img src="/svg/Arrow-Down-Grey.svg" alt="arrow down">
                </button>
                <button @click="sortOpen = !sortOpen" class="jHSow9dSKh2vi HgsoasHSo3hdo">
                    <span>Sort</span>
                    <img src="/svg/Arrow-Down-Grey.svg" alt="arrow down">
                </button>
                <button @click="searchOpen = !searchOpen" class="jHSow9dSKh2vi px-0-i">
                    <img src="/svg/Search-Grey.svg" alt="Search" class="JKSjeoeioSHo2o">
                </button>
            </div>
        </div>
        <category-listing :categoryId="categoryId" :url="url" :categories="categories" v-if="categoryOpen"/>
        <sort-listing :url="url" v-if="sortOpen"/>
        <search v-if="searchOpen"/>
    </section>
</template>

<script>
import CategoryListing from './CategoryFilterListing.vue'
import SortListing from './SortFilterListing.vue'
import Search from './Search.vue'
    export default {
        components: {
            CategoryListing, SortListing, Search
        },
        props: {
            categories: {
                required: true
            },
            url: {
                required: false
            },
            categoryId: {
                required: false
            },
        },
        data() {
            return {
                categoryOpen: false,
                sortOpen: false,
                searchOpen: false,
            }
        },
        computed: {
            selectedCategory() {
                if(this.categoryId) {
                    return this.categories.find(category => category.id == this.categoryId).name
                }

                return null
            }
        },
        created() {
            this.$root.$on('service-category-closed', () => {
                this.categoryOpen = false
            })
            this.$root.$on('service-sort-closed', () => {
                this.sortOpen = false
            })
            this.$root.$on('service-search-closed', () => {
                this.searchOpen = false
            })
        },
    }
</script>

<style lang="scss" scoped>

</style>
