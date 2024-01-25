@extends('layouts.app')
@section('content')


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
							<h1 class="m-0">Home: Leave Records</h1>
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
				@include('leaverecords.flexMenuLeaverecords')
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

										@if(count($leaverecords) > 0)
											<table class="table table-bordered table-striped {{ count($leaverecords) > 0 ? 'datatable' : '' }} dt-select">
												<thead>
													<tr>
														<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
														<th>Year</th>
														<th>Name</th>
														<th>Elgible Leave Type</th>
														<th>Current Year Balance</th>
														<th>Current Year Consumed</th>
														<th>Cumulative Balance</th>
														<th>Balance Update Date</th>												
														<th>Operations</th>
													</tr>
												</thead>
												<tbody>												
													@foreach ($leaverecords as $leaverecord)						
														<tr data-entry-id="{{ $leaverecord->eligible_leavetype_id }}">
															<td></td>
															<td>{{ $leaverecord->current_year }}</td>
															<td>{{ ($leaverecord->user)->name }}</td>
																							
															<td>{{ $leaverecord->leavetype->leavetype_name }}</td>
																					
															<td>{{ $leaverecord->current_year_balance }}</td>
															<td>{{ $leaverecord->current_year_consumed }}</td>                             

															<td>{{ $leaverecord->cumulative_balance }}</td>
															<td>{{ date('d-m-Y',strtotime($leaverecord->balance_updated_at)) }}</td>
															<td>
																<a href="{{ route('leaverecords.edit',[$leaverecord->eligible_leavetype_id]) }}" class="btn btn-xs btn-info">Edit</a>
																<form method="DELETE" action = "{{ 'leaverecords.destroy', $leaverecord->eligible_leavetype_id }}">
																	@csrf
																	<button class="btn btn-xs btn-danger">DELETE</button>
																</form>
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
					<!-- /.Left col -->
					<!-- right col -->
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		
		
		
		
		
		
		
		
	</div>
<!-- //////////////////////////////////////// -->	
@endsection('content')