import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
// import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'
import * as VueGoogleMaps from "vue2-google-maps";
import VueSweetAlert from 'vue-sweetalert';
Vue.use(VueSweetAlert)
//start editor
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );
//end editor

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyC-2U_IRuSrajQavHadFp8FlXNi61MA3nw",
    libraries: "places" // necessary for places input
  }
});
// Set Vue globally
window.Vue = Vue
// Set Vue router
Vue.router = router
Vue.use(VueRouter)
// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api` 
Vue.use(VueAuth, auth)
// Load Index
Vue.component('index', Index)
const app = new Vue({
  el: '#app',
  router,

});