@extends('layouts.app')

@section('content')
	<?php 
		$decision = array("1"=> "none", 
											"2" => "pending", 
											"3" => "returned", 
											"4"=> "rejected", 
											"5"=> "approved", 
											"6"=> "under review"); 
												
		$supervisors = App\User::role('supervisor')->pluck('name', 'id');
	?>

	@foreach($comdetails as $val)
  <h3 class="page-title">Communications</h3>
  {!! Form::open(['method' => 'POST', 'route' => ['comms.decisionupdate', $val->communication_id ]]) !!}
  <div class="panel panel-default">
    <div class="panel-heading">
      Decision
    </div>

    <div class="panel-body overflow-auto">
      <div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('name', 'Name:  ', ['class' => 'control-label']) !!}
					{{ ($val->user)->name }}
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
						{!! $val->description !!}
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
						<?php $tx = explode(';;;', $val->comments); ?>
						<br/>
						@foreach($tx as $valx)
							{{ ucfirst($valx) }}<br/>
						@endforeach
					
        </div>
      </div>
						
      <div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('filename', 'Existing File', ['class' => 'control-label']) !!} :
					@if($val->filename != null)
						{{  $val->filename }}
					@else
						File Not Present
					@endif
					<br/>
        </div>
      </div>
						
				<div class="row">
          <div class="col-xs-12 form-group">
            {!! Form::label('comments', 'Supervisor Comment', ['class' => 'control-label']) !!}
						{!! Form::text('comments', '',['class' => 'form-control', 'placeholder' => 'Comments']) !!}
            <p class="help-block"></p>
            @if($errors->has('comments'))
              <p class="help-block">
                {{ $errors->first('comments') }}
              </p>
            @endif
          </div>
        </div>
				
				<div class="row">
          <div class="col-xs-12 form-group">
            {!! Form::label('decision', 'Supervisor Decision', ['class' => 'control-label']) !!}
						{!! Form::select('decision', $decision, old('decision'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('decision'))
              <p class="help-block">
                {{ $errors->first('decision') }}
              </p>
            @endif
          </div>
        </div> 
				
    </div>
  </div>
	@endforeach
    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

