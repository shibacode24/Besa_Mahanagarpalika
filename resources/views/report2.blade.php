@extends('admin_layout')
@section('content')


    <div class="page-wrapper @if (auth()->user()->role == 1) d-none @endif">
        <div class="page-content">
            <div class="row">
                <div class="col-md-8 mx-auto">

                    <div class="card">

                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6>Select Zone Wise</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="get" action="">
                                @csrf

                                <div class="col-md-4">
                                    <label class="form-label">User</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="zone">
                                        <option>All Zone</option>
                                        @foreach ($zone as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if (app('request')->input('zone') == $zone->id) {{ 'selected' }} @endif>
                                                {{ $zone->zone }}

                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-4" style="margin-top:30px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5"> <i
                                                class='bx bx-search'></i>Search</button>
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
            <div class="row">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">Report</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Report 2</div>
                                        </div>
                                    </a>
                                </li>

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
                                                            <th>Name of Establishment</th>
                                                            <th>Nature Of Business</th>
                                                            <th>Mobile No.</th>
                                                            <th>Address</th>
                                                            <th>No Of Year</th>
                                                            <th>Receipt Amount</th>
                                                            <th>Ward</th>
                                                            <th>Date Of Receipt</th>
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
                                                                <td>{{ $serve_all->certificate_year }}</td>
                                                                <td>{{ $serve_all->pay_amount }}</td>
                                                                <td>{{ $serve_all->zone }}</td>
                                                                <td>{{ $serve_all->date }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach ($data as $data1)
                                                            <tr>
                                                                
                                                                <td>{{ $data1->survey_app_no }}</td>
																<td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->locality }}</td>
                                                                <td>{{ $data1->certificate_year }}</td>
                                                                <td>{{ $data1->pay_amount }}</td>
                                                                <td>{{ $data1->zone }}</td>
                                                                <td>{{ $data1->date }}</td>
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


        @stop
