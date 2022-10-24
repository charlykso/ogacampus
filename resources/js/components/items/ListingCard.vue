<template>
    <div class="LSjS__Sn2jheiS8273">
        <div @click="goto" class="LJLS___dnbjw873SD" :class="css">
            <img :src="getImage" :alt="item.title" class="JHKjS__SNj3kDKN2">
        </div>
        <div @click="goto" class="gFYUS__SNk2UNelLK">
            <p class="Kd___Dj4kSP3SKh3Wz SHi83KSK__SNj27">{{ item.title }}</p>
            <div class="flex justify-between">
                <span class="KHD73hnS__n3j6">&#8358; {{ item.price }}</span>
                <span class="BdjhS__3bu3WB2">Used</span>
            </div>
        </div>
        <button v-if="!edit" class="B7BS_ShVSBs__SBj27">Show Contact</button>
        <button v-else class="B7BS_ShVSBs__SBj27">Edit Item</button>
    </div>
</template>

<script>
    export default {
        props: {
            item: {
                required: true
            },
            css: {
                required: false
            },
            edit: {
                required: false
            },
            url: {
                required: false
            },
        },
        methods: {
            goto() {
                window.location.href = this.url;
            }
        },
        computed: {
            getImage() {
                if(this.item.pictures) {
                    return this.item.pictures[0]
                }

                return '/images/nothumbnail.jpg'
            }
        }
    }
</script>
