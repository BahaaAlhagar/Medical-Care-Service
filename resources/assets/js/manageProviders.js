
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import VueResource from 'vue-resource';
import VuePaginator from 'vuejs-paginator';

import Form from './Form';

window.Form = Form;

Vue.use(VueResource);



import AddProvider from './components/AddProvider';


const manageProviders = new Vue({
    el: '#providers',
    data: {
    	providers: [],
    	resource_url: '/providers',
    	options: {
              remote_data: 'providers.data',
              remote_current_page: 'providers.current_page',
              remote_last_page: 'providers.last_page',
              remote_next_page_url: 'providers.next_page_url',
              remote_prev_page_url: 'providers.prev_page_url',
              next_button_text: 'Go Next',
              previous_button_text: 'Go Back'
            },
    },
    methods: {
 		updateResource(data){
			this.providers = data
		},
    updateProviders(response){
      this.providers.unshift(response.item)
      toastr.success('Success!', response.message)
    }
    },
    created() {
    	axios.get('/providers')
 		.then(response => this.providers = response.data.providers.data);

    },
    components: {
      VPaginator: VuePaginator,
      AddProvider: AddProvider
    }
});







