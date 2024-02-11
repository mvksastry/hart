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


                        
                        <div class="row">
                          <!-- Left col -->
                          <div class="col-lg-5">
                              @if(count($teamNames) > 0)
                                <label for="existing_name" class="col-form-label">Current Team Name</label>
                                <select class="custom-select form-control rounded-1" value="{{ old('existing_name') }}"
                                name="existing_name" id="existing_name">
                                  <option value="">Select</option>
                                  @foreach($teamNames as $row)
                                    <option value="{{ $row->name }}">{{ ucfirst($row->name) }}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('existing_name'))
                                  <p class="help-block text-danger">
                                    {{ $errors->first('existing_name') }}
                                  </p>
                                @endif
                              @else
                                <label for="existing_name" class="col-form-label">No Current Teams</label>
                                <input type="text" class="form-control form-control-border" 
                                  name="existing_name" id="existing_name" hidden placeholder="Team ID">  
                              @endif
                          </div>
                              
                          <div class="col-lg-2">
                            <p class="text-center text-uppercase text-danger"> 
                              <label for="role" class="col-form-label"> or </label> 
                            </p>                           
                          </div>
                          
                          <div class="col-lg-5">                                     
                            <label class="col-form-label" for="new_team_name">Create New Team</label>
                            <input type="text" class="form-control form-control-border" 
                            name="new_team_name" id="new_team_name" value="{{ old('new_team_name') }}" placeholder="Team Name">           
                            @if($errors->has('new_team_name'))
                              <p class="help-block text-danger">
                                {{ $errors->first('new_team_name') }}
                              </p>
                            @endif
                          </div>
                        </div>              


                        <div class="row"> 
                          <div class="col-lg-5">                  
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

                          <div class="col-lg-2">
                                                        
                          </div>
                          
                          <div class="col-lg-5">
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

