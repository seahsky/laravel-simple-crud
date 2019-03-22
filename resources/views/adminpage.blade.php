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
					@foreach($companies as $company)
					<tr>
						<td>{{ $company->name }}</td>
						<td><img src="{{ $company->logo }}" alt="{{ $company->name }}"></td>
						<td>{{ $company->website }}</td>
						<td>{{ $company->email }}</td>
						<td>
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="editCompany">Edit</a>
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
	            <p>Use this space to show clients you have the skills and experience they're looking for.</p>
	            <ul>
	              <li>Describe your strengths and skills</li>
	              <li>Highlight projects, accomplishments and education</li>
	              <li>Keep it short and make sure it's error-free</li>
	            </ul>
	          </div>
	          <div>
	            <form method="post" action="{{action('EmployerPostController@findAction')}}">
	              @csrf
	              <textarea rows="10" cols="40" name="overview_description" placeholder="EXAMPLE: Laravel Web Developer">{{ $profile_info->overview_description }}</textarea>
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
