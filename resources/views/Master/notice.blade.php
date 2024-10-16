@extends('admin_layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alert')
            <div class="container">
                <div class="row" style="margin-left:-21%;">
                    {{-- <div class="col-md-12"> --}}
                    <div class="col-md-6">

                        <div class="card" style="margin-top:-4%;">

                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">

                                    <h5 style="color:red;font-weight:bold"> Notice 2</h5>
                                </div>
                                <hr>
                                <form class="row g-2" action="{{route('update_notice2')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data1->id}}">
                                    {{-- <div class="col-md-2"></div> --}}
                                    <div class="col-md-4">
                                        <label for="inputFirstName" class="form-label">Notice 2<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="inputFirstName"
                                            placeholder="Notice 2" name="notice2" value="{{$data1->notice2}}" required>
                                    </div>

                                    <div class="col-md-3" style="margin-top:6%;margin-left:3%;">
                                        <button type="submit" class="btn btn-primary px-2"><i
                                                class="fadeIn animated bx bx-plus"></i> Update </button>
                                    </div>
                                </form>

                            </div>
                        </div>


                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Days For Notice 2</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notice2 as $notice2)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $notice2->notice2 }}</td>
                                                    <td>
                                                        <a href="{{ route('edit_notice2', $notice2->id) }}"><button
                                                                type="button" class="btn1 btn-outline-success"><i
                                                                    class='bx bx-edit-alt me-0'></i></button></a>

                                                        <a href="{{ route('delete_notice2', $notice2->id) }}"><button
                                                                type="button" class="btn1 btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Delete This?')"><i
                                                                    class='bx bx-trash me-0'></i></button></a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="col-md-6 ">

                        <div class="card" style="margin-top:-4%;">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">

                                    <h5 style="color:red;font-weight:bold">Notice 3</h5>
                                </div>
                                <hr>
                                <form class="row g-2" action="{{route('update_notice3')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$edit_notice3->id}}">
                                    <div class="row" style="margin-top: 1vh">
                                        <div class="col-md-4">
                                            <label for="inputFirstName" class="form-label">Notice 3<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="inputFirstName"
                                                placeholder="Notice 3" name="notice3" value="{{$edit_notice3->notice3}}" required>
                                        </div>

                                        <div class="col-md-3" style="margin-top:5%;">
                                            <button type="submit" class="btn btn-primary px-2"><i
                                                    class="fadeIn animated bx bx-plus"></i> Update </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Days For Notice 3</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notice3 as $notice3)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $notice3->notice3}}</td>
                                                    <td>
                                                        <a href="{{ route('edit_notice3', $notice3->id) }}"><button
                                                                type="button" class="btn1 btn-outline-success"><i
                                                                    class='bx bx-edit-alt me-0'></i></button></a>

                                                        <a href="{{ route('delete_notice3', $notice3->id) }}"><button
                                                                type="button" class="btn1 btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Delete This?')"><i
                                                                    class='bx bx-trash me-0'></i></button></a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>


            </div>


        </div>
    </div>
    </div>




    <!--end page wrapper -->
    <script>
        var msg = '{{ Session::get('alert ') }}';
        var exist = '{{ Session::has('alert ') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@stop
