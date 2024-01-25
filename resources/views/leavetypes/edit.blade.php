@extends('layouts.app')
@section('content')
	<?php 
		$choice = array("0" => "No", "1"=> "Yes"); 
		$selected = $leavetypes->carriable;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Edit Leave Type</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Edit Leave Type</li>
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
								  Edit Leave Type
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
											<form method="POST" action="{{ route('leavetypes.update', $leavetypes->leavetype_id) }}">
											@csrf
											@method('PUT')
											
												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Leave Type Name</label>
												  <input type="text" class="form-control form-control-border" 
												  name="leavetype_name" id="leavetype_name" value="{{ $leavetypes->leavetype_name }}">
												</div>
												@if($errors->has('leavetype_name'))
													<p class="help-block text-danger">
														{{ $errors->first('leavetype_name') }}
													</p>
												@endif

												<div class="form-group">
												  <label for="exampleInputBorder">Limit*</label>
												  <input type="text" class="form-control form-control-border" 
												  name="leave_limit_peryear" id="leave_limit_peryear" value="{{ $leavetypes->leave_limit_peryear }}">
												</div>
												@if($errors->has('leave_limit_peryear'))
													<p class="help-block text-danger">
														{{ $errors->first('leave_limit_peryear') }}
													</p>
												@endif
												
												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Conditions*</label>
												  <input type="text" class="form-control form-control-border" 
												  name="leave_conditions" id="leave_conditions" value="{{ $leavetypes->leave_conditions }}">
												</div>
												@if($errors->has('leave_conditions'))
													<p class="help-block text-danger">
														{{ $errors->first('leave_conditions') }}
													</p>
												@endif	

												<div class="form-group">
												<div class="custom-control custom-checkbox">
												  <input class="input" type="checkbox" name="needs_permission" id="needs_permission" 
												  value="1"
												  @if($leavetypes->needs_permission == 1) "checked" @endif >
												  <label for="customCheckbox2" class="">Permission Needed</label>
												</div>
												</div>
												@if($errors->has('needs_permission'))
													<p class="help-block text-danger">
														{{ $errors->first('needs_permission') }}
													</p>
												@endif
												
												<div class="form-group">
												<div class="custom-control custom-checkbox">										
												  <input class="input" type="checkbox" name="exclude_holidays" id="exclude_holidays" value="1">
												  <label for="customCheckbox2" class="">Holidays Excluded</label>
												</div>
												</div>
												@if($errors->has('exclude_holidays'))
													<p class="help-block text-danger">
														{{ $errors->first('exclude_holidays') }}
													</p>
												@endif
												
												<div class="form-group">
												<div class="custom-control custom-checkbox">
												  <input class="input" type="checkbox" name="allow_halfday" id="allow_halfday" value="1">
												  <label for="customCheckbox2" class="">Half Day Allowed</label>
												</div>
												</div>
												@if($errors->has('allow_halfday'))
													<p class="help-block text-danger">
														{{ $errors->first('allow_halfday') }}
													</p>
												@endif
												
												<div class="form-group">
												  <label for="exampleSelectBorder">Eligibility*</label>
												  <select class="custom-select form-control-border" 
												  name="eligible_gender_id" id="eligible_gender_id">
													<option value="0" >All</option>
													<option value="1">Males Only</option>
													<option value="2">Females Only</option>
													<option value="3">Trans Gender</option>
												  </select>
												</div>
												@if($errors->has('eligible_gender_id'))
													<p class="help-block text-danger">
														{{ $errors->first('eligible_gender_id') }}
													</p>
												@endif
												
												<div class="form-group">
													<label>Roles*</label>
													<div class="select2-purple">
														<select class="select2" multiple="multiple" 
															data-placeholder="Select a State" 
															data-dropdown-css-class="select2-purple" 
															name="role_ids[]" id="role_ids[]" 
															style="width: 100%;">
															@foreach($roles as $row)
																<option value="{{ $row->id }}">{{ $row->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
												@if($errors->has('role_ids'))
													<p class="help-block text-danger">
														{{ $errors->first('role_ids') }}
													</p>
												@endif

												<div class="form-group">
												  <label for="exampleSelectBorder">Carry Forward*</label>
												  <select class="custom-select form-control-border" 
												  name="carriable" id="carriable">
													<option value="0" >Select</option>
													<option value="1">Yes</option>
													<option value="2">No</option>
												  </select>
												</div>									
												@if($errors->has('carriable'))
													<p class="help-block text-danger">
														{{ $errors->first('carriable') }}
													</p>
												@endif

												<div class="form-group">
												  <label for="exampleInputRounded0">Carry Forward Limit*</label>
												  <input type="text" class="form-control form-control-border" 
												  name="carried_on_limit" id="carried_on_limit" value="{{ $leavetypes->carried_on_limit }}">
												</div>
												@if($errors->has('carried_on_limit'))
													<p class="help-block text-danger">
														{{ $errors->first('carried_on_limit') }}
													</p>
												@endif

												<div class="form-group">
												  <label for="exampleInputBorderWidth2">Ceiling Limit*</label>
												  <input type="text" class="form-control form-control-border" 
												  name="cumulative_ceiling" id="cumulative_ceiling" value="{{ $leavetypes->cumulative_ceiling }}">
												</div>
												@if($errors->has('cumulative_ceiling'))
													<p class="help-block text-danger">
														{{ $errors->first('cumulative_ceiling') }}
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

