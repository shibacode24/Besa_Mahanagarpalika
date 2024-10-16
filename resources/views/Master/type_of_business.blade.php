@extends('admin_layout')
@section('content')



    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row" style="margin-left:-25%;">
                <div class="col-md-7 mx-auto">

                    <div class="card" style="margin-top:-4%;">
                        @include('alert')
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6 style="color:red;font-weight:bold">Nature of Bussiness</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('typeofbussinessinsert') }}">
                                @csrf


                                <div class="col-md-3">
                                    <label>Nature of bussiness</label>
                                    <input class="form-control from-text mb-3" type="text"
                                        name="bussiness_type"placeholder="Business Type" required>
                                </div>


                                <div class="col-md-3">
                                    <label>Nature of bussiness</label>
                                    <input class="form-control to-text mb-3" type="text" name="bussiness_type1"
                                        placeholder="व्यवसायाचे प्रकार" required>
                                </div>


                                <div class="col-md-3">
                                    <label>Registration Fee</label>
                                    <input class="form-control mb-3" type="text" name="reg_fee" placeholder="Registration Fee" required>

                                </div>

                                <div class="col-md-3">
                                    <label>License/Renewal Fee</label>
                                    <input class="form-control mb-3" type="text" name="renewal_charges" placeholder="License/Renewal Fee" required>
                                    
                                </div>


                                <div class="col-md-3">
                                    <label>Verification Fee</label>
                                    <input class="form-control mb-3" type="text" name="charges" placeholder="Verification Fee" required>

                                </div>

                             
                                <div class="col-md-3">
                                    <label>Late Fee</label>
                                    <input class="form-control mb-3" type="text" name="late_fee" placeholder="Late Fee" required>

                                </div>
                                <div class="col-md-12" style="margin-top:10px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-2" style="float:right"> <i
                                                class="lni lni-circle-plus"></i>Add</button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

                {{-- <div class="col-md-6 mx-auto">

                    <div class="card">
                     
                        <div class="card-body">u
                            <div class="card-title d-flex align-items-center">
    
                                <h6>Hotel Charges</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('hotel_insert') }}">
                                @csrf
    
    
    
                                <div class="col-md-4">
                                    <label>Charges of Non AC Room</label>
                                    <input class="form-control  mb-3" type="text" name="non_ac_room"
                                        placeholder="Charges of Non AC Room">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label>Charges of AC Room</label>
                                    <input class="form-control mb-3" type="text" name="ac_room"
                                        placeholder="Charges of AC Room">
    
                                </div>
                                <div class="col-md-4" style="margin-top:29px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5"> <i
                                                class="lni lni-circle-plus"></i>Add</button>
                                    </div>
                                </div>
    
                            </form>
    
                        </div>
    
                    </div>
                </div> --}}

                <div class="col-md-5 mx-auto">

                    <div class="card"  style="margin-top:-4%;">
                
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
    
                                <h6 style="color:red;font-weight:bold">Hotel Charges</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('update_hotel') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$hotel_data->id}}" >
    
                             
                                <div class="col-md-4">
                                    <label>Charges of Non AC Room</label>
                                    <input class="form-control  mb-3" type="text" name="non_ac_room"
                                        placeholder="Charges of Non AC Room"
                                        value="{{ $hotel_data->non_ac_room  }}" required>
                                </div>
    
    
                                <div class="col-md-3">
                                    <label>Charges of AC Room</label>
                                    <input class="form-control mb-3" type="text" name="ac_room"
                                        placeholder="Charges of AC Room"
                                        value="{{ $hotel_data->ac_room   }}" required>
    
                                </div>
                                <div class="col-md-12" style="margin-top:10px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-2" style="float: right"> <i
                                                class="lni lni-circle-plus"></i>update</button>
                                    </div>
                                </div>
    
                            </form>
    
                        </div>
    
                    </div>
                </div>

            </div>


        </div>
    </div>


    <div class="page-wrapper">
        <div class="page-content">
            <div class="row" style="margin-top:-7%;">
                <div class="col-md-12 mx-auto">
                    <div class="card" style="margin-left:-24%;" >
                        <div class="card-body" style="margin-rigth:1000px;">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Nature Of Business</th>
                                            <th>Nature Of Business</th>
    
                                            <th>Registration Fee</th>
                                            <th>License/Renewal Fee</th>
                                            <th>Verification Fee</th>
                                            <th>Late Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bussinesstype_all as $all)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $all->bussiness_type }}</td>
                                                <td>{{ $all->bussiness_type1 }}</td>

                                                <td>{{ $all->reg_fee }}</td>
                                                <td>{{ $all->renewal_charges }}</td>
                                                <td>{{ $all->charges }}</td>
  
                                                <td>{{ $all->late_fee }}</td>
                                                <td>
                                                    <a href="{{ route('typeofbussinessedit', $all->id) }}"><button
                                                            type="button" class="btn1 btn-outline-success"><i
                                                                class='bx bx-edit-alt me-0'></i></button></a>
                                                    <a href="{{ route('typeofbussinessdelete', $all->id) }}"><button
                                                            type="button" class="btn1 btn-outline-danger"
                                                            onclick="return confirm('Are You Sure To Delete This?')"><i
                                                                class='bx bx-trash me-0'></i></button> </a>
                                                </td>
    
                                            </tr>
                                        @endforeach
    
    
    
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Charges of Non AC Room</th>
                                        <th>Charges of AC Room</th>
    
                                      
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotel as $all)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $all->non_ac_room }}</td>
                                            <td>{{ $all->ac_room }}</td>
                                            <td>
                                                <a href="{{ route('edit_hotel', $all->id) }}"><button type="button"
                                                        class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button></a>
                                                <a href="{{ route('delete_hotel', $all->id) }}"><button type="button"
                                                        class="btn1 btn-outline-danger"
                                                        onclick="return confirm('Are You Sure To Delete This?')"><i
                                                            class='bx bx-trash me-0'></i></button> </a>
                                            </td>
    
                                        </tr>
                                    @endforeach
    
    
    
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Charges of Non AC Room</th>
                                        <th>Charges of AC Room</th>
    
                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alls as $all)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $all->non_ac_room }}</td>
                                      
    
                                            <td>{{ $all->ac_room }}</td>
                                            <td>
                                                <a href="{{ route('edit_hotel', $all->id) }}"><button type="button"
                                                        class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button></a>
                                               
                                            </td>
    
                                        </tr>
                                    @endforeach
    
    
    
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


       
    </div>
    </div>
    {{-- 

			@section('js');
		
		<script >
			const fromText = $(".from-text").val();
			const toText = $(".to-text");
	  
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
	  
	  
		  </script>	 --}}
@stop


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
