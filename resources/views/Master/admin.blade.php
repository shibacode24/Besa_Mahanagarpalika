@extends('admin_layout')
@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row" style="margin-left:-25%;">
					<div class="col-md-12 mx-auto" >
					
				<div class="card" style="margin-top:-4%;">
					@include('alert')
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6 style="color:red;font-weight:bold">Admin/Employee Master</h6>
						</div>
						<hr>
						<form class="row g-2" method="post"   enctype="multipart/form-data" action="{{ route('admininsert') }}">
							@csrf

							
							<div class="col-md-2">
								<label class="form-label">Role</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="role">
									<option value="">Select</option>
									<option value="1">Admin</option>
									<option value="2">Employee</option>
								</select>
							</div>

							<div class="col-md-2">
								<label class="form-label">Name</label>
								<input class="form-control " type="text" placeholder="Enter Name"
									aria-label="default input example" name="name" required>
							</div>
							<div class="col-md-2">
								<label class="form-label">Mobile</label>								
								<input class="form-control mb-3" type="text" placeholder="Enter Mobile"
									aria-label="default input example" name="mobile" required>
							</div>
							<div class="col-md-2">
								<label class="form-label">ward</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="zone_id">
									<option value="">Select</option>
									@foreach ($zone as $zone)
									<option value="{{ $zone->id }}">{{ $zone->zone }}
									</option>
								@endforeach
								</select>
							</div>
							
							<div class="col-md-2">
								<label class="form-label">UserName</label>								
								<input class="form-control mb-3" type="text" placeholder="UserName"
									aria-label="default input example" name="username" >
							</div>

							<div class="col-md-2">
								<label class="form-label">Password</label>								
								<input class="form-control mb-3" type="text" placeholder="Password"
									aria-label="default input example" name="password" >
							</div>

							<div class="col-md-12" style="margin-top:10px;">
								<div class="col">
									<button type="submit" class="btn btn-primary px-2" style="float: right"> <i class="lni lni-circle-plus"></i>Add</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>



<div class="overlay toggle-icon"></div>
			
				<div class="col-md-12 mx-auto">
				<div class="card" style="margin-left:-24%;">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Role</th>  
										<th>Name</th>  
										<th>Mobile</th>	
										<th>Zone</th>
										<th>UserName</th>
										<th style="background-color: #fff">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($admin as $admin)
									<tr >
										<td>{{ $loop->index+1 }}</td>
										<td> {{ $admin->Role_Name }}</td>	
										<td> {{ $admin->name }}</td>	
										<td> {{$admin->mobile}}</td>
										<td> {{ $admin->zone }}</td>	
										<td>{{ $admin->username }}</td>
										<td style="background-color: #fff">
											<a href="{{ route('adminedit',$admin->id) }}"><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
											<a href="{{ route('admindelete',$admin->id) }}"> <button type="button" class="btn1 btn-outline-danger" onclick="return confirm('Are You Sure To Delete This?')"><i class='bx bx-trash me-0'></i></button> </a>
										</td>										
							
									</tr>
									@endforeach
									
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>	
		@stop
  		



							




							
				
			