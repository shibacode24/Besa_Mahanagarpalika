@extends('admin_layout')
@section('content')
    <!--start page wrapper -->

    <div class="page-wrapper">
        <div class="page-content">


            {{-- <div class="row">
							<div class="col-md-8 mx-auto">
			
								<div class="card">
									<div class="card-body">
										<div class="card-title d-flex align-items-center">
			
											<h6>Select Zone Wise</h6>
										</div>
										<hr>
										<form class="row g-2" method="get" action="{{route('count_dashboard')}}">
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
						</div> --}}
            <div class="col-md-12" style="margin-left:-21%; margin-top:-15%;">

                {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

					<div class="col-md-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark"><a href="{{route('dashboard1')}}">No. Of Establishment</a></p>
										
										<?php
          $count1 = DB::table('existing_serves')->count();
          
          $count = DB::table('serves')->count();
          
          echo '<h3>' . ($count + $count1) . '</h3>';
          ?>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-layer"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card ">
							<div class="card-body">
								<div class="d-flex align-items-center">
									
									<div>
										<p class="mb-0 text-secondary"><a href="#">
											No. Of Receipt</a></p>
										<?php
          $count = DB::table('serves')->count();
          echo '<h3>' . $count . '</h3>';
										?>
										
									
										<p class="mb-0 font-13 text-secondary">
									</div>
									<div class="widgets-icons bg-light-secondary text-secondary ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>
								</a>
								</div>
							</div>
						</div>
					</div>
					

					<div class="col-md-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark"><a href="#">No. Of License Issued</a></p>
										<?php
          $count1 = DB::table('existing_serves')
              ->where('status', '1')
              ->count();
          
          $count = DB::table('serves')
              ->where('status', '1')
              ->count();
          
          echo '<h3>' . ($count + $count1) . '</h3>';
          ?>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-notepad"></i>
									</div>
								</div>
							</div>
						</div>
					</div> --}}




                {{-- <div class="col-md-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark"><a href="{{ route('showserve') }}">No.of Show Application</a></p>
										<h4 class="my-1">100</h4>
										<?php
          $count1 = DB::table('existing_serves')->count();
          
          $count = DB::table('serves')->count();
          
          echo '<h3>' . ($count + $count1) . '</h3>';
          ?>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-layer"></i>
									</div>
								</div>
							</div>
						</div>
					</div> --}}

                {{-- <div class="col-md-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="#">No. Of Notice Issued</a></p>
										
										<?php
          $count1 = DB::table('existing_serves')
              ->where('generate_notice', '1')
              ->count();
          
          $count = DB::table('serves')
              ->where('generate_notice', '1')
              ->count();
          
          echo '<h3>' . ($count + $count1) . '</h3>';
          ?>
										
									</div>
									<div class="widgets-icons bg-light-info text-info ms-auto">	<i class="fadeIn animated bx bx-notepad"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-md-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="#">No. Of Non Paid</a></p>
										<?php
          
          $count1 = DB::table('existing_serves')
              ->where('paid_unpaid', 'unpaid')
              ->count();
          
          $count = DB::table('serves')
              ->where('paid_unpaid', 'unpaid')
              ->count();
          
          echo '<h3>' . ($count + $count1) . '</h3>';
          ?>
										<p class="mb-0 font-13 text-success">
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>
								</div>
							</div>
						</div>
					</div> --}}


            </div>

        </div>

        {{-- <table style="width:115%; margin-left:-20%; margin-top:-8%;">
            <tr>
                <td style="width:19%; padding-right:15px; ">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('dashboard1') }}">
                                    <div>
                                        <p class="mb-0 text-dark">No. of Application</p>

                                        <?php
                                        $count1 = DB::table('existing_serves')
                                           
                                            ->count();
                                        
                                        $count = DB::table('serves')
                                            
                                            ->count();
                                        
                                        echo '<h3>' . ($count + $count1) . '</h3>';
                                        ?>
                                    </div>
                                </a>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><i
                                        class="fadeIn animated bx bx-layer"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>


                <td style="width:18%; padding-right:15px; ">
                    <div class="card radius-10">
                        <div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                    <div>
                                        <p class="mb-0 text-secondary"><a href="#">
                                                No. of Receipt</a></p>
                                        <?php
                                        $count = DB::table('serves')
                                            ->where('paid_unpaid', 'paid')
                                            ->count();
                                        
                                        $count1 = DB::table('existing_serves')
                                            ->where('paid_unpaid', 'paid')
                                            ->count();
                                        echo '<h3>' . ($count + $count1) . '</h3>';
                                        ?>
                                        <p class="mb-0 font-13 text-secondary">
                                    </div>
                                    <div class="widgets-icons bg-light-secondary text-secondary ms-auto"><i
                                            class="fadeIn animated bx bx-buildings"></i>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td style="width:19%; padding-right:15px; ">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-dark"><a href="#">No. of License Issued</a></p>
                                    <?php
                                    $count1 = DB::table('existing_serves')
                                        ->where('status', '1')
                                        ->count();
                                    
                                    $count = DB::table('serves')
                                        ->where('status', '1')
                                        ->count();
                                    
                                    echo '<h3>' . ($count + $count1) . '</h3>';
                                    ?>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><i
                                        class="fadeIn animated bx bx-notepad"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width:19%;padding-right:15px; ">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary"><a href="#">No. of Notice Issued</a></p>

                                    <?php
                                    $count1 = DB::table('existing_serves')
                                        ->where('generate_notice', '1')
                                        ->count();
                                    
                                    $count = DB::table('serves')
                                        ->where('generate_notice', '1')
                                        ->count();
                                    
                                    echo '<h3>' . ($count + $count1) . '</h3>';
                                    ?>

                                </div>
                                <div class="widgets-icons bg-light-info text-info ms-auto"> <i
                                        class="fadeIn animated bx bx-notepad"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width:19%; ">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary"><a href="#">No. of Non Paid</a></p>
                                    <?php
                                    
                                    $count1 = DB::table('existing_serves')
                                        ->where('paid_unpaid', 'unpaid')
                                        ->count();
                                    
                                    $count = DB::table('serves')
                                        ->where('paid_unpaid', 'unpaid')
                                        ->count();
                                    
                                    echo '<h3>' . ($count + $count1) . '</h3>';
                                    ?>
                                    <p class="mb-0 font-13 text-success">
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><i
                                        class="fadeIn animated bx bx-buildings"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        </table> --}}
    </div>
    {{-- <div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="#no_of_est">No.of Survey</a></p>
										<h4 class="my-1">900</h4>
										<p class="mb-0 font-13 text-secondary">
									</div>
									<div class="widgets-icons bg-light-secondary text-secondary ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="#no_of_est">No.of Establishment Reg.</a></p>
										<h4 class="my-1">899</h4>
										<p class="mb-0 font-13 text-success">
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="#notice ">No.Notice Issued</a></p>
										<h4 class="my-1">90</h4>
										
									</div>
									<div class="widgets-icons bg-light-info text-info ms-auto">	<i class="fadeIn animated bx bx-notepad"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">No.of License Issued</p>
										<h4 class="my-1">100</h4>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-layer"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
						<div class="col">
							<div class="card radius-10">
								<div class="card-body">
									<div class="align-items-center">
										<div >
											<p class="mb-0 text-dark" style="font-weight:bold; font-size:16px;" align="center">No.of Payment Received</p>
												<label style="padding-left: 10%; font-size: 15px;">No.of Establishment <br><span style="color:red;">1000</span></label>
	
												<label style="padding-left: 30%; font-size: 15px;">Total Amount <br><span style="color: red;">50,000</span></label>
									
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div> --}}
    </div>
    
	<div class="card" style="margin-top:-20vh; ">
		<div class="card-body">
			<table class="table table-bordered mb-0">
				<thead style="background-color: #666; color:#fff;">
					<tr>
						<th scope="col">Reporting Heads</th>
					    <th scope="col">Zone A</th>
						<th scope="col">Zone B</th>
						<th scope="col">Zone C</th>
						<th scope="col">Zone D</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">Demand</th>
						<td><b>{{ $zone1_demand }}</b></td>
						<td><b>{{ $zone2_demand }}</b></td>
						<td><b>{{ $zone3_demand }}</b></td>
						<td><b>{{ $zone4_demand }}</b></td>
					
						@php
						$total_demand	=  $zone1_demand  +  $zone2_demand  +  $zone3_demand 
                                          + $zone4_demand 
						@endphp
						<td><b>{{$total_demand}}</b></td>
					</tr>
					<tr>
						<th scope="row">Total Establishments</th>
						<td><b>{{ $zone1_application }}</b><b></td>
						<td><b>{{ $zone2_application }}</b></td>
						<td><b>{{ $zone3_application }}</b></td>
						<td><b>{{ $zone4_application }}</b></td>
						
						@php
						$zone1_total	=  $zone1_application + $zone2_application + $zone3_application
							  + $zone4_application 
						@endphp
						<td><b>{{$zone1_total}}</b></td>
					</tr>
					<!--<tr>
						<th scope="row">Notice Issued</th>
						<td><b>{{ $zone1_generate_notice }}</b></td>
						<td><b>{{ $zone2_generate_notice }}</b></td>
						<td><b>{{ $zone3_generate_notice }}</b></td>
						<td><b>{{ $zone4_generate_notice }}</b></td>
						<td><b>{{ $zone5_generate_notice }}</b></td>
						<td><b>{{ $zone6_generate_notice }}</b></td>
						@php
						$zone2_total	=  $zone1_generate_notice + $zone2_generate_notice + $zone3_generate_notice
                                          + $zone4_generate_notice + $zone5_generate_notice + $zone6_generate_notice
						@endphp
						<td><b>{{$zone2_total}}</b></td>
					</tr>-->
					<tr>
						<th scope="row">Notice Issued</th>
						<td><b>{{ 0 }}</b></td>
						<td><b>{{ 0 }}</b></td>
						<td><b>{{ 0 }}</b></td>
						<td><b>{{ 0 }}</b></td>
					
						@php
						$zone2_total	= 0 + 0 + 0
                                          + 0 
						@endphp
						<td><b>{{$zone2_total}}</b></td>
					</tr>
					<tr>
						<th scope="row">Generated Receipts</th>
						<td><b>{{ $zone1_receipt }}</b></td>
						<td><b>{{ $zone2_receipt }}</b></td>
						<td><b>{{ $zone3_receipt }}</b></td>
						<td><b>{{ $zone4_receipt }}</b></td>
					
						@php
						$zone3_total	=  $zone1_receipt  +  $zone2_receipt  +  $zone3_receipt 
                                          + $zone4_receipt 
						@endphp
						<td><b>{{$zone3_total}}</b></td>
					</tr>
					<tr>
						<th scope="row">Generated Licenses</th>
						<td><b>{{ $zone1_license }}</b></td>
						<td><b>{{ $zone2_license }}</b></td>
						<td><b>{{ $zone3_license }}</b></td>
						<td><b>{{ $zone4_license }}</b></td>
					
						@php
						$zone4_total	=  $zone1_license  +  $zone2_license  +  $zone3_license 
                                          + $zone4_license 
						@endphp
						<td><b>{{$zone4_total}}</b></td>
					</tr>
				
						
					{{-- <tr>
						<th scope="row">Today's Application</th>
						<td><b>{{ $zone1_today }}</b></td>
						<td><b>{{ $zone2_today }}</b></td>
						<td><b>{{ $zone3_today }}</b></td>
						<td><b>{{ $zone4_today }}</b></td>
					
						@php
						$zone5_total	=  $zone1_today  +  $zone2_today  +  $zone3_today 
                                          + $zone4_today  
						@endphp
						<td><b>{{$zone5_total}}</b></td>
					</tr>
					 --}}
					<tr>
						<th scope="row">Today's Receipt</th>
						<td><b>{{ $zone1_todays_receipt }}</b></td>
						<td><b>{{ $zone2_todays_receipt }}</b></td>
						<td><b>{{ $zone3_todays_receipt }}</b></td>
						<td><b>{{ $zone4_todays_receipt }}</b></td>
					
						@php
						$todays_receipt	=  $zone1_todays_receipt  +  $zone2_todays_receipt  +  $zone3_todays_receipt 
                                          + $zone4_todays_receipt 
						@endphp
						<td><b>{{$todays_receipt}}</b></td>
					</tr>
						
					<tr>
						<th scope="row">Today's Trade Fee </th>
						<td><b>{{ $zone1_payment_receipt }}</b></td>
						<td><b>{{ $zone2_payment_receipt }}</b></td>
						<td><b>{{ $zone3_payment_receipt }}</b></td>
						<td><b>{{ $zone4_payment_receipt }}</b></td>
					
						@php
						$total_payment	=  $zone1_payment_receipt  +  $zone2_payment_receipt  +  $zone3_payment_receipt 
                                          + $zone4_payment_receipt 
						@endphp
						<td><b>{{$total_payment}}</b></td>
					</tr>
					
					<tr>
						<th scope="row">Total Trade Fee(Received)</th>
						<td><b>{{ $zone1_payment }}</b></td>
						<td><b>{{ $zone2_payment }}</b></td>
						<td><b>{{ $zone3_payment }}</b></td>
						<td><b>{{ $zone4_payment }}</b></td>
					
						@php
						$zone6_total	=  $zone1_payment  +  $zone2_payment  +  $zone3_payment 
                                          + $zone4_payment 
						@endphp
						<td><b>{{$zone6_total}}</b></td>
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
