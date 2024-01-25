@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create User</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">User Create</li>
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
								  New User
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
                      <form method="POST" action="{{ route('paths.store') }}">
                        @csrf
                      
                        <div class="form-group">
                          <label for="exampleInputBorderWidth2">Name</label>
                          <input type="text" class="form-control form-control-border" 
                          name="name" id="name" placeholder="First and Last Name">
                        </div>
                        @if($errors->has('name'))
                          <p class="help-block text-danger">
                            {{ $errors->first('name') }}
                          </p>
                        @endif
                        
                        <div class="form-group">
                          <label for="exampleInputBorderWidth2">Email</label>
                          <input type="text" class="form-control form-control-border" 
                          name="email" id="email" placeholder="Email">
                        </div>
                        @if($errors->has('email'))
                          <p class="help-block text-danger">
                            {{ $errors->first('email') }}
                          </p>
                        @endif
                      
                        <div class="form-group">
                          <label for="exampleInputBorderWidth2">Password</label>
                          <input type="text" class="form-control form-control-border" 
                          name="password" id="password" placeholder="Password">
                        </div>
                        @if($errors->has('password'))
                          <p class="help-block text-danger">
                            {{ $errors->first('password') }}
                          </p>
                        @endif
                      
                        <div class="form-group">
                          <label for="exampleInputBorderWidth2">Confirm Password</label>
                          <input type="text" class="form-control form-control-border" 
                          name="password_confirmation" id="password_confirmation" placeholder="Retype Password">
                        </div>
                        @if($errors->has('password_confirmation'))
                          <p class="help-block text-danger">
                            {{ $errors->first('password_confirmation') }}
                          </p>
                        @endif
                                                  
                        <label for="role" class="col-form-label">Role</label>
                        <select class="custom-select form-control rounded-1" name="roles[]" id="roles[]">
                          <option value="0">Select</option>
                          @foreach($roles as $key => $val)
                          <option value="{{ $key }}">{{ ucfirst($val) }}</option>
                          @endforeach
                        </select>
                        @if($errors->has('roles'))
                          <p class="help-block">
                            {{ $errors->first('roles') }}
                          </p>
                        @endif

                        <label for="role" class="col-form-label">Direct Permissions</label>
                        <select class="custom-select form-control rounded-1" 
                          name="perms[]" id="perms[]">
                          <option value="0">Select</option>
                          @foreach($perms as $key => $val)
                          <option value="{{ $key }}">{{ ucfirst($val) }}</option>
                          @endforeach
                        </select>
                        @if($errors->has('roles'))
                          <p class="help-block">
                            {{ $errors->first('roles') }}
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

