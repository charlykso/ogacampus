class FormErrors {
    constructor(){
        this.errors = {}
    }

    get(name){
        if(this.errors[name]){
            return this.errors[name][0];
        }
    }

    record(errors){
        if(errors){
            this.errors = errors
            return
        }
        this.errors = {}
    }

    clear(name){
        if(name){
            delete this.errors[name]
            return;
        }
        this.errors = {}
    }

    has(field){
        return this.errors.hasOwnProperty(field)
    }
    any(){
        return Object.keys(this.errors).length > 0
    }
}

export default FormErrors