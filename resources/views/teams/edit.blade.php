@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Edit Team</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Edit Team</li>
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
						<div class="card card-primary card-outline">">
						
							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  Edit Team
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
											<form method="POST" action="{{ route('teams.update', $team_id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row"> 
                          <div class="col-lg-6">                       
                            <label for="exampleInputBorderWidth2">Team Name</label>
                              <input type="text" class="form-control form-control-border" 
                            name="team_name" id="team_name" hidden value="{{ $team_name }}" placeholder="Team Name">           

                              <p class="help-block text-danger">
                                <b>{{ ucwords($team_name) }}</b>
                              </p>
                          </div>
                          
                          <div class="col-lg-6">                       
                            <label for="exampleInputBorderWidth2">Team Composition</label>
                            @foreach($teamusers as $member)
                              @if($member->role == "team_leader")
                                <p class="help-block text-danger">
                                  <b>Leader: {{ ucwords($member->user->name) }}</b>
                                </p>
                              @else
                                <p class="help-block text-primary">
                                  <b>Member: {{ ucwords($member->user->name) }}</b>
                                </p>
                              @endif
                            @endforeach
                          </div>
                        </div>

                        <div class="row"> 
                          <div class="col-lg-6">                  
                            <div class="form-group mt-2">
                              <label for="exampleInputBorderWidth2">New Leader</label>
                              <select class="select2leader"  name="leader_id" id="leader_id" data-placeholder="Select Team Leader" style="width: 100%;">
                              
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
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group mt-2">
                              <label for="exampleInputBorderWidth2">New Member</label>
                              <select class="select2member" multiple="multiple" name="member_id[]" id="member_id[]" data-placeholder="Select Team Member" style="width: 100%;">
                              
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
                          </div>
                        </div>

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

