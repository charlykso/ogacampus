<template>
    <div id="HSiWHrtDjSJ">
        <button @click="$root.$emit('close-ticket')" class="Kjfiu938gkfjhgusGSej">
            <img src="/svg/Plus.svg" alt="" class="jGDh48BDfjoIv3">
        </button>
        <header class="gtudh38BSJv2hk">  
            <h1 class="ogs__modal__title app--text--truncate">{{ event.title }}</h1>
        </header>
        <h6 class="YSUYuw0SBh2fhFSH">{{ event.readableEventDate }}</h6>

        <main class="eds-modal__main">
            <div class="eds-modal__content">
                <div id="edsModalContentChildren" class="eds-modal__content__children">
                    <div v-for="(ticket, index) in event.ticket_price" :key="index" class="px-4 border-b">
                        <div class="py-4">
                            <div class="flex justify-between">
                                <div class="gjhdj30SJnjn2">
                                    <h1 class="ticket__modal__title app--text--truncate">{{ ticket.type }}</h1>
                                    <h6 class="ticket__price__jhjhtkt">&#8358;{{ ticket.price }}</h6>
                                </div>
                                <select name="" id="" class="ticket__selctrt__dnkr">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                </select>
                            </div>
                            <span class="ticket__status">Saled end on July 12, 2022</span>
                        </div>
                    </div>
                </div>
                <div class="eds-modal__footer-background">
                    <div class="px-4">
                        <div class="flex justify-between items-center LKHdkh3b--Snrh__nk">
                            <div class="relative">
                                <img src="/svg/Cart.svg" alt="Cart" class="">
                                <span class="absolute Xcey93SKhn3">1</span>
                            </div>
                            <button class="app__button btn__purple w-32">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        props: {
            event: {
                required: true
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>