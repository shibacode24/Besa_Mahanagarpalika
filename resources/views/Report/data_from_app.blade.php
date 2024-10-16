@extends('admin_layout')
@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
			<div class="row" style="margin-left:-21%;">
					<div class="col-md-8 mx-auto" >
					
				<div class="card" style="margin-top:-4%;">
					
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6 style="color:red;font-weight:bold">Data From App</h6>
						</div>
						<hr>
						<form class="row g-2" method="get" action="">
							@csrf

							
							<div class="col-md-3">
								<label class="form-label">User</label>		
								<select class="form-select mb-3" aria-label="Default select example" name="user">
									<option>Select</option>
									@foreach ($user as $user)
									<option value="{{ $user->id }}"  @if (app('request')->input('user') == $user->id) {{ 'selected' }} @endif>{{$user->name }}

									</option>
								@endforeach
								
								</select>
							</div>

							<div class="col-md-3">
								<label class="form-label">Date</label>
								<input class="form-control mb-3 datePicker" type="date" placeholder="Date" name="date"  value="{{ app('request')->input('date') }}">
								
							</div>

							<div class="col-md-3" style="margin-top:6vh;">
								<div class="col">
									<button type="submit" class="btn btn-primary px-3"> <i class='bx bx-search'></i>Search</button>
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
										<th>Survey No</th>  
										<th>Establishment Name</th>  
										<th>Image</th>  
										{{-- <th>Action</th> --}}
									</tr>
								</thead>
								<tbody>
									@foreach($get_data as $all)
									<tr>
										<td>{{ $loop-> index+1 }}</td>
										<td>{{$all ->survey_app_no }}</td>	
										<td>{{$all ->establishment }}</td>
                                        <td>
                                            <a target="_blank" href="{{ asset('images/' . $all->photo) }}">
                                                <img src="{{ asset('images/' . $all->photo) }}"
                                                    style="height:50px;width:auto;" alt="">
                                            </a>    
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
							
@section('js');
		
<script >
	const fromText = $(".from-text").val();
	//const toText = $(".to-text");

	$(document).on("keyup",".from-text", function() {
		console.clear();
		console.log($(this).parent().next().find('.to-text'));
		let text =$(this).val(),
		translateFrom = 'en-GB',
		translateTo = 'mr-IN';
		console.log(text);
		if(!text) 
		return;
		$(this).parent().next().find('.to-text').attr("placeholder", "Translating...");
		let apiUrl = `https://api.mymemory.translated.net/get?q=${text}&langpair=${translateFrom}|${translateTo}`;
		fetch(apiUrl).then(res => res.json()).then(data => {
		  $(this).parent().next().find('.to-text').val(data.responseData.translatedText);
			data.matches.forEach(data => {
				if(data.id === 0) {
				  $(this).parent().next().find('.to-text').val(data.translation);
				}
			});
			$(this).parent().next().find('.to-text').attr("placeholder", "Translation");
		});
	});


  </script>

  @stop				
							
				
				<!--end page wrapper -->
				<!--start overlay-->
				
				
				
				
	