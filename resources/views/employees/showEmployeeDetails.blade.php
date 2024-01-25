@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Employee Profile</h1>
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
								  PROFILE EMPLOYEE
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
											<h3 class="card-title">Employee Details</h3>
										</div>
										<!-- /.card-header -->
                    
										<div class="card-body">


                        <div class="container">
                          <div class="row align-items-start">
                
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Name</label>
                              </br>
                              {{ $employee->user->name }}
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Email</label>
                              </br>
                              {{ $employee->user->email }}
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Gender</label>
                              </br>
                              {{ $employee->gender_id }}
                            </div> 
											
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Date of Birth</label>
                              </br>
                              {{ date('d-m-Y', strtotime($employee->birth_date)) }}
                            </div>
                          </div>
                        </div>
                        
                        <div class="container">
                          <div class="row align-items-start">
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Designation</label>
                              </br>
                              {{ $employee->designation }}
                            </div>
 
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Select Role</label>
                              </br>
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Department</label>
                              </br>
                              {{ $employee->department }}
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Date of Joining</label>
                              </br>
                              {{ date('d-m-Y', strtotime($employee->join_date)) }}
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
                              </br>
                              {{ $employee->level_id }}
                            </div>
                            
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Basic Pay</label>
                              </br>
                              {{ $employee->basic_pay }}
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Variable Pay</label>
                              </br>
                              {{ $employee->variable_pay }}
                            </div>
                     
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Increment Date</label>
                              </br>
                              {{ date('d-m-Y', strtotime($employee->increment_date)) }}
                            </div>							
                          </div>
                        </div>
               
                        <div class="container">
                          <div class="row align-items-start">                   
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Office Phone</label>
                              </br>
                              {{ $employee->office_phone }}
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Mobile</label>
                              </br>
                              {{ $employee->mobile_phone1 }}
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Alternat Contact</label>
                              </br>
                              {{ $employee->mobile_phone2 }} 
                            </div>
										
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Validity Date</label>
                              </br>
                              {{ date('d-m-Y', strtotime($employee->validity_date)) }}  
                            </div>                          
                          </div>
                        </div>
            
                        <div class="container">
                          <div class="row align-items-start">                
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Home Address</label>
                              </br>
                              {{ $employee->address }} 
                            </div>                      
                          </div>
                        </div>
                  
                        <div class="container">
                          <div class="row align-items-start">                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Upload Photo</label>
                              </br>
                              {{ $employee->photofile }} 
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Status</label>
                              </br>
                              {{ $employee->status }}
                            </div>
                      
                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Suspension</label>
                              </br>
                              {{ $employee->suspension }}
                            </div>
                      
                          </div>
                        </div>                
                  									
                    </div>
                  </div>
                </div>
              </div>
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

