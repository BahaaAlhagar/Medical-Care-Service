
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const manageProviders = new Vue({
    el: '#providers',
    data: {
    	providers: []

    },
    methods: {

    },
    created() {
    	axios.get('/providers')
 		.then(response => this.providers = response.data.providers.data);

    }
});
