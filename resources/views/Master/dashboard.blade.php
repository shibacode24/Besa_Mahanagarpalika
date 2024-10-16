@extends('layout')
@section('content')
		<!--start page wrapper -->

		<div class="page-wrapper">
			<div class="page-content">
				
				<!--end row-->
			
				<div class="col-md-12" style="margin-left:-21%; margin-top:-5%;">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					{{-- <div class="col-md-3">
						<div class="card ">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('newserve') }}">
									<div>
										<p class="mb-0 ">
											No.of New Application</p>
										
										<?php
                                    $count = DB::table('serves')
                                      
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
                                        ->count();
                                    echo '<h3>' . $count . '</h3>';
                                    ?>
										<p class="mb-0 font-13 text-secondary">
									</div>

								</a>
									<div class="widgets-icons bg-light-secondary text-secondary ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>
								
								</div>
							</div>
						</div>
					</div> --}}
					
					<div class="col-md-3">
						{{-- <div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('existingserve') }}">
									<div>
										<p class="mb-0 ">No.of Existing Application</p>
										
										<?php
                                    $count1 = DB::table('existing_serves')
                                      
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
                                        ->count();
                                    echo '<h3>' . $count1 . '</h3>';
                                    ?>
										<p class="mb-0 font-13 text-success">
									</div>
								</a>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>

								
								</div>
							</div>
						</div> --}}
					</div>

{{-- 
					<div class="col-md-3">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('showserve') }}">
									<div>
										<p class="mb-0 text-dark">No.of Show Application</p>
										
										<?php
										$count1 = DB::table('existing_serves')
											->where('zone_no', Auth::guard('operator')->user()->zone_id)
											->count();

											$count = DB::table('serves')
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
                                        ->count();

										echo '<h3>' . ($count + $count1) . '</h3>';
										?>
									</div>
								</a>
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
									<a href="{{ route('showserve') }}">
									<div>
										<p class="mb-0 ">No.Notice Issued</p>
									
										<?php
										$count1 = DB::table('existing_serves')
											->where('zone_no', Auth::guard('operator')->user()->zone_id)
											->where('generate_notice','1')
											->count();

											$count = DB::table('serves')
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
										->where('generate_notice','1')
                                        ->count();

										echo '<h3>' . ($count + $count1) . '</h3>';
										?>
										
									</div>
								</a>
									<div class="widgets-icons bg-light-info text-info ms-auto">	<i class="fadeIn animated bx bx-notepad"></i>
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
										<p class="mb-0 text-dark"><a href="{{ route('showserve') }}">No.of License Issued</a></p>
										<?php
										$count1 = DB::table('existing_serves')
											->where('zone_no', Auth::guard('operator')->user()->zone_id)
											->where('status','1')
											->count();

											$count = DB::table('serves')
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
										->where('status','1')
                                        ->count();

										echo '<h3>' . ($count + $count1) . '</h3>';
										?>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-notepad"></i>
									</div>
								</div>
							</div>
						</div>
					</div>  --}}

					

					</div>
				</div>

				<table style="width:115%; margin-left:-14%;">
					<tr>
						{{-- <td style="width:19%; padding-right:15px; "> 	
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('newserve') }}">
									<div>
										<p class="mb-0 ">
											No.of New Application</p>
										
										<?php
                                    $count = DB::table('serves')
                                      
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
                                        ->count();
                                    echo '<h3>' . $count . '</h3>';
                                    ?>
										<p class="mb-0 font-13 text-secondary">
									</div>

								</a>
									<div class="widgets-icons bg-light-secondary text-secondary ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>
								
								</div>
							</div>
						</div>
					
					</td> --}}
					

						{{-- <td style="width:20%; padding-right:15px; "> 	
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('existingserve') }}">
									<div>
										<p class="mb-0 ">No.of Existing Application</p>
									
										<?php
                                    $count1 = DB::table('existing_serves')
                                        
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
                                        ->count();
                                    echo '<h3>' . $count1 . '</h3>';
                                    ?>
										<p class="mb-0 font-13 text-success">
									</div>
								</a>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-buildings"></i>
									</div>

								
								</div>
							</div>
						</div>
					</td> --}}

						<td style="width:18%; padding-right:15px; "> 
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('showserve') }}">
									<div>
										<p class="mb-0 text-dark">All Applications</p>
										{{-- <h4 class="my-1">100</h4> --}}
										<?php
										$count1 = DB::table('existing_serves')
											->where('zone_no', Auth::guard('operator')->user()->zone_id)
											->count();

											$count = DB::table('serves')
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
                                        ->count();

										echo '<h3>' . ($count + $count1) . '</h3>';
										?>
									</div>
								</a>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-layer"></i>
									</div>
								</div>
							</div>
						</div></td>
						<td style="width:19%;padding-right:15px; ">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('demand_notice') }}">
									<div>
										<p class="mb-0 ">Issued Demand Notices</p>
										{{-- <h4 class="my-1">0</h4> --}}
										<?php
										$count1 = DB::table('existing_serves')
											->where('zone_no', Auth::guard('operator')->user()->zone_id)
											->where('generate_notice','1')
											->count();

											$count = DB::table('serves')
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
										->where('generate_notice','1')
                                        ->count();

										echo '<h3>' . ($count + $count1) . '</h3>';
										?>
										
									</div>
								</a>
									<div class="widgets-icons bg-light-info text-info ms-auto">	<i class="fadeIn animated bx bx-notepad"></i>
									</div>
								</div>
							</div>
						</div></td>
						<td style="width:19%; padding-right:15px; ">
							<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<a href="{{ route('generate_certificate') }}">
									<div>
										<p class="mb-0 text-dark">Issued Certificates</p>
										<?php
										$count1 = DB::table('existing_serves')
											->where('zone_no', Auth::guard('operator')->user()->zone_id)
											->where('status','1')
											->count();

											$count = DB::table('serves')
										->where('zone_no', Auth::guard('operator')->user()->zone_id)
										->where('status','1')
                                        ->count();

										echo '<h3>' . ($count + $count1) . '</h3>';
										?>
									</div>
								</a>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-notepad"></i>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td style="width:19%; ">
						<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<a href="#">
								<div>
									<p class="mb-0 text-dark">Today's Count</p>
									<?php
									 $count = DB::table('serves')->select(DB::raw('*'))
									 ->where('zone_no', Auth::guard('operator')->user()->zone_id)
										->whereRaw('Date(created_at) = CURDATE()')
		
										->count();

									$count1 = DB::table('existing_serves')->select(DB::raw('*'))
												->whereRaw('Date(created_at) = CURDATE()')
												->where('zone_no', Auth::guard('operator')->user()->zone_id)
												->count();

									echo '<h3>' . ($count + $count1) . '</h3>';
									?>
								</div>
							</a>
								<div class="widgets-icons bg-light-success text-success ms-auto"><i class="fadeIn animated bx bx-notepad"></i>
								</div>
							</div>
						</div>
					</div>
				</td>
				</tr>

				</table>
					{{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
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
			</div>
				
	
		</div>
		@stop
  




