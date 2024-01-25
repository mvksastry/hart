@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Leaves</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Leave types</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				@include('leavetypes.flexMenuTop')
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Active Types
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

									@if (count($leavetypes) > 0)
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
												<th>Leave Name</th>
												<th>Elgible For</th>
												<th>Elgible Gender</th>
												<th>Conditions</th>
												<th>Limit per Year</th>
												<th>Carry Forward</th>
												<th>Carry Forward Limit</th>
												<th>Cumulative Ceiling Days</th>
												<th>Operations</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($leavetypes as $leavetype)
												<tr>
													<td></td>
													<td>{{ $leavetype->leavetype_name }}</td>
													@if($leavetype->role != null)
														<td>{{ ucfirst(($leavetype->role)->name) }}</td>
													@else
														<td></td>
													@endif
													@if( $leavetype->eligible_gender_id == 0 )
														<td>All</td>
													@elseif( $leavetype->eligible_gender_id == 1 )
														<td>Males only</td>
													@elseif( $leavetype->eligible_gender_id == 2 )
														<td>Females only</td>
													@endif
													<td>
														<?php $ex = explode(';', $leavetype->leave_conditions); ?> 
														@foreach( $ex as $val)
														<strong><font color="red"></font></strong>{{ $val }}<br/>
														@endforeach
													</td>
													<td>{{ $leavetype->leave_limit_peryear }}</td>                             
													@if( $leavetype->carriable == 1)
														<td>Yes</td>
													@else
														<td>No</td>
													@endif
													<td>{{ $leavetype->carried_on_limit }}</td>
													<td>{{ $leavetype->cumulative_ceiling }}</td>
													<td>
													<a href="{{ route('leavetypes.edit',[$leavetype->leavetype_id]) }}" class="btn btn-xs btn-info">@lang('Edit')</a>
													<a href="{{ route('leavetypes.destroy',[$leavetype->leavetype_id]) }}" class="btn btn-xs btn-info">@lang('Delete')</a>
													
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
@endsection('content')