<template>
    <div>
        <form @submit.prevent="[service ? update() : submit()]">
            <div class="DJHDHBe__DSJb3j mb-5 relative">
                <select v-model="form.category_id" id="" class="RtrbjjK0HNDMb3jhk">
                    <option value="">Choose category</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.name }}</option>
                </select>
                <span v-if="form.errors.has('category_id')" class="text-red-500 text-xs">{{ form.errors.get('category_id') }}</span>
            </div>
            <div>
                <h1 class="text__dark__purple font-bold text-xl">Add Photo</h1>
                <p class="text__grey text-sm mb-2">Add a photo/flyer of your business</p>
                <p class="text__grey text-sm mb-2">- a photo of what you do</p>
            </div>
            <div class="mt-3">
                <input class="hidden" type="file" ref="coverRef" @change="uploadCover">
                <button @click.prevent="triggerCoverUpload" class="JHjdh38hNk__n3jj mb-3">
                    <img src="/svg/Plus-White.svg" alt="">
                </button>
                <p class="text__grey text-sm mb-2">Image must not exceed 5MB.</p>
                <p class="text__grey text-sm mb-2">Supported formats are *jpg, *gif, and *png</p>
            </div>
            <span v-if="form.errors.has('logo')" class="text-red-500 text-xs">{{ form.errors.get('logo') }}</span>
            <div v-if="logo" class="mt-3 flex flex-wrap">
                <img :src="logo" alt="" height="100" class="fvhas82mSN" style="width: 25%">
            </div>
            <section class="mt-8">
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="flex justify-end mb-1">
                        <small class="text__grey">{{ titleCount }}/{{ maxTitle }}</small>
                    </div>
                    <input :maxlength="maxTitle" type="text" placeholder="Service name" v-model="form.service_name">
                    <span v-if="form.errors.has('service_name')" class="text-red-500 text-xs">{{ form.errors.get('service_name') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="flex justify-end mb-1">
                        <small class="text__grey">{{ descCount }}/{{ maxDesc }}</small>
                    </div>
                    <textarea :maxlength="maxDesc" id="" placeholder="Service description" v-model="form.description" cols="30" rows="6"></textarea>
                    <span v-if="form.errors.has('description')" class="text-red-500 text-xs">{{ form.errors.get('description') }}</span>
                </div>
                <h1 v-if="!service" class="text__dark__purple font-bold text-xl">Past projects</h1>
                <p v-if="!service" class="text__grey text-sm mb-2">Organise your past projects or works into folders. For example, a house painter can have different folders for each house painted, a birthday planner can have different folders for each birthday event.</p>

                <div v-if="!service" class="mt-4 grid md:grid-cols-3 grid-cols-2 sm:gap-4 gap-2">
                    <div v-for="(value, index) in defaultPictureCount" :key="index" @click="triggerPictureUpload('pictureRef' + index)" class="YUtge983jBS__dbjhg3h HJSl3S_3hSJS3__3h23 cursor-pointer" :style="readBackgroundImage(index)">
                        <input type="file" class="hidden" :ref="'pictureRef' + index" @change="uploadPicture($event, index)">
                        <img src="/svg/Plus-White.svg" alt="">
                    </div>
                </div>
                <div v-if="!service" class="mt-3 flex justify-end">
                    <span @click="addMorePicture" class="text-sm cursor-pointer py-1 px-2 text__light__purple">Create more items</span>
                </div>
                <button :disabled="isLoading" class="app__button btn__purple mt-4 w-full">
                    <span v-if="!isLoading">{{ service ? 'Update Service' : 'Post Service' }}</span>
                    <button-loader v-else></button-loader>
                </button>
                <p class="mt-4 text__dark__purple text-sm">
                    By clicking on Post service, you accept the terms of use and confirm that you would abide by it and declare that this posting does not include any illegal services.
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
            service: {
                required: false
            },
        },
        computed: {
            titleCount() {
                return this.form.service_name.length
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
                    service_name: '',
                    logo: '',
                    description: '',
                }),
                logo: '',
                maxTitle: 60,
                maxDesc: 1000,
                item_images: [1, 1,1,1,1],
                pictures: [1, 1,1,1,1],
                defaultPictureCount: 5
            }
        },
        methods: {
            triggerPictureUpload(value) {
                this.$refs[value][0].click()
            },
            uploadPicture(e, index) {
                let file = e.target.files[0]
                this.addImage(file, index)
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

                this.pictures.splice(index, 1, file)

                const reader = new FileReader()

                reader.onload = e => this.item_images.splice(index, 1, e.target.result)

                reader.readAsDataURL(file)
            },
            triggerCoverUpload() {
                this.$refs.coverRef.click()
            },
            uploadCover(e) {
                if(e.target.files.length == 0) {
                    return
                }
                this.form.logo = ''
                this.logo = ''
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

                this.form.logo = file;
                const reader = new FileReader()

                reader.onload = e => this.logo = e.target.result

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
            async submit() {
                if(!this.form.logo) {
                    this.$toast.error('You need to upload a business photo')
                    this.toTop()
                    return
                }
                this.isLoading = true
                try {
                    let {data} = await axios.post(this.url, this.prepareData())
                    await this.$toast.success('Service added successfully')
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
                    await this.$toast.success('Service updated successfully')
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
            this.$root.$on('clear-service-form', () => {
                this.form.category_id = ''
                this.form.title = ''
                this.form.condition = ''
                this.form.amount = ''
                this.form.phone_number = ''
                this.form.type = ''
                this.form.description = ''

                this.service_images = []
                this.files = []
            })

            if(this.service) {
                this.form.category_id = this.service.category_id
                this.form.service_name = this.service.service_name
                this.form.description = this.service.description

                this.logo = this.service.logo
            }
        },
    }
</script>

<style scoped>

</style>