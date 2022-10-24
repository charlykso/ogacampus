<template>
    <div class="event__card__xdc">
        <div class="rXcwsDfHw3Snto">
            <div class="Mkdh93S2ShtSHo2S flex">
                <div class="flex justify-center items-center">
                    <img :src="getImage" alt="user" class="Bch7NLjhdglGDfbile">
                </div>
            </div>
            <div @click="goto" class="Kshue7Snk2vfkBW2">
                <div class="Kd93jNSKh3rdWz">
                    {{ service.user.profile.fullName }}
                </div>
                <div class="Kjd83nSk2">{{ service.service_name }}</div>
                <div class="flex justify-between mt-4">
                    <div class="flex items-center">
                        <img src="/svg/Rating-fill.svg" alt="" class="ydu__JS3oSj3Sl">
                        <span class="HSo__SwndkHWY3">4.0 (5 Reviews)</span>
                    </div>
                    <button class="Bgd93SN2S__ndjh2k">Contact Now</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            url: {required: false},
            service: {required: false},
        },
        methods: {
            goto() {
                window.location.href = this.url
            }
        },
        computed:{
            getImage() {
                return this.service.logo ?? '/images/nothumbnail.jpeg'
            }
        }
    }
</script>
