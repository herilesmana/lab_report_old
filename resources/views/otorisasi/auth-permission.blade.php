@extends('layouts.base')

@section('title')
    Auth Permissions
@endsection

@section('breadcrumb')
    Auth Permissions
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Auth Permissions
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert">
            </div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Department</button></div>
    				<br>
    				<table id="department" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th>No</th>
    							<th>ID</th>
    							<th>Name</th>
                  <th style="width: 250px">Status</th>
    							<th style="width: 250px">Action</th>
    						</tr>
    					</thead>
    					<tbody></tbody>
    				</table>
  			</div>
  		</div>
  	</div>
  </div>
@endsection
