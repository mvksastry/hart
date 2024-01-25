@extends('layouts.app')

@section('content')

<?php 
	$tadachoice = array("0" => "No", "1"=> "Yes");
	$tadaSel = 0;
	$journeychoice = array("1" => "Road", "2"=> "Train", "3"=> "Air");
	$journeySel = 0;
	$decision = array("1"=> "None", "2" => "Pending", "3" => "Returned", "4"=> "Rejected", "5"=> "Approved"); 
	$defDecision = 2;
?>

	@foreach($tourdetails as $tourdetail)
    <h3 class="page-title">Tour</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['tourdetails.decisionupdate', $tourdetail->uuid]]) !!}

    <div class="panel panel-default">
      <div class="panel-heading">
            Approval Path &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
        
      <div class="panel-body overflow-auto">
				<div class="row">
          <div class="col-xs-2 form-group">
            {!! Form::label('purpose_of_tour', 'Purpose of Tour', ['class' => 'control-label']) !!}
						<br/>
            {{ $tourdetail->tour_purpose }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('mode_of_journey', 'Mode of Journey', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->journey_mode }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('class_of_journey', 'Class of Journey', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->journey_class }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('tada_advance_required', 'TA/DA Adv. Required', ['class' => 'control-label']) !!}
						<br/>
						{{ $tadachoice[$tourdetail->tada_advance] }}
          </div>
					
					<div class="col-xs-4 form-group">
            {!! Form::label('budget_head', 'Budget Head', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->budget_head }}
          </div>
				</div>
				
				<div class="row">
					<div class="col-xs-6 form-group">
						Departure Details
					</div>
						
					<div class="col-xs-6 form-group">
						Destination Arrival Details
					</div>
				</div>
						
				<div class="row">
          <div class="col-xs-2 form-group">
            {!! Form::label('departure_station', 'Home Station', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->dep_station }}
          </div>
								
					<div class="col-xs-2 form-group">
            {!! Form::label('departure_date', 'Date', ['class' => 'control-label']) !!}
						<br/>
						{{ date('d-m-Y', strtotime($tourdetail->dep_station_date)) }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('departure_time', 'Time', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->dep_station_time }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('destination', 'Destination', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->destination }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('dest_arr_date', 'Date', ['class' => 'control-label']) !!}
						<br/>
						{{ date('d-m-Y', strtotime($tourdetail->dest_arr_date)) }}
          </div>
						
					<div class="col-xs-2 form-group">
            {!! Form::label('dest_arr_time', 'Time', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->dest_arr_time }}
          </div>
				</div>
			
				<div class="row">
					<div class="col-xs-6 form-group">
								Return Journey Departure Details
					</div>
						
					<div class="col-xs-6 form-group">
								Home Station Arrival Details
					</div>
				</div>
				
				<div class="row">
          <div class="col-xs-2 form-group">
            {!! Form::label('rj_station', 'Departure From Destination', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->rj_station }}
          </div>
					
					<div class="col-xs-2 form-group">
            {!! Form::label('rj_station_date', 'Date', ['class' => 'control-label']) !!}
						<br/>
						{{ date('d-m-Y', strtotime($tourdetail->rj_station_date)) }}
          </div>
					
					<div class="col-xs-2 form-group">
            {!! Form::label('rj_station_time', 'Time', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->rj_station_time }}
          </div>
					
					<div class="col-xs-2 form-group">
            {!! Form::label('rj_origin', 'Home Station', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->rj_origin }}
          </div>
					
					<div class="col-xs-2 form-group">
            {!! Form::label('rj_origin_arr_date', 'Date', ['class' => 'control-label']) !!}
						<br/>
						{{ date('d-m-Y', strtotime($tourdetail->rj_origin_arr_date)) }}
          </div>
								
					<div class="col-xs-2 form-group">
            {!! Form::label('rj_origin_arr_time', 'Time', ['class' => 'control-label']) !!}
						<br/>
						{{ $tourdetail->rj_origin_arr_time }}
          </div>		
				</div>
				
				<div class="row">
          <div class="col-xs-12 form-group">
						<?php $cx = explode(";;;", $tourdetail->comments); ?>
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
								<?php $txx = explode(';;;', $tourdetail->notes); ?>
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
			
				<div class="row">
					<div class="col-xs-4 form-group">
						@hasanyrole('supervisor|admin|director')
							{!! Form::label('decision', 'Decision*', ['class' => 'control-label']) !!}
							{!! Form::select('decision', $decision, $tourdetail->tour_status, ['class' => 'form-control']) !!}
							<p class="help-block"></p>
							@if($errors->has('decision'))
								<p class="help-block">
									{{ $errors->first('decision') }}
								</p>
							@endif
						@endhasanyrole
						
						@hasanyrole('dean')
							{!! Form::label('decision', 'Head of Dept. Decision*', ['class' => 'control-label']) !!}
							{!! Form::select('decision', $decision, $tourdetail->tour_status, ['class' => 'form-control']) !!}
							<p class="help-block"></p>
							@if($errors->has('decision'))
								<p class="help-block">
									{{ $errors->first('decision') }}
								</p>
							@endif
						@endhasanyrole
					</div>
        </div>
      </div>
    </div>
    {!! Form::submit(trans('Update Decision'), ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
	@endforeach
@stop

