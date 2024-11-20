@extends('admin_layout')
@section('content')



    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">

                <div class="col-md-10 mx-auto">

                    <div class="card">

                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6>Payment / Receipt</h6>
                            </div>
                            <hr>

                            <form class="row g-2" method="post" action="{{ route('update_new_payment') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit_data->id }}">
                                <input type="hidden" name="new_amount" id="checkyear">

                                {{-- @json($edit_data->type_of_bussiness_id); --}}
                                <label id="amount-label" class="form-label">Amount: <b>
                                        @if ($edit_data->type_of_bussiness_id == 'Hotel')


                                            @php
                                                $ac = 0;
                                                $non_ac = 0;
                                            @endphp
                                            @if (number_format($edit_data->non_ac_room) <= 10 && number_format($edit_data->non_ac_room) > 0)
                                                @php
                                                    $non_ac = 1000;
                                                @endphp
                                            @endif
                                            @if (number_format($edit_data->non_ac_room) > 10)
                                                @php
                                                    $non_ac = 2500;
                                                @endphp
                                            @endif

                                            @if (number_format($edit_data->ac_room) <= 10 && number_format($edit_data->ac_room) > 0)
                                                @php
                                                    $ac = 2500;
                                                @endphp
                                            @endif
                                            @if (number_format($edit_data->ac_room) > 10)
                                                @php
                                                    $ac = 5000;
                                                @endphp
                                            @endif
                                            {{-- {{ $edit_data->non_ac_room * $edit_data->Non_AC + $edit_data->ac_room * $edit_data->AC }} --}}
                                            {{ $non_ac + $ac }}
                                        @else
                                            {{ $edit_data->charges +  $edit_data->reg_fee }}

                                        @endif
                                    </b></label>

                                    <div class="col-md-2">
                                        <label for="inputFirstName" class="form-label">Book No<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Book No" name="book_no" value="{{$edit_data->book_no}}"
                                            required>
                                    </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Receipt No<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Receipt No" name="receipt_no" value="{{$edit_data->receipt_no}}"
                                        required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Payment Mode<span style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                        name="payment_mode" required>
                                        <option value="Cash" @if ($edit_data->payment_mode == 'Cash')selected 
                                        @endif>Cash</option>
                                        <option value="UPI" @if ($edit_data->payment_mode == 'UPI')selected 
                                            @endif>UPI</option>
                                        <option value="Bank Transfer" @if ($edit_data->payment_mode == 'Bank Transfer')selected 
                                            @endif>Bank Transfer</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Year<span style="color:red">*</span></label>
                                    <select class="form-select mb-3 location" aria-label="Default select example"
                                        name="year" id="year" required>
                                        <option value="1" @if ($edit_data->year == '1')selected 
                                            @endif>1 Year</option>
                                        <option value="2" @if ($edit_data->year == '2')selected 
                                            @endif>2 Year</option>
                                        <option value="3" @if ($edit_data->year == '3')selected 
                                            @endif>3 Year</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Date<span
                                            style="color:red">*</span></label>
                                    <input type="date" class="form-control datePicker" placeholder="Date" name="date" value="{{$edit_data->date}}"
                                        required>
                                </div>
                                <div class="col-md-2" style="margin-top:37px;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5"><i
                                                class="lni lni-circle-plus"></i>Add</button>
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //new running
        $(document).ready(function() {
            // Get a reference to the dropdown menu and amount label
            var yearDropdown = $("#year");
            var amountLabel = $("#amount-label");
            // Store the original amount
            var originalAmount = Math.floor(parseFloat(amountLabel.find("b").text()));
            document.getElementById("checkyear").value = originalAmount;

            // Listen for changes to the dropdown menu
            yearDropdown.change(function() {
                // Get the selected value and parse it as an integer
                var selectedYear = parseInt(yearDropdown.val());
                // Calculate the new amount by multiplying the original amount by the selected year
                var newAmount = Math.floor(originalAmount * selectedYear);
                // Update the label's content with the new amount
                amountLabel.find("b").text(Math.round(newAmount));
                // Set the value of the hidden input field to the new calculated amount
                $("input[name='new_amount']").val(Math.round(newAmount));
                // $("input[name='new_amount']") = val(amountLabel);
            });
        });
    </script>

@stop
