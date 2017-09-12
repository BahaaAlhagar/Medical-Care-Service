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
		<br>
		<v-paginator :options="options" :resource_url="resource_url" @update="updateResource"></v-paginator>
		<br>



	  		<!-- Create Provider Modal -->

	  		<add-provider></add-provider>
	  	</div>

	</div>













		@section('js')
    	<script src="{{ URL::asset('js/manageProviders.js') }}"></script>
        <script src="{{ URL::asset('js/toastr.min.js') }}"></script>

    	@endsection

@endsection