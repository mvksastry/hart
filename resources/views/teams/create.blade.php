@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create Team</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Team Create</li>
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
								  New Team
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
                    
                      <form method="POST" action="{{ route('teams.store') }}">
                        @csrf
                      
                        <div class="form-group">
                          <label for="exampleInputBorderWidth2">Name</label>
                          <select class="custom-select form-control rounded-1" name="user_id" id="user_id">
                          <option value="">Select</option>
                            @foreach($users as $key => $val)
                            <option value="{{ $key }}">{{ ucfirst($val) }}</option>
                            @endforeach
                          </select>
                        </div>
                        @if($errors->has('user_id'))
                          <p class="help-block text-danger">
                            {{ $errors->first('user_id') }}
                          </p>
                        @endif
                  
                        @if( count($teamNames) > 0)
                          <label for="role" class="col-form-label">Current Team Name</label>
                          <select class="custom-select form-control rounded-1" value="{{ old('existing_name') }}"name="existing_name" id="existing_name">
                            <option value="">Select</option>
                            @foreach($teamNames as $row)
                            <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                            @endforeach
                          </select>
                          @if($errors->has('existing_name'))
                            <p class="help-block text-danger">
                              {{ $errors->first('existing_name') }}
                            </p>
                          @endif
                        @endif
                      
                        <div class="form-group">
                          <label for="exampleInputBorderWidth2">Create New Team</label>
                          <input type="text" class="form-control form-control-border" 
                          name="new_team_name" id="new_team_name" value="{{ old('new_team_name') }}" placeholder="Team Name">
                        </div>
                        @if($errors->has('new_team_name'))
                          <p class="help-block text-danger">
                            {{ $errors->first('new_team_name') }}
                          </p>
                        @endif
                        
                        <label for="role" class="col-form-label">Role</label>
                        <select class="custom-select form-control rounded-1" name="role" id="role">
                          <option value="">Select</option>
                          <option value="member">Member</option>
                          <option value="team_leader">Team Leader</option>
                        </select>
                        @if($errors->has('role'))
                          <p class="help-block text-danger">
                            {{ $errors->first('role') }}
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

