@extends('layout')
@section('content')

<div class="page-wrapper">
    <div class="page-content">

        <div class="row" >
            <div class="col">
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Valuation For</th>
                                                        <th>Location</th>
                                                        <th>Client</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th style="background-color: #fff">View</th>
                                                    </tr>
                                               <tbody>
                                                @foreach ($date_wise_report as $date_wise_report)
                                                                <tr>
                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                    <td>{{ $date_wise_report->name }}</td>
                                                                    <td>{{ $date_wise_report->locations }}</td>
                                                                    <td>{{ $date_wise_report->bankname }}</td>
                                                                    <td></td>
                                                                    <td>{{ $date_wise_report->status }}</td>
                                                                    <td>
                                                                       
                                                                        <a href="{{ route('date_wise_report',$date_wise_report->id) }}"><button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#exampleLargeModal2"
                                                                            class="btn1 btn-outline-success view1" ><i
                                                                                class="lni lni-eye" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit"></i></button></a>
                                                                               
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


@stop