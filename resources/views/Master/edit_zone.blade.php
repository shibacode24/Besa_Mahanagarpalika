@extends('admin_layout')
@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row" style="margin-left:-21%;">
					<div class="col-md-8 mx-auto" >
					
				<div class="card" style="margin-top:-5%;">
					@include('alert')
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6 style="color:red;font-weight:bold">Zone Master</h6>
						</div>
						<hr>
						<form class="row g-2" method="post" action="{{ route('zoneupdate') }}">
							@csrf
                            <input type="hidden" name="id" value="{{$edit_data->id}}">	

							{{-- <div class="col-md-3"></div> --}}
							<div class="col-md-2">
								<label>zone</label>
								<input class="form-control from-text mb-3" type="text" placeholder="zone" name="zone" value="{{ $edit_data->zone }}">
								
							</div>
							<div class="col-md-2">
								<label>Zone</label>
								<input class="form-control to-text mb-3" type="text" placeholder="Zone" name="zone1" value="{{ $edit_data->zone1 }}" >
								
							</div>

							<div class="col-md-2">
								<label>Zone Name</label>
								<input class="form-control to-text mb-3" type="text" placeholder="Zone" name="zone_name" value="{{ $edit_data->zone_name }}" >
								
							</div>

							<div class="col-md-2" style="margin-top:30px;">
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
			
				<div class="col-md-8 mx-auto">
				<div class="card" style="margin-left:-30%;">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Zone</th>  
										<th>Zone</th>  
										<th>Zone Name</th>  
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($zone_all as $zone_all)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $zone_all->zone }}</td>
										<td>{{ $zone_all->zone1 }}</td>		
										<td>{{ $zone_all->zone_name }}</td>		
										<td>
											<a href="{{ route('zoneedit',$zone_all->id) }}"><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> </a>
											<a href="{{ route('zonedelete',$zone_all->id) }}"><button type="button" class="btn1 btn-outline-danger" onclick="return confirm('Are You Sure To Delete This?')"><i class='bx bx-trash me-0'></i></button> </a>
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
							
				
				<!--end page wrapper -->
				<!--start overlay-->
				
				@section('js');

				<script>
					const fromText = $(".from-text").val();
					//const toText = $(".to-text");
			
					$(document).on("keyup", ".from-text", function() {
						console.clear();
						console.log($(this).parent().next().find('.to-text'));
						let text = $(this).val(),
							translateFrom = 'en-GB',
							translateTo = 'mr-IN';
						console.log(text);
						if (!text)
							return;
						$(this).parent().next().find('.to-text').attr("placeholder", "Translating...");
						let apiUrl =
							`https://api.mymemory.translated.net/get?q=${text}&langpair=${translateFrom}|${translateTo}`;
						fetch(apiUrl).then(res => res.json()).then(data => {
							$(this).parent().next().find('.to-text').val(data.responseData.translatedText);
							data.matches.forEach(data => {
								if (data.id === 0) {
									$(this).parent().next().find('.to-text').val(data.translation);
								}
							});
							$(this).parent().next().find('.to-text').attr("placeholder", "Translation");
						});
					});
				</script>
			
			@stop				
				
				
		