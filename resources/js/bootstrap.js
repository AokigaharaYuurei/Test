import axios from 'axios';
import '../css/app.css';
import '../css/style.css';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
