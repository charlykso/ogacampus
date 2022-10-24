import Swal from 'sweetalert2'

class AlertHelper {
    toaster(background, icon, message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            background: background,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: `<span style="color:#fff">${message}</span>`,
        })
        
    }

    successToaster(message) {
        return this.toaster('#42b983', 'success', message)
    }

    errorToaster(message) {
        return this.toaster('#c53030', 'error', message)
    }

    async promptAlert(action) {
        return await Swal.fire({
            title: action || 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        })
    }

    flashAlert(title, message, type) {
        Swal.fire({
            title: title,
            text: message,
            icon: type,
            showConfirmButton: false,
            timer: 2000
        })
    }

    actionAlert(title, message, type, buttonText = 'Proceed', showCancelButton = true) {
        return Swal.fire({
            title: title,
            text: message,
            icon: type,
            confirmButtonText: buttonText,
            showCloseButton: true,
            showCancelButton: showCancelButton,
            cancelButtonText: 'Cancel',
            allowEnterKey: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: '#03a84e',
            cancelButtonColor: '#a9a9a9',
        })
    }

    successActionAlert(message) {
        return this.actionAlert('Successful!', message, 'success', 'Ok', false)
    }

    errorActionAlert(message) {
        return this.actionAlert('Not Successful!', message, 'error',  'Ok', false)
    }
}

export default AlertHelper;