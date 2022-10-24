<template>
    <div>
        <form @submit.prevent="[event ? update() : submit()]">
            <div class="DJHDHBe__DSJb3j mb-5 relative">
                <select v-model="form.category_id" id="" class="RtrbjjK0HNDMb3jhk">
                    <option value="">Choose category</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.name }}</option>
                </select>
                <span v-if="form.errors.has('category_id')" class="text-red-500 text-xs">{{ form.errors.get('category_id') }}</span>
            </div>
            
            <div>
                <h1 class="text__dark__purple font-bold text-xl">Add Photo</h1>
                <p class="text__grey text-sm mb-2">Add a photo/flyer of your event</p>
                <p class="text__grey text-sm mb-2">(You can upload up to 10 photos)</p>
                <p class="text__grey text-sm mb-2">First picture is the cover photo</p>
            </div>
            <div class="mt-3">
                <input @change="uploadImages" type="file" ref="uploadImages" class="hidden" multiple>
                <div @click.prevent="triggerUpload" class="JHjdh38hNk__n3jj mb-3">
                    <img src="/svg/Plus-White.svg" alt="">
                </div>
                <p class="text__grey text-sm mb-2">Image must not exceed 5MB.</p>
                <p class="text__grey text-sm mb-2">Supported formats are *jpg, *gif, and *png</p>
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
                    <date-picker v-model="form.event_date" valueType="format">
                        <template slot="input">
                            <input v-model="form.event_date" type="text" placeholder="Date">
                            <span v-if="form.errors.has('event_date')" class="text-red-500 text-xs">{{ form.errors.get('event_date') }}</span>
                        </template>
                    </date-picker>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <date-picker :time-picker-options="timeOptions" format="HH:mm" v-model="form.event_time" type="time">
                        <template slot="input">
                            <input type="text" placeholder="Time" :value="formatTime">
                            <span v-if="form.errors.has('event_time')" class="text-red-500 text-xs">{{ form.errors.get('event_time') }}</span>
                        </template>
                    </date-picker>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="text" placeholder="Location" v-model="form.address">
                    <span v-if="form.errors.has('address')" class="text-red-500 text-xs">{{ form.errors.get('address') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <div class="flex justify-end mb-1">
                        <small class="text__grey">{{ descCount }}/{{ maxDesc }}</small>
                    </div>
                    <textarea v-model="form.description" id="" :maxlength="maxDesc" placeholder="Event description" cols="30" rows="6"></textarea>
                    <span v-if="form.errors.has('description')" class="text-red-500 text-xs">{{ form.errors.get('description') }}</span>
                </div>
                <div class="flex mb-4">
                    <div class="HSKsj3__SNj2kjd">
                        <input type="radio" v-model="form.isFree" id="paid" class="app__radio__box" value="0" name="isFree">
                        <label class="app__radio__box__label" for="paid">
                            <span>Paid</span>
                        </label>
                    </div>
                    <div class="HSKsj3__SNj2kjd">
                        <input type="radio" v-model="form.isFree" id="free" class="app__radio__box" value="1" name="isFree">
                        <label class="app__radio__box__label" for="free">
                            <span>Free</span>
                        </label>
                    </div>
                </div>
                <div v-if="form.isFree == '0'">
                    <p class="text-sm text__dark__purple">Ticket type (Optional) e.g : Table for 4, Golden ticket, etc</p>
                    <div class="my-4">
                        <div v-for="(ticket, index) in form.ticket_types" :key="index" class="flex mb-2">
                            <div class="rBNSn3hbSn__N3S3 relative">
                                <input v-model="ticket.price" type="tel">
                                <span class="YIHsbk39SJb2i__2b2jSk">NGN</span>
                            </div>
                            <div class="DJHDHBe__DSJb3j relative">
                                <input v-model="ticket.type" type="text" placeholder="Ticket type">
                            </div>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <button @click="addTicketType" type="button" class="text-sm text__light__purple">Add more types</button>
                        </div>
                    </div>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <select v-model="form.refund_policy" id="">
                        <option value="">Choose refund policy</option>
                        <option value="1">Money guaranteed back</option>
                        <option value="0">No refund poilcy</option>
                    </select>
                    <span v-if="form.errors.has('refund_policy')" class="text-red-500 text-xs">{{ form.errors.get('refund_policy') }}</span>
                </div>
                
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <label class="text-sm text__dark__purple" for="">The Organizer of this event</label>
                    <input v-model="form.organizer" type="text" class="mt-2" placeholder="Organiser Name">
                    <span v-if="form.errors.has('organizer')" class="text-red-500 text-xs">{{ form.errors.get('organizer') }}</span>
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input v-model="form.contact" type="text" style="padding-left: 62px;" placeholder="Organiser Phone Number">
                    <span class="YIHsbk39SJb2i__2b2jSk">+234</span>
                </div>
                <button :disabled="isLoading" type="submit" class="app__button btn__purple mt-4 w-full">
                    <span v-if="!isLoading">{{ event ? 'Update Event' : 'Post Event' }}</span>
                    <button-loader v-else></button-loader>
                </button>
                <p class="mt-4 text__dark__purple text-sm">
                    By clicking on Post event, you accept the terms of use and confirm that you would abide by it and declare that this posting does not include any prohibited events.
                </p>
            </section>
        </form>
    </div>
</template>

<script>
import ButtonLoader from '../ButtonLoader.vue'
import moment from 'moment';
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
            event: {
                required: false
            },
        },
        computed: {
            formatTime () {
                if(!this.form.event_time) {
                    return ''
                }
                return moment(this.form.event_time).format('HH:mm')
            },
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
                    event_date: '',
                    event_time: '',
                    time: '',
                    address: '',
                    description: '',
                    isFree: '',
                    organizer: '',
                    refund_policy: '',
                    contact: '',
                    ticket_types: [
                        {
                            type: '',
                            price: ''
                        }
                    ]
                }),
                timeOptions: {start: '00:00', step:'00:30' , end: '23:30' },
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
                this.form.time = moment(this.form.event_time).format('YYYY-M-D HH:mm')
                if(this.item_images.length < 1) {
                    this.$toast.error('You need a minimum of one image')
                    this.toTop()
                    return
                }
                this.isLoading = true
                try {
                    let {data} = await axios.post(this.url, this.prepareData())
                    await this.$toast.success('Event added successfully')
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
                this.form.time = moment(this.form.event_time).format('YYYY-M-D HH:mm')
                
                this.isLoading = true
                try {
                    let {data} = await axios.post(this.url, this.prepareData())
                    await this.$toast.success('Event updated successfully')
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

                if(this.form.isFree == '0') {
                    formData.append('ticket_types', JSON.stringify(this.form.ticket_types))
                }

                return formData
            }
        },
        created() {
            this.$root.$on('clear-event-form', () => {
                this.form.category_id = ''
                this.form.title = ''
                this.form.event_date = ''
                this.form.address = ''
                this.form.description = ''
                this.form.event_time = ''
                this.form.isFree = ''
                this.form.organizer = ''
                this.form.contact = ''
                this.form.ticket_types = [
                    {
                        type: '',
                        price: ''
                    }
                ]

                this.item_images = []
                this.files = []
            })

            if(this.event) {
                this.form.category_id = this.event.category_id
                this.form.title = this.event.title
                this.form.event_date = moment(this.event.event_date).format('YYYY-M-D')
                this.form.event_time = moment(moment().format('YYYY-M-D') + ' ' + this.event.event_time)
                this.form.address = this.event.address
                this.form.description = this.event.description
                this.form.isFree = this.event.isFree
                this.form.organizer = this.event.organizer
                this.form.refund_policy = this.event.refund_policy  == 'yes' ? 1 : 0
                this.form.contact = this.event.contact

                this.files = this.event.pictures

                this.form.ticket_types = this.event.ticket_price
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>