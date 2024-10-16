@extends('admin_layout')
@section('content')


    <div class="page-wrapper @if (auth()->user()->role == 1) d-none @endif">
        <div class="page-content">
            <div class="row" style="margin-left:-21%;">
                <div class="col-md-6 mx-auto">
                    <form  method="get" action="">
                    <div class="card" style="margin-top:-9%;">

                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6 style="color:red;font-weight:bold">Select Zone Wise</h6>
                            </div>
                            <hr>
                            
                                {{-- @csrf --}}

                            <div class="row">
                                <div class="col-md-3">
                                    <label >User</label>
                                    <select class="form-select " aria-label="Default select example" name="zone">
                                        <option value="all">All Zone</option>
                                        @foreach ($zone as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if (app('request')->input('zone') == $zone->id) {{ 'selected' }} @endif>
                                                {{ $zone->zone }}

                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-3" >
                                    <label>From Date<font color="black">*</font></label>
                                    <input type="date" placeholder=" "
                                        class="form-control datePicker" name="from_date"
                                        value="{{ app('request')->input('from_date') }}">
                                </div>
                                <div class="col-md-3" >
                                    <label>To Date<font color="black">*</font></label>
                                    <input type="date" placeholder=" "
                                        class="form-control datePicker" name="to_date"
                                        value="{{ app('request')->input('to_date') }}">
                                </div>

                                <div class="col-md-3" style="margin-top:3vh; " >
                                    <button type="submit" class="btn btn-primary px-3"> <i
                                            class='bx bx-search'></i>Search</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row" style="margin-left:-25%;">
                <div class="col">
                
                   
                    <div class="card">
                        <h6 class="mb-0 text-uppercase" style="margin: 5px">Report</h6>
                        <div class="card-body">
                          
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link  @if(app('request')->input('tab_name')!=null) @else active @endif" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Area Wise Report</div>
                                        </div>
                                    </a>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if(app('request')->input('tab_name')!=null) @else active @endif" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Generated License Report</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if (app('request')->input('tab_name') == 'primaryprofilepaid') active @endif" data-bs-toggle="tab" href="#primaryprofilepaid" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Received Trade Fees Report</div>
                                        </div>
                                    </a>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile11" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Notice Report</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation" >
                                    <a class="nav-link @if (app('request')->input('tab_name') == 'primaryprofile2') active @endif" data-bs-toggle="tab" href="#primaryprofile2" role="tab" 
                                        aria-selected="false"  >
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Area wise Report(Issued Lic.)</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation" >
                                    <a class="nav-link @if (app('request')->input('tab_name') == 'primaryprofile21') active @endif" data-bs-toggle="tab" href="#primaryprofile21" role="tab" 
                                        aria-selected="false"  >
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">All Establishments</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link  @if (app('request')->input('tab_name') == 'primaryprofile5') active @endif" data-bs-toggle="tab" href="#primaryprofile5" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Business Report</div>
                                        </div>
                                    </a>
                                </li>

                            </ul>

                            {{-- <div class="tab-content">
                                <div class="tab-pane fade @if(app('request')->input('tab_name')!=null) @else show active @endif" id="primaryhome" role="tabpanel">
                                   
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example7" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($serve_all1 as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->locality }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data as $data1)
                                                            <tr>

                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->locality }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="tab-content">
                                <div class="tab-pane fade @if(app('request')->input('tab_name')!=null) @else show active @endif" id="primaryprofile" role="tabpanel">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example8" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                            <th>Book No</th>
                                                            <th>Receipt No</th>
                                                            <th>Paid Fees</th>
                                                            <th>Zone No.</th>
                                                            <th>Date of Receipt</th>
                                                            <th>Certificate No.</th>
                                                            <th>Validity of Lic.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($serve_all1 as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td> {{ $serve_all->shop_house_no }} {{ $serve_all->bulding }} {{ $serve_all->street_name }} {{ $serve_all->locality }}</td>
                                                                <td>{{ $serve_all->book_no }}</td>
                                                                <td>{{ $serve_all->receipt_no }}</td>
                                                                <td>{{ $serve_all->pay_amount }}</td>
                                                                <td>{{ $serve_all->zone }}</td>
                                                                <td>{{ date('d-m-Y', strtotime($serve_all->date)) }}</td>
                                                                <td> BESA{{$serve_all->survey_app_no}}{{date('mY')}}{{ substr($serve_all->zone, 5, 8) }}</td>
                                                                <td>{{ $serve_all->certificate_year }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data as $data1)
                                                            <tr>

                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->shop_house_no }} {{ $data1->bulding }} {{ $data1->street_name }} {{ $data1->locality }}</td>
                                                                <td>{{ $data1->book_no }}</td>
                                                                <td>{{ $data1->receipt_no }}</td>
                                                                <td>{{ $data1->pay_amount }}</td>
                                                                <td>{{ $data1->zone }}</td>
                                                                <td>{{ date('d-m-Y', strtotime($data1->date)) }}</td>
                                                                <td>BESA{{$data1->survey_app_no}}{{date('mY')}}{{ substr($data1->zone, 5, 8) }}</td>
                                                                <td>{{ $data1->certificate_year }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade @if (app('request')->input('tab_name') == 'primaryprofilepaid') show active @endif" id="primaryprofilepaid" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                
                                            <div class="col-md-3">
                                                <label >User</label>
                                                <select class="form-select " aria-label="Default select example" name="zone">
                                                    <option value="all">All Zone</option>
                                                    @foreach ($zone1 as $zone1)
                                                        <option value="{{ $zone1->id }}"
                                                            @if (app('request')->input('zone') == $zone1->id) {{ 'selected' }} @endif>
                                                            {{ $zone1->zone }}
            
                                                        </option>
                                                    @endforeach
            
                                                </select>
                                            </div>
            
                                            <div class="col-md-3" >
                                                <label>From Date<font color="black">*</font></label>
                                                <input type="date" placeholder=" "
                                                    class="form-control datePicker" name="f_date"
                                                    value="{{ app('request')->input('f_date') }}">
                                            </div>
                                            <div class="col-md-3" >
                                                <label>To Date<font color="black">*</font></label>
                                                <input type="date" placeholder=" "
                                                    class="form-control datePicker" name="t_date"
                                                    value="{{ app('request')->input('t_date') }}">
                                            </div>
    
                                        <div class="col-md-3"  style="margin-top:4vh;">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary px-3" name="tab_name" value="primaryprofilepaid"> <i
                                                        class='bx bx-search' ></i>Search</button>
                                            </div>
                                        </div>
        
                                        </div>
                                            <div class="table-responsive">
                                                <table id="example7" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                            <th>Book No</th>
                                                            <th>Receipt No</th>
                                                            <th>Paid Fees</th>
                                                            <th>Date</th>
                                                            <th>Zone No.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($new_fees_paid as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->shop_house_no }} {{ $serve_all->bulding }} {{ $serve_all->street_name }} {{ $serve_all->locality }}</td>
                                                                <td>{{ $serve_all->book_no }}</td>
                                                                <td>{{ $serve_all->receipt_no }}</td>
                                                                <td>{{ $serve_all->pay_amount }}</td>
                                                                <td>{{ date('d-m-Y',strtotime($serve_all->date)) }}</td>
                                                                <td>{{ $serve_all->zone }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($exist_fees_paid as $data1)
                                                            <tr>

                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->shop_house_no }} {{ $data1->bulding }} {{ $data1->street_name }} {{ $data1->locality }}</td>
                                                                <td>{{ $data1->book_no }}</td>
                                                                <td>{{ $data1->receipt_no }}</td>
                                                                <td>{{ $data1->pay_amount }}</td>
                                                                <td>{{ date('d-m-Y',strtotime($data1->date)) }}</td>
                                                                <td>{{ $data1->zone }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade @if (app('request')->input('tab_name') == 'primaryprofile2') show active @endif" id="primaryprofile2" role="tabpanel">
                                    
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="row">
                                    
                                            <div class="col-md-3">
                                                <label class="form-label">Establishment</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="establishment">
                                                    <option value="all">All</option>
                                                    <option value="250" @if (app('request')->input('establishment') == 250) {{ 'selected' }} @endif>Less Than 250</option>
                                                    <option value="2500" @if (app('request')->input('establishment') == 2500) {{ 'selected' }} @endif>Between 251 to 2500</option>
                                                    <option value="5000" @if (app('request')->input('establishment') == 5000) {{ 'selected' }} @endif>More Than 2500</option>
                                                </select>
                                            </div>
        
                                            <div class="col-md-3"  style="margin-top:4vh;">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary px-3" name="tab_name" value="primaryprofile2"> <i
                                                            class='bx bx-search' ></i>Search</button>
                                                </div>
                                            </div>
            
                                            </div>
                                        <hr>
                                        {{-- </form> --}}
                                    
                                            <div class="table-responsive">
                                                <table id="example9" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($estab1 as $serve_all)
                                                            <tr>
                                                                {{-- <td>{{ $serve_all->zone }}</td> --}}
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->shop_house_no }} {{ $serve_all->bulding }} {{ $serve_all->street_name }} {{ $serve_all->locality }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($estab_data1 as $data1)
                                                            <tr>
                                                                {{-- <td>{{ $data1->zone }}</td> --}}
                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->shop_house_no }} {{ $data1->bulding }} {{ $data1->street_name }} {{ $data1->locality }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-content">
                                <div class="tab-pane fade @if (app('request')->input('tab_name') == 'primaryprofile21') show active @endif" id="primaryprofile21" role="tabpanel">
                                    
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="row">
                                    
                                            <div class="col-md-3">
                                                <label class="form-label">Establishment</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="establishment">
                                                    <option value="all">All</option>
                                                    <option value="250" @if (app('request')->input('establishment') == 250) {{ 'selected' }} @endif>Less Than 250</option>
                                                    <option value="2500" @if (app('request')->input('establishment') == 2500) {{ 'selected' }} @endif>Between 251 to 2500</option>
                                                    <option value="5000" @if (app('request')->input('establishment') == 5000) {{ 'selected' }} @endif>More Than 2500</option>
                                                </select>
                                            </div>
        
                                            <div class="col-md-3"  style="margin-top:4vh;">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary px-3" name="tab_name" value="primaryprofile21"> <i
                                                            class='bx bx-search' ></i>Search</button>
                                                </div>
                                            </div>
            
                                            </div>
            
                                        {{-- </form> --}}
                                    <hr>
                                            <div class="table-responsive">
                                                <table id="example11" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($new_all as $serve_all)
                                                            <tr>
                                                                {{-- <td>{{ $serve_all->zone }}</td> --}}
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->shop_house_no }} {{ $serve_all->bulding }} {{ $serve_all->street_name }} {{ $serve_all->locality }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($exist_new as $data1)
                                                            <tr>
                                                                {{-- <td>{{ $data1->zone }}</td> --}}
                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->shop_house_no }} {{ $data1->bulding }} {{ $data1->street_name }} {{ $data1->locality }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-content py-3" style="margin-top:-1%;">
                                <div class="tab-pane fade show" id="primaryprofile1" role="tabpanel">
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example3" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature Of Business</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                            <th>Zone No</th>
                                                            <th>Certificate No</th>
                                                            <th>No Of Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($serve_all1 as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->locality }}</td>
                                                                <td>{{ $serve_all->zone }}</td>
                                                                <td> BESA{{$serve_all->survey_app_no}}{{date('mY')}}{{ substr($serve_all->zone, 7, 10) }}</td>
                                                                <td>{{ $serve_all->certificate_year }}</td>
                                            
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data as $data1)
                                                            <tr>

                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->locality }}</td>
                                                                <td>{{ $data1->zone }}</td>
                                                                <td>BESA{{$data1->survey_app_no}}{{date('mY')}}{{ substr($data1->zone, 7, 10) }}</td>
                                                                <td>{{ $data1->certificate_year }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}

                            <div class="tab-content">
                                <div class="tab-pane fade show" id="primaryprofile11" role="tabpanel">
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example10" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature of Business</th>
                                                            <th>Area(Sq. Ft.)</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                            <th>1st Notice Date</th>
                                                            <th>2nd Notice Date</th>
                                                            <th>3rd Notice Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($serve_all1 as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->area_of_bussiness }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->shop_house_no }} {{ $serve_all->bulding }} {{ $serve_all->street_name }} {{ $serve_all->locality }}</td>
                                                                <td>{{ $serve_all->generate_notice_date ? date('d-m-Y', strtotime($serve_all->generate_notice_date)) : "N/A"  }}</td>
                                                                <td>{{ $serve_all->notice2_date }}</td>
                                                                <td>{{ $serve_all->notice3_date }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data as $data1)
                                                            <tr>

                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->shop_house_no }} {{ $data1->bulding }} {{ $data1->street_name }} {{ $data1->locality }}</td>
                                                                <td>{{ $data1->generate_notice_date ? date('d-m-Y', strtotime($data1->generate_notice_date)) : "N/A"  }}</td>
                                                                <td>{{ $data1->notice2_date }}</td>
                                                                <td>{{ $data1->notice3_date }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="tab-content py-3" >
                                <div class="tab-pane fade @if (app('request')->input('tab_name') == 'primaryprofile5') show active @endif" id="primaryprofile5" role="tabpanel">
                                    
                                    <div class="card" >
                                        <div class="card-body">
                                          <div class="row">
                                             {{-- <input type="hidden" name="tab_name" value="primaryprofile5"> --}}
                                             
                                             <div class="col-md-3">
                                                <label class="form-label">Business Name</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="business">
                                                    <option value="all">All</option>
                                                    @foreach ($business1 as $business)
                                                        <option value="{{ $business->id }}"
                                                            @if (app('request')->input('business') == $business->id) {{ 'selected' }} @endif>
                                                            {{ $business->business_type }}
            
                                                        </option>
                                                    @endforeach
            
                                                </select>
                                            </div>
                                            {{-- <div class="col-md-3">
                                                <label class="form-label">Zone</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="zone">
                                                    <option value="all">All Zone</option>
                                                    <option value="3" @if (app('request')->input('zone') == 3) {{ 'selected' }} @endif>Zone-1</option>
                                                    <option value="4" @if (app('request')->input('zone') == 4) {{ 'selected' }} @endif>Zone-2</option>
                                                    <option value="5" @if (app('request')->input('zone') == 5) {{ 'selected' }} @endif>Zone-3</option>
                                                    <option value="6" @if (app('request')->input('zone') == 6) {{ 'selected' }} @endif>Zone-4</option>
                                                    <option value="7" @if (app('request')->input('zone') == 7) {{ 'selected' }} @endif>Zone-5</option>
                                                    <option value="8" @if (app('request')->input('zone') == 8) {{ 'selected' }} @endif>Zone-6</option> --}}
                                                    {{-- @foreach ($zone as $zones)
                                                        <option value="{{ $zones->id }}"
                                                            @if (app('request')->input('zone') == $zones->id) {{ 'selected' }} @endif>
                                                            {{ $zones->zone }}
            
                                                        </option>
                                                    @endforeach --}}
            
                                                {{-- </select>
                                            </div> --}}
                
                                                <div class="col-md-3" style="margin-top:4vh;">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary px-3" name="tab_name" value="primaryprofile5"> <i
                                                                class='bx bx-search'></i>Search</button>
                                                    </div>
                                                </div>
                                          </div>
                                            {{-- </form> --}}
                                            <hr>
                                            <div class="table-responsive">
                                                <table id="example2" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Zone</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature Of Business</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                            <th>Zone No.</th>
                                                            <th>Area of Business</th>
                                                        </tr>
                                                    </thead>
                                                    {{-- @json($data_business) --}}
                                                    <tbody>
                                                        @foreach ($new_business as $business)
                                                            <tr>
                                                                {{-- <td>{{ $serve_all->zone }}</td> --}}
                                                                <td>{{ $business->survey_app_no }}</td>
                                                                <td>{{ $business->establishment }}</td>
                                                                <td>{{ $business->bussiness_name }}</td>
                                                                <td>{{ $business->wht_app_no }}</td>
                                                                <td>{{ $business->shop_house_no }} {{ $business->bulding }} {{ $business->street_name }} {{ $business->locality }}</td>
                                                                <td>{{ $business->zone }}</td>
                                                                <td>{{ $business->area_of_bussiness }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data_business as $data1)
                                                            <tr>
                                                                {{-- <td>{{ $data1->zone }}</td> --}}
                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->shop_house_no }} {{ $data1->bulding }} {{ $data1->street_name }} {{ $data1->locality }}</td>
                                                                <td>{{ $data1->zone }}</td>
                                                                <td>{{ $data1->area_of_bussiness }}</td>
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

            </form>
            </div>
        </div>
    </div>
    </div>



        @stop
