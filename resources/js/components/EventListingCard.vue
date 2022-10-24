<template>
    <div @click="goto" class="event__card__xdc">
        <div class="rXcwsDfHw3Snto">
            <div class="Lkd83nPSjS2">
                <div class="Kd93jNSKh3rdWz">
                    {{ event.title }}
                </div>
                <div class="Kjd83nSk2">{{ event.category.name }}</div>

                <div class="Vgt5VS2SkfoSb2d">
                    <div class="Qad39SM3fpW2">
                        <img src="/svg/Calendar.svg" alt="icon">
                        <span class="VgryUw3jS1WmPkd">{{ event.readableEventDate }}</span>
                    </div>
                    <div class="Qad39SM3fpW2">
                        <img src="/svg/Location.svg" alt="icon">
                        <div class="VgryUw3jS1WmPkd Kd___Dj4kSP3SKh3Wz">
                            {{ event.address }}
                        </div>
                    </div>
                    <div class="TrGGSwiS2SkCbe3">
                        <img src="/svg/Money.svg" alt="icon">
                        <span class="VgryUw3jS1WmPkd" v-html="readableAmount"></span>
                    </div>
                </div>
            </div>
            <div class="Wq73NSorpEPfnv">
                <img src="/images/events/event-one.jpg" alt="icon">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            url: {required: false},
            event: {required: false},
        },
        methods: {
            goto() {
                window.location.href = this.url
            }
        },
        computed: {
            readableAmount() {
                if(this.event.isFree == 1) {
                    return 'Free'
                }

                if(this.event.ticket_price.length > 1) {
                    return 'Multi Ticket'
                }

                let amount = this.event.ticket_price[0].price
                return '&#8358;' + amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>