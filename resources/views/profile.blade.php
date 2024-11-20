@extends('admin_layout')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
					{{-- @include('alerts') --}}

                    
                    {{-- <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('images/photos/' . $data->photo) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
					<input type="file" class="form-control" id="inputFirstName" placeholder="" name="photo" > --}}

                            <h4>Profile</h4>
                            {{-- <p class="text-secondary mb-1">Admin</p>
                            <p class="text-muted font-size-sm">Webmedia Amravati</p> --}}
                            {{-- <button class="btn btn-primary">Follow</button>
                            <button class="btn btn-outline-primary">Message</button> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                   
                    <hr class="my-4" />
                   
                    <form class="row g-3" method="POST" action="{{route('edit_profile')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">UserName</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="user_name" value="{{$data->username}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="password" {{$data->password}}>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="mobile" required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="address" required/>
                        </div>
                    </div> --}}
                    <div class="row" align="center">
                        <div class="col-md-12"><br>
                            <button type="submit" class="btn btn-primary px-5">Save Change</button>
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
    
        
    
    </div>
</div>
<!--end page wrapper -->
<script>
    var msg = '{{Session::get('alert ')}}';
    var exist = '{{Session::has('alert ')}}';
    if (exist) {
        alert(msg);
    }
</script>
@stop