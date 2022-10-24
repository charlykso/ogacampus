<template>
    <div class="flex">
        <div class="w-5/12">
            <div class="JSjb3uhS__n3yS2" :class="{'opacity-40': isLoading}">
                <img v-if="!uploadedImage" src="/svg/Plus-White.svg" alt="arrow" class="w-6">
                <img v-else :src="uploadedImage" alt="arrow" class="m-auto w-24">
            </div>
        </div>
        <div class="w-7/12 flex items-center">
            <div class="pl-2">
                <div class="">
                    <p class="KJHGD3__n3bjhS">This ID would not be displayed on your profile or anywhere else, it is only for verification and record purposes.</p>
                    <input @change="upload" type="file" ref="uploadId" class="hidden">
                    <button :disabled="isLoading" @click="triggerUpload" class="w-full mt-2 app__button btn__purple">
                        <template v-if="!isLoading">
                            <span v-if="!uploadedImage">Upload ID</span>
                            <span v-else>Change ID</span>
                        </template>
                        <button-loader v-else/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonLoader from './ButtonLoader.vue'
    export default {
        props:{
            url: {
                required: true
            },
            verification: {
                required: false
            },
        },
	    components: { ButtonLoader },
        computed: {
            imageUploaded() {
                if(this.uploadedImage) {
                    return this.uploadedImage
                }

                return '/svg/Plus-White.svg'
            }
        },
        data() {
            return {
                uploadedImage: null,  
                isLoading: false           
            }
        },
        methods: {
            triggerUpload() {
                this.$refs.uploadId.click()
            },
            async upload(e) {
                this.isLoading = true
                let file = e.target.files[0]

                if(!file.type.match('image*')){
                    this.$toast.error(`${file.name} is not an image`)
                    this.isLoading = false
                    return
                }
                if(file.size > 5000000) {
                    this.$toast.error(`${file.name} is larger than 5mb`)
                    this.isLoading = false
                    return
                }

                let formData = new FormData();
                formData.append('id_card', file)

                try {
                    let {data} = await axios.post(this.url, formData)
                    this.$toast.success(data.message)
                    this.addImage(file)
                    this.isLoading = false

                } catch (error) {
                    this.isLoading = false
                    if(error.response.status == 422) {
                        this.$toast.error(`${error.response.data.errors['id_card'][0]}`)
                        return
                    }

                    this.$toast.error('An error occured while upload')
                    return
                }
            },
            addImage(file){
                const reader = new FileReader()

                reader.onload = e => this.uploadedImage = e.target.result

                reader.readAsDataURL(file)
            },
        },
        created() {
            if(this.verification && this.verification.id_card) {
                this.uploadedImage = this.verification.id_card
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>