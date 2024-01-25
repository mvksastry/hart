@extends('layouts.app')
@section('content')
	<?php $decision = array("0"=> "None", "1"=> "None", 
		"2" => "Pending", "3" => "Returned", 
		"4"=> "Rejected", "5"=> "Approved",
		"6"=> "DDP"
		); 
	?>
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						@if($errors->has('error'))
							<p class="help-block text-danger">
								<h4 class="m-3 text-danger">{{ $errors->first('error') }}</h4>
							</p>
						@else
							<h1 class="m-0">Home: Leaves</h1>
						@endif
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Leaves</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				@include('leaves.flexMenuLeaves')
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  Leave Record
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
									<div class="chart tab-pane active" id="revenue-chart" style="position: relative;">





										@if(count($ownLeaves) > 0)
											<table class="table table-bordered table-striped {{ count($ownLeaves) > 0 ? 'datatable' : '' }} dt-select">
												<thead>
													<tr>
														<th>Select</th>
														<th>Name</th>
														<th>Leave</th>
														<th>Starts</th>
														<th>Ends</th>
														<th>Days</th>
														<th>Reason</th>
														<th>Comments</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($ownLeaves as $leave)	
														<?php $nx = explode(';;;', $leave->comments) ?>            
														<tr>
															<td></td>
															<td>{{ ($leave->user)->name }}</td>
															<td>{{ ($leave->leavetype)->leavetype_name }}</td>
															<td>
																{{ date('d-m-Y', strtotime($leave->leave_start)) }}<br/>
																{{ ucfirst($leave->leave_start_session) }}
															</td>
															<td>
																{{ date('d-m-Y', strtotime($leave->leave_end)) }}<br/>
																{{ ucfirst($leave->leave_end_session) }}
															</td>
															<td>{{ $leave->total_days }}</td>
															<td>{{ $leave->leave_reason }}</td>
															<td>
																@foreach( $nx as $val)
																	{{ ucfirst($val) }} <br/>
																@endforeach</td>
															</td>
															<td>
																{{ $decision[$leave->leave_status] }}				
															</td>
															<td>
																@hasrole('researcher|staff|employee')	
																	@if( $leave->leave_status < 2 )
																	<a href="{{ route('leaves.edit',[$leave->uuid]) }}" class="btn btn-xs btn-info">Edit</a>
																	@endif
																@endrole	
															</td>
														</tr>
													@endforeach

												</tbody>
											</table>	
										@else
											No Information to display
										@endif
                    
                    
									</div>
								</div>
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
					
          
          
          
        @hasanyrole(['supervisor|admin|director'])  
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  Group Member Leaves For Action
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
									<div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
										@if(count($groupLeaves) > 0)
											<table class="table table-bordered table-striped {{ count($ownLeaves) > 0 ? 'datatable' : '' }} dt-select">
												<thead>
													<tr>
														<th>Select</th>
														<th>Name</th>
														<th>Starts</th>
														<th>Ends</th>
														<th>Days</th>
														<th>Reason</th>
														<th>Comments</th>					
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($groupLeaves as $leave)
														<?php $nx = explode(';;;', $leave->comments) ?>            
														<tr>
															<td></td>
															<td>{{ $leave->name }}</td>
															<td>{{ date('d-m-Y', strtotime($leave->leave_start)) }}<br/>
																	{{ ucfirst($leave->leave_start_session) }}
															</td>
															<td>{{ date('d-m-Y', strtotime($leave->leave_end)) }}<br/>
																	{{ ucfirst($leave->leave_end_session) }}
															</td>
															<td>{{ $leave->total_days }}</td>
															<td>{{ $leave->leave_reason }}</td>
															<td>
																@foreach( $nx as $val)
																{!! ucfirst($val) !!} <br/>
																@endforeach</td>
															<td>														
																@hasanyrole('supervisor')
																	@if( $leave->leave_status < 2 )
																		<a href="{{ route('leave.decision',[$leave->uuid]) }}" class="btn btn-xs btn-info">Decision</a>
																	@endif
																@endrole
																@hasrole('admin')	
																	@if( $leave->leave_status >= 2 &&  $leave->leave_status < 5 )
																		<a href="{{ route('leave.decision',[$leave->uuid]) }}" class="btn btn-xs btn-info">Decision</a>
																	@endif
																@endrole
																@hasrole('director')	
																	@if( $leave->leave_status >= 2 && $leave->leave_status < 5 )
																		<a href="{{ route('leave.decision',[$leave->uuid]) }}" class="btn btn-xs btn-info">Decision</a>
																	@endif
																@endrole
															</td>
														</tr>
													@endforeach

												</tbody>
											</table>	
										@else
											No Information to display
										@endif
									</div>
								</div>
							</div><!-- /.card-body -->
						</div>
						<!-- /.card --><!-- /.card -->
					</section>
        @endhasanyrole




					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  Eligible Leaves
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
									<div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
										@if (count($leaverecords) > 0)
											<table class="table table-bordered table-striped {{ count($leaverecords) > 0 ? 'datatable' : '' }} dt-select">
												<thead>
													<tr>
														<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
														<th>Action</th>
														<th>Name</th>
														<th>Leavetype</th>
														<th>Current Year Credit</th>
														<th>Current Year Consumed</th>
														<th>Current Year Balance</th>
														<th>Cumulative Balance</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($leaverecords as $leaverecord)
													  <tr data-entry-id="{{ $leaverecord->eligible_leavetype_id }}">
														<td></td>
														<td>
															<a href="{{ route('leaves.form',[$leaverecord->eligible_leavetype_id]) }}" class="btn btn-xs btn-info">Apply</a>
														</td>	
														<td>{{ ($leaverecord->user)->name }}</td>
														<td>{{ $leaverecord->leavetype->leavetype_name }}</td>
														<td>{{ $leaverecord->current_year_credit }}</td>
														<td>{{ $leaverecord->current_year_consumed }}</td>
														<td>{{ $leaverecord->current_year_balance }}</td>
														<td>{{ $leaverecord->cumulative_balance }}</td>
														</tr>
													@endforeach
												</tbody>
											</table>	
										@else
											No Information to display
										@endif
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
<!-- //////////////////////////////////////// -->	
@endsection('content')