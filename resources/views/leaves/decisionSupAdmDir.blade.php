@extends('layouts.app')

@section('content')
	<?php
			$supDecision = array(   			
												"3" => "Returned", 
												"5" => "Approved",
												"6" => "Forwarded",
												);
												
			$decision = array(   			
												"2" => "Pending",		"3" => "Returned", 
												"4" => "Rejected",	"5" => "Approved", 
												"6" => "Forwarded", "7" => "Under Review",
												"9" => "Notified", 	"9" => "Sealed" );
												
			$supervisors = App\User::role('supervisor')->pluck('name', 'id');
		?>
	
@foreach($leavedetails as $leave)
  <h3 class="page-title">Leave Decision</h3>
  {!! Form::open(['method' => 'POST', 'route' => ['leave.decisionupdate', $leave->uuid ]]) !!}  

		<div class="panel panel-default">
			<div class="panel-heading">
				Path &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php 
								$string = "";
								$arrows = " >> ";
								foreach($bcrumb as $k => $valx) 
								{ 
						?>
								<strong>{{ $arrows }}</strong>
									@if($valx == "complete")
										<font color="blue"><strong>
									@else
										<font color="red"><strong>
									@endif
									{{ $k }}
								</strong></font>
							<?php } ?>
			</div>
			<?php 
				$gender = array("0" => "All", "1" => "Males Only", "2"=>"Females Only");
				//$genderSel = $leave->eligible_gender_id;
			?>
			<div class="panel-body overflow-auto">
				<div class="row">
					<div class="col-xs-6 form-group">
						{!! Form::label('leavetype_id', 'Leave Applied For', ['class' => 'control-label']) !!}
						<br/>
						{{ ($leave->leavetype)->leavetype_name }}
					</div>

					<div class="col-xs-6 form-group">
						{!! Form::label('conditions', 'Name', ['class' => 'control-label']) !!}
						<br/>
						{{ ($leave->user)->name }}
					</div>
				</div>
			
				@if( ($leave->leavetype)->leavetype_name != "Casual Leave")
					<div class="row">
						<div class="col-xs-6 form-group">
							{!! Form::label('leave_start', 'Start Date*', ['class' => 'control-label']) !!}
							<br/>
							{{ $leave->leave_start }}
						</div>

						<div class="col-xs-6 form-group">
							{!! Form::label('leave_end', 'End Date*', ['class' => 'control-label']) !!}
							<br/>
							{{ $leave->leave_end }}
						</div>
					</div>
				@endif
			
				@if( ($leave->leavetype)->leavetype_name == "Casual Leave")
					<div class="row">
						<div class="col-xs-2 form-group">
							{!! Form::label('leave_start', 'Start Date*', ['class' => 'control-label']) !!}
							<br/>
							{{ $leave->leave_start }}
						</div>
          
						<div class="col-xs-2 form-group">
							{!! Form::label('start', 'Forenoon*', ['class' => 'control-label']) !!}
							<input type="radio" name="start" value="forenoon"
								@if( $leave->leave_start_session == 'forenoon' )
									checked="checked"
								@endif
							>
						</div>
					
						<div class="col-xs-2 form-group">
							{!! Form::label('forenoon_start', 'Afternoon*', ['class' => 'control-label']) !!}
							<input type="radio" name="start" value="afternoon"
								@if( $leave->leave_start_session == 'afternoon' )
									checked="checked"
								@endif						
							>
						</div>

						<div class="col-xs-2 form-group">
							{!! Form::label('leave_end', 'End Date*', ['class' => 'control-label']) !!}
							<br/>
							{{ $leave->leave_end }}
						</div>
					
						<div class="col-xs-2 form-group">
							{!! Form::label('afternoon_start', 'Forenoon*', ['class' => 'control-label']) !!}
							<input type="radio" name="end" value="forenoon"
								@if( $leave->leave_end_session == 'forenoon' )
									checked="checked"
								@endif	
							>
						</div>
					
						<div class="col-xs-2 form-group">
							{!! Form::label('end', 'Afternoon*', ['class' => 'control-label']) !!}
							<input type="radio" name="end" value="afternoon"
								@if( $leave->leave_end_session == 'afternoon' )
									checked="checked"
								@endif	
							>
						</div>
					</div>
				
					<div class="row">
						<div class="col-xs-12 form-group">
							Eg. For 1 day Casual Leave, you must check start date forenoon and same end date afternoon. <br/>
							Eg. For half day, forenoon Casual Leave, Start date and forenoon, End date and forenoon.<br/>
							Eg. For 1 and 1/2, start date and forenoon, End date and forenoon.<br/>
						</div>
					</div>
				@endif
				
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('leave_reason', 'Reason*', ['class' => 'control-label']) !!}
						<br/>
						{{ $leave->leave_reason }}
					</div>
				</div>
				
				<div class="row">
          <div class="col-xs-12 form-group">
						<?php $cx = explode(";;;", $leave->comments); ?>
            {!! Form::label('comments', 'Comment', ['class' => 'control-label']) !!}
						<small>This is visible to others</small>
						
						<br/>
							@foreach($cx as $val)
								{{ ucfirst($val) }} <br/>
							@endforeach
							<br/>
						{!! Form::text('comments', '',['class' => 'form-control', 'placeholder' => 'Comments']) !!}
            <p class="help-block"></p>
            @if($errors->has('comments'))
              <p class="help-block">
                {{ $errors->first('comments') }}
              </p>
            @endif
          </div>
        </div>
				
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><font color="red">Notes:</font>
							<small>This is not visible/editable by others</small>
						</h3>
						<div class="row">
							<div class="col-xs-12 form-group">
								{!! Form::label('notes', 'Running Notes', ['class' => 'control-label']) !!} :
								<?php $txx = explode(';;;', $leave->notes); ?>
								<br/>
								@foreach($txx as $valy)
									{!!  ucfirst($valy) !!}<br/>
								@endforeach		
								<br/>
							</div>
						</div>
					</diV>
				</diV>


			@hasanyrole('dean|admin|director')
			  <!-- /.box -->
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><font color="red">Enter Notes:</font>
							<small>This is not visible/editable by others</small>
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
					<div class="box-body pad">
						<textarea name="notes" class="textarea" placeholder="Type Notes here"
              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-2 form-group">
						{!! Form::label('path', 'Default Path*', ['class' => 'control-label']) !!}
							<input type="radio" name="path" value="default">
            
							<p class="help-block"></p>
							@if($errors->has('start'))
								<p class="help-block">
									{{ $errors->first('start') }}
								</p>
							@endif
							<br/>
					</div>
					
					<div class="col-xs-10 form-group">
							<?php 
								$string = "";
								$arrows = " >> ";
								foreach($bcrumb as $k => $valx) 
								{ 
							?>
								<strong>{{ $arrows }}</strong>
									@if($valx == "complete")
										<font color="blue"><strong>
									@else
										<font color="red"><strong>
									@endif
									{{ $k }} 
								</strong></font>
							<?php } ?>
					</div>
				</div>
				<div class="row">
					
					<div class="col-xs-2 form-group">
						{!! Form::label('path', 'Include In Path*', ['class' => 'control-label']) !!}
						<input type="radio" name="path" value="include">
            
						<p class="help-block"></p>
						@if($errors->has('path'))
							<p class="help-block">
								{{ $errors->first('path') }}
							</p>
						@endif
					</div>
					
					<div class="col-xs-10 form-group">
						@foreach($userGroup as $key => $val)
							<?php 
										$groupc = array();
									foreach($val as $key1 => $row)
									{ 
										$groupc[$row->id] = ucfirst($row->name);
									}
							?>
							<div class="row">
								<div class="col-xs-2 form-group">
									{!! Form::label('num', 'S. No', ['class' => 'control-label']) !!}
									{!! Form::text('groupd['.ucfirst($key).'][]', '', ['class' => 'form-control', 'placeholder' => '']) !!}
								</div>
								<div class="col-xs-4 form-group">
									{!! Form::label('decision', ucfirst($key), ['class' => 'control-label']) !!}
									{!! Form::select('groupd['.ucfirst($key).'][]', $groupc, 0, ['class' 	=> 'form-control', 'placeholder' => '']) !!}
									<?php unset($groupc); ?>
									<p class="help-block"></p>
									@if($errors->has('ah_app_status'))
										<p class="help-block">
											{{ $errors->first('ah_app_status') }}
										</p>
									@endif	
								</div>
								<div class="col-xs-1 form-group">
									{!! Form::label('num', 'Notes', ['class' => 'control-label']) !!}
									<br/>
									{!! Form::checkbox('groupd['.ucfirst($key).'][]', 'yes', false, ['value' => 'yes']) !!}
								</div>
					
								<div class="col-xs-6 form-group">
								</div>
							</div>
						@endforeach	
					</div>	
				</diV>
			@endhasanyrole
			
				@hasrole('supervisor')
					<div class="row">
						<div class="col-xs-12 form-group">
							{!! Form::label('decision', 'Supervisor Decision*', ['class' => 'control-label']) !!}
							{!! Form::select('decision', $supDecision, 2, ['class' => 'form-control', 'placeholder' => '']) !!}
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
@endforeach
    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

