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
											<h3 class="card-title">All Inputs Mandatory</h3>
										</div>
										<!-- /.card-header -->
                    
										<div class="card-body">  
                      {!! Form::open(['method' => 'POST', 'route' => ['employees.store']]) !!}

                        <div class="form-group col">
                          {!! Form::label('tour_purpose', 'Purpose*', ['class' => 'control-label']) !!}
                          {!! Form::text('tour_purpose', old('tour_purpose'), ['class' => 'form-control', 'placeholder' => 'Enter Purpose', 'required' => '']) !!}
                          <p class="help-block"></p>
                          @if($errors->has('tour_purpose'))
                            <p class="help-block">
                              {{ $errors->first('tour_purpose') }}
                            </p>
                          @endif
                        </div>
                        <div class="container">
                          <div class="row align-items-start">						
                            <div class="form-group col">
                              {!! Form::label('journey_mode', 'Mode of Journey*', ['class' => 'control-label']) !!}
                              {!! Form::select('journey_mode', $class, $classSel, ['class' => 'form-control']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('journey_mode'))
                                <p class="help-block">
                                  {{ $errors->first('journey_mode') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              {!! Form::label('journey_class', 'Class of Journey*', ['class' => 'control-label']) !!}
                              {!! Form::text('journey_class', old('journey_class'), ['class' => 'form-control', 'placeholder' => 'Class of Journey', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('journey_class'))
                                <p class="help-block">
                                  {{ $errors->first('journey_class') }}
                                </p>
                              @endif
                            </div>

                            <div class="form-group col">
                              {!! Form::label('tada_advance', 'Advance*', ['class' => 'control-label']) !!}
                              {!! Form::select('tada_advance', $tadachoice, $tadaSel, ['class' => 'form-control']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('tada_advance'))
                                <p class="help-block">
                                  {{ $errors->first('tada_advance') }}
                                </p>
                              @endif
                            </div>
                           
                            <div class="form-group col">
                              {!! Form::label('budget_head', 'Budget*', ['class' => 'control-label']) !!}
                              {!! Form::text('budget_head', '', ['class' => 'form-control']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('budget_head'))
                                <p class="help-block">
                                  {{ $errors->first('budget_head') }}
                                </p>
                              @endif
                            </div>
                           </div>
                        </div>                       

                        <div class="form-group">
                          <h4> Out-ward Journey </h4>
                        </div>
				
                        <div class="container">
                          <div class="row align-items-start">							
            
                            <div class="form-group col">
                              {!! Form::label('dep_station', 'Departure*', ['class' => 'control-label']) !!}
                              {!! Form::text('dep_station', old('dep_station'), ['class' => 'form-control', 'placeholder' => 'Departure Station', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('dep_station'))
                                <p class="help-block">
                                  {{ $errors->first('dep_station') }}
                                </p>
                              @endif
                            </div>
                    
                            <div class="form-group col">
                              {!! Form::label('dep_station_date', 'Date*', ['class' => 'control-label']) !!}
                              {!! Form::date('dep_station_date', old('dep_station_date'), ['class' => 'form-control', 'placeholder' => 'Departure Date', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('dep_station_date'))
                                <p class="help-block">
                                  {{ $errors->first('dep_station_date') }}
                                </p>
                              @endif
                            </div>
                
                            <div class="form-group col">
                              {!! Form::label('dep_station_time', 'Time*', ['class' => 'control-label']) !!}
                              {!! Form::text('dep_station_time', old('dep_station_time'), ['class' => 'form-control', 'placeholder' => 'Departure Time', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('dep_station_time'))
                                <p class="help-block">
                                  {{ $errors->first('dep_station_time') }}
                                </p>
                              @endif
                            </div>
                            
                          </div>
                        </div>
                    
                        <div class="container">
                          <div class="row align-items-start">							
                        
                            <div class="form-group col">
                              {!! Form::label('destination', 'Arrival*', ['class' => 'control-label']) !!}
                              {!! Form::text('destination', old('destination'), ['class' => 'form-control', 'placeholder' => 'Destination', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('destination'))
                                <p class="help-block">
                                  {{ $errors->first('destination') }}
                                </p>
                              @endif
                            </div>
                              
                            <div class="form-group col">
                              {!! Form::label('dest_arr_date', 'Date*', ['class' => 'control-label']) !!}
                              {!! Form::date('dest_arr_date', old('dest_arr_date'), ['class' => 'form-control', 'placeholder' => 'Destination Arrival', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('dest_arr_date'))
                                <p class="help-block">
                                  {{ $errors->first('dest_arr_date') }}
                                </p>
                              @endif
                            </div>
                
                            <div class="form-group col">
                              {!! Form::label('dest_arr_time', 'Time*', ['class' => 'control-label']) !!}
                              {!! Form::text('dest_arr_time', old('dest_arr_time'), ['class' => 'form-control', 'placeholder' => 'Destination Arrival Time', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('dest_arr_time'))
                                <p class="help-block">
                                  {{ $errors->first('dest_arr_time') }}
                                </p>
                              @endif
                            </div>
                            
                          </div>
                        </div>				
			
                        
                        <div class="form-group">
                          <h4> In-ward Journey </h4>
                        </div>

                        <div class="container">
                          <div class="row align-items-start">	
                          
                            <div class="form-group col">
                              {!! Form::label('rj_station', 'Departure*', ['class' => 'control-label']) !!}
                              {!! Form::text('rj_station', old('rj_station'), ['class' => 'form-control', 'placeholder' => 'RJ Dep Station', 'required' => '']) !!}
                              <p class="help-block"></p>
                                @if($errors->has('rj_station'))
                                  <p class="help-block">
                                    {{ $errors->first('rj_station') }}
                                  </p>
                                @endif
                            </div>
              
                            <div class="form-group col">
                              {!! Form::label('rj_station_date', 'Date*', ['class' => 'control-label']) !!}
                              {!! Form::date('rj_station_date', old('rj_station_date'), ['class' => 'form-control', 'placeholder' => 'RJ Dep Date', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('rj_station_date'))
                                <p class="help-block">
                                  {{ $errors->first('rj_station_date') }}
                                </p>
                              @endif
                            </div>
              
                            <div class="form-group col">
                              {!! Form::label('rj_station_time', 'Time*', ['class' => 'control-label']) !!}
                              {!! Form::text('rj_station_time', old('rj_station_time'), ['class' => 'form-control', 'placeholder' => 'RJ Dep. Time', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('rj_station_time'))
                                <p class="help-block">
                                  {{ $errors->first('rj_station_time') }}
                                </p>
                              @endif
                            </div>
                            
                          </div>
                        </div>
                    
                        <div class="container">
                          <div class="row align-items-start">                    
                        
                            <div class="form-group col">
                              {!! Form::label('rj_origin', 'Arrival*', ['class' => 'control-label']) !!}
                              {!! Form::text('rj_origin', old('rj_origin'), ['class' => 'form-control', 'placeholder' => 'Home Arrival', 'required' => '']) !!}
                              <p class="help-block"></p>
                                @if($errors->has('rj_origin'))
                                  <p class="help-block">
                                    {{ $errors->first('rj_origin') }}
                                  </p>
                                @endif
                            </div>
              
                            <div class="form-group col">
                              {!! Form::label('rj_origin_arr_date', 'Date*', ['class' => 'control-label']) !!}
                              {!! Form::date('rj_origin_arr_date', old('rj_origin_arr_date'), ['class' => 'form-control', 'placeholder' => 'Home Arr. Date', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('rj_origin_arr_date'))
                                <p class="help-block">
                                  {{ $errors->first('rj_origin_arr_date') }}
                                </p>
                              @endif
                            </div>
                                  
                            <div class="form-group col">
                              {!! Form::label('rj_origin_arr_time', 'Time*', ['class' => 'control-label']) !!}
                              {!! Form::text('rj_origin_arr_time', old('rj_origin_arr_time'), ['class' => 'form-control', 'placeholder' => 'Home Arr. Time', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has('rj_origin_arr_time'))
                                <p class="help-block">
                                  {{ $errors->first('rj_origin_arr_time') }}
                                </p>
                              @endif
                            </div>
                            
                          </div>
                        </div>
                    
                        <div class="row">
                        </div>
				
      
                        {!! Form::submit(trans('SAVE'), ['class' => 'btn btn-info']) !!}
                      {!! Form::close() !!}
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

