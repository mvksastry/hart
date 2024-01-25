@extends('layouts.app')

@section('content')
  <h3 class="page-title">@lang('global.users.title')</h3>
    
  {!! Form::model($leavetypes, ['method' => 'PUT', 'route' => ['leavetypes.update', $leavetypes->leavetype_id]]) !!}

  <div class="panel panel-default">
    <div class="panel-heading">
      @lang('global.app_edit')
    </div>
		<?php 
			$gender = array("0" => "All", "1" => "Males Only", "2"=>"Females Only");
			$genderSel = $leavetypes->eligible_gender_id;
		?>
    <div class="panel-body overflow-auto">
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('gender', 'Leave Eligibility*', ['class' => 'control-label']) !!}
					{!! Form::select('eligible_gender_id', $gender, $genderSel, ['class' => 'form-control']) !!}
          <p class="help-block"></p>
          @if($errors->has('eligible_gender_id'))
            <p class="help-block">
              {{ $errors->first('eligible_gender_id') }}
            </p>
          @endif
        </div>
      </div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('eligibleroles', 'Leave Eligible For*', ['class' => 'control-label']) !!}
					{!! Form::select('eligible_role_id', $roles->pluck('name', 'id')->all(), $leavetypes->eligible_role_id, ['class' => 'form-control']) !!}
					<p class="help-block"></p>
					@if($errors->has('eligible_role_id'))
						<p class="help-block">
							{{ $errors->first('eligible_role_id') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('name', 'Leave Name*', ['class' => 'control-label']) !!}
					{!! Form::text('leavetype_name', old('leavetype_name'), ['class' => 'form-control', 'placeholder' => 'Leave type name', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('leavetype_name'))
						<p class="help-block">
							{{ $errors->first('leavetype_name') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('conditions', 'Leave Conditions*', ['class' => 'control-label']) !!}
					{!! Form::text('leave_conditions', old('leave_conditions'), ['class' => 'form-control', 'placeholder' => 'Leave conditions', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('leave_conditions'))
						<p class="help-block">
							{{ $errors->first('leave_conditions') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('limit', 'Leave Limit*', ['class' => 'control-label']) !!}
					{!! Form::text('leave_limit_peryear', old('leave_limit_peryear'), ['class' => 'form-control', 'placeholder' => 'Leave limit per year', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('leave_limit_peryear'))
						<p class="help-block">
							{{ $errors->first('leave_limit_peryear') }}
						</p>
					@endif
				</div>
			</div>
			<?php $choice = array("0" => "No", "1"=> "Yes"); 
					$selected = $leavetypes->carriable;
			?>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('carriable', 'Leave Carry Forward*', ['class' => 'control-label']) !!}
					{!! Form::select('carriable', $choice, $selected, ['class' => 'form-control']) !!}
					<p class="help-block"></p>
					@if($errors->has('carriable'))
						<p class="help-block">
							{{ $errors->first('carriable') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('carrylimit', 'Leave Carry Forward Limit*', ['class' => 'control-label']) !!}
					{!! Form::text('carried_on_limit', old('carried_on_limit'), ['class' => 'form-control', 'placeholder' => 'Leave carry forward limit', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('carried_on_limit'))
						<p class="help-block">
							{{ $errors->first('carried_on_limit') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('ceilinglimit', 'Leave Ceiling Limit*', ['class' => 'control-label']) !!}
					{!! Form::text('cumulative_ceiling', old('cumulative_ceiling'), ['class' => 'form-control', 'placeholder' => 'Total leave ceiling limit', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('cumulative_ceiling'))
						<p class="help-block">
							{{ $errors->first('cumulative_ceiling') }}
						</p>
					@endif
				</div>
			</div>      
    </div>
  </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

