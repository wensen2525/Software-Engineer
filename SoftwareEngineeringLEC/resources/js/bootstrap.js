import 'bootstrap';

// import jquery
import jQuery from 'jquery';
window.$ = jQuery;

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';