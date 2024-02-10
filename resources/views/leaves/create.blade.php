@extends('layouts.app')
@section('content')
	<?php 
		$decision = array("0"=> "None", "1"=> "None", 
		"2" => "Pending", "3" => "Returned", 
		"4"=> "Rejected", "5"=> "Approved",
		"6"=> "DDP"
		); 
		
		foreach($leavetypes as $val)
		{
			$xc['leavetype_name'] = $val->leavetype_name;
			$xc['leavetype_id'] = $val->leavetype_id;
			$leave_conditions = $val->leave_conditions;
			$leavetypeName = $val->leavetype_name;
		}
	?>	

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
										@if($leavetypeName == "Casual Leave")
											@include('leaves.formLeaveCasual')
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
<!-- //////////////////////////////////////// -->		
	</div>	
<!-- //////////////////////////////////////// -->	
@endsection('content')

