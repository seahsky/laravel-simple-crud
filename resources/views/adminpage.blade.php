@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				Company
			</div>
			<div class="card-body">
				<table>
					<tr>
						<th>Name</th>
						<th>Logo</th>
						<th>Website</th>
						<th>Email</th>
						<th></th>
					</tr>
					@foreach($companies as $key => $company)
					<tr>
						<td>{{ $company->name }}</td>
						<td><img src="{{ asset($company->logo) }}" alt="{{ $company->name }}"></td>
						<td>{{ $company->website }}</td>
						<td>{{ $company->email }}</td>
						<td>
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="editCompany{{ $key }}">Edit</a>
							<a class="btn btn-danger" href="#">Delete</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		<br>
		<div class="card">
			<div class="card-header">
				Employee
			</div>
			<div class="card-body">
				<table>
					<tr>
						<th>Name</th>
						<th>Company</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th></th>
					</tr>
					@foreach($employees as $key => $employee)
					<tr>
						<td>{{ $employee->first_name.' '.$employee->last_name }}</td>
						<td>{{ $employee->company->name }}</td>
						<td>{{ $employee->phone }}</td>
						<td>{{ $employee->email }}</td>
						<td>
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="editCompany">Edit</a>
							<a class="btn btn-danger" href="#">Delete</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Edit Company</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <center>
	          <div>
	            <form method="post" action="">
	              @csrf
	              <div class="row">
	                <div class="col-sm-12">
	                  <div class="form-group">
	                    <div class="col-sm-12">
	                      <div class="form-group">
	                        <label>Company Name</label>
	                        <input type="text" class="form-control" name="edit_company_name" value=""/>
	                      </div>
	                    </div>
	                    <div class="col-sm-12">
	                      <div class="form-group">
	                        <label>Company Website</label>
	                        <input type="text" class="form-control" name="edit_company_website" value=""/>
	                      </div>
	                    </div>
	                    <div class="col-sm-12">
	                      <div class="form-group">
	                        <label>Number of Employees</label>
	                        <input type="text" class="form-control" name="edit_number_of_employees" value=""/>
	                      </div>
	                    </div>
	                    <div class="col-sm-12">
	                      <div class="form-group">
	                        <label>Company Description</label>
	                        <input type="text" class="form-control" name="edit_company_description" value=""/>
	                      </div>
	                    </div>
	                  </div>
	                </div>

	              </center>
	            </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	              <button type="submit" class="btn btn-primary">Save changes</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
@endsection
