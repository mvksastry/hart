@extends('layouts.app')
@section('content')
	<?php 
		$condChoice = array("1" => "Open", "2" => "Invitees Only", "3"=>"Group Only", "4"=>"Meeting");
		$condChoiceSel = 1;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create Event Type</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Create Event Type</li>
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
								  New Event Type
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
											<form method="POST" action="{{ route('eventypes.store') }}">
												@csrf

												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Conditions*</label>
													<select class="custom-select form-control rounded-1" 
														name="conditions" id="conditions">
														@foreach($condChoice as $key => $choice)
															<option value="{{ $choice }}">{{ $choice }}</option>
														@endforeach
													</select>
												</div>
												@if($errors->has('conditions'))
													<p class="help-block text-danger">
														{{ $errors->first('conditions') }}
													</p>
												@endif


												<div class="form-group">
													<label for="exampleInputBorderWidth2">Name*</label>
													<input type="text" class="form-control form-control-border" 
														name="eventname" id="eventname" placeholder="Event Name">
												</div>
												@if($errors->has('eventname'))
													<p class="help-block text-danger">
														{{ $errors->first('eventname') }}
													</p>
												@endif
												
												<div class="form-group">
													<label for="exampleInputBorderWidth2">Date*</label>
													<input type="date" class="form-control form-control-border" 
														name="eventdate" id="eventdate" placeholder="Event Name">
												</div>
												@if($errors->has('eventdate'))
													<p class="help-block text-danger">
														{{ $errors->first('eventdate') }}
													</p>
												@endif
																								
												<div class="form-group">
													<div class="col-sm-12">
														<label for="StepNumber" class="col-form-label">Description*</label>
														<input type="text" class="form-control rounded-1" 
														name="description" id="description" placeholder="Description">
													</div>
												</div>
												@if($errors->has('description'))
													<p class="help-block text-danger">
														{{ $errors->first('description') }}
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

