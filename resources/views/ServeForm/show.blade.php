@extends('layout')
@section('content')
    <!--start page wrapper -->

   
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row" style="margin-left:-21%;">
                <div class="col-md-6 mx-auto">
                 
                    <div class="card" style="margin-top:-9%;">
                        @include('alert')
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6 style="color: red;font-weight:bold">Select Application Number</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="get" action="">
                                <div class="col-md-3"></div>
                                <div class="col-md-3" style="margin-top:15px;">
                                    <label>Select<font color="black">*</font></label>
                                    <input type="text" placeholder=" " class="form-control" name="survey_app_no"
                                        value="{{ app('request')->input('survey_app_no') }}">
                                </div>
                                <div class="col-md-3" style="margin-top:6vh;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-2"> <i
                                                class='bx bx-search'></i>Search</button>
                                    </div>
                                </div>

                            </form>

                            {{-- <div class="col-md-3" style="margin-top:6vh;"> --}}
                            <div class="col" style="margin-left:70%;margin-top:-6%">
                                <a href="{{ route('showserve') }}"> <button type="submit" class="btn btn-primary px-2"> <i
                                            class='bx bx-refresh'></i>Refresh</button></a>
                            </div>
                            {{-- </div> --}}
                        </div>

                    </div>
                </div>
            </div>

            <div class="row" style="margin-left:-15%;">
                <div class="col">

                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title"> Applications</div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example222" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Mobile No.</th>
                                                            <th>Nature Of Business</th>

                                                            <th>Address</th>

                                                            <th style="background-color: #fff">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($all_survays as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->id }}</td>
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
                                                                <td>{{ $serve_all->wht_app_no }}</td>

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

                                                                <td style="background-color: #fff">
                                                                    @if ($serve_all->user_id == null)
                                                                        <a href="{{ route('print', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-primary"><i
                                                                                    class="lni lni-printer"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Form Print"></i></button>
                                                                        </a>
                                                                        <a href="{{ route('send_notice', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"><i
                                                                                    class="fadeIn animated bx bx-news"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Notice"></i></button>
                                                                        </a>
                                                                        @if ($serve_all->generate_notice == '0')
                                                                            <button type="button"
                                                                                class="btn1 btn-outline-success editbtn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal1"
                                                                                id="{{ $serve_all->id }}"><i
                                                                                    class="fadeIn animated bx bx-news"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Generate Demand Notice 01"></i></button>
                                                                        @endif

                                                                        <a
                                                                            href="{{ route('newserveedit', $serve_all->id) }}">
                                                                            <button type="button"
                                                                                class="btn1 btn-outline-success"><i
                                                                                    class='bx bx-edit-alt me-0'
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Edit"></i></button></a>
                                                                    @endif
                                                                    {{-- existing_data --}}
                                                                    @if ($serve_all->user_id == !null)
                                                                        <a href="{{ route('print_existing', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-primary "
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Form Print"><i
                                                                                    class="lni lni-printer"></i></button>
                                                                        </a>

                                                                        <a href="{{ route('existing_send_notice', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn btn-outline-info"><i
                                                                                    class="fadeIn animated bx bx-news"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Notice"></i></button>
                                                                        </a>

                                                                        @if ($serve_all->generate_notice == '0')
                                                                            <button type="button"
                                                                                class="btn1 btn-outline-success editbtn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                id="{{ $serve_all->id }}"><i
                                                                                    class="fadeIn animated bx bx-news"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Generate Demand  Notice 01"></i></button>
                                                                        @endif

                                                                        <a
                                                                            href="{{ route('edit_existing', $serve_all->id) }}">
                                                                            <button type="button"
                                                                                class="btn1 btn-outline-success"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Edit"><i
                                                                                    class='bx bx-edit-alt me-0'></i></a>
                                                                    @endif
                                                                </td>


                                                            </tr>
                                                        @endforeach



                                                    </tbody>
                                                </table>
                                                {{-- {!! $all_survays->links() !!} --}}
                                                {{ $all_survays->links('custom.pagination') }}

                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>




                        <div class="col">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('generate_new_notice') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" id="generate_new_notice1">
                                                <input type="hidden" name="generate_notice_date"
                                                    value="{{ date('Y-m-d') }}">

                                                <h6>
                                                    Do you want to issue the notice for establishment?
                                                </h6><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Current/Upcoming Year<span
                                                                style="color:red">*</span></label>
                                                        <select class="form-select mb-3 location"
                                                            aria-label="Default select example" name="year" required>
                                                            <option value="1">1 Year</option>
                                                            <option value="2">2 Year</option>
                                                            <option value="3">3 Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Ok</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('generate_existing_notice') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" id="generate_existing_notice">
                                                <input type="hidden" name="generate_notice_date"
                                                    value="{{ date('Y-m-d') }}">
                                                <h6>
                                                    Do you want to issue the notice for establishment?
                                                </h6>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Current/Upcoming Year<span
                                                                style="color:red">*</span></label>
                                                        <select class="form-select mb-3 location"
                                                            aria-label="Default select example" name="year" required>
                                                            <option value="1">1 Year</option>
                                                            <option value="2">2 Year</option>
                                                            <option value="3">3 Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Ok</button>
                                            </form>
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

            var table = $('#example222').DataTable({
                scrollCollapse: true,
                searching: false,
                paging: false,
                "info": false,
                order: [
                    [0, 'desc']
                ],
                columnDefs: [{
                    targets: 0, // Zero index column
                    visible: false,
                }],
                fixedColumns: {
                    leftColumns: 0,
                    right: 1
                }
            });
        </script>
    @stop
