@extends('admin_layout')
@section('content')
    <!--start page wrapper -->

    <div class="page-wrapper">
        <div class="page-content">

        </div>
	</div>

    <div class="card" style="margin-top:-20vh; ">
        <div class="card-body">
            <table class="table table-bordered mb-0">
                <thead style="background-color: #666; color:#fff;">
                    <tr>
                        <th scope="col">Reporting Heads</th>
                        @foreach ($zones as $zone)
                            <th scope="col">{{ $zone->zone }}</th> <!-- Display ward based on zone number -->
                        @endforeach
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Demand</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $demandData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_demand = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_demand += $demandData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_demand }}</b></td>
                    </tr>
                    <tr>
                        <th scope="row">Total Establishments</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $applicationData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_application = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_application += $applicationData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_application }}</b></td>
                    </tr>

                    <tr>
                        <th scope="row">Notice Issued</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $noticeData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_notice = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_notice += $noticeData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_notice }}</b></td>
                    </tr>
                    <tr>
                        <th scope="row">Generated Receipts</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $receiptData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_receipt = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_receipt += $receiptData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_receipt }}</b></td>
                    </tr>
                    <tr>
                        <th scope="row">Generated Licenses</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $licenseData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_license = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_license += $licenseData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_license }}</b></td>
                    </tr>


                    <tr>
                        <th scope="row">Today's Receipt</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $todays_receiptData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_todays_receipt = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_todays_receipt += $todays_receiptData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_todays_receipt }}</b></td>
                    </tr>

                    <tr>
                        <th scope="row">Today's Trade Fee </th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $todays_trade_feeData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_todays_trade_fee = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_todays_trade_fee += $todays_trade_feeData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_todays_trade_fee }}</b></td>
                    </tr>

                    <tr>
                        <th scope="row">Total Trade Fee(Received)</th>
                        @foreach ($zones as $zone)
                            <td><b>{{ $total_trade_feeData[$zone->zone] }}</b></td>
                        @endforeach

                        @php
                            $total_total_trade_fee = 0;
                        @endphp

                        @foreach ($zones as $zone)
                            @php
                                $total_total_trade_fee += $total_trade_feeData[$zone->zone] ?? 0;
                            @endphp
                        @endforeach
                        <td><b>{{ $total_total_trade_fee }}</b></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <p style="float: right; font-size:16px; color:#ff0000; margin-right:20px; margin-top:-10px;">
        <strong>{{ date('d-m-Y H:i:s ') }}</strong>

    </p>
    </div>
@stop
