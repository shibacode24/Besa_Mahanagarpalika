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

							<h6 style="color:red;font-weight:bold">Corporation Master</h6>
						</div>
						<hr>
						<form class="row g-2" method="post"  enctype="multipart/form-data" action="{{ route('corporationupdate') }} ">
@csrf
<input type="hidden" name="id" value="{{$edit_data->id}}">	
	
							<div class="col-md-3">
								<label class="form-label">Name of Corporation</label>
								<input class="form-control " type="text" name="name" placeholder="Name of Corporation"
									aria-label="default input example" value="{{ $edit_data->name }}" required>
							</div>

							<div class="col-md-3">
								<label for="inputAddress" class="form-label">Address</label>
										<textarea class="form-control" name="address" id="inputAddress" placeholder="Address..." rows="1" required>{{ $edit_data->address }}</textarea>
							</div>

							<div class="col-md-2">
								<label class="form-label">State</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="state_id">
									@foreach ($state as $state)
									<option value="{{ $state->id }}" @if($edit_data->state_id ==$state->id) selected @endif> {{ $state->state }}
									</option>
								@endforeach
							
								</select>
							</div>

							<div class="col-md-2">
								<label class="form-label">City</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="city_id">
									@foreach ($city as $city)
									<option value="{{ $city->id }}" @if($edit_data->city_id ==$city->id) selected @endif> {{ $city->city }}
									</option>
								@endforeach
							
								</select>
							</div>

							
							<div class="col-md-2">
								<label class="form-label">Pin Code</label>								
								<input class="form-control mb-3" type="text" placeholder="Pin Code"
									aria-label="default input example" name="pincode"  value="{{ $edit_data->pincode }}"required >
							</div>


							<div class="col-md-2">
								<label class="form-label">Email ID</label>								
								<input class="form-control mb-3" type="email" placeholder="Email ID"
									aria-label="default input example" name="email"  value="{{ $edit_data->email }}"required >
							</div>

							<div class="col-md-2">
								<label class="form-label">Mobile No</label>								
								<input class="form-control mb-3" type="text" placeholder="Mobile No."
									aria-label="default input example" name="mobile"  value="{{ $edit_data->mobile }}" required>
							</div>

							<div class="col-md-2">
								<label class="form-label">Logo</label>								
								<input class="form-control mb-3" type="file" placeholder="Logo"
									aria-label="default input example"  name="logo"  value="{{ $edit_data->logo }}" >

                                   
							</div>


							<div class="col-md-2">
								<label class="form-label">Header</label>								
								<input class="form-control mb-3" type="file" placeholder="Header"
									aria-label="default input example" name="header"  value="{{ $edit_data->header }}" >
                                    
                                    
							</div>

                           
							<div class="col-md-3" style="margin-top:35px;">
								<div class="col">
									<button type="submit" class="btn btn-primary px-5"> <i class="lni lni-circle-plus"></i>Add</button>
								</div>
							</div>
</form>
</div>
</div>
</div>


				<div class="overlay toggle-icon"></div>
			
				<div class="col-md-12 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Name of Corporation</th>  
										<th>Adresss</th>
										<th>Logo</th>
										<th>Header</th>
										<th style="background-color: #fff">Action</th>
									</tr>
								</thead>
								<tbody>

									@foreach($corporation_all as $corporation_all)
									<tr>
										<td>{{ $loop->index+1 }}</td>
										<td>{{ $corporation_all->name }}</td>	
			
										<td
										
										 data-bs-toggle="tooltip" data-bs-placement="top" title=
										"
										Mobile No :- {{$corporation_all->mobile}} 
										Email :- {{$corporation_all->email}}
										State :- {{$corporation_all->state}}
										Pincode :- {{$corporation_all->pincode}}
										City :- {{$corporation_all->city}}			
										" 
										>{{ $corporation_all->address }}</td>	
									
										
										
										<td>{{ $corporation_all->pincode }}</td>	
										<td>
											<a target="_blank" href="{{ asset('images/corporation_logo/' . $corporation_all->logo) }}">
												<img src="{{ asset('images/corporation_logo/' . $corporation_all->logo) }}"
													style="height:50px;width:auto;" alt="">
											</a>

										</td>
										<td>
											<a target="_blank" href="{{ asset('images/corporation-lheader/' . $corporation_all->header) }}">
												<img src="{{ asset('images/corporation-header/' . $corporation_all->header) }}"
													style="height:50px;width:auto;" alt="">
											</a>

										</td>
										<td style="background-color: #fff">
											<a href="{{ route('corporationedit',$corporation_all->id) }}"><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
											<a href="{{ route('corporationdelete',$corporation_all->id) }}"> <button type="button" class="btn1 btn-outline-danger" onclick="return confirm('Are You Sure To Delete This?')"><i class='bx bx-trash me-0'></i></button> </a>
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
				
				<!--end page wrapper -->
				<!--start overlay-->
				
			@stop	
				
				
	