@extends('admin_layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row" style="margin-left:-25%;">
                <div class="col-md-12 mx-auto">

                    <div class="card" style="margin-top:-4%;">
                        @include('alert')
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6 style="color:red;font-weight:bold">Operator Master</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" enctype="multipart/form-data"
                                action="{{ route('operatorupdate') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit_data->id }}">

                                <div class="col-md-2">
                                    <label class="form-label">Name</label>
                                    <input class="form-control " type="text" placeholder="Enter Name"
                                        aria-label="default input example" name="name" value="{{ $edit_data->name }}"
                                        required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Mobile</label>
                                    <input class="form-control mb-3" type="text" placeholder="Enter Mobile"
                                        aria-label="default input example" name="mobile" value="{{ $edit_data->mobile }}"
                                        required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">ward</label>
                                    <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" name="zone_id[]">
                                        <option @if (in_array('All', (array) old('zone_id', $edit_data->zone_id ?? []))) selected @endif>All</option>
                                        @foreach ($zone as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if (in_array($zone->id, (array) old('zone_id', $edit_data->zone_id ?? []))) selected @endif> {{ $zone->zone }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">UserName</label>
                                    <input class="form-control mb-3" type="text" placeholder="UserName"
                                        aria-label="default input example" name="username"
                                        value="{{ $edit_data->username }}">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Password</label>
                                    <input class="form-control mb-3" type="text" placeholder="Password"
                                        aria-label="default input example" name="password">
                                </div>

                                <div class="col-md-2" style="margin-top:35px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-2"> <i
                                                class="lni lni-circle-plus"></i>Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="overlay toggle-icon"></div>
            <div class="col-md-12 mx-auto">
                <div class="card" style="margin-left:-24%;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Email ID</th>

                                        <th>Ward</th>

                                        <th>UserName</th>
                                        <th style="background-color: #fff">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operator as $operator)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td> {{ $operator->name }}</td>
                                            <td> {{ $operator->mobile }}</td>
                                            @if ($operator->zone_names == [])
                                                <td>All</td>
                                            @else
                                                <td>{{ implode(', ', $operator->zone_names) }}</td>
                                            @endif

                                            <td>{{ $operator->username }}</td>
                                            <td style="background-color: #fff">
                                                <a href="{{ route('operatoredit', $operator->id) }}"><button type="button"
                                                        class="btn1 btn-outline-success"><i
                                                            class='bx bx-edit-alt me-0'></i></button></a>
                                                <a href="{{ route('operatordelete', $operator->id) }}"> <button
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
        </div>
    </div>
@stop
