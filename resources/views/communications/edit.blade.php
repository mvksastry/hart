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


  <h3 class="page-title">Communications</h3>		
  {!! Form::model($communication, ['method' => 'PUT', 'route' => ['communications.update', $communication->communication_id ]]) !!}
  <div class="panel panel-default">
    <div class="panel-heading">
      @lang('global.app_edit')
    </div>

    <div class="panel-body overflow-auto">
      <div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('name', 'Name:  ', ['class' => 'control-label']) !!}
					{{ ($communication->user)->name }}
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
					<br/>			
						{!! $communication->description !!}
        </div>
      </div>
			
			<div class="row">
        <div class="col-xs-12 form-group">
          {!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
					<br/>	
						<?php $tx = explode(';;;', $communication->comments); ?>
						@foreach($tx as $val)
							{{ ucfirst($val) }}<br/>
						@endforeach
					<h4 class="box-title"><font color="red">Comment:</font>
						<small>Comments will be visible to others</small>
					</h4>
		      {!! Form::text('comments', '', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
          {!! Form::label('filename', 'Existing File', ['class' => 'control-label']) !!} :
					@if($communication->filename != null)
						{{  $communication->filename }}
					@else
						File Not Present
					@endif
					<br/>
				  @hasanyrole('researcher|employee')
						{!! Form::label('filename', 'New File', ['class' => 'control-label']) !!}	
						{!! Form::file('filename', null, [ "enctype" => "multipart/form-data", "file" => "true"]) !!}
						<p class="help-block"></p>
            @if($errors->has('filename'))
              <p class="help-block">
                {{ $errors->first('filename') }}
              </p>
            @endif
					@endhasanyrole
        </div>
      </div>
						
			@role('supervisor')
				<div class="row">
          <div class="col-xs-12 form-group">
            {!! Form::label('decision', 'Supervisor Decision', ['class' => 'control-label']) !!}
						{!! Form::select('sup_app_status', $decision, old('sup_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('sup_app_status'))
              <p class="help-block">
                {{ $errors->first('sup_app_status') }}
              </p>
            @endif
          </div>
        </div> 
			@endrole
						
			@hasanyrole('dean|admin|director')
			  <!-- /.box -->
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><font color="red">Notes:</font>
							<small>These notes will not be visible/editable by others</small>
						</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
						<!-- /. tools -->
					</div>
					<!-- /.box-header -->
					<div class="frm-group">
						
							<textarea id="notes" class="textarea" placeholder="Type Notes here"
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 5px;"></textarea>
					
					</div>
				</div>
						
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('decision', 'Seek Information From', ['class' => 'control-label']) !!}
						<div class="row">									
							<div class="col-xs-2 form-group">
								{!! Form::label('supervisors', 'Supervisors', ['class' => 'control-label']) !!}
								{!! Form::select('supervisors', $supervisors, old('ah_app_status'), ['class' 	=> 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
										
							<div class="col-xs-2 form-group">
								{!! Form::label('decision', 'Section Heads', ['class' => 'control-label']) !!}
								{!! Form::select('section_head', $decision, old('ah_app_status'), ['class' 	=> 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
										
							<div class="col-xs-2 form-group">
								{!! Form::label('decision', 'Tech Department', ['class' => 'control-label']) !!}
								{!! Form::select('tech_dept', $decision, old('ah_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
										
							<div class="col-xs-2 form-group">
								{!! Form::label('decision', 'Administration', ['class' => 'control-label']) !!}
								{!! Form::select('staff', $decision, old('ah_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
										
							<div class="col-xs-2 form-group">
								{!! Form::label('decision', 'Finance', ['class' => 'control-label']) !!}
								{!! Form::select('staff', $decision, old('ah_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
										
							<div class="col-xs-2 form-group">
								{!! Form::label('decision', 'Store & Purchase', ['class' => 'control-label']) !!}
								{!! Form::select('staff', $decision, old('ah_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
										
							<div class="col-xs-2 form-group">
								{!! Form::label('decision', 'Staff', ['class' => 'control-label']) !!}
								{!! Form::select('staff', $decision, old('ah_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
								<p class="help-block"></p>
								@if($errors->has('ah_app_status'))
									<p class="help-block">
										{{ $errors->first('ah_app_status') }}
									</p>
								@endif
							</div>
						</div>									
					</div>
				</div>
							
				<div class="row">
          <div class="col-xs-12 form-group">
            {!! Form::label('decision', 'Decision', ['class' => 'control-label']) !!}
            {!! Form::select('ah_app_status', $decision, old('ah_app_status'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('ah_app_status'))
              <p class="help-block">
                {{ $errors->first('ah_app_status') }}
              </p>
            @endif
          </div>
				</div> 
			@endhasanyrole
    </div>
  </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

