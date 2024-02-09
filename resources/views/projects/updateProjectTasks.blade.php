@extends('layouts.app')
@section('content')
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Update Task</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Update Tasks</li>
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
								  New Event
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
											<form method="POST" action="{{ route('projtasks.store') }}">
												@csrf

                          <div class="row align-items-start">
                            <div class="form-group col">
                              <input type="text" class="form-control form-control-border" 
                              name="goal_id" hidden id="goal_id" value="{{ $taskId->goal }}" placeholder="Goal ID">

                              <input type="text" class="form-control form-control-border" 
                              name="uuid" hidden id="uuid" value="{{ $taskId->desc }}" placeholder="ID">
                            </div>
                          </div>
                     
                          <div class="row align-items-start"> 
                            <div class="form-group col">                          
                              <label for="exampleInputBorderWidth2">Goal:</label>
                              <input type="text" class="form-control form-control-border" 
                                name="goal_name" readonly id="goal_name" value="{{ $taskId->goal->goal }}"  placeholder="Goal Name">
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Description: </label>
                                <input type="text" class="form-control form-control-border" 
                                name="goal_desc" readonly id="goal_desc" value="{{ $taskId->goal->desc }}"  placeholder="Description">
                            </div>
                            <div class="form-group col">                          
                              <label for="exampleInputBorderWidth2">Project ID</label>
                              <input type="text" class="form-control form-control-border" 
                              name="project_id" readonly id="project_id" value="{{ $taskId->project_id }}" placeholder="Project ID">
                            </div>                            
                          </div>

                          <div class="row align-items-start">	
                            <div class="form-group col">
                              {!! Form::label('budget_head', 'Activity*', ['class' => 'control-label']) !!}
                              <p class="help-block">  {{ $taskId->activity }} </p>
                            </div>

                            <div class="form-group col">
                              {!! Form::label('task_desc', 'Description*', ['class' => 'control-label']) !!}
                              <p class="help-block">  {{ $taskId->task_desc }} </p>
                            </div>                                              
                          </div>
                          
                          <div class="row align-items-start"> 
                            @hasexactroles('admin|employee')
                              <div class="form-group col">
                                <label for="taskOwner">Task Owner*</label>
                                <select class="custom-select form-control-border" name="taskowner_id" id="taskowner_id">
                                  <option value="0" >Select</option>
                                  @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                    @if($taskId->taskowner_id == $user->id)
                                      selected
                                    @endif>                                    
                                    {{ $user->name }}
                                    </option>
                                  @endforeach
                                </select>
                                @if($errors->has('holiday_type'))
                                  <p class="help-block text-danger">
                                    {{ $errors->first('holiday_type') }}
                                  </p>
                                @endif
                              </div>
                            @endhasexactroles

                            @hasexactroles('employee')
                              <div class="form-group col">
                                <label for="taskOwner">Task Owner*</label>
                                {{ $taskId->taskowner->name }}
                              </div>
                            @endhasexactroles
                          
                          
                            <div class="form-group col">
                              {!! Form::label('budget', 'Budget Spent*', ['class' => 'control-label']) !!}
                              <input type="text" class="form-control form-control-border" 
                              name="budget" id="budget" value="{{ $taskId->budget }} " placeholder="Budget">
                              <p class="help-block"></p>
                              @if($errors->has('budget'))
                                <p class="help-block">
                                  {{ $errors->first('budget') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              <label for="exampleInputBorderWidth2">Per cent progress</label>
                              <input type="text" class="form-control form-control-border" 
                              name="percent_progress" id="percent_progress" value="{{ $taskId->percent_progress }} " placeholder="Progress">
                              <p class="help-block"></p>
                              @if($errors->has('percent_progress'))
                                <p class="help-block">
                                  {{ $errors->first('percent_progress') }}
                                </p>
                              @endif
                            </div>                             
                          </div>


                          <div class="row align-items-start">	
                                             
                          </div>


                          <div class="row align-items-start">	
                            <div class="form-group col">
                              {!! Form::label('task_start', 'Start Date*', ['class' => 'control-label']) !!}
                              <input type="date" class="form-control form-control-border" 
                              name="task_starts" id="task_starts" value="{{ $taskId->task_starts }}" placeholder="Start Date">
                              <p class="help-block"></p>
                              @if($errors->has('task_starts'))
                                <p class="help-block">
                                  {{ $errors->first('task_starts') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              {!! Form::label('task_ends', 'Completion Date*', ['class' => 'control-label']) !!}
                              <input type="date" class="form-control form-control-border" 
                              name="task_ends" id="task_ends" value="{{ $taskId->task_ends }}" placeholder="Start Date">
                              <p class="help-block"></p>
                              @if($errors->has('task_ends'))
                                <p class="help-block">
                                  {{ $errors->first('task_ends') }}
                                </p>
                              @endif
                            </div>                    
                          </div>


                       
                          <div class="row align-items-start">	
                            <div class="form-group col">
                              {!! Form::label('comment', 'Comment*', ['class' => 'control-label']) !!}
                              {!! Form::text('comment', old('comment'), ['class' => 'form-control','value'=> 'Project being finalized']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('comment'))
                                <p class="help-block">
                                  {{ $errors->first('comment') }}
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

