@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Employee Details</h1>
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
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						
							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  Employee Details
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
											<form method="POST" action="{{ route('employees.update', $employee->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="container">
                          <div class="row align-items-start">
                
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Name</label>
                              <input type="text" class="form-control form-control-border" 
                              name="name" id="name" disabled value="{{ ucwords($employee->name) }}" placeholder="First and Last Name">
                              @if($errors->has('name'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('name') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Email</label>
                              <input type="text" class="form-control form-control-border" 
                              name="email" id="email" value="{{ $employee->email }}" placeholder="Email">
                              @if($errors->has('email'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('email') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Gender</label>
                              <select class="custom-select form-control rounded-1" 
                                name="gender_id" id="gender_id">
                                <option value="0">Select</option>
                                <option value="1" selected="selected">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                              </select>
                              @if($errors->has('gender_id'))
                                <p class="help-block">
                                  {{ $errors->first('gender_id') }}
                                </p>
                              @endif
                            </div> 
											
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Date of Birth</label>
                              <input type="date" class="form-control form-control-border" 
                              name="birth_date" id="birth_date" placeholder="Date of Birth"
                              value="{{ old('birth_date') }}">
                              @if($errors->has('birth_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('birth_date') }}
                                </p>
                              @endif
                            </div>
                          </div>
                        </div>
                        
                        <div class="container">
                          <div class="row align-items-start">
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Designation</label>
                              <input type="text" class="form-control form-control-border" 
                              name="designation" id="designation" placeholder="Designation"
                              value="{{ old('designation') }}">
                              @if($errors->has('designation'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('designation') }}
                                </p>
                              @endif
                            </div>
 
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Select Role</label>
                              <select class="form-control select2" multiple="multiple" data-placeholder="Select a Role" 
                              style="width: 100%;" name="roles[]" id="roles[]">
                                @foreach($roles as $key => $val)
                                <option value="{{ $key }}">{{ ucfirst($val) }}</option>
                                @endforeach
                              </select>
                              @if($errors->has('roles[]'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('roles[]') }}
                                </p>
                              @endif
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Department</label>
                              <select class="custom-select form-control rounded-1" 
                                name="department" id="department">
                                <option value="select">Select</option>
                                <option value="technical">Technical</option>
                                <option value="admin" selected="selected">Admin</option>
                                <option value="finance">Finance</option>
                              </select>
                              @if($errors->has('department'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('department') }}
                                </p>
                              @endif
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Date of Joining</label>
                              <input type="date" class="form-control form-control-border" 
                              name="join_date" id="join_date" 
                              placeholder="Joining Date" value="{{ old('join_date') }}">
                              @if($errors->has('join_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('join_date') }}
                                </p>
                              @endif 
                            </div>
                          </div>
                        </div>		
              
                        <div class="container">
                          <div class="row align-items-start">
                                <div class="form-group col">
                                  <label for="exampleInputBorderWidth2">Pay Details</label>
                                </div>
                          </div>      
                        </div>  

                        <div class="container">
                          <div class="row align-items-start">
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Level Id</label>
                              <input type="text" class="form-control form-control-border" 
                              name="level_id" id="level_id" value="{{ old('level_id') }}"
                              placeholder="Level ID">
                              @if($errors->has('level_id'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('level_jd') }}
                                </p>
                              @endif
                            </div>
                            
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Basic Pay</label>
                              <input type="text" class="form-control form-control-border" 
                              name="basic_pay" id="basic_pay" placeholder="Basic Pay"
                              value="{{ old('basic_pay') }}">
                              @if($errors->has('basic_pay'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('basic_pay') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Variable Pay</label>
                              <input type="text" class="form-control form-control-border" 
                              name="variable_pay" id="variable_pay" 
                              placeholder="Variable Pay" value="{{ old('variable_pay') }}">
                              @if($errors->has('variable_pay'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('variable_pay') }}
                                </p>
                              @endif 
                            </div>
                     
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Increment Date</label>
                              <input type="date" class="form-control form-control-border" 
                              name="increment_date" id="increment_date" placeholder="Increment Date"
                              value="{{ old('increment_date') }}">
                              @if($errors->has('increment_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('increment_date') }}
                                </p>
                              @endif
                            </div>							
                          </div>
                        </div>
               
                        <div class="container">
                          <div class="row align-items-start">                   
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Office Phone</label>
                              <input type="text" class="form-control form-control-border" 
                              name="office_phone" id="office_phone" 
                              placeholder="Office Phone"
                              value="04012345678">
                              @if($errors->has('office_phone'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('office_phone') }}
                                </p>
                              @endif 
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Mobile</label>
                              <input type="text" class="form-control form-control-border" 
                              name="mobile_phone1" id="mobile_phone1" placeholder="Mobile"
                              value="9876543210">
                              @if($errors->has('mobile_phone1'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('mobile_phone1') }}
                                </p>
                              @endif
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Alternat Contact</label>
                              <input type="text" class="form-control form-control-border" 
                              name="mobile_phone2" id="mobile_phone2" placeholder="Mobile"
                              value="9876501234">
                              @if($errors->has('mobile_phone2'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('mobile_phone2') }}
                                </p>
                              @endif
                            </div>
										
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Validity Date</label>
                              <input type="date" class="form-control form-control-border" 
                              name="validity_date" id="validity_date" 
                              placeholder="Joining date"
                              value="2026-08-31">
                              @if($errors->has('validity_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('validity_date') }}
                                </p>
                              @endif 
                            </div>                          
                          </div>
                        </div>
            
                        <div class="container">
                          <div class="row align-items-start">                
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Home Address</label>
                              <input type="text" class="form-control form-control-border" 
                              name="address" id="address" 
                              placeholder="Home Address"
                              value="Building H, No 23, Spires Society, Abcd Road Ec, Jusidye Hudyy - 123456">
                              @if($errors->has('address'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('address') }}
                                </p>
                              @endif
                            </div>                      
                          </div>
                        </div>
                  
                        <div class="container">
                          <div class="row align-items-start">                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Upload Photo</label>
                              <input type="file" class="form-control form-control-border" 
                              name="photofile" id="photofile" 
                              placeholder="Joining date">
                              @if($errors->has('validity_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('validity_date') }}
                                </p>
                              @endif  
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Status</label>
                              <select class="custom-select form-control rounded-1" 
                                name="status" id="status">
                                <option value="0">Select</option>
                                <option value="1">Active</option>
                                <option value="2">Exited</option>
                                <option value="3">Retired</option>
                                <option value="4">Suspended</option>
                              </select>
                              @if($errors->has('status'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('status') }}
                                </p>
                              @endif 
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Suspension</label>
                              <input type="text" class="form-control form-control-border" 
                              name="suspension" id="suspension" 
                              placeholder="Suspension Status" value="no">
                              @if($errors->has('suspension'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('suspension') }}
                                </p>
                              @endif
                            </div>
                      
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

