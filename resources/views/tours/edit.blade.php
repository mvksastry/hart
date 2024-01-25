@extends('layouts.app')

@section('content')
	<?php 
		$tadachoice = array("0" => "No", "1"=> "Yes");
		$tadaSel = 0;
		$journeychoice = array("1" => "Air", "2"=> "Train", "3"=> "Road");
		$journeySel = 0;
	?>
  <h3 class="page-title">@lang('global.users.title')</h3>
    
  {!! Form::model($tourdetails, ['method' => 'PUT', 'route' => ['tourdetails.update', $tourdetails->tour_id]]) !!}

  <div class="panel panel-default">
    <div class="panel-heading">
      @lang('global.app_edit')
    </div>
				
    <div class="panel-body overflow-auto">
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('employee_id', 'Researcher ID*', ['class' => 'control-label']) !!}
          {!! Form::text('employee_id', old('employee_id'), ['class' => 'form-control', 'placeholder' => 'Enter Researcher ID', 'required' => '']) !!}
          <p class="help-block"></p>
            @if($errors->has('employee_id'))
              <p class="help-block">
                {{ $errors->first('employee_id') }}
              </p>
            @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('designation', 'Designation*', ['class' => control-label']) !!}
          {!! Form::text('designation', old('designation'), ['class' => 'form-control', 'placeholder' => 'Enter your designation', 'required' => '']) !!}
          <p class="help-block"></p>
            @if($errors->has('designation'))
              <p class="help-block">
                {{ $errors->first('designation') }}
              </p>
            @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('basic_pay', 'Basic Pay*', ['class' => 'control-label']) !!}
          {!! Form::text('basic_pay', old('basic_pay'), ['class' => 'form-control', 'placeholder' => 'Basic Pay', 'required' => '']) !!}
          <p class="help-block"></p>
            @if($errors->has('basic_pay'))
              <p class="help-block">
                {{ $errors->first('basic_pay') }}
              </p>
            @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('tour_purpose', 'Purpose of Tour*', ['class' => 'control-label']) !!}
          {!! Form::text('tour_purpose', old('tour_purpose'), ['class' => 'form-control', 'placeholder' => 'Enter your designation', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('tour_purpose'))
            <p class="help-block">
              {{ $errors->first('tour_purpose') }}
            </p>
            @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('journey_mode', 'Mode of Journey*', ['class' => 'control-label']) !!}
					{!! Form::select('journey_mode', $journeychoice, $journeySel, ['class' => 'form-control']) !!}
          <p class="help-block"></p>
          @if($errors->has('journey_mode'))
            <p class="help-block">
              {{ $errors->first('journey_mode') }}
            </p>
          @endif
        </div>
      </div>
						
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('journey_class', 'Class of Journey*', ['class' => 'control-label']) !!}
          {!! Form::text('journey_class', old('journey_class'), ['class' => 'form-control', 'placeholder' => 'Enter class of Journey', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('journey_class'))
            <p class="help-block">
              {{ $errors->first('journey_class') }}
            </p>
          @endif
        </div>
      </div>
						
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('dep_station', 'Departure Station*', ['class' => 'control-label']) !!}
          {!! Form::text('dep_station', old('dep_station'), ['class' => 'form-control', 'placeholder' => 'Departure Station', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('dep_station'))
            <p class="help-block">
              {{ $errors->first('dep_station') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('dep_station_date', 'Departure date*', ['class' => 'control-label']) !!}
          {!! Form::text('dep_station_date', old('dep_station_date'), ['class' => 'form-control', 'placeholder' => 'Departure Date', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('dep_station_date'))
            <p class="help-block">
              {{ $errors->first('dep_station_date') }}
						</p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('dep_station_time', 'Departure Time*', ['class' => 'control-label']) !!}
          {!! Form::text('dep_station_time', old('dep_station_time'), ['class' => 'form-control', 'placeholder' => 'Departure Time', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('dep_station_time'))
            <p class="help-block">
              {{ $errors->first('dep_station_time') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('destination', 'Departure *', ['class' => 'control-label']) !!}
          {!! Form::text('destination', old('destination'), ['class' => 'form-control', 'placeholder' => 'Destination Arrival Station', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('destination'))
            <p class="help-block">
              {{ $errors->first('destination') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('dest_arr_date', 'Dest. Arrival date*', ['class' => 'control-label']) !!}
          {!! Form::text('dest_arr_date', old('dest_arr_date'), ['class' => 'form-control', 'placeholder' => 'Destination Station arrival Date', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('dest_arr_date'))
            <p class="help-block">
              {{ $errors->first('dest_arr_date') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('dest_arr_time', 'Dest. Arrival Time*', ['class' => 'control-label']) !!}
          {!! Form::text('dest_arr_time', old('dest_arr_time'), ['class' => 'form-control', 'placeholder' => 'Destination Station arrival Time', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('dest_arr_time'))
						<p class="help-block">
              {{ $errors->first('dest_arr_time') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('rj_station', 'Return Journey Departure Station*', ['class' => 'control-label']) !!}
          {!! Form::text('rj_station', old('rj_station'), ['class' => 'form-control', 'placeholder' => 'Return Journey Departure Station', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('rj_station'))
            <p class="help-block">
              {{ $errors->first('rj_station') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('rj_station_date', 'Return Journey Departure_date*', ['class' => 'control-label']) !!}
          {!! Form::text('rj_station_date', old('rj_station_date'), ['class' => 'form-control', 'placeholder' => 'Return Journey Departure Date', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('rj_station_date'))
            <p class="help-block">
              {{ $errors->first('rj_station_date') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('rj_station_time', 'Return Journey Time*', ['class' => 'control-label']) !!}
          {!! Form::text('rj_station_time', old('rj_station_time'), ['class' => 'form-control', 'placeholder' => 'Return Journey Departure Time', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('rj_station_time'))
            <p class="help-block">
              {{ $errors->first('rj_station_time') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
					{!! Form::label('rj_origin', 'Return Journey Station Arrival *', ['class' => 'control-label']) !!}
          {!! Form::text('rj_origin', old('rj_origin'), ['class' => 'form-control', 'placeholder' => 'Return Journey Station Arrival', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('rj_origin'))
            <p class="help-block">
							{{ $errors->first('rj_origin') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('rj_origin_arr_date', 'Return Journey station arrival date*', ['class' => 'control-label']) !!}
          {!! Form::text('rj_origin_arr_date', old('rj_origin_arr_date'), ['class' => 'form-control', 'placeholder' => 'Return Journey Station Arrival Date', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('rj_origin_arr_date'))
            <p class="help-block">
              {{ $errors->first('rj_origin_arr_date') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('rj_origin_arr_time', 'Return Journey Station arrival Time*', ['class' => 'control-label']) !!}
          {!! Form::text('rj_origin_arr_time', old('rj_origin_arr_time'), ['class' => 'form-control', 'placeholder' => 'Destination Station arrival Time', 'required' => '']) !!}
          <p class="help-block"></p>
          @if($errors->has('rj_origin_arr_time'))
            <p class="help-block">
              {{ $errors->first('rj_origin_arr_time') }}
            </p>
          @endif
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('tada_advance', 'TA/DA required*', ['class' => 'control-label']) !!}
					{!! Form::select('tada_advance', $tadachoice, $tadaSel, ['class' => 'form-control']) !!}
          <p class="help-block"></p>
          @if($errors->has('tada_advance'))
            <p class="help-block">
              {{ $errors->first('tada_advance') }}
            </p>
          @endif
				</div>
      </div>
    </div>
  </div>
  {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
@stop

