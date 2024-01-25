@extends('layouts.app')

@section('content')
    <h3 class="page-title">Add New Leaves</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['leaverecords.massCLaddition']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body overflow-auto">
			<div class="row">
                <div class="col-xs-12 form-group">
                    <p class="help-block">
						The default 8 annual casual leaves will be added to all employees
					</p>
					
					<p class="help-block">
						The carry forward leaves will be taken as per/user if value more otherwise, the balance available
					</p>
					
					<p class="help-block">
						Cumulative balance limit will be set as per configuration, excess will be deleted
					</p>
                    
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@stop

