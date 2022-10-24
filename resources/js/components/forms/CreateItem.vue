<template>
    <div>
        <form @submit.prevent="[item ? update() : submit()]">
            <div class="DJHDHBe__DSJb3j mb-5 relative">
                <select v-model="form.category_id" id="" class="RtrbjjK0HNDMb3jhk">
                    <option value="">Choose category</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.name }}</option>
                </select>
                <span v-if="form.errors.has('category_id')" class="text-red-500 text-xs">{{ form.errors.get('category_id') }}</span>
            </div>
            <div>
                <h1 class="text__dark__purple font-bold text-xl">Add Photo</h1>
                <p class="text__grey text-sm mb-2">Add at least 1 photo for this category</p>
                <p class="text__grey text-sm mb-2">First picture is the title picture</p>
            </div>
            <div class="mt-3">
                <input @change="uploadImages" type="file" ref="uploadImages" class="hidden" multiple>
                <button @click.prevent="triggerUpload" class="JHjdh38hNk__n3jj mb-3">
                    <img src="/svg/Plus-White.svg" alt="">
                </button>
                <p class="text__grey text-sm mb-2">Image must not exceed 5MB.</p>
                <p class="text__grey text-sm mb-2">Supported formats are *jpg, *gif, and *png</p>
                <p class="text__grey text-sm mb-2">Advert should contain from 1 to 10 images</p>
            </div>
            <div class="flex flex-wrap">
                <img v-for="(file, index) in files" :src="file" :key="index" alt="" height="100" class="fvhas82mSN">
            </div>
            <section class="mt-8">
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="flex justify-end mb-1">
                        <small class="text__grey">{{ titleCount }}/{{ maxTitle }}</small>
                    </div>
                    <input v-model="form.title" :maxlength="maxTitle" type="text" placeholder="Title">
                    <span v-if="form.errors.has('title')" class="text-red-500 text-xs">{{ form.errors.get('title') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="text" placeholder="Type" v-model="form.type">
                    <span v-if="form.errors.has('type')" class="text-red-500 text-xs">{{ form.errors.get('type') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <select v-model="form.condition" id="" class="RtrbjjK0HNDMb3jhk">
                        <option value="">Choose condition</option>
                        <option value="New">New</option>
                        <option value="Used">Used</option>
                        <option value="Refurbished">Refurbished</option>
                    </select>
                    <span v-if="form.errors.has('condition')" class="text-red-500 text-xs">{{ form.errors.get('condition') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="flex justify-end mb-1">
                        <small class="text__grey">{{ descCount }}/{{ maxDesc }}</small>
                    </div>
                    <textarea v-model="form.description" id="" :maxlength="maxDesc" placeholder="Item description" cols="30" rows="6"></textarea>
                    <span v-if="form.errors.has('description')" class="text-red-500 text-xs">{{ form.errors.get('description') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="w-full relative">
                        <input v-model="form.amount" type="text" placeholder="Amount" style="padding-left: 21%;">
                        <span class="YIHsbk39SJb2i__2b2jSk" style="width: 20%;text-align: center;padding:0">NGN</span>
                    </div>
                    <span v-if="form.errors.has('amount')" class="text-red-500 text-xs">{{ form.errors.get('amount') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="w-full relative">
                        <input v-model="form.phone_number" type="text" placeholder="Phone number" style="padding-left: 21%;">
                        <span class="YIHsbk39SJb2i__2b2jSk" style="width: 20%;text-align: center;padding:0">+234</span>
                    </div>
                    <span v-if="form.errors.has('phone_number')" class="text-red-500 text-xs">{{ form.errors.get('phone_number') }}</span>
                </div>
                <button :disabled="isLoading" class="app__button btn__purple mt-4 w-full">
                    <span v-if="!isLoading">{{ item ? 'Update Item' : 'Post Item' }}</span>
                    <button-loader v-else></button-loader>
                </button>
                <p class="mt-4 text__dark__purple text-sm">
                    By clicking on Post Item, you accept the terms of use and confirm that you would abide by it and declare that this posting does not include any prohibited items.
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
            categories: {
                required: true
            },
            url: {
                required: true
            },
            item: {
                required: false
            },
        },
        computed: {
            titleCount() {
                return this.form.title.length
            },
            descCount() {
                return this.form.description.length
            }
        },
        data() {
            return {
                isLoading: false,
                form: new Form({
                    category_id: '',
                    title: '',
                    condition: '',
                    amount: '',
                    phone_number: '',
                    type: '',
                    description: '',
                }),
                maxTitle: 60,
                maxDesc: 1000,
                item_images: [],
                files: [],
            }
        },
        methods: {
            triggerUpload() {
                this.$refs.uploadImages.click()
            },
            uploadImages(e) {
                this.item_images = []
                this.files = []
                let files = e.target.files
                if(files.length > 10) {
                    this.$toast.error("You can only select 10 images")
                    e.target.value = ''
                    return
                }
                Array.from(files).forEach((file, index) => {
                    this.addImage(file, index)
                })
            },
            addImage(file, index){
                if(!file.type.match('image*')){
                    this.$toast.error(`${file.name} is not an image`)
                    return
                }
                if(file.size > 512000) {
                    
                    this.$toast.error(`${file.name} is larger than 512kb`)
                    return
                }

                this.item_images.push(file)
                const reader = new FileReader()

                reader.onload = e => this.files.push(e.target.result)

                reader.readAsDataURL(file)
            },
            addTicketType() {
                let newType = {
                    name: '',
                    price: ''
                }

                this.form.ticket_types.push(newType)
            },
            async submit() {
                if(this.item_images.length < 1) {
                    this.$toast.error('You need a minimum of one image')
                    this.toTop()
                    return
                }
                this.isLoading = true
                try {
                    let {data} = await axios.post(this.url, this.prepareData())
                    await this.$toast.success('Item added successfully')
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
                this.item_images.forEach(image => {
                    formData.append('pictures[]', image)
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
            this.$root.$on('clear-item-form', () => {
                this.form.category_id = ''
                this.form.title = ''
                this.form.condition = ''
                this.form.amount = ''
                this.form.phone_number = ''
                this.form.type = ''
                this.form.description = ''

                this.item_images = []
                this.files = []
            })

            if(this.item) {
                this.form.category_id = this.item.category_id || ''
                this.form.title = this.item.title || ''
                this.form.condition = this.item.condition || ''
                this.form.amount = this.item.price || ''
                this.form.phone_number = this.item.phone_number || ''
                this.form.type = this.item.type || ''
                this.form.description = this.item.description || ''

                this.files = this.item.pictures
            }
        },
    }
</script>

<style scoped>

</style>