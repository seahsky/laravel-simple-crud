@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<div class="">
					Company
				</div>
				<div class="">
					<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addCompany">Create Company</a>
				</div>
			</div>
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="card-body">
				<table class="table">
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
						<td><img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" width="100px" height="100px"></td>
						<td>{{ $company->website }}</td>
						<td>{{ $company->email }}</td>
						<td>
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editCompany{{ $key }}">Edit</a>
							<form action="{{ route('company.destroy', $company->id) }}" method="post">
								@csrf
								@method('DELETE')
								<input type="submit" class="btn btn-danger" value="Delete">
							</form>
						</td>
					</tr>
					@endforeach					
				</table>
			</div>
			<div class="card-footer d-flex justify-content-center">
				{{ $companies->links() }}
			</div>
		</div>
		<br>
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<div class="">
					Employee
				</div>
				<div class="">
					<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addEmployee">Create Employee</a>
				</div>
			</div>
			<div class="card-body">
				<table class="table">
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
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editEmployee{{ $key }}">Edit</a>
							<form action="{{ route('employee.destroy', $employee->id) }}" method="post">
								@csrf
								@method('DELETE')
								<input type="submit" class="btn btn-danger" value="Delete">
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<div class="card-footer d-flex justify-content-center">
				{{ $employees->links() }}				
			</div>
		</div>
	</div>

	<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Company</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<center>
							<div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Name</strong></label>
													<input type="text" class="form-control" name="add_company_name" value="{{ old('add_company_name') }}" placeholder="e.g. Handa Sdn. Bhd." required/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Logo</strong></label>
													<div>
														<img src="{{ asset('storage/images/company_logo/sample-logo.png') }}" alt="Your Company Logo" id="add_company_logo_display" width="100px" height="100px">
													</div>
													<br>
													<input type="file" class="form-control" name="add_company_logo" id="add_company_logo" required/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Website</strong></label>
													<input type="text" class="form-control" name="add_company_website" value="{{ old('add_company_website') }}" placeholder="e.g. www.handa.com.my" />
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Email</strong></label>
													<input type="text" class="form-control" name="add_company_email" value="{{ old('add_company_email') }}" placeholder="e.g. handa@gmail.com" />
												</div>
											</div>
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

	<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="{{ route('employee.store') }}">
					@csrf
					<div class="modal-body">
						<center>
							<div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>First Name</strong></label>
													<input type="text" class="form-control" name="add_employee_first_name" value="{{ old('add_employee_first_name') }}" placeholder="e.g. John" />
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Last Name</strong></label>
													<input type="text" class="form-control" name="add_employee_last_name" value="{{ old('add_employee_last_name') }}" placeholder="e.g. Cena" />
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Employee Company</strong></label>
													<select class="form-control" name="add_employee_company" id="add_employee_company">
														@foreach($companies as $company)
														<option value="{{ $company->email }}" {{ old('add_employee_company') == $company->id ? ' selected' : '' }}>
															{{ $company->name }}
														</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Phone Number</strong></label>
													<input type="text" class="form-control" name="add_employee_phone" value="{{ old('add_employee_phone') }}" placeholder="e.g. 0123465798 (without '-')" />
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Employee Email</strong></label>
													<input type="text" class="form-control" name="add_employee_email" value="{{ old('add_employee_email') }}" placeholder="e.g. johncena@gmail.com" />
												</div>
											</div>
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

	@foreach($companies as $key => $company)
	<div class="modal fade" id="editCompany{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Company</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="modal-body">
						<center>
							<div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Name</strong></label>
													<input type="text" class="form-control" name="company_name" value="{{ $company->name }}"/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Logo</strong></label>
													<div>
														<img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" width="100px" height="100px">
													</div>
													<br>
													<input type="file" class="form-control" name="company_logo"/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Website</strong></label>
													<input type="text" class="form-control" name="company_website" value="{{ $company->website }}"/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Company Email</strong></label>
													<input type="text" class="form-control" name="company_email" value="{{ $company->email }}"/>
												</div>
											</div>
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
	@endforeach

	@foreach($employees as $key => $employee)
	<div class="modal fade" id="editEmployee{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="{{ route('employee.update', $employee->id) }}">
					@csrf
					@method('PUT')
					<div class="modal-body">
						<center>
							<div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>First Name</strong></label>
													<input type="text" class="form-control" name="employee_first_name" value="{{ $employee->first_name }}"/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Last Name</strong></label>
													<input type="text" class="form-control" name="employee_last_name" value="{{ $employee->last_name }}"/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Employee Company</strong></label>
													<select class="form-control" name="employee_company" id="employee_company">
														@foreach($companies as $company)
														<option value="{{ $company->email }}" {{ $employee->company->id == $company->id ? ' selected' : '' }}>
															{{ $company->name }}
														</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Phone Number</strong></label>
													<input type="text" class="form-control" name="employee_phone" value="{{ $employee->phone }}"/>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label><strong>Employee Email</strong></label>
													<input type="text" class="form-control" name="employee_email" value="{{ $employee->email }}"/>
												</div>
											</div>
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
	@endforeach

	<script>
		function addImgSrc() {
			var logo = document.getElementById('add_company_logo').value;
			document.getElementById('add_company_logo_display').src = logo;
		}
	</script>
@endsection
