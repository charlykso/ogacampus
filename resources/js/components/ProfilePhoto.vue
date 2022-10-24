<template>
    <img :src="profilePhoto" alt="profile" class="mx-auto Hdku38hJSBk2__S2bj">
</template>

<script>
    export default {
        props: {
            photo: {
                required: false
            }
        },
        data() {
            return {
                profilePhoto: ''
            }
        },
        computed: {

        },
        created() {
            if(this.photo) {
                this.profilePhoto = this.photo
            }

            this.$root.$on('update-photo', data => {
                this.profilePhoto = data
            })
        },
    }
</script>

<style lang="scss" scoped>

</style>