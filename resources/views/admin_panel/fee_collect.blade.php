@extends('admin_layout')
@section('content')


    <div class="page-wrapper @if (auth()->user()->role == 1) d-none @endif">
        <div class="page-content">
            <div class="row" style="margin-left:-21%;">
                <div class="col-md-6 mx-auto">

                    <div class="card" style="margin-top:-9%;">

                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6 style="color: red;font-weight:bold">Select Zone Wise</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="get" action="">

                                <div class="col-md-3"></div>
                                <div class="col-md-4">
                                    <label class="form-label">User</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="zone">
                                        <option value="all">All Zone</option>
                                        @foreach ($zone as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if (app('request')->input('zone') == $zone->id) {{ 'selected' }} @endif>
                                                {{ $zone->zone }}

                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-3" style="margin-top:6vh;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-2"> <i
                                                class='bx bx-search'></i>Search</button>
                                    </div>
                                </div>



                            </form>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row" style="margin-left:-25%;">
                <div class="col">


                    <div class="card">
                        {{-- <h6 class="mb-0 text-uppercase" style="margin: 5px">APPLICATION FORM</h6> --}}
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Collected Fee </div>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Demand Notice 02</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile1" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Demand Notice 03</div>
                                        </div>
                                    </a>
                                </li> --}}

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                    {{-- <div class="col-md-12 mx-auto"> --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example2" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Zone</th>
                                                            <th>Amount</th>
                                                            {{-- <th>Receipt Date</th>
                                                            <th>MOP</th>
                                                            <th>Receipt No</th> --}}
                                                            {{-- <th style="background-color: #fff">Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($serve_all1 as $serve_all)
                                                            <tr>
                                                                {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                                                {{-- <td>{{ $serve_all->survey_app_no }}</td> --}}
                                                                <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="
														Bussiness Owner :- {{ $serve_all->bussiness_owner }}
														Contact_Person :- {{ $serve_all->contact_person }}
														Street_Name :- {{ $serve_all->street_name }}
														Shop_ House_ NO :- {{ $serve_all->shop_house_no }}
														Building Name :- {{ $serve_all->bulding }}
														Locality :- {{ $serve_all->locality }}
														Prabhag Name:-  {{ $serve_all->prabhag_name }}
														Pincode:- {{ $serve_all->pincode }}
														What's App No:- {{ $serve_all->wht_app_no }}
														Email:- {{ $serve_all->email }}
														GST No:- {{ $serve_all->gst_no }}
														Year:- {{ $serve_all->year }}
														No Of Employee Working:- {{ $serve_all->no_of_employee_working }}
														Area Of Bussiness:-	{{ $serve_all->area_of_bussiness }}	">
                                                                    {{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->zone }}</td>
                                                                <td>{{ $serve_all->pay_amount }}</td>
                                                                {{-- <td>{{ date('d-m-Y', strtotime($serve_all->date)) }}</td>
                                                                <td>{{ $serve_all->payment_mode }}</td>
                                                                <td>{{ $serve_all->receipt_no }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data as $data1)
                                                            <tr>
                                                                {{-- <td>{{ count($serve_all1) + $loop->index + 1  }}</td> --}}

                                                                <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="
																	BUssiness Owner :- {{ $data1->bussiness_owner }}
																	Contact_Person :- {{ $data1->contact_person }}
																	Street_Name :- {{ $data1->street_name }}
																	Shop_ House_ NO :- {{ $data1->shop_house_no }}
																	Building Name :- {{ $data1->bulding }}
																	Locality :- {{ $data1->locality }}
																	Prabhag Name:-  {{ $data1->prabhag_name }}
																	Pincode:- {{ $data1->pincode }}
																	What's App No:- {{ $data1->wht_app_no }}
																	Email:- {{ $data1->email }}
																	GST No:- {{ $data1->gst_no }}
																	Year:- {{ $data1->year }}
																	No Of Employee Working:- {{ $data1->no_of_employee_working }}
																	Area Of Bussiness:-	{{ $data1->area_of_bussiness }}">
                                                                    {{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->zone }}</td>

                                                                <td>{{ $data1->pay_amount }}</td>
                                                                {{-- <td>{{ date('d-m-Y', strtotime($data1->date)) }}</td>
                                                                <td>{{ $data1->payment_mode }}</td>
                                                                <td>{{ $data1->receipt_no }}</td> --}}

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@stop
