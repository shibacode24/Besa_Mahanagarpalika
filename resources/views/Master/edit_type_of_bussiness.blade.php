@extends('admin_layout')
@section('content')



    <!--start page wrapper -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-11 mx-auto" style="margin-top:5%">

                <div class="card" style="margin-top:-4%;">
                    @include('alert')
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">

                            <h6>Nature Of Business</h6>
                        </div>
                        <hr>
                        <form class="row g-2" method="post" action="{{ route('typeofbussinessupdate') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ isset($edit_data) ? $edit_data->id : '' }}">


                            <div class="col-md-3">
                                <label>Nature Of Business</label>
                                <input class="form-control mb-3 from-text" type="text"
                                    name="bussiness_type"placeholder="Business Type"
                                    value="{{ isset($edit_data) ? $edit_data->bussiness_type : '' }}">

                            </div>


                            <div class="col-md-3">
                                <label>Nature Of bussiness</label>
                                <input class="form-control to-text mb-3" type="text" name="bussiness_type1"
                                    placeholder="व्यवसायाचे प्रकार"
                                    value="{{ isset($edit_data) ? $edit_data->bussiness_type1 : '' }}">
                            </div>

        
                            <div class="col-md-3">
                                <label>Registration Fee</label>
                                <input class="form-control mb-3" value=" {{ isset($edit_data) ? $edit_data->reg_fee : '' }}" type="text" name="reg_fee" placeholder="Charges" required>
                              
                            </div>

                            <div class="col-md-3">
                                <label>License/Renewal Fee</label>
                                <input class="form-control mb-3" type="text" value=" {{ isset($edit_data) ? $edit_data->renewal_charges : '' }}" name="renewal_charges" placeholder="Charges" required>
                              

                            </div>

                            <div class="col-md-3">
                                <label>Verification Fee</label>
                               
                                <input class="form-control mb-3" type="text" name="charges" value=" {{ isset($edit_data) ? $edit_data->charges : '' }}" placeholder="Charges" required>

                            </div>

                            <div class="col-md-3">
                                <label>Late Fee</label>
                                <input class="form-control mb-3" value=" {{ isset($edit_data) ? $edit_data->late_fee : '' }}" type="text" name="late_fee" placeholder="Charges" required>

                            </div>
                            <div class="col-md-3" style="margin-top:29px;">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-5"> <i
                                            class="lni lni-circle-plus"></i>Update</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>


        <div class="overlay toggle-icon"></div>
        <hr />
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-body">
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
                                        <td> <a href="{{ route('typeofbussinessedit', $all->id) }}"><button type="button"
                                                    class="btn1 btn-outline-success"><i
                                                        class='bx bx-edit-alt me-0'></i></button></a>
                                            <a href="{{ route('typeofbussinessdelete', $all->id) }}"><button type="button"
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
        </div>
    </div>


    {{-- <div class="page-content">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="card">
                   
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">

                            <h6>Hotel Charges</h6>
                        </div>
                        <hr>
                        <form class="row g-2" method="post" action="{{ route('update_hotel') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ isset($hotel_data) ? $hotel_data->id : '' }}">

                           

                            <div class="col-md-4">
                                <label>Charges of Non AC Room</label>
                                <input class="form-control  mb-3" type="text" name="non_ac_room"
                                    placeholder="Charges of Non AC Room"
                                    value="{{ isset($hotel_data) ? $hotel_data->non_ac_room : '' }}">
                            </div>


                            <div class="col-md-4">
                                <label>Charges of AC Room</label>
                                <input class="form-control mb-3" type="text" name="ac_room"
                                    placeholder="Charges of AC Room"
                                    value="{{ isset($hotel_data) ? $hotel_data->ac_room : '' }}">

                            </div>
                            <div class="col-md-4" style="margin-top:29px;">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-5"> <i
                                            class="lni lni-circle-plus"></i>update</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>


        <div class="overlay toggle-icon"></div>
        <hr />
        {{-- <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
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
    </div> 
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
