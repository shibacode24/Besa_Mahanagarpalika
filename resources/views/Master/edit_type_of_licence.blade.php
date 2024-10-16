@extends('admin_layout')
@section('content')



		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-8 mx-auto" >
					
				<div class="card">
					@include('alert')
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6>Type of Licence</h6>
						</div>
						<hr>
						<form class="row g-2" method="post" action="{{ route('typeoflicenceupdate') }}">
							@csrf
                            <input type="hidden" name="id" value="{{$edit_data->id}}">	

					
							<div class="col-md-4">
								<label>Type of licence</label>
								<input class="form-control mb-3" type="text" name="type_of_licence"placeholder="Licence Type" value="{{ $edit_data->type_of_licence }}">
								
							</div>

								<div class="col-md-4">
								<label>Licence no</label>
								<input class="form-control mb-3" type="text" name="licence_no" placeholder="Licence No" value="{{ $edit_data->licence_no }}">
								
							</div>
							<div class="col-md-4" style="margin-top:29px;">
								<div class="col">
									<button type="submit" class="btn btn-primary px-5"> <i class="lni lni-circle-plus"></i>Add</button>
								</div>
							</div>

									</form>

					</div>

				</div>
					</div>
				</div>


               <div class="overlay toggle-icon"></div>
				<hr/>
				<div class="col-md-8 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Type of Licence</th> 
										<th>Licence No</th>
									
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($licence_all as $licence_all)
									<tr>
										<td>{{ $loop->index+1 }}</td>
										<td>{{ $licence_all->type_of_licence }}</td>
										<td>{{ $licence_all->licence_no}}</td>	
										<td>
											<a href="{{ route('typeoflicenceedit',$licence_all->id) }}"><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a> 
											<a href="{{ route('typeoflicencedelete',$licence_all->id) }}"><button type="button" class="btn1 btn-outline-danger" onclick="return confirm('Are You Sure To Delete This?')"><i class='bx bx-trash me-0'></i></button> </a>
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
							

							
				
				