/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { VueReCaptcha } from 'vue-recaptcha-v3'

Vue.use(VueReCaptcha, { siteKey: '6LctaZkUAAAAAHIb3UhjrSgDNxtVa_ye3Ut1UwWY' })

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('form-presupuesto', require('./components/FormPresupuestoComponent.vue').default);
Vue.component('form-contacto', require('./components/FormContactoComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

var items = document.querySelectorAll('.home-materiales-box--materiales')
items.forEach(item => {
	item.addEventListener('click', function (event) {
		items.forEach(i => {
			let target = document.getElementById('material-id-' + i.dataset.displayId)
			target.classList.add('d-none')
		});
		let target = document.getElementById('material-id-' + item.dataset.displayId)
		target.classList.remove('d-none')
	})  
});