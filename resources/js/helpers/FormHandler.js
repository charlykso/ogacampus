import FormErrors from './FormError'
class FormHandler {
    constructor(data) {
        this.originalData = data;

        for(let field in data){
            this[field] = data[field]
        }

        this.errors = new FormErrors()
    }

    reset() {
        for(let field in this.originalData){
            if (this.originalData[field] instanceof Array) {
                this[field] = []
            } else if(this.originalData[field] instanceof Object){
                this[field] = {}
            } else {
                this[field] = ''
            }
        }

        this.errors.clear()
    }

    formData() {
        let form = {}
        for(let field in this.originalData){
            form[field] = this[field]
        }

        return form
    }

    submit(requestType, url) {
        this.errors.clear()
        this.setFormProcesing(true)
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.formData())
            .then((res) => {
                this.onSuccess(res)
                resolve(res)
            })
            .catch(err => {
                this.onFail(err)
                reject(err)
            })
        })
    }

    onSuccess(res) {
        this.setFormProcesing(false)
    }

    onFail(err) {
        this.setFormProcesing(false)
        if(err.response.status == 422) {
            this.errors.record(err.response.data.errors)
            return
        }
    }

    setFormProcesing(value){
        
    }
}

export default FormHandler