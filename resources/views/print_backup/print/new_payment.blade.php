@extends('layout')
@section('content')



    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
               
                <div class="col-md-6 mx-auto">

                    <div class="card">
                
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
    
                                <h6>Payment / Receipt</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('update_payment_mode1') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$edit_data->id}}" >
    
                             
                                <label class="form-label">Amount :<b>{{$edit_data->charges +  $edit_data->reg_fee}}.{{ $edit_data->non_ac_room * $edit_data->Non_AC + $edit_data->ac_room * $edit_data->AC }}</b> </label>


                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Receipt No<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" 
                                        placeholder="Receipt No" name="receipt_no" required>
                                </div>


                                <div class="col-md-3" >
                                    <label class="form-label">Payment Mode<span style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                    name="payment_mode" required>
                                        <option value="Cash">Cash</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                    
                                </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label ">Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control datePicker" 
                                        placeholder="Date" name="date" required>
                                </div>

                                <div class="col-md-2" style="margin-top:37px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5"> <i
                                                class="lni lni-circle-plus"></i>Add</button>
                                    </div>
                                </div>
                            </div>
                            
                            </form>
    
                        </div>
    
                    </div>
                </div>

            </div>


            
        </div>
    </div>
@stop