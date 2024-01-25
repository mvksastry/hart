@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    
    {!! Form::model($holidays, ['method' => 'PUT', 'route' => ['holidays.update', $holidays->holiday_id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body overflow-auto">
				<?php 
							$holidaychoice = array("0" => "Gazetted Holiday", "1"=> "Restricted Holiday");
							$holidaySel = 0;
						?>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('holiday_date', 'Holiday Date*', ['class' => 'control-label']) !!}
                    {!! Form::text('holiday_date', old('holiday_date'), ['class' => 'form-control', 'placeholder' => 'Enter Holiday Date', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('holiday_date'))
                        <p class="help-block">
                            {{ $errors->first('holiday_date') }}
                        </p>
                    @endif
                </div>
            </div>
			
						<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('holiday_name', 'Holiday Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('holiday_name', old('holiday_name'), ['class' => 'form-control', 'placeholder' => 'Enter Holiday Name', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('holiday_name'))
                        <p class="help-block">
                            {{ $errors->first('holiday_name') }}
                        </p>
                    @endif
                </div>
            </div>
						
						<div class="row">
								<div class="col-xs-12 form-group">
                    {!! Form::label('holiday_type', 'Type of Holiday*', ['class' => 'control-label']) !!}
						{!! Form::select('holiday_type', $holidaychoice, $holidaySel, ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('holiday_type'))
                        <p class="help-block">
                            {{ $errors->first('holiday_type') }}
                        </p>
                    @endif
								</div>	
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop