@extends('layout')
@section('content')
		<!--start page wrapper -->

		<div class="page-wrapper">
			<div class="page-content">
				

				
				<!--end row-->
				<h6 class="mb-0 text-uppercase">REPORTS</h6>
				<hr>
				
				


		           <div class="col-md-12">
						
						
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon">
												</div>
												<div class="tab-title">No of Establishment</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon">
												</div>
												<div class="tab-title">Notice issued/Pendings</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon">
												</div>
												<div class="tab-title">Payment Details/Collection</div>
											</div>
										</a>
									</li>

									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primarycontact1" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon">
												</div>
												<div class="tab-title">Certificate Distribution Report</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
							<div class="card">
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6>Number of Establishment</h6>
						</div>
						<hr>
						<form class="row g-2">

							
							<div class="col-md-3">
								<label class="form-label">Date</label>
								<input class="form-control " type="date" placeholder=""
									aria-label="default input example">
							</div>

						
							<div class="col-md-3">
								<label class="form-label">Select</label>		
								<select class="form-select mb-3" aria-label="Default select example">
									<option selected>Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="2">3</option>
							
								</select>
							</div>
						

							<div class="col-md-3" style="margin-top:35px;">
								<div class="col">
									<button type="button" class="btn btn-primary px-5"> <i class="lni lni-eye"></i>Show</button>
								</div>
							</div>
						</form>
					</div>
				</div>

					<div class="col-md-12 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Number of Establishment</th>  
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>22</td>	
										
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
						
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
									</div>
									<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
											<div class="card">
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6>Notice issued/Pendings</h6>
						</div>
						<hr>
						<form class="row g-2">

							
							<div class="col-md-3">
								<label class="form-label">Date</label>
								<input class="form-control " type="date" placeholder=""
									aria-label="default input example">
							</div>

						
							<div class="col-md-3">
								<label class="form-label">Select</label>		
								<select class="form-select mb-3" aria-label="Default select example">
									<option selected>Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="2">3</option>
							
								</select>
							</div>
						

							<div class="col-md-3" style="margin-top:35px;">
								<div class="col">
									<button type="button" class="btn btn-primary px-5"><i class="lni lni-eye"></i>Show</button>
								</div>
							</div>
						</form>
					</div>
				</div>

							



					<div class="col-md-12 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example1" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Notice</th>
										<th>Status</th>  
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>1</td>
										<td><div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Pending</div></td>	
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
									<tr>
										<td>2</td>
										<td>2</td>
										<td><div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Issued</div></td>	
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
						
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
									</div>



									<div class="tab-pane fade" id="primarycontact" role="tabpanel">
														<div class="card">
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6>Payment Details/Collection</h6>
						</div>
						<hr>
						<form class="row g-2">

							
							<div class="col-md-3">
								<label class="form-label">Date</label>
								<input class="form-control " type="date" placeholder=""
									aria-label="default input example">
							</div>

						
							<div class="col-md-3">
								<label class="form-label">Select</label>		
								<select class="form-select mb-3" aria-label="Default select example">
									<option selected>Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="2">3</option>
							
								</select>
							</div>
						

							<div class="col-md-3" style="margin-top:35px;">
								<div class="col">
									<button type="button" class="btn btn-primary px-5"> <i class="lni lni-eye"></i>Show</button>
								</div>
							</div>
						</form>
					</div>
				</div>
					<div class="col-md-12 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Payment Details/Collection</th> 
										<th>Status</th> 
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>10,00</td>	
										<td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Collected</div></td>
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
									<tr>
										<td>2</td>
										<td>25,000</td>	
										<td><div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Pending</div></td>
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
						
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
									</div>

										<div class="tab-pane fade" id="primarycontact1" role="tabpanel">
																<div class="card">
					<div class="card-body">
						<div class="card-title d-flex align-items-center">

							<h6>Certificate Distribution Report</h6>
						</div>
						<hr>
						<form class="row g-2">

							
							<div class="col-md-3">
								<label class="form-label">Date</label>
								<input class="form-control " type="date" placeholder=""
									aria-label="default input example">
							</div>

						
							<div class="col-md-3">
								<label class="form-label">Select</label>		
								<select class="form-select mb-3" aria-label="Default select example">
									<option selected>Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="2">3</option>
							
								</select>
							</div>
						

							<div class="col-md-3" style="margin-top:35px;">
								<div class="col">
									<button type="button" class="btn btn-primary px-5"><i class="lni lni-eye"></i>Show</button>
								</div>
							</div>
						</form>
					</div>
						</div>

                  <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example4" class="table table-striped table-bordered">
								<thead>
									<tr>	
										<th>Sr. No.</th>
										<th>Certificate Distribution Report</th> 
										<th>Status</th> 
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>10</td>	
										<td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>distributed</div></td>
										
										
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
									<tr>
										<td>2</td>
										<td>12</td>	
										<td><div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>pending</div></td>
										
										
										<td><button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
										</td>										
							
									</tr>
						
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
  @stop