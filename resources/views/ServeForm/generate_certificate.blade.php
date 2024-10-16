@extends('layout')
@section('content')
    <!--start page wrapper -->


    <div class="page-wrapper">
        <div class="page-content">
            <div class="row" style="margin-left:-15%;">
                <div class="col">

                    <div class="card" style="margin-top:-4%;">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Generated Certificate</div>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Demand Notice</div>
                                        </div>
                                    </a>
                                </li> --}}

                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                    {{-- <div class="col-md-12 mx-auto"> --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            {{-- <th>Zone</th> --}}
                                                            <th>Name of Establishment</th>
                                                            <th>Nature Of Business</th>
                                                            {{-- <th>Area of Business in square Feet</th> --}}

                                                            <th>Address</th>

                                                            {{-- <th style="background-color: #fff">Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($new_generate_certificate as $serve_all)
                                                            <tr>
                                                                {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                {{-- <td>{{ $serve_all->zone }}</td> --}}
                                                                <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="
                                                                BUssiness Owner :- {{ $serve_all->bussiness_owner }}
                                                                Contact_Person :- {{ $serve_all->contact_person }}
                                                                Street_Name :- {{ $serve_all->street_name }}
                                                                Shop_ House_ NO :- {{ $serve_all->shop_house_no }}
                                                                Building Name :- {{ $serve_all->bulding }}
                                                                ">
                                                                    {{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>


                                                                <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title=" Locality :- {{ $serve_all->locality }}
                                                                    Prabhag Name:-  {{ $serve_all->prabhag_name }}
                                                                    Pincode:- {{ $serve_all->pincode }}
                                                                    What's App No:- {{ $serve_all->wht_app_no }}
                                                                    Email:- {{ $serve_all->email }}
                                                                    GST No:- {{ $serve_all->gst_no }}
                                                                    Year:- {{ $serve_all->year }}
                                                                    No Of Employee Working:- {{ $serve_all->no_of_employee_working }}
                                                                    Area Of Bussiness:-	{{ $serve_all->area_of_bussiness }}	">
                                                                    {{ $serve_all->locality }}
                                                                </td>

                                                                {{-- <td style="background-color: #fff"> --}}

                                                                    {{-- <a href="{{ route('print', $serve_all->id) }}"
                                                                        target="_blank"><button type="button"
                                                                            class="btn1 btn-outline-primary"><i
                                                                                class="lni lni-printer"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Form Print"></i></button>
                                                                    </a> --}}
                                                                    {{-- @json($serve_all->id) --}}
                                                                    {{-- @if ($serve_all->generate_notice == '0')
                                                                        <button type="button"
                                                                            class="btn1 btn-outline-success editbtn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal1"
                                                                            id="{{ $serve_all->id }}"><i
                                                                                class="fadeIn animated bx bx-news"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Generate Notice"></i></button>
                                                                    @endif

                                                                    @if ($serve_all->generate_notice == '1')
                                                                        <a href="{{ route('new_notice', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"><i
                                                                                    class="fadeIn animated bx bx-news"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Notice"></i></i></button>
                                                                        </a>
                                                                    @endif



                                                                    @if ($serve_all->paid_unpaid == 'paid')
                                                                        <a href="{{ route('print-serve', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-primary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Receipt Print"><i
                                                                                    class='bx bx-receipt me-0'></i></button>
                                                                        </a>
                                                                    @endif

                                                                    @if ($serve_all->paid_unpaid == 'unpaid')
                                                                        <a
                                                                            href="{{ route('edit_payment_mode1', $serve_all->id) }}"><button
                                                                                type="button"
                                                                                class="btn1 btn-outline-secondary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Payment"><i
                                                                                    class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                                        </a>
                                                                    @endif --}}

                                                                    {{-- @if ($serve_all->status == 1)
                                                                        <a href="{{ route('new_certificate', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-success"><i
                                                                                    class="lni lni-certificate"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Certificate"></i></button>
                                                                        </a>
                                                                    @endif --}}

                                                                    {{-- <a href="{{ route('newserveedit', $serve_all->id) }}">
                                                                        <button type="button"
                                                                            class="btn1 btn-outline-success"><i
                                                                                class='bx bx-edit-alt me-0'
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Edit"></i></button></a> --}}

                                                                {{-- </td> --}}

                                                            </tr>
                                                        @endforeach

                                                        @foreach ($exis_generate_certificate as $data1)
                                                            <tr>
                                                                <td>{{ $data1->survey_app_no }}</td>

                                                                <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="
                                                    BUssiness Owner :- {{ $data1->bussiness_owner }}
                                                    Contact_Person :- {{ $data1->contact_person }}
                                                    Street_Name :- {{ $data1->street_name }}
                                                    Shop_ House_ NO :- {{ $data1->shop_house_no }}
                                                    Building Name :- {{ $data1->bulding }}
                                                    ">
                                                                    {{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>

                                                                <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title=" Locality :- {{ $data1->locality }}
                                                            Prabhag Name:-  {{ $data1->prabhag_name }}
                                                            Pincode:- {{ $data1->pincode }}
                                                            What's App No:- {{ $data1->wht_app_no }}
                                                            Email:- {{ $data1->email }}
                                                            GST No:- {{ $data1->gst_no }}
                                                            Year:- {{ $data1->year }}
                                                            No Of Employee Working:- {{ $data1->no_of_employee_working }}
                                                            Area Of Bussiness:-	{{ $data1->area_of_bussiness }}	">
                                                                    {{ $data1->locality }}
                                                                </td>


                                                                {{-- <td style="background-color: #fff"> --}}

                                                                    {{-- <a href="{{ route('print_existing', $data1->id) }}"
                                                                        target="_blank"><button type="button"
                                                                            class="btn1 btn-outline-primary "
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Form Print"><i
                                                                                class="lni lni-printer"></i></button>
                                                                    </a> --}}


                                                                    {{-- @if ($data1->generate_notice == '0')
                                                                        <button type="button"
                                                                            class="btn1 btn-outline-success editbtn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal"
                                                                            id="{{ $data1->id }}"><i
                                                                                class="fadeIn animated bx bx-news"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Generate Notice"></i></button>
                                                                    @endif

                                                                    @if ($data1->generate_notice == '1')
                                                                        <a href="{{ route('existing_notice', $data1->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Notice"><i
                                                                                    class="fadeIn animated bx bx-news"></i></button>
                                                                        </a>
                                                                    @endif

                                                                    @if ($data1->paid_unpaid == 'paid')
                                                                        <a href="{{ route('print-serve1', $data1->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Receipt Print"><i
                                                                                    class='bx bx-receipt me-0'></i></button>
                                                                        </a>
                                                                    @endif
                                                                    @if ($data1->paid_unpaid == 'unpaid')
                                                                        <a
                                                                            href="{{ route('edit_payment_mode', $data1->id) }}"><button
                                                                                type="button"
                                                                                class="btn1 btn-outline-primary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Payment"><i
                                                                                    class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                                        </a>
                                                                    @endif --}}

                                                                    {{-- @if ($data1->status == 1)
                                                                        <a href="{{ route('existing_certificate', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-success"><i
                                                                                    class="lni lni-certificate"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Certificate"></i></button>
                                                                        </a>
                                                                    @endif --}}

                                                                    {{-- <a href="{{ route('edit_existing', $data1->id) }}">
                                                                        <button type="button"
                                                                            class="btn1 btn-outline-success"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"><i
                                                                                class='bx bx-edit-alt me-0'></i></a></button> --}}



                                                                    {{-- <a
                                                                                href="{{ route('delete_existing', $data1->id) }}"><button
                                                                                    type="button"
                                                                                    class="btn1 btn-outline-danger"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top" title="Delete"
                                                                                    onclick="return confirm('Are You Sure To Delete This?')"><i
                                                                                        class='bx bx-trash me-0'></i></button>
                                                                            </a> --}}

                                                                    {{-- <a href="{{ route('print-serve1', $data1->id) }}"><button
                                                                        type="button"
                                                                        class="btn1 btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Receipt"><i
                                                                            class='bx bx-receipt me-0'></i></button>
                                                                </a> --}}




                                                                {{-- </td> --}}

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
                    </div>

                </div>






            </div>
        </div>
    </div>


    {{-- <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Receipt</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
						<div class="modal-body">
							<form class="row g-2" action="{{ route('update_payment_mode', $data1->id) }}" method="post">
								@csrf
							<input type="text" name="id" value="{{$data1->id}}">
								<div class="row">

									<label class="form-label">Amount : <b>{{$serve_all->charges}}</b> </label>

									<div class="col-md-6" >
										<label class="form-label">Payment Mode<span style="color:red">*</span></label>
										<select class="form-select mb-3 location" aria-label="Default select example"
										name="payment_mode" required>
										<option value="">Select</option>
										
											<option value="Cash">Cash</option>
											<option value="UPI">UPI</option>
											<option value="Bank Transfer">Bank Transfer</option>
										
									</select>
									</div>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Date<span style="color:red">*</span></label>
										<input type="date" class="form-control" 
											placeholder="Date" name="date" required>
									</div>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
						</div>
					</div>
				</div> --}}

    {{-- <div class="col">
       
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('generate_new_notice') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="generate_new_notice1">
                            <input type="hidden" name="generate_notice_date" value="{{ date('Y-m-d') }}">

                            <h6>
                                Do you want to issue the notice for establishment?
                            </h6><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Past Year<span style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                        name="past_year" id="year" required>
                                        <option value="0">None</option>
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="3">3 Year</option>
                                        <option value="4">4 Year</option>
                                        <option value="5">5 Year</option>
                                        <option value="6">6 Year</option>
                                        <option value="7">7 Year</option>
                                        <option value="8">8 Year</option>
                                        <option value="9">9 Year</option>
                                        <option value="10">10 Year</option>
                                        <option value="11">11 Year</option>
                                        <option value="12">12 Year</option>
                                        <option value="13">13 Year</option>
                                        <option value="14">14 Year</option>
                                        <option value="15">15 Year</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Current/Upcoming Year<span
                                            style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                        name="year" required>
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="3">3 Year</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="col">
      
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('generate_existing_notice') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="generate_existing_notice">
                            <input type="hidden" name="generate_notice_date" value="{{ date('Y-m-d') }}">
                            <h6>
                                Do you want to issue the notice for establishment?
                            </h6>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Past Year<span style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                        name="past_year" id="year" required>
                                        <option value="0">None</option>
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="3">3 Year</option>
                                        <option value="4">4 Year</option>
                                        <option value="5">5 Year</option>
                                        <option value="6">6 Year</option>
                                        <option value="7">7 Year</option>
                                        <option value="8">8 Year</option>
                                        <option value="9">9 Year</option>
                                        <option value="10">10 Year</option>
                                        <option value="11">11 Year</option>
                                        <option value="12">12 Year</option>
                                        <option value="13">13 Year</option>
                                        <option value="14">14 Year</option>
                                        <option value="15">15 Year</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Current/Upcoming Year<span
                                            style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                        name="year" required>
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="3">3 Year</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    </div>
    </div>
    </div>
    </div>

@stop
@section('js')
    <script>
        $(".editbtn").on('click', function() {
            //  alert($(this).attr('id'));
            $("#generate_new_notice1").val($(this).attr('id'));
        });
    </script>

    <script>
        $(".editbtn").on('click', function() {
            // alert($(this).attr('id'));
            $("#generate_existing_notice").val($(this).attr('id'));
        });
    </script>
@stop
