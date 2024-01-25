@extends('layouts.app')
@section('content')
	<?php 
		$holidaychoice = array("0" => "Gazetted Holiday", "1"=> "Restricted Holiday");
		$holidaySel = 0;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create Holiday</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Holiday</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						
							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  New Holiday
								</h3>
								<div class="card-tools">
								  <ul class="nav nav-pills ml-auto">
									<li class="nav-item"></li>
									<li class="nav-item"></li>
								  </ul>
								</div>
							</div><!-- /.card-header -->
						  
							<div class="card-body">
								<div class="tab-content p-0">
									<!-- Morris chart - Sales -->
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">All Inputs Mandatory</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
										
										
										
											<form method="POST" action="{{ route('holidays.store') }}">
												@csrf

												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Holiday Name</label>
												  <input type="text" class="form-control form-control-border" 
												  name="holiday_name" id="holiday_name" placeholder="Holiday Name">
												</div>
												@if($errors->has('holiday_name'))
													<p class="help-block text-danger">
														{{ $errors->first('holiday_name') }}
													</p>
												@endif
												
												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Holiday Date</label>
												  <input type="date" class="form-control form-control-border" 
												  name="holiday_date" id="holiday_date" placeholder="Holiday Name">
												</div>
												@if($errors->has('holiday_date'))
													<p class="help-block text-danger">
														{{ $errors->first('holiday_date') }}
													</p>
												@endif
													
												<div class="form-group">
												  <label for="exampleSelectBorder">Holiday Type*</label>
												  <select class="custom-select form-control-border" 
												  name="holiday_type" id="holiday_type">
														<option value="0" >Select</option>
														<option value="public">Public</option>
														<option value="declared">Declared</option>
												  </select>
												</div>
												@if($errors->has('holiday_type'))
													<p class="help-block text-danger">
														{{ $errors->first('holiday_type') }}
													</p>
												@endif
												
												<div class="card-footer">
													<button type="submit" class="btn btn-primary">Submit</button>
												</div>
												
											</form>
										</div>





									  <!-- /.card-body -->
									</div>
								</div>
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
					<!-- /.Left col -->
					<!-- right col -->
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
	</div>
@endsection('content')