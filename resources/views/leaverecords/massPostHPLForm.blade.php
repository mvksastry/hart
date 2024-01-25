@extends('layouts.app')

@section('content')
    <h3 class="page-title">Add New Leaves</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['leaverecords.addNewHPLs']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body overflow-auto">
			<div class="row">
                <div class="col-xs-12 form-group">
                    <p class="help-block">
						The default 10 half yearly, Half-Pay-Leaves will be added to all employees
					</p>
					
					<p class="help-block">
						Carry forward will be as per rules. No Limit to HP Leaves will be appliled.
					</p>
					
					<p class="help-block">
						This operation is uneditable.
					</p>
                    
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@stop

