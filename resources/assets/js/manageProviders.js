
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

import jquery from 'jquery';
import toastr from 'toastr';
import bootstrap from 'bootstrap';



window.Form = Form;

Vue.use(VueResource);



import AddProvider from './components/AddProvider';
import EditProvider from './components/EditProvider';




window.eventBus = new Vue();

const manageProviders = new Vue({
    el: '#providers',
    data: {
      providers: [],
      provider: [],
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
  			this.providers = data;
  		},
      fetchCurrentPage(){
        manageProviders.$refs.vpaginator.fetchData('/providers?page=' + manageProviders.$refs.vpaginator.current_page);
      },
      updateProviders(response){
        this.providers.unshift(response.item);
        $('#addProvider').modal('hide');
        toastr.success(response.message);
      },
      editProvider(provider){
        eventBus.$emit('editModalOpen', provider);
        $('#editProvider').modal('show');
      },
      deleteProvider(provider){
        if(confirm('Are you sure you want to delete this Rrovider')){
        axios.delete('/providers/' + provider.id)
        .then(response => this.onProviderDelete(response));
        }
      },
      onProviderDelete(response){
        toastr.warning(response.data.message);
        this.fetchCurrentPage();
      },
      onProviderUpdate(response){
        $('#editProvider').modal('hide');
        toastr.info(response.message);
        // updating the view
        this.fetchCurrentPage();
      }
    },
    created() {
      axios.get('/providers')
   		.then(response => this.providers = response.data.providers.data);
    },
    mounted() {
      // updating providers in update method
      eventBus.$on('providerUpdated', response => this.onProviderUpdate(response));
    },
    components: {
      VPaginator: VuePaginator,
      AddProvider: AddProvider,
      EditProvider: EditProvider
    }
});


toastr.options = {
  "positionClass": "toast-bottom-right",
}
