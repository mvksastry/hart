@extends('layouts.app')
@section('content')
	<?php
		$decision = array("0"=> "none", "1"=> "none", 
												"2" => "pending", 
												"3" => "returned", 
												"4"=> "rejected", 
												"5"=> "approved", 
												); 											
		$supervisors = App\Models\User::role('supervisor')->pluck('name', 'id');
	?>
  
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
  
  	<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						@if($errors->has('error'))
							<p class="help-block text-danger">
								<h4 class="m-3 text-danger">{{ $errors->first('error') }}</h4>
							</p>
						@else
							<h1 class="m-0">Home: Edit Leave</h1>
						@endif
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Edit Leave</li>
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
          <section class="col-lg-12 connectedSortable">
            <!-- Left col -->
              <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Edit Leave: {{ $leave->leavetype->leavetype_name }} By {{ $leave->user->name }}
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
                      {!! Form::model($leave, ['method' => 'PUT', 'route' => ['leaves.update', $leave->uuid]]) !!}
                        <?php 
                          $gender = array("0" => "All", "1" => "Males Only", "2"=>"Females Only");
                          //$genderSel = $leave->eligible_gender_id;
                        ?>
                        <input type="hidden" id="leavetype_id" name="leavetype_id" value="{{ $leave->leavetype_id }}">
                        @if( ($leave->leavetype)->leavetype_name != "Casual Leave")
                          
                            <div class="col-md-12 form-group">
                              <label for="inputEstimatedBudget">Start Date*</label>
                          
                              {!! Form::text('leave_start', old('leave_start'), ['class' => 'form-control', 'placeholder' => 'Leave Start Date', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('leave_start'))
                                <p class="help-block">
                                  {{ $errors->first('leave_start') }}
                                </p>
                              @endif
                            </div>

                            <div class="col-md-12 form-group">
                              <label for="inputEstimatedBudget">End Date**</label>
                              {!! Form::label('leave_end', 'End Date*', ['class' => 'control-label']) !!}
                              {!! Form::text('leave_end', old('leave_end'), ['class' => 'form-control', 'placeholder' => 'Leave End Date', 'required' => '']) !!}
                              <p class="help-block"></p>
                                @if($errors->has('leave_end'))
                                  <p class="help-block">
                                    {{ $errors->first('leave_end') }}
                                  </p>
                                @endif
                            </div>
                          
                        @endif
                        
                        @if( ($leave->leavetype)->leavetype_name == "Casual Leave" )
                        
                        
                        <div class="row">
                        
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputName">Start Date*</label>
                              <input type="date" name="leave_start" id="leave_start" 
                              class="form-control" value="{{ $leave->leave_start }}">
                              <p class="help-block"></p>
                              @if($errors->has('leave_start'))
                                <p class="help-block">
                                  {{ $errors->first('leave_start') }}
                                </p>
                              @endif
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputName">Forenoon</label>
                              </br>
                              <input type="radio" name="start" id="start" 
                              value="forenoon"
                              @if( $leave->leave_start_session == 'forenoon' )
                               checked="checked"
                              @endif
                              >
                              <p class="help-block"></p>
                              @if($errors->has('start'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('start') }}
                                </p>
                              @endif
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputEstimatedBudget">Afternoon</label>
                              </br>
                              <input type="radio" name="start" id="start" 
                               value="afternoon"
                              @if( $leave->leave_start_session == 'afternoon' )
                               checked="checked"
                              @endif
                              >
                              <p class="help-block"></p>
                              @if($errors->has('start'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('start') }}
                                </p>
                              @endif
                            </div>
                          </div> 
                          
                        </div>
 

                        <div class="row">
                        
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputName">End Date*</label>
                              <input type="date" name="leave_end" id="leave_end" 
                              class="form-control" value="{{ $leave->leave_end }}">
                              <p class="help-block"></p>
                              @if($errors->has('leave_end'))
                                <p class="help-block">
                                  {{ $errors->first('leave_end') }}
                                </p>
                              @endif
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputName">Forenoon*</label>
                              </br>
                              <input type="radio" name="end" id="end" 
                              value="forenoon"
                              @if( $leave->leave_start_session == 'forenoon' )
                               checked="checked"
                              @endif
                              >
                              <p class="help-block"></p>
                              @if($errors->has('end'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('end') }}
                                </p>
                              @endif
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputEstimatedBudget">Afternoon</label>
                              </br>
                              <input type="radio" name="end" id="end" 
                               value="afternoon"
                              @if( $leave->leave_start_session == 'afternoon' )
                               checked="checked"
                              @endif
                              >
                              <p class="help-block"></p>
                              @if($errors->has('end'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('end') }}
                                </p>
                              @endif
                            </div>
                          </div> 
                          
                        </div>
                                
                          <div class="row">
                            <div class="col-md-12 form-group">
                              Eg. For 1 day Casual Leave, you must check start date forenoon and end date afternoon. <br/>
                              Eg. For half day, start date and forenoon, End date and forenoon.<br/>
                              Eg. For 1 and 1/2, start date and forenoon, End date and afternoon.<br/>
                            </div>
                          </div>
                          
                        @endif	
                        
                        
                          <div class="col-md-12 form-group">
                            {!! Form::label('leave_reason', 'Reason*', ['class' => 'control-label']) !!}
                            {!! Form::text('leave_reason', old('leave_reason'), ['class' => 'form-control', 'placeholder' => 'Leave Reason', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('leave_reason'))
                              <p class="help-block">
                                {{ $errors->first('leave_reason') }}
                              </p>
                            @endif
                          </div>
                        
                        
                        @hasrole('supervisor')
                          @if($leave->employee_id != Auth::id())
                          
                            <div class="col-md-12 form-group">
                              {!! Form::label('decision', 'Supervisor Decision*', ['class' => 'control-label']) !!}
                              {!! Form::select('decision', $decision, 2, ['class' => 'form-control', 'placeholder' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('decision'))
                                <p class="help-block">
                                  {{ $errors->first('decision') }}
                                </p>
                              @endif
                            </div>
                          
                          @endif
                        @endhasrole
                        
                        @hasrole('admin')
                          <div class="row">
                            <div class="col-md-12 form-group">
                              {!! Form::label('decision', 'Administration decision*', ['class' => 'control-label']) !!}
                              {!! Form::select('decision', $decision, 2, ['class' => 'form-control', 'placeholder' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('decision'))
                                <p class="help-block">
                                  {{ $errors->first('decision') }}
                                </p>
                              @endif
                            </div>
                          </div>
                        @endhasrole
                        
                        @hasrole('director')
                          
                            <div class="col-md-12 form-group">
                              {!! Form::label('decision', 'Director decision*', ['class' => 'control-label']) !!}
                              {!! Form::select('decision', $decision, 2, ['class' => 'form-control', 'placeholder' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('decision'))
                                <p class="help-block">
                                  {{ $errors->first('decision') }}
                                </p>
                              @endif
                            </div>
                          
                        @endhasrole
                      
                        {!! Form::submit(trans('Update'), ['class' => 'btn btn-info']) !!}
                      {!! Form::close() !!}               
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
  </div><!-- /.row (main row) -->
<!-- //////////////////////////////////////// -->	
@endsection('content')

