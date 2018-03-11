@extends('layouts.base')

@section('title')
    Master Department
@endsection

@section('breadcrumb')
  Department
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master Department
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert-department"></div>
            <button onClick="add_department()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Department</button></div>
    				<br>
    				<table id="department" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
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
  @include('department.form')
@endsection
