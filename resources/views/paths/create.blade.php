@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create Leave Type</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Create Leave Type</li>
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
								  New Leave Type
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
											<form method="POST" action="{{ route('paths.store') }}">
												@csrf

												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Path Name</label>
												  <input type="text" class="form-control form-control-border" 
												  name="pathname" id="pathname" placeholder="Path Name">
												</div>
												@if($errors->has('pathname'))
													<p class="help-block text-danger">
														{{ $errors->first('pathname') }}
													</p>
												@endif

											
												@foreach($userGroup as $key => $val)
													<?php 
														$groupc = array();
														foreach($val as $key1 => $row)
														{ 
															$groupc[$row->id] = ucfirst($row->name);
														}
														$selectLabel = ucfirst($key);
														$entity = 'groupd['.ucfirst($key).'][]';
													?>
													
													<div class="form-group row">
													
														<div class="col-sm-4">
															<label for="StepNumber" class="col-form-label">Step Number*</label>
															<input type="text" class="form-control rounded-1" name="{{ $entity }}" id="{{ $entity }}" placeholder="Step Number">
														</div>
														
														<div class="col-sm-4">														  
															<label for="{{ $selectLabel }}" class="col-form-label">{{ $selectLabel }}</label>
															<select class="custom-select form-control rounded-1" name="{{ $entity }}" id="{{ $entity }}">
																<option>Value 1</option>
																<option>Value 2</option>
																<option>Value 3</option>
															</select>
														</div>
														<div class="col-sm-4">														  
															<label for="exampleSelectRounded0" class="col-form-label">Notes*</label>
															<select class="custom-select form-control rounded-1" name="{{ $entity }}" id="{{ $entity }}">
																<option value="yes">Yes</option>
																<option value="no">No</option>
															</select>
														</div>
														
													</div>
													
												@endforeach													
												
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

