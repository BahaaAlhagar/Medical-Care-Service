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

		<table v-if="providers.length" class="table table-responsive table-striped table-bordered main-table">
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
					<td><a :href="'/providers/' + provider.id"> @{{ provider.name }} </a></td>
					<td> @{{ provider.description }} </td>
					<td v-if="provider.active">
						<span class="green"> Active </span> 
					</td>
					<td v-else>
						<span class="red"> Suspended </span> 
					</td>
					<td>
						<button @click="editProvider(provider)" data-toggle="modal" class="btn btn-sm btn-info" type="button">edit</button>
						<button @click="deleteProvider(provider)" class="btn btn-sm btn-danger" type="button">delete</button>
					</td>
				</tr>
			</tbody>
		</table>
		<br>
		<v-paginator v-if="providers.length" :options="options" ref="vpaginator"  :resource_url="resource_url" @update="updateResource"></v-paginator>
		<br>



	  		<!-- Create Provider Modal -->

	  		<add-provider @completed="updateProviders"></add-provider>
	  		
	  		<!-- edit Provider Modal -->

	  		<edit-provider></edit-provider>
	  	</div>

	</div>













		@section('js')

    	<script src="{{ URL::asset('js/manageProviders.js') }}"></script>

    	@endsection

@endsection