<template>
    <div>
        <input @change="upload" type="file" ref="uploadPhoto" class="hidden">
        <button :disabled="isLoading" @click="triggerUpload" class="app__button btn__purple px-3">
            <span v-if="!isLoading">Change Photo</span>
            <button-loader v-else/>
        </button>
    </div>
</template>

<script>
import ButtonLoader from './ButtonLoader.vue'
    export default {
	components: { ButtonLoader },
        data() {
            return {
                isLoading: false,
                uploadedImage: null
            }
        },
        props: {
            url: {
                required: true
            }
        },
        methods: {
            triggerUpload() {
                this.$refs.uploadPhoto.click()
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
                formData.append('photo', file)

                try {
                    let {data} = await axios.post(this.url, formData)
                    this.$toast.success(data.message)
                    this.$root.$emit('update-photo', data.image)
                    this.isLoading = false

                } catch (error) {
                    this.isLoading = false
                    if(error.response.status == 422) {
                        this.$toast.error(`${error.response.data.errors['photo'][0]}`)
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
                console.log(file);

                this.$root.$emit('update-photo', this.uploadedImage)
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>