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

							<h6 style="color:red;font-weight:bold">Surveyor Master</h6>
						</div>
						<hr>
						<form class="row g-2" method="post"   enctype="multipart/form-data" action="{{ route('employeeupdate') }}">
							@csrf
                            <input type="hidden" name="id" value="{{$edit_data->id}}">	

							
							<div class="col-md-2">
								<label class="form-label">Name</label>
								<input class="form-control " type="text" placeholder="Enter Name"
									aria-label="default input example" name="name" value="{{ $edit_data->name }}" required>
							</div>
							<div class="col-md-2">
								<label for="inputAddress" class="form-label" required>Address</label>
										<textarea class="form-control" id="inputAddress"  name="address" placeholder="Address..." rows="1">{{ $edit_data->address }}</textarea>
							</div>

							<div class="col-md-2">
								<label class="form-label">Pin Code</label>								
								<input class="form-control mb-3" type="text" placeholder="Pin Code"
									aria-label="default input example" name="pincode"  value="{{ $edit_data->pincode }}" required >
							</div>

							<div class="col-md-2">
								<label class="form-label">Email ID</label>								
								<input class="form-control mb-3" type="text" placeholder="Email ID"
									aria-label="default input example" name="email"  value="{{ $edit_data->email }}" required >
							</div>

							<div class="col-md-2">
								<label class="form-label">Mobile No</label>								
								<input class="form-control mb-3" type="text" placeholder="Mobile No."
									aria-label="default input example" name="mobile"  value="{{ $edit_data->mobile }}" required>
							</div>

							{{-- <div class="col-md-3">
								<label class="form-label">State</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="state_id">
									@foreach ($state as $state)
									<option value="{{ $state->id }}" @if($edit_data->state_id ==$state->id) selected @endif> {{ $state->state }}
									</option>
								@endforeach
							
								</select>
							</div> --}}

							<div class="col-md-2">
								<label class="form-label">City</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="city_id">
									<option>Select</option>
									@foreach ($city as $city)
									<option value="{{ $city->id }}" @if($edit_data->city_id ==$city->id) selected @endif> {{ $city->city }}
									</option>
								@endforeach
							
								</select>
							</div>

							<div class="col-md-2">
								<label class="form-label">Upload Aadhar</label>								
								<input class="form-control mb-3" type="file"
									aria-label="default input example" name="adhar"  >
							</div>

							<div class="col-md-2">
								<label class="form-label">Upload PAN Card</label>								
								<input class="form-control mb-3" type="file"
									aria-label="default input example" name="pan" >
							</div>

							<div class="col-md-2">
								<label class="form-label">UserName</label>								
								<input class="form-control mb-3" type="text" placeholder="UserName"
									aria-label="default input example" name="username" value="{{ $edit_data->username }}" >
							</div>

                            
							<div class="col-md-2">
								<label class="form-label">Password</label>								
								<input class="form-control mb-3" type="text" placeholder="Password"
									aria-label="default input example" name="password" >
							</div>

							<div class="col-md-2" style="margin-top:35px;">
								<div class="col">
									<button type="submit" class="btn btn-primary px-2"> <i class="lni lni-circle-plus"></i>Add</button>
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
										<th>Name</th>  
										<th>Email ID</th>
										
										<th>Pin Code</th>
										<th>Upload Aadhar</th>
										<th>Upload PAN Card</th>
										<th>UserName</th>
										<th style="background-color: #fff">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($employee_all as $employee_all)
									<tr >
										<td>{{ $loop->index+1 }}</td>
										<td> {{ $employee_all->name }}</td>	
										{{-- <td> {{ $employee_all->email }}</td> --}}
										<td data-bs-toggle="tooltip" data-bs-placement="top" title=
										    "
											Mobile No :- {{$employee_all->mobile}} 
											Address :- {{$employee_all->address}}
											State :- {{$employee_all->state}}
											City :- {{$employee_all->city}}			
											" >{{$employee_all->email}} 
										</td>
											
											
											
											
											
											
											
												
										{{-- <td> {{ $employee_all->mobile }}</td>	 --}}
										
										{{-- <td> {{ $employee_all->address }}</td> --}}
										{{-- <td> {{ $employee_all->state }}</td>	
										<td> {{ $employee_all->city }}</td>	 --}}
										
										<td> {{ $employee_all->pincode }}</td>	
									
										{{-- <td> {{ $employee_all->adhar }}</td>	 --}}
										<td><a target="_blank" href="{{ asset('images/employee_adhar/' . $employee_all->adhar) }}">{{ $employee_all->adhar }}</a></td>
										<td> 
											<a target="_blank" href="{{ asset('images/employee_pan/' . $employee_all->pan) }}">{{ $employee_all->pan }}</a>
											</td>	

											<td> 
												{{ $employee_all->username }}</a>
												</td>

										<td style="background-color: #fff">
                                            <a href="{{ route('employeeedit',$employee_all->id) }}"><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
											<a href="{{ route('employeedelete',$employee_all->id) }}"> <button type="button" class="btn1 btn-outline-danger" onclick="return confirm('Are You Sure To Delete This?')"><i class='bx bx-trash me-0'></i></button> </a>
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
  		



							




							
				
			