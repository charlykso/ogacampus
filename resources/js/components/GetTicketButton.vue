<template>
    <div>
        <button @click="open" class="app__button w-full btn__purple px-4 mt-2">Get ticket</button>
        <get-ticket-page :event="event" v-if="openTicket"/>
    </div>
</template>

<script>
import GetTicketPage from './GetTicketPage.vue';
    export default {
        components: { GetTicketPage },
        props:{
            event: {required: true}
        },
        methods: {
            open() {
                this.openTicket = true
            }
        },
        data() {
            return {
                openTicket: false
            }
        },
        created() {
            this.$root.$on('close-ticket', () => {
                this.openTicket = false
            })
        },
    }
</script>

<style lang="scss" scoped>

</style>