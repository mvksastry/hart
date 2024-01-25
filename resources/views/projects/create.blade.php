@extends('layouts.app')
@section('content')
	<?php 
		$holidaychoice = array("0" => "Gazetted Holiday", "1"=> "Restricted Holiday");
		$holidaySel = 0;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Project Add</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Project Add</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card card-secondary card-outline">
            <div class="card-header">
              <h3 class="card-title">New Project</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>      
            <form method="POST" action="{{ route('projects.store') }}">
              @csrf                   
              <div class="card-body">
                <div class="row mt-1">
                  <div class="col-md-6">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">General</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Office Reference</label>
                          <input type="text" name="off_ref" id="off_ref" class="form-control"
                          value="{{ old('off_ref') }}">
                          @if($errors->has('off_ref'))
                            <p class="help-block text-danger">
                              {{ $errors->first('off_ref') }}
                            </p>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label for="inputName">Project Name</label>
                          <input type="text" name="title" id="title" class="form-control"
                          value="{{ old('title') }}">
                          @if($errors->has('title'))
                            <p class="help-block text-danger">
                              {{ $errors->first('title') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Project Description</label>
                          <textarea name="description" id="description" class="form-control" rows="4"
                          value="{{ old('description') }}"></textarea>
                          @if($errors->has('description'))
                            <p class="help-block text-danger">
                              {{ $errors->first('description') }}
                            </p>
                          @endif 
                        </div>



                        
                        
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select name="status"  id="status" class="form-control custom-select"
                          value="{{ old('status') }}">
                            <option selected disabled>Select one</option>
                            <option value="1">Running</option>
                            <option value="2">On Hold</option>
                            <option value="3">Canceled</option>
                            <option value="4">Success</option>
                          </select>
                          @if($errors->has('status'))
                            <p class="help-block text-danger">
                              {{ $errors->first('status') }}
                            </p>
                          @endif                          
                        </div>
                        <div class="form-group">
                          <label for="inputClientCompany">Client Company</label>
                          <input type="text" name="agency" id="agency" class="form-control"
                          value="{{ old('agency') }}">
                          @if($errors->has('agency'))
                            <p class="help-block text-danger">
                              {{ $errors->first('agency') }}
                            </p>
                          @endif                          
                        </div>
                        <div class="form-group">
                          <label for="inputProjectLeader">Project Leader</label>
                          <input type="text" name="project_leader" id="project_leader" 
                          value="{{ old('project_leader') }}" class="form-control">
                          @if($errors->has('project_leader'))
                            <p class="help-block text-danger">
                              {{ $errors->first('project_leader') }}
                            </p>
                          @endif                          
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                
                  <div class="col-md-6">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Budget</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputEstimatedBudget">Estimated budget</label>
                          <input type="number" name="total_budget" id="total_budget" 
                          value="{{ old('total_budget') }}" class="form-control">
                          @if($errors->has('total_budget'))
                            <p class="help-block text-danger">
                              {{ $errors->first('total_budget') }}
                            </p>
                          @endif 
                        </div>

                        <div class="form-group">
                          <label for="inputSpentBudget">Comments Budget</label>
                          <input type="text" name="comments" id="comments" 
                          value="{{ old('comments') }}" class="form-control">
                          @if($errors->has('comments'))
                            <p class="help-block text-danger">
                              {{ $errors->first('comments') }}
                            </p>
                          @endif 
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-header">
                        <h3 class="card-title">Time Line</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputEstimatedBudget">Start Date</label>
                          <input type="date" name="start_date" id="start_date" 
                          value="{{ old('start_date') }}" class="form-control">
                          @if($errors->has('start_date'))
                            <p class="help-block text-danger">
                              {{ $errors->first('start_date') }}
                            </p>
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="inputEstimatedDuration">End Date (Weeks)</label>
                          <input type="date" name="end_date" id="end_date" 
                          value="{{ old('end_date') }}" class="form-control">
                          @if($errors->has('end_date'))
                            <p class="help-block text-danger">
                              {{ $errors->first('end_date') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputEstimatedDuration">Estimated Project Duration (Weeks)</label>
                          <input type="number" name="est_time_weeks" id="est_time_weeks" 
                          value="{{ old('est_time_weeks') }}" class="form-control">
                          @if($errors->has('est_time_weeks'))
                            <p class="help-block text-danger">
                              {{ $errors->first('est_time_weeks') }}
                            </p>
                          @endif
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-header">
                      <h3 class="card-title"><b>S</b>pecific <b>M</b>easurable <b>A</b>chievable <b>R</b>elevant <b>T</b>imebound Goals</h3>
                    </div>
                    
                    <div class="card-body">
                    
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedBudget">Goal-1</label>
                            <input type="text" name="goals[]" id="goals[]" 
                            value="{{ old('goals[]') }}" class="form-control">
                            @if($errors->has('goals'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goals') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-1: Budget</label>
                            <input type="text" name="goal_budget[]" id="goal_budget[]" 
                            value="{{ old('goal_budget[]') }}" class="form-control">
                            @if($errors->has('goal_budget'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_budget') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>                          
                        
                      <div class="row">  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-1: Description</label>
                            <input type="text" name="goal_desc[]" id="goal_desc[]" 
                            value="{{ old('goal_desc[]') }}" class="form-control">
                            @if($errors->has('goal_desc'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_desc') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-1: Estimated Time</label>
                            <input type="text" name="goal_estime[]" id="goal_estime[]" 
                            value="{{ old('goal_estime[]') }}" class="form-control">
                            @if($errors->has('goal_estime'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_estime') }}
                              </p>
                            @endif
                          </div>
                        </div>                          
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedBudget">Goal-2</label>
                            <input type="text" name="goals[]" id="goals[]" 
                            value="{{ old('goals[]') }}" class="form-control">
                            @if($errors->has('goals'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goals') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-2: Budget</label>
                            <input type="text" name="goal_budget[]" id="goal_budget[]" 
                            value="{{ old('goal_budget[]') }}" class="form-control">
                            @if($errors->has('goal_budget'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_budget') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>                          
                        
                      <div class="row">  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-2: Description</label>
                            <input type="text" name="goal_desc[]" id="goal_desc[]" 
                            value="{{ old('goal_desc[]') }}" class="form-control">
                            @if($errors->has('goal_desc'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_desc') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-2: Estimated Time</label>
                            <input type="text" name="goal_estime[]" id="goal_estime[]" 
                            value="{{ old('goal_estime[]') }}" class="form-control">
                            @if($errors->has('goal_estime'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_estime') }}
                              </p>
                            @endif
                          </div>
                        </div>                          
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedBudget">Goal-3</label>
                            <input type="text" name="goals[]" id="goals[]" 
                            value="{{ old('goals[]') }}" class="form-control">
                            @if($errors->has('goals'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goals') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-3: Budget</label>
                            <input type="text" name="goal_budget[]" id="goal_budget[]" 
                            value="{{ old('goal_budget[]') }}" class="form-control">
                            @if($errors->has('goal_budget'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_budget') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>                          
                        
                      <div class="row">  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-3: Description</label>
                            <input type="text" name="goal_desc[]" id="goal_desc[]" 
                            value="{{ old('goal_desc[]') }}" class="form-control">
                            @if($errors->has('goal_desc'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_desc') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-3: Estimated Time</label>
                            <input type="text" name="goal_estime[]" id="goal_estime[]" 
                            value="{{ old('goal_estime[]') }}" class="form-control">
                            @if($errors->has('goal_estime'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_estime') }}
                              </p>
                            @endif
                          </div>
                        </div>                          
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedBudget">Goal-4</label>
                            <input type="text" name="goals[]" id="goals[]" 
                            value="{{ old('goals[]') }}" class="form-control">
                            @if($errors->has('goals'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goals') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-4: Budget</label>
                            <input type="text" name="goal_budget[]" id="goal_budget[]" 
                            value="{{ old('goal_budget[]') }}" class="form-control">
                            @if($errors->has('goal_budget'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_budget') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>                          
                        
                      <div class="row">  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-4: Description</label>
                            <input type="text" name="goal_desc[]" id="goal_desc[]" 
                            value="{{ old('goal_desc[]') }}" class="form-control">
                            @if($errors->has('goal_desc'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_desc') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-4: Estimated Time</label>
                            <input type="text" name="goal_estime[]" id="goal_estime[]" 
                            value="{{ old('goal_estime[]') }}" class="form-control">
                            @if($errors->has('goal_estime'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_estime') }}
                              </p>
                            @endif
                          </div>
                        </div>                          
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedBudget">Goal-5</label>
                            <input type="text" name="goals[]" id="goals[]" 
                            value="{{ old('goals[]') }}" class="form-control">
                            @if($errors->has('goals'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goals') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-5: Budget</label>
                            <input type="text" name="goal_budget[]" id="goal_budget[]" 
                            value="{{ old('goal_budget[]') }}" class="form-control">
                            @if($errors->has('goal_budget'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_budget') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>                          
                        
                      <div class="row">  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-5: Description</label>
                            <input type="text" name="goal_desc[]" id="goal_desc[]" 
                            value="{{ old('goal_desc[]') }}" class="form-control">
                            @if($errors->has('goal_desc'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_desc') }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputEstimatedDuration">Goal-5: Estimated Time</label>
                            <input type="text" name="goal_estime[]" id="goal_estime[]" 
                            value="{{ old('goal_estime[]') }}" class="form-control">
                            @if($errors->has('goal_estime'))
                              <p class="help-block text-danger">
                                {{ $errors->first('goal_estime') }}
                              </p>
                            @endif
                          </div>
                        </div>                          
                      </div>

                      <div class="form-group">
                        <label for="inputEstimatedDuration">Comments</label>
                        <input type="number" name="comments" id="comments" 
                        value="{{ old('comments') }}" class="form-control">
                        @if($errors->has('comments'))
                          <p class="help-block text-danger">
                            {{ $errors->first('comments') }}
                          </p>
                        @endif
                      </div>
                    </div>                  
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <input type="submit" value="Create New Project" class="btn btn-success float-centre">
                  </div>
                </div>
                
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
	</div>
@endsection('content')