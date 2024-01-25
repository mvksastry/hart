@extends('layouts.app')
@section('content')
	<?php
	
		$decision = array("0"=> "none", "1"=> "none", 
												"2" => "pending", 
												"3" => "returned", 
												"4"=> "rejected", 
												"5"=> "approved", 
												); 						
		$supervisors = App\User::role('supervisor')->pluck('name', 'id');
	?>
	<h3 class="page-title">Leave Decision</h3>
    
	{!! Form::model($leave, ['method' => 'PUT', 'route' => ['leaves.update', $leave->uuid]]) !!}

	<div class="panel panel-default">
		<div class="panel-heading">
		  @lang('global.app_edit')
		</div>
		<?php 
			$gender = array("0" => "All", "1" => "Males Only", "2"=>"Females Only");
			//$genderSel = $leave->eligible_gender_id;
		?>
		<div class="panel-body overflow-auto">
			<div class="row">
				<div class="col-xs-6 form-group">
					{!! Form::label('leavetype_id', 'Leave Eligibility', ['class' => 'control-label']) !!}
					{!! Form::text('leavetype_id', ($leave->leavetype)->leavetype_name, ['class' => 'form-control', 'placeholder' => 'Leave Start Date', 'required' => '']) !!}
				</div>

				<div class="col-xs-6 form-group">
					{!! Form::label('conditions', 'Name', ['class' => 'control-label']) !!}
					{!! Form::text('leave_name', ($leave->user)->name, ['class' => 'form-control', 'placeholder' => 'Leave Start Date', 'required' => '']) !!}
				</div>
			</div>
			
			@if( ($leave->leavetype)->leavetype_name != "Casual Leave")
				<div class="row">
					<div class="col-xs-6 form-group">
					  {!! Form::label('leave_start', 'Start Date*', ['class' => 'control-label']) !!}
					  {!! Form::text('leave_start', old('leave_start'), ['class' => 'form-control', 'placeholder' => 'Leave Start Date', 'required' => '']) !!}
					  <p class="help-block"></p>
					  @if($errors->has('leave_start'))
						<p class="help-block">
						  {{ $errors->first('leave_start') }}
						</p>
					  @endif
					</div>

					<div class="col-xs-6 form-group">
					  {!! Form::label('leave_end', 'End Date*', ['class' => 'control-label']) !!}
					  {!! Form::text('leave_end', old('leave_end'), ['class' => 'form-control', 'placeholder' => 'Leave End Date', 'required' => '']) !!}
					  <p class="help-block"></p>
						@if($errors->has('leave_end'))
						  <p class="help-block">
							{{ $errors->first('leave_end') }}
						  </p>
						@endif
					</div>
				</div>
			@endif
			
			@if( ($leave->leavetype)->leavetype_name == "Casual Leave")
				<div class="row">
					<div class="col-xs-2 form-group">
						{!! Form::label('leave_start', 'Start Date*', ['class' => 'control-label']) !!}
						{!! Form::text('leave_start', old('leave_start'), ['class' => 'form-control', 'placeholder' => 'Leave Start Date', 'required' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('leave_start'))
						  <p class="help-block">
							{{ $errors->first('leave_start') }}
						  </p>
						@endif
					</div>
		  
					<div class="col-xs-2 form-group">
						{!! Form::label('start', 'Forenoon*', ['class' => 'control-label']) !!}
						<input type="radio" name="start" value="forenoon"
						@if( $leave->leave_start_session == 'forenoon' )
						 checked="checked"
						@endif>
						<p class="help-block"></p>
						@if($errors->has('start'))
						  <p class="help-block">
							{{ $errors->first('start') }}
						  </p>
						@endif
					</div>
					
					<div class="col-xs-2 form-group">
						{!! Form::label('forenoon_start', 'Afternoon*', ['class' => 'control-label']) !!}
						<input type="radio" name="start" value="afternoon"
						@if( $leave->leave_start_session == 'afternoon' )
						 checked="checked"
						@endif						
						>
			
						<p class="help-block"></p>
						@if($errors->has('start'))
						  <p class="help-block">
							{{ $errors->first('start') }}
						  </p>
						@endif
					</div>

					<div class="col-xs-2 form-group">
						{!! Form::label('leave_end', 'End Date*', ['class' => 'control-label']) !!}
						{!! Form::text('leave_end', old('leave_end'), ['class' => 'form-control', 'placeholder' => 'Leave End Date', 'required' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('leave_end'))
						  <p class="help-block">
							{{ $errors->first('leave_end') }}
						  </p>
						@endif
					</div>
					
					<div class="col-xs-2 form-group">
						{!! Form::label('afternoon_start', 'Forenoon*', ['class' => 'control-label']) !!}
							<input type="radio" name="end" value="forenoon"
							@if( $leave->leave_end_session == 'forenoon' )
							 checked="checked"
							@endif	
							>

						<p class="help-block"></p>
						@if($errors->has('end'))
						  <p class="help-block">
							{{ $errors->first('end') }}
						  </p>
						@endif
					</div>
					
					<div class="col-xs-2 form-group">
						{!! Form::label('end', 'Afternoon*', ['class' => 'control-label']) !!}
							<input type="radio" name="end" value="afternoon"
							@if( $leave->leave_end_session == 'afternoon' )
							 checked="checked"
							@endif	
							>
						<p class="help-block"></p>
						@if($errors->has('end'))
						  <p class="help-block">
							{{ $errors->first('end') }}
						  </p>
						@endif
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 form-group">
						Eg. For 1 day Casual Leave, you must check start date forenoon and end date afternoon. <br/>
						Eg. For half day, start date and forenoon, End date and forenoon.<br/>
						Eg. For 1 and 1/2, start date and forenoon, End date and afternoon.<br/>
					</div>
				</div>
				
			@endif	
			
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('leave_reason', 'Reason*', ['class' => 'control-label']) !!}
					{!! Form::text('leave_reason', old('leave_reason'), ['class' => 'form-control', 'placeholder' => 'Leave Reason', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('leave_reason'))
								<p class="help-block">
					  {{ $errors->first('leave_reason') }}
								</p>
					@endif
				</div>
			</div>

			@hasrole('supervisor')
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('decision', 'Supervisor Decision*', ['class' => 'control-label']) !!}
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
			
			@hasrole('dean')
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('decision', 'Dean decision*', ['class' => 'control-label']) !!}
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
			
			@hasrole('admin')
				<div class="row">
					<div class="col-xs-12 form-group">
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
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('decision', 'Director decision*', ['class' => 'control-label']) !!}
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
			
		</div>
	</div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

