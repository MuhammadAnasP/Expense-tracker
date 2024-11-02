import axios from 'axios';
window.axios = axios;

axios.defaults.baseURL = 'http://localhost:3000/api';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
