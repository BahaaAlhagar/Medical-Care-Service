@extends('layouts/adminboard')

@section('title', 'Manage Providers')


@section('content')


	<div class="col-md-12 text-center">
		<div id="providers">
			Medical Service Providers
			<button class="btn btn-sm btn-success pull-right" type="button">Add Provider</button>

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

	</div>













		@section('js')
    	<script src="/js/manageProviders.js"></script> 
    	@endsection

@endsection