@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Employees</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Employees</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				@include('employees.flexMenuEmployees')
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Current Employees
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



									@if (count($employees) > 0)
										<table id="userIndex2" class="table table-bordered table-hover">
											<thead>
												<tr bgcolor="#BBDEFB">												
													<th style="text-align:center;">
                          <input type="checkbox" id="select-all" />
                          </th>
													<th>Name</th>
													<th>Email</th>
													<th>Joined</th>
													<th>Roles</th>
                          <th>Details</th>
													<th>Operations</th>					
												</tr>
											</thead>
											<tbody>
												@foreach ($employees as $emp)
                          @if($emp->details == "yes")
                            <tr bgcolor="#E1BEE7"   data-entry-id="{{ $emp->id }}">
                          @else
                            <tr bgcolor="#FFCDD2" data-entry-id="{{ $emp->id }}">
                          @endif
                          <td></td>
                          <td>{{ $emp->name }}</td>
                          <td>{{ $emp->email }}</td>
                          <td>{{ $emp->created_at->format('F d, Y') }}</td>
                          <td>
                            @foreach ($emp->roles()->pluck('name') as $role)
                              <span class="label label-info label-many">
                                {{ ucfirst($role) }}
                              </span>
                            @endforeach
                          </td>
                          <td >
                            {{ ucfirst($emp->details) }}
                          </td>
                          <td>
                          
                            <a href="{{ route('employees.edit',[$emp->id]) }}" class="btn btn-xs btn-info">Edit</a>
                            @if( $emp->details == "yes")
                              <a href="{{ route('employees.show',[$emp->id]) }}" class="btn btn-xs btn-success">Show</a>
                            @endif
                            
                            <form method="DELETE" action="{{ route('employees.destroy', $emp->id) }}">
                              @csrf
                                <button type="submit" class="btn btn-xs btn-primary mt-1">Delete</button>
                            </form>
                              
                          </td>
													</tr>
												@endforeach									
											</tbody>
										</table>
                      {!! $employees->links() !!}
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