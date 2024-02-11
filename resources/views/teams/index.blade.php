@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Teams</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Teams</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				@include('teams.flexMenuTeams')
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Current Teams
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

                  @if(count($teams) > 0)
									
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>												
													<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
													<th>Member Name</th>
													<th>Team Name</th>
													<th>Date Added</th>
													<th>Team Role</th>
													<th>Operations</th>					
												</tr>
											</thead>
											<tbody>
												@foreach ($teams as $team)
													<tr data-entry-id="{{ $team->id }}">
														<td></td>
                            <td>{{ ucwords($team->user->name) }}</td>
														<td>{{ ucfirst($team->name) }}</td>
														
														<td>{{ $team->created_at->format('F d, Y') }}</td>
														<td>														
                              <span class="label label-info label-many">
                                {{ ucfirst($team->team_role->role) }};
                              </span>
														</td>
														<td>
															<a href="{{ route('teams.edit',[$team->id]) }}" class="btn btn-xs btn-info">Edit Team</a>
															<form method="POST" action="{{ route('teams.destroy', $team->id) }}">
																@csrf
                                @method('DELETE')
																	<button type="submit" class="btn btn-xs btn-primary">Delete</button>
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
@endsection('content')