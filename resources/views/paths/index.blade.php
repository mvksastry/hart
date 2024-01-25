@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Paths</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Paths</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				@include('paths.flexMenuPaths')
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Current Paths
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




									@if (count($paths) > 0)
									<table id="example2" class="table table-bordered table-hover {{ count($paths) > 0 ? 'datatable' : '' }} dt-select">
										<thead>
											<tr>
												<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
												<th>Id</th>
												<th>Role</th>
												<th>Path</th>
												<th>Route</th>
												<th>Created</th>
												<th>Operations</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($paths as $val)
												<tr data-entry-id="{{ $val['path_id'] }}">
													<td></td>
													<td>
														{{ $val['path_id'] }}
													</td>
													<td>
														<span class="label label-info label-many">
															{{ ucfirst($val['role_name']) }}
														</span>
													</td>
													<td>
														{{ ucfirst($val['controller']) }}
													</td>
													<td>
														<font color="blue"><strong>
															{{ $val['path'] }}
														</strong></font>
													</td>
													<td>
														{{ date('F d, Y', strtotime($val['created_at'])) }}
													</td>
													<td>
														<a href="{{ route('paths.edit',$val['path_id']) }}" class="btn btn-xs btn-info">Edit</a>													
                            <form action="{{ route('paths.destroy',$val['path_id']) }}" method="Post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-xs btn-danger mt-2">Delete</button>
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