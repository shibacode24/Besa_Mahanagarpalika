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
                                            <div class="tab-title"> Demand Notice 01</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
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
                                </li>

                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                  
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Sr. No.</th> --}}
                                                            <th>Application Number</th>
                                                            <th>Mobile Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature Of Business</th>
                                                            {{-- <th>Area of Business in square Feet</th> --}}

                                                            <th>Address</th>

                                                            <th style="background-color: #fff">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($new_notice as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->wht_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->locality }}</td>

                                                                <td style="background-color: #fff">

                                                                    @if ($serve_all->generate_notice == '1')
                                                                        <a href="{{ route('new_notice', $serve_all->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"><i
                                                                                    class="fadeIn animated bx bx-news"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Demand Notice 01"></i></i></button>
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

                                                                    @if ($serve_all->paid_unpaid == 'unpaid' && $serve_all->generate_notice02 == 0)
                                                                        <a
                                                                            href="{{ route('edit_payment_mode1', $serve_all->id) }}"><button
                                                                                type="button"
                                                                                class="btn1 btn-outline-secondary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Payment"><i
                                                                                    class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                                        </a>
                                                                    @endif

                                                                    @if ($serve_all->generate_notice02 == '0' && $serve_all->paid_unpaid == 'unpaid')
                                                                        <button type="button"
                                                                            class="btn1 btn-outline-success editbtn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal1"
                                                                            id="{{ $serve_all->id }}"><i
                                                                                class="fadeIn animated bx bx-news"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Generate Demand Notice 02"></i></button>
                                                                    @endif
                                                               </td>

                                                            </tr>
                                                        @endforeach

                                                        @foreach ($exis_notice as $data1)
                                                            <tr>
                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->wht_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td> {{ $data1->locality }}</td>


                                                                <td style="background-color: #fff">

                                                                    @if ($data1->generate_notice == '1')
                                                                        <a href="{{ route('existing_notice', $data1->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Demand Notice 01"><i
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
                                                                    @if ($data1->paid_unpaid == 'unpaid' && $data1->generate_notice02 == 0)
                                                                        <a
                                                                            href="{{ route('edit_payment_mode', $data1->id) }}"><button
                                                                                type="button"
                                                                                class="btn1 btn-outline-primary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Payment"><i
                                                                                    class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                                        </a>
                                                                    @endif

                                                                    @if ($data1->generate_notice02 == '0' && $data1->paid_unpaid == 'unpaid')
                                                                    <button type="button"
                                                                        class="btn1 btn-outline-success editbtn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal"
                                                                        id="{{ $data1->id }}"><i
                                                                            class="fadeIn animated bx bx-news"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Generate Demand Notice 02"></i></button>
                                                                @endif
                                                                
                                                                </td>

                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                               <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                 <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                        
                                                            <th>Application Number</th>
                                                            <th>Name of Establishment</th>
                                                            <th>Nature Of Business</th>
                                                            <th>Address</th>

                                                            <th style="background-color: #fff">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($new_notice02 as $serve_all)
                                                            <tr>
                                                                <td>{{ $serve_all->survey_app_no }}</td>
                                                                <td>{{ $serve_all->establishment }}</td>
                                                                <td>{{ $serve_all->bussiness_name }}</td>
                                                                <td>{{ $serve_all->locality }}</td>

                                                                <td style="background-color: #fff">

                                                                    @if ($serve_all->generate_notice == '1' && $serve_all->paid_unpaid == 'unpaid')
                                                                    <a href="{{ route('new_notice', $serve_all->id) }}"
                                                                        target="_blank"><button type="button"
                                                                            class="btn1 btn-outline-secondary"><i
                                                                                class="fadeIn animated bx bx-news"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Demand Notice 01"></i></i></button>
                                                                    </a>
                                                                @endif
                                                                @if ($serve_all->generate_notice02 == '1')
                                                                <a href="{{ route('new_notice02', $serve_all->id) }}"
                                                                    target="_blank"><button type="button"
                                                                        class="btn1 btn-outline-secondary"><i
                                                                            class="fadeIn animated bx bx-news"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Demand Notice 02"></i></i></button>
                                                                </a>
                                                            @endif
                                                            @if ($serve_all->paid_unpaid02 == 'paid')
                                                            <a href="{{ route('print-serve1', $serve_all->id) }}"
                                                                target="_blank"><button type="button"
                                                                    class="btn1 btn-outline-secondary"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Receipt Print"><i
                                                                        class='bx bx-receipt me-0'></i></button>
                                                            </a>
                                                        @endif
                                                        @if ($serve_all->paid_unpaid02 == 'unpaid')
                                                            <a
                                                                href="{{ route('edit_payment_mode02', $serve_all->id) }}"><button
                                                                    type="button"
                                                                    class="btn1 btn-outline-primary"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Payment"><i
                                                                        class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                            </a>
                                                        @endif
                                                        @if ($serve_all->generate_notice03 == '0' && $serve_all->paid_unpaid02 == 'unpaid')
                                                        <button type="button"
                                                            class="btn1 btn-outline-success editbtn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal_new"
                                                            id="{{ $serve_all->id }}"><i
                                                                class="fadeIn animated bx bx-news"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Generate Demand Notice 02"></i></button>
                                                    @endif
                                                               </td>

                                                            </tr>
                                                        @endforeach

                                                        @foreach ($exis_notice02 as $data1)
                                                            <tr>
                                                                <td>{{ $data1->survey_app_no }}</td>
                                                                <td>{{ $data1->establishment }}</td>
                                                                <td>{{ $data1->bussiness_name }}</td>
                                                                <td> {{ $data1->locality }}</td>

                                                                <td style="background-color: #fff">
                                                                  

                                                                    @if ($data1->generate_notice == '1' && $data1->paid_unpaid == 'unpaid')
                                                                        <a href="{{ route('existing_notice', $data1->id) }}"
                                                                            target="_blank"><button type="button"
                                                                                class="btn1 btn-outline-secondary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Demand Notice 01"><i
                                                                                    class="fadeIn animated bx bx-news"></i></button>
                                                                        </a>
                                                                    @endif


                                                                    @if ($data1->generate_notice02 == '1')
                                                            <a href="{{ route('existing_notice02', $data1->id) }}"
                                                                target="_blank"><button type="button"
                                                                    class="btn1 btn-outline-secondary"><i
                                                                        class="fadeIn animated bx bx-news"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Demand Notice 02"></i></i></button>
                                                            </a>
                                                        @endif

                                                                @if ($data1->paid_unpaid02 == 'paid')
                                                                <a href="{{ route('print-serve1', $data1->id) }}"
                                                                    target="_blank"><button type="button"
                                                                        class="btn1 btn-outline-secondary"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Receipt Print"><i
                                                                            class='bx bx-receipt me-0'></i></button>
                                                                </a>
                                                            @endif
                                                                    @if ($data1->paid_unpaid02 == 'unpaid')
                                                                        <a
                                                                            href="{{ route('edit_payment_mode02', $data1->id) }}"><button
                                                                                type="button"
                                                                                class="btn1 btn-outline-primary"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Payment"><i
                                                                                    class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                                        </a>
                                                                    @endif
                                                                    @if ($data1->generate_notice03 == '0' && $data1->paid_unpaid02 == 'unpaid')
                                                                    <button type="button"
                                                                        class="btn1 btn-outline-success editbtn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal_ext"
                                                                        id="{{ $data1->id }}"><i
                                                                            class="fadeIn animated bx bx-news"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Generate Demand Notice 03"></i></button>
                                                                @endif
                                                                  

                                                                </td>

                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="primaryprofile1" role="tabpanel">  
                                <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                
                                                    <th>Application Number</th>
                                                    <th>Name of Establishment</th>
                                                    <th>Nature Of Business</th>
                                                    <th>Address</th>

                                                    <th style="background-color: #fff">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($new_notice03 as $serve_all)
                                                    <tr>
                                                        <td>{{ $serve_all->survey_app_no }}</td>
                                                        <td>{{ $serve_all->establishment }}</td>
                                                        <td>{{ $serve_all->bussiness_name }}</td>
                                                        <td>{{ $serve_all->locality }}</td>

                                                        <td style="background-color: #fff">

                                                            @if ($serve_all->generate_notice== '1' && $serve_all->paid_unpaid == 'unpaid')
                                                            <a href="{{ route('new_notice', $serve_all->id) }}"
                                                                target="_blank"><button type="button"
                                                                    class="btn1 btn-outline-secondary"><i
                                                                        class="fadeIn animated bx bx-news"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Demand Notice 01"></i></i></button>
                                                            </a>
                                                        @endif
                                                        @if ($serve_all->generate_notice02 == '1' && $serve_all->paid_unpaid02 == 'unpaid')
                                                        <a href="{{ route('new_notice02', $serve_all->id) }}"
                                                            target="_blank"><button type="button"
                                                                class="btn1 btn-outline-secondary"><i
                                                                    class="fadeIn animated bx bx-news"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Demand Notice 02"></i></i></button>
                                                        </a>
                                                    @endif
                                                    @if ($serve_all->generate_notice03 == '1')
                                                    <a href="{{ route('new_notice03', $serve_all->id) }}"
                                                        target="_blank"><button type="button"
                                                            class="btn1 btn-outline-secondary"><i
                                                                class="fadeIn animated bx bx-news"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Demand Notice 03"></i></i></button>
                                                    </a>
                                                @endif
                                                    @if ($serve_all->paid_unpaid02 == 'paid')
                                                    <a href="{{ route('print-serve1', $serve_all->id) }}"
                                                        target="_blank"><button type="button"
                                                            class="btn1 btn-outline-secondary"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Receipt Print"><i
                                                                class='bx bx-receipt me-0'></i></button>
                                                    </a>
                                                @endif
                                                @if ($serve_all->paid_unpaid02 == 'unpaid')
                                                    <a
                                                        href="{{ route('edit_payment_mode03', $serve_all->id) }}"><button
                                                            type="button"
                                                            class="btn1 btn-outline-primary"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Payment"><i
                                                                class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                    </a>
                                                @endif
                                               
                                                       </td>

                                                    </tr>
                                                @endforeach

                                                @foreach ($exis_notice03 as $data1)
                                                    <tr>
                                                        <td>{{ $data1->survey_app_no }}</td>
                                                        <td>{{ $data1->establishment }}</td>
                                                        <td>{{ $data1->bussiness_name }}</td>
                                                        <td> {{ $data1->locality }}</td>

                                                        <td style="background-color: #fff">
                                                          

                                                            @if ($data1->generate_notice == '1')
                                                                <a href="{{ route('existing_notice', $data1->id) }}"
                                                                    target="_blank"><button type="button"
                                                                        class="btn1 btn-outline-secondary"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Demand Notice 01"><i
                                                                            class="fadeIn animated bx bx-news"></i></button>
                                                                </a>
                                                            @endif


                                                            @if ($data1->generate_notice02 == '1')
                                                            <a href="{{ route('existing_notice02', $data1->id) }}"
                                                                target="_blank"><button type="button"
                                                                    class="btn1 btn-outline-secondary"><i
                                                                        class="fadeIn animated bx bx-news"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Demand Notice 02"></i></i></button>
                                                            </a>
                                                        @endif

                                                        @if ($data1->generate_notice03 == '1')
                                                        <a href="{{ route('existing_notice03', $data1->id) }}"
                                                            target="_blank"><button type="button"
                                                                class="btn1 btn-outline-secondary"><i
                                                                    class="fadeIn animated bx bx-news"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Demand Notice 02"></i></i></button>
                                                        </a>
                                                    @endif

                                                            @if ($data1->paid_unpaid03 == 'paid')
                                                                <a href="{{ route('print-serve1', $data1->id) }}"
                                                                    target="_blank"><button type="button"
                                                                        class="btn1 btn-outline-secondary"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Receipt Print"><i
                                                                            class='bx bx-receipt me-0'></i></button>
                                                                </a>
                                                            @endif
                                                            @if ($data1->paid_unpaid03 == 'unpaid')
                                                                <a
                                                                    href="{{ route('edit_payment_mode03', $data1->id) }}"><button
                                                                        type="button"
                                                                        class="btn1 btn-outline-primary"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Payment"><i
                                                                            class="fadeIn animated bx bx-wallet-alt"></i></button>
                                                                </a>
                                                            @endif
                                                            

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

                </div>






            </div>
        </div>
    </div>


    <div class="col">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Demand Notice 02</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('generate_new_notice02') }}" method="post">
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
    </div>


    <div class="col">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Demand Notice 02</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('generate_existing_notice02') }}" method="post">
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
    </div>


    <div class="col">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal_new" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Demand Notice 03</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('generate_new_notice03') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="generate_new_notice02">
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
    </div>


    <div class="col">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal_ext" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Demand Notice 03</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('generate_existing_notice03') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="generate_existing_notice02">
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
    </script>
    <script>
        $(".editbtn").on('click', function() {
            //  alert($(this).attr('id'));
            $("#generate_new_notice02").val($(this).attr('id'));
        });
    </script>

    <script>
        $(".editbtn").on('click', function() {
            // alert($(this).attr('id'));
            $("#generate_existing_notice02").val($(this).attr('id'));
        });
    </script>
@stop
