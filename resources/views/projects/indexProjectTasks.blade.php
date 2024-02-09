@extends('layouts.app')
@section('content')
	<?php 
		$eventchoice = array("1" => "Assessment - 1st year", "2" => "Assessment - 2nd year", "3"=>"Assessment - 3rd year", "4"=>"Assessment - 4th year", 
		"5"=>"Assessment - 4th year", "6"=>"Colloquium", "7"=>"Work Presentation", 
		"8"=>"Synopsis Seminar", "9"=>"Ph.D. Viva");
		$eventchoiceSel = 1;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Tasks</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Tasks</li>
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
							  Events
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





									@if (count($tasks) > 0)
									<table id="example2" class="table table-bordered table-hover {{ count($tasks) > 0 ? 'datatable' : '' }} dt-select">
										<thead>
											<tr>
												<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
												<th>Task Owner</th>
												<th>Activity </br> Description </th>
												<th>Start / </br> End</th>
												
												<th>Progress / Updated By</th>
												<th>Comment</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($tasks as $task)
												<tr data-entry-id="{{ $task->projtask_id }}">
													<td></td>
													<td>{{ ucwords($task->user->name) }}</td>
													<td><b>{{ $task->activity }} </b> </br> {{ $task->task_desc }}</td>
									
													<td>Begin: {{ $task->task_starts }} </br> End: {{ $task->task_ends }}</td>
                          <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $task->percent_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task->percent_progress }}%">
                                </div>
                            </div>
                            <small>
                            {{ $task->percent_progress }}% Complete
                            </br>
                            as on {{ date('d-m-Y', strtotime($task->date_posted)) }} </br> Updated by: {{ ucwords($task->updatedby->name) }}
                            </small>
                        </td>
													
													<td>{{ $task->comment }}</td>
													<td>
														<a href="{{ route('projtasks.update',$task->projtask_id) }}" class="btn btn-xs btn-info">Update</a>
														
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