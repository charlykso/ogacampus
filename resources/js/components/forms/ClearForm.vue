<template>
    <button @click="clear" class="rSFe3SHfrSkfp text-red-500 font-semibold">
        Clear
    </button>
</template>

<script>
    export default {
        props: {
            form: {
                required: true
            }
        },
        methods: {
            clear() {
                this.$root.$emit(`clear-${this.form}-form`)
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>