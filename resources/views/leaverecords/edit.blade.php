@extends('layouts.app')

@section('content')
	<?php 
		$gender = array("0" => "All", "1" => "Males Only", "2"=>"Females Only");
		$genderSel = $leaverecords->eligible_gender_id;
	?>

    <h3 class="page-title">Leave Record</h3>
    
    {!! Form::model($leaverecords, ['method' => 'PUT', 'route' => ['leaverecords.update', $leaverecords->leaverecord_id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        <div class="panel-body overflow-auto">
						<?php 
							$choice = array("0" => "No", "1"=> "Yes");
							$yesNosel = 0;
							$gender = array("0" => "All", "1" => "Males Only", "2"=>"Females Only");
							$genderSel = 0;
						?>
						<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('employee_id', 'Researcher', ['class' => 'control-label']) !!}
										{!! Form::text('employee_id', ($leaverecords->user)->name, ['class' => 'form-control']) !!}
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
                    {!! Form::label('eligibleroles', 'Eligible Leave Type*', ['class' => 'control-label']) !!}
										{!! Form::select('eligible_leavetype_id', $leavetypes->pluck('leavetype_name', 'leavetype_id')->all(), 2, ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('eligible_leavetype_id'))
                        <p class="help-block">
                            {{ $errors->first('eligible_leavetype_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_balance', 'Current Year Credit*', ['class' => 'control-label']) !!}
                    {!! Form::text('current_year_credit', old('current_year_credit'), ['class' => 'form-control', 'placeholder' => 'Current year credit', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_year_credit'))
                        <p class="help-block">
                            {{ $errors->first('current_year_credit') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

