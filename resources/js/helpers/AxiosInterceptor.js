import axios from 'axios';
import Alert from './AlertHelper';

const handler = axios.interceptors.response.use(response => {
    return Promise.resolve(response)
}, error => {
    let alert = new Alert();

    if(typeof(error.response) == 'undefined') {
        alert.errorToaster('Poor network connection!')
    }
    if(error.response.status >= 500) {
        alert.errorToaster('Server error occured!')
    }
    if(error.response.status == 403) {
        alert.errorToaster('You don\'t have permission')
    }
    if(error.response.status == 419) {
        window.location.href = '/'
    }
    if(error.response.status == 401) {
        window.location.href = '/login'
        alert.errorToaster('You are unauthorized')
    }
    if(error.response.status == 422) {
        return Promise.reject(error)
    }

    return Promise.reject(error)
});

export default handler;