<template>
		<div class="modal fade" id="editProvider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

		        <h4 class="modal-title" id="myModalLabel">Edit Provider</h4>

		      </div>

		      <div class="modal-body">


		      		<form method="POST" action="/providers" @submit.prevent="onUpdate(provider)" @keydown="editform.errors.clear($event.target.name)"
                	@change="editform.errors.clear($event.target.name)"
                >
                    
                    <div class="form-group">
                        <label for="name" class="label">Provider Name:</label>
                        
                        <input type="text" id="name" name="name" class="form-control" v-model="editform.name"> 

                        <span class="alert-danger" v-if="editform.errors.has('name')" v-text="editform.errors.get('name')"></span>
                    </div>

                    <div class="form-group">
                        <label for="description" class="label">Provider Description:</label>
                        
                        <textarea id="description" name="description" class="form-control" v-model="editform.description"></textarea>

                        <span class="alert-danger" v-if="editform.errors.has('description')" v-text="editform.errors.get('description')"></span>
                    </div>

                    <div class="form-group">
                        <label for="active" class="label">Provider Status:</label>
                        
                        <select id="active" name="active" class="form-control" v-model="editform.active">
                            <option value="1" selected>Active</option>
                            <option value="0">Suspended</option>
                        </select>

                        <span class="alert-danger" v-if="editform.errors.has('active')" v-text="editform.errors.get('active')"></span>
                    </div>

                    <div class="form-group">
                        <button class="button btn-lg btn-success" :disabled="editform.errors.any()">Update Provider</button>
                    </div>
                   </form>


		      </div>

		    </div>

		  </div>

		</div>

</template>



<script>
    import eventBus from '../manageProviders';

	export default {
        data() {
        return {
            editform: new Form({
                name: '',
                description: '',
                active: '',
                id: ''
            })
        };
        },
        props: ['providers'],
        mounted() {
        	eventBus.$on('editModalOpen', function(provider){
                console.log(provider);
        		this.editform.name = provider.name;
      			this.editform.description = provider.description;
      			this.editform.active = provider.active;
                this.editform.id = provider.id;
        	});
        },
        methods: {
        onSubmit() {
            this.editform.patch('/providers')
                .then(response => this.$emit('completed', response));
            },

        }

    }


</script>