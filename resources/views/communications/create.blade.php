@extends('layouts.app')
@section('content')
	<?php
		$subjects[] = "Select Broad Area";
		foreach($pathNames as $val)
		{
			$subjects[$val->path_id] = $val->controller;
		}
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create New IOComm</h1>
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
								  New I O Comm
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
										
											<form method="POST" action="{{ route('iocomms.store') }}">
												@csrf

												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Name</label>
												  <input type="text" class="form-control form-control-border" 
												  name="name" id="name" value="{{ ucwords(Auth::user()->name) }}" placeholder="Name">
												</div>
												
												<!--
												<div class="form-group">
													<label for="exampleInputFile">File input</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="exampleInputFile">
															<label class="custom-file-label" for="exampleInputFile">Choose file</label>
														</div>
													</div>
												</div>
												-->
												
												<div class="form-group">
												  <label for="exampleInputBorderWidth2">File</label>
												  <input type="file" class="form-control form-control-border" 
												  name="fileToUpload" id="fileToUpload" placeholder="File">
												</div>

												<div class="form-group">
													<label>Subject*</label>
													<div class="select2-purple">											
														<select class="custom-select 
														form-control rounded-1" 
														name="subject" id="subject">
															@foreach($subjects as $key => $row)
																<option value="{{ $key }}">{{ $row }}</option>
															@endforeach
														</select>
													</div>
												</div>
												@if($errors->has('subject'))
													<p class="help-block text-danger">
														{{ $errors->first('subject') }}
													</p>
												@endif

												@if(isset($filename))
													<div class="form-group">
													  <label for="exampleInputBorderWidth2">File Name</label>
													  {{ $filename }}
													</div>
												@endif

              									<!-- textarea -->
												<div class="form-group">
													<label>Description*</label>
													<textarea class="form-control" rows="3" 
													name="description" id="description" placeholder="Enter ..."></textarea>
												</div>
												@if($errors->has('description'))
													<p class="help-block text-danger">
														{{ $errors->first('description') }}
													</p>
												@endif
												<div class="card-footer">
													<button type="submit" class="btn btn-primary">Submit</button>
												</div>

											</form><!-- /.form -->
											
										</div><!-- /.card-body -->
									</div>
								</div>
							</div><!-- /.card-body -->
						</div><!-- /.card -->
					</section>
					<!-- /.Left col -->
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
	</div>
@endsection('content')

