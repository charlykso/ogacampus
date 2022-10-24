<template>
    <div>
        <form @submit.prevent="[shop ? update() : submit()]">
            <div class="DJHDHBe__DSJb3j mb-5 relative">
                <div class="flex justify-end mb-1">
                    <small class="text__grey">{{ titleCount }}/{{ maxTitle }}</small>
                </div>
                <input :maxlength="maxTitle" type="text" placeholder="Shop name" v-model="form.business_name">
                <span v-if="form.errors.has('business_name')" class="text-red-500 text-xs">{{ form.errors.get('business_name') }}</span>
            </div>
            <div class="DJHDHBe__DSJb3j mb-5 relative">
                <div class="flex justify-end mb-1">
                    <small class="text__grey">{{ mottoCount }}/{{ maxTagline }}</small>
                </div>
                <input :maxlength="maxTagline" type="text" placeholder="Shop motto" v-model="form.tagline">
                <span v-if="form.errors.has('tagline')" class="text-red-500 text-xs">{{ form.errors.get('tagline') }}</span>
            </div>
            <div class="DJHDHBe__DSJb3j mb-5 relative">
                <div class="flex justify-end mb-1">
                    <small class="text__grey">{{ descCount }}/{{ maxDesc }}</small>
                </div>
                <textarea :maxlength="maxDesc" id="" placeholder="Shop description" v-model="form.description" cols="30" rows="6"></textarea>
                <span v-if="form.errors.has('description')" class="text-red-500 text-xs">{{ form.errors.get('description') }}</span>
            </div>
            <div>
                <h1 class="text__dark__purple font-bold text-xl">Business Cover Photo</h1>
                <p class="text__grey text-sm mb-2">Width of photo should be at least 1400px and height 800px</p>
                <p class="text__grey text-sm mb-2">Supported formats are *jpg, *gif, and *png.</p>
                <p class="text__grey text-sm mb-2">Image must not exceed 5MB</p>
            </div>
            <input class="hidden" type="file" ref="coverRef" @change="uploadCover">
            <button @click.prevent="triggerCoverUpload" class="JHsjh37ySBSSJ3">
                <img src="/svg/Plus-White.svg" alt="">
            </button>
            <span v-if="form.errors.has('cover_image')" class="text-red-500 text-xs">{{ form.errors.get('cover_image') }}</span>
            <div v-if="cover_image" class="mt-3 flex flex-wrap">
                <img :src="cover_image" alt="" height="100" class="fvhas82mSN" style="width: 25%">
            </div>
            <section class="mt-8">
                <h1 v-if="!shop" class="text__dark__purple font-bold text-xl">Add Items</h1>
                <p v-if="!shop" class="text__grey text-sm mb-2">To give your shop the best experience, each item will be posted individually but can also be viewed collectively in your shop.</p>

                <div v-if="!shop" class="mt-4 grid md:grid-cols-3 grid-cols-2 sm:gap-4 gap-2">
                    <div v-for="(value, index) in defaultPictureCount" :key="index" @click="triggerPictureUpload('pictureRef' + index)" class="YUtge983jBS__dbjhg3h HJSl3S_3hSJS3__3h23 cursor-pointer" :style="readBackgroundImage(index)">
                        <input type="file" class="hidden" :ref="'pictureRef' + index" @change="uploadPicture($event, index)">
                        <img src="/svg/Plus-White.svg" alt="">
                    </div>
                </div>
                <div v-if="!shop" class="mt-3 flex justify-end">
                    <span @click="addMorePicture" class="text-sm cursor-pointer py-1 px-2 text__light__purple">Create more items</span>
                </div>
                <button :disabled="isLoading" class="app__button btn__purple mt-4 w-full">
                    <span v-if="!isLoading">{{ shop ? 'Update Shop' : 'Post Shop' }}</span>
                    <button-loader v-else></button-loader>
                </button>
                <p class="mt-4 text__dark__purple text-sm">
                    By clicking on Post shop, you accept the terms of use and confirm that you would abide by it and declare that this posting does not include any prohibited items.
                </p>
            </section>
        </form>
    </div>
</template>

<script>
import ButtonLoader from '../ButtonLoader.vue'
    export default {
        components: {
            ButtonLoader
        },
        props: {
            url: {
                required: true
            },
            shop: {
                required: false
            },
        },
        computed: {
            titleCount() {
                return this.form.business_name.length
            },
            mottoCount() {
                return this.form.tagline.length
            },
            descCount() {
                return this.form.description.length
            },
        },
        data() {
            return {
                isLoading: false,
                form: new Form({
                    business_name: '',
                    tagline: '',
                    description: '',
                    cover_image: ''
                }),
                maxTitle: 60,
                maxTagline: 100,
                maxDesc: 1000,
                item_images: [1, 1,1,1,1],
                pictures: [1, 1,1,1,1],
                cover_image: '',
                defaultPictureCount: 5
            }
        },
        methods: {
            triggerCoverUpload() {
                this.$refs.coverRef.click()
            },
            triggerPictureUpload(value) {
                this.$refs[value][0].click()
            },
            uploadPicture(e, index) {
                let file = e.target.files[0]
                this.addImage(file, index)
            },
            uploadCover(e) {
                if(e.target.files.length == 0) {
                    return
                }
                this.form.cover_image = ''
                this.cover_image = ''
                let file = e.target.files[0]
                
                let img = new Image()
                img.src = window.URL.createObjectURL(file)
                if(!file.type.match('image*')){
                    this.$toast.error(`${file.name} is not an image`)
                    return
                }
                if(file.size > 800000) {
                    
                    this.$toast.error(`${file.name} is larger than 512kb`)
                    return
                }
                img.onload = () => {
                    if(img.width < 1400 || img.height < 800){
                        this.formError = true
                        e.target.value = ''
                        this.$toast.error(`Width of photo should be at least 1400px and height 800px`)
                        return
                    }
                }

                this.form.cover_image = file;
                const reader = new FileReader()

                reader.onload = e => this.cover_image = e.target.result

                reader.readAsDataURL(file)
            },
            addMorePicture() {
                this.defaultPictureCount += 1
                this.item_images.push(1)
                this.pictures.push(1)
            },
            readBackgroundImage(index) {
                if(this.item_images[index] != 1) {
                    return `backgroundImage: url(${this.item_images[index]})`
                }

                return ''
            },
            addImage(file, index){
                let img = new Image()
                img.src = window.URL.createObjectURL(file)
                if(!file.type.match('image*')){
                    this.$toast.error(`${file.name} is not an image`)
                    return
                }
                if(file.size > 800000) {
                    
                    this.$toast.error(`${file.name} is larger than 800kb`)
                    return
                }

                // Push file to array
                // Push image to array

                this.pictures.splice(index, 1, file)

                const reader = new FileReader()

                reader.onload = e => this.item_images.splice(index, 1, e.target.result)

                reader.readAsDataURL(file)
            },
            async submit() {
                if(!this.form.cover_image) {
                    this.$toast.error('You need to upload a cover image')
                    this.toTop()
                    return
                }
                this.isLoading = true
                try {
                    let {data} = await axios.post(this.url, this.prepareData())
                    await this.$toast.success('Shop added successfully')
                    window.location.href = data.redirect
                    this.isLoading = false

                } catch (error) {
                    this.isLoading = false
                    if(error.response.status == 422) {
                        this.form.errors.record(error.response.data.errors)
                        this.toTop()
                        return
                    }

                    this.$toast.error('An error occured while submitting')
                    return
                }
            },
            async update() {
                
                this.isLoading = true
                try {
                    let {data} = await axios.post(this.url, this.prepareData())
                    await this.$toast.success('Item updated successfully')
                    window.location.href = data.redirect
                    this.isLoading = false

                } catch (error) {
                    this.isLoading = false
                    if(error.response.status == 422) {
                        this.form.errors.record(error.response.data.errors)
                        this.toTop()
                        return
                    }

                    this.$toast.error('An error occured while submitting')
                    return
                }
            },
            prepareData() {
                let formData = new FormData();
                this.pictures.forEach(image => {
                    if(image != 1) {
                        formData.append('pictures[]', image)
                    }
                })

                for(let obj in this.form){
                    if(obj != 'errors' && obj != 'ticket_types') {
                        formData.append(obj, this.form[obj])
                    }
                }

                return formData
            }
        },
        created() {
            this.$root.$on('clear-shop-form', () => {
                this.form.business_name = ''
                this.form.tagline = ''
                this.form.description = ''
                this.form.cover_image = ''

                this.item_images = [1,1,1,1,1]
                this.pictures = [1,1,1,1,1]
            })

            if(this.shop) {
                this.form.business_name = this.shop.business_name || ''
                this.form.tagline = this.shop.tagline || ''
                this.form.description = this.shop.description || ''

                if(this.shop.cover_image) {
                    this.cover_image = this.shop.cover_image
                }

                if(this.shop.pictures) {
                    this.cover_image = this.shop.cover_image
                }
            }
        },
    }
</script>

<style scoped>

</style>