<template>
        <div class="modal fade" id="addProvider" role="dialog" aria-labelledby="myModalLabel">

          <div class="modal-dialog" role="document">

            <div class="modal-content">

              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <span class="form-control-static pull-left">
                    <h4 class="modal-title" id="myModalLabel">Create Provider</h4>
                </span>
              </div>

              <div class="modal-body" id="createProvider">


                <form method="POST" action="/providers" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)"
                @change="form.errors.clear($event.target.name)"
                >
                    
                    <div class="form-group">
                        <label for="name" class="label">Provider Name:</label>
                        
                        <input type="text" id="name" name="name" class="form-control" v-model="form.name"> 

                        <span class="alert-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                    </div>

                    <div class="form-group">
                        <label for="description" class="label">Provider Description:</label>
                        
                        <textarea id="description" name="description" class="form-control" v-model="form.description"></textarea>

                        <span class="alert-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                    </div>

                    <div class="form-group">
                        <label for="active" class="label">Provider Status:</label>
                        
                        <select id="active" name="active" class="form-control" v-model="form.active">
                            <option value="1" selected>Active</option>
                            <option value="0">Suspended</option>
                        </select>

                        <span class="alert-danger" v-if="form.errors.has('active')" v-text="form.errors.get('active')"></span>
                    </div>

                    <div class="form-group">
                        <button class="button btn-lg btn-success" :disabled="form.errors.any()">Create</button>
                    </div>
                </form>

              </div>

            </div>

          </div>

        </div>
</template>

<script>
    export default {
        data() {
        return {
            form: new Form({
                name: '',
                description: '',
                active: '',
            })
        };
        },
        methods: {
        onSubmit() {
            this.form.post('/providers')
                .then(response => function(response) {
                    this.$emit('completed', response)
                    }
                );
            }
        }

    }
</script>



<style>


</style>
