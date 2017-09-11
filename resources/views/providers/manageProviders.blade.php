@extends('layouts/adminboard')

@section('title', 'Manage Providers')

	@section('css')
        <link href="{{ URL::asset('css/toastr.min.css') }}" rel="stylesheet">
	@endsection

@section('content')


	<div class="col-md-12 text-center">
		<div id="providers">
			Medical Service Providers
			<span class="pull-right">
			<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addProvider">Add Provider</button>
			</span>

		<table class="table table-striped table-bordered main-table">
			<thead class="thead-inverse">
				<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Status</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="provider in providers" :key="provider.id">
					<td> @{{ provider.name }} </td>
					<td> @{{ provider.description }} </td>
					<td v-if="provider.active">
						<span class="green"> Active </span> 
					</td>
					<td v-else>
						<span class="red"> Suspended </span> 
					</td>
					<td>
						<button class="btn btn-sm btn-info" type="button">edit</button>
						<button class="btn btn-sm btn-danger" type="button">delete</button>
					</td>
				</tr>
			</tbody>
		</table>
		<v-paginator v-if="providers.length > 10" :options="options" :resource_url="resource_url" @update="updateResource"></v-paginator>
	  	</div>



	  	<!-- Create Provider Modal -->

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


				<form method="POST" action="/providers" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
					{{ csrf_field() }}
		            <div class="form-group">
		                <label for="name" class="label">Provider Name:</label>
		                
		                <input type="text" id="name" name="name" class="form-control" v-model="form.name"> 

		                <span class="alert alert-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
		            </div>

		            <div class="form-group">
		                <label for="description" class="label">Provider Description:</label>
		                
		                <input type="text" id="description" name="description" class="form-control" v-model="form.description">

		                <span class="alert alert-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
		            </div>

		            <div class="form-group">
		                <label for="active" class="label">Provider Status:</label>
		                
		                <select name="active" class="form-control" v-model="form.active">
		                	<option value="1" selected>Active</option>
		                	<option value="0">Suspended</option>
		                </select>

		                <span class="alert alert-danger" v-if="form.errors.has('active')" v-text="form.errors.get('active')"></span>
		            </div>

		            <div class="form-group">
		                <button type="submit" class="button btn-success" :disabled="form.errors.any()">Create</button>
		            </div>
		        </form>

		      </div>

		    </div>

		  </div>

		</div>



	</div>













		@section('js')
    	<script src="{{ URL::asset('js/manageProviders.js') }}"></script>
        <script src="{{ URL::asset('js/toastr.min.js') }}"></script>

    	@endsection

@endsection