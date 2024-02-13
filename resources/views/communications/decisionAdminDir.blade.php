@extends('layouts.app')
@section('content')
	<?php 
		$supDecision = array(   			
			"3" => "Returned", 
			"5" => "Approved", 
		);										
		$decision = array(   			
			"2" => "Pending",		"3" => "Returned", 
      "4" => "Rejected",	"5" => "Approved", 
      "6" => "Forwarded", "7" => "Under Review",
			"8" => "Notified", 	"9" => "Sealed" 
		);
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
  
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Decision</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Create Leave Type</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->  
  
  
  
  
  
  
  
  
  
		<section class="content">
			<div class="container-fluid">  

				<!-- Main row -->
				<div class="row">


          <section class="col-lg-12 connectedSortable">

            <div class="card card-primary card-outline">

							<div class="card-header">
								<h3 class="card-title">
								  <i class="fas fa-chart-pie mr-1"></i>
								  Decision: All Inputs Mandatory
								</h3>
								<div class="card-tools">
								  <ul class="nav nav-pills ml-auto">
									<li class="nav-item"></li>
									<li class="nav-item"></li>
								  </ul>
								</div>
							</div><!-- /.card-header -->

							<div class="card-body">



        
                          @foreach($comdetails as $val)
                            
                            {!! Form::open(['method' => 'POST', 'route' => ['iocomms.decisionupdate', $val->uuid ]]) !!}
                            
                              
                                I O C Path &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                              

                              
                                <div class="form-group">
                                    {!! Form::label('name', 'Name:  ', ['class' => 'control-label']) !!}
                                    <p>{{ ($val->user)->name }}</p>                                 
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}	
                                    <p>{!! $val->description !!}</p>
                                </div>
                              
                                <div class="form-group">
                                    {!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
                                  
                                      <?php $tx = explode(';;;', $val->comments); ?>
                                      <p>
                                      @foreach($tx as $valx)
                                        {{ ucfirst($valx) }}<br/>
                                      @endforeach		    
                                      </p>
                                </div>
                                    
                                <div class="form-group">
                                    {!! Form::label('filename', 'Existing File', ['class' => 'control-label']) !!} :
                                    @if($val->filename != null)
                                      {{  $val->filename }}
                                    @else
                                      File Not Present
                                    @endif
                                    <br/>
         
                                </div>
                                
                                <div class="form-group">
                                    {!! Form::label('comments', 'Comment', ['class' => 'control-label']) !!}
                                    <small>This is visible to others</small>
                                    {!! Form::text('comments', '',['class' => 'form-control', 'placeholder' => 'Comments']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('comments'))
                                      <p class="help-block">
                                        {{ $errors->first('comments') }}
                                      </p>
                                    @endif
                                  
                                </div>
                                
                                <div class="form-group">
                                    <h5 class="box-title"><font color="red">Notes:</font>
                                      <small>This is not visible/editable by others</small>
                                    </h5>
                                    
                                        {!! Form::label('notes', 'Running Notes', ['class' => 'control-label']) !!} :
                                        <?php $txx = explode(';;;', $val->notes); ?>
                                        <br/>
                                        @foreach($txx as $valy)
                                          {!!  ucfirst($valy) !!}<br/>
                                        @endforeach		
                                        
                                    
                                  
                                </diV>
                              @hasanyrole('admin|director')
                                <!-- box -->
                                <div class="box">
                                  <div class="box-header">
                                    <h5 class="box-title"><font color="red">Enter Notes:</font>
                                      <small>This is not visible/editable by others</small>
                                    </h5>
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
                                      style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-sm-2 form-group">
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
                                  
                                  <div class="col-sm-10 form-group">
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
                                  <div class="col-sm-2 form-group">
                                    {!! Form::label('path', 'Include In Path*', ['class' => 'control-label']) !!}
                                    <input type="radio" name="path" value="include">
                                    <p class="help-block"></p>
                                    @if($errors->has('path'))
                                      <p class="help-block">
                                        {{ $errors->first('path') }}
                                      </p>
                                    @endif
                                  </div>
                                  
                                  <div class="col-sm-10 form-group">
                                    @foreach($userGroup as $key => $val)
                                      <?php 
                                        $groupc = array();
                                        foreach($val as $key1 => $row)
                                        { 
                                          $groupc[$row->id] = ucfirst($row->name);
                                        }
                                      ?>
                                      <div class="row">
                                        <div class="col-sm-2 form-group">
                                          {!! Form::label('num', 'S. No', ['class' => 'control-label']) !!}
                                          {!! Form::text('groupd['.ucfirst($key).'][]', '', ['class' => 'form-control', 'placeholder' => '']) !!}
                                        </div>
                                        <div class="col-sm-4 form-group">
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
                                        <div class="col-sm-1 form-group">
                                          {!! Form::label('num', 'Notes', ['class' => 'control-label']) !!}
                                          <br/>
                                          {!! Form::checkbox('groupd['.ucfirst($key).'][]', 'yes', false, ['value' => 'yes']) !!}
                                        </div>
                                  
                                        <div class="col-sm-5 form-group">
                                        </div>
                                      </div>
                                    @endforeach	
                                  </div>	
                                </diV>
                              @endhasanyrole
                              @hasanyrole('supervisor')
                                <div class="row">
                                  <div class="col-sm-3 form-group">
                                    {!! Form::label('decision', 'Decision', ['class' => 'control-label']) !!}
                                    {!! Form::select('decision', $supDecision, old('status'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('decision'))
                                      <p class="help-block">
                                        {{ $errors->first('decision') }}
                                      </p>
                                    @endif
                                  </div>
                                </div> 
                              @endhasanyrole
                              @hasanyrole('admin|director')
                                <div class="row">
                                  <div class="col-sm-3 form-group">
                                    {!! Form::label('decision', 'Decision', ['class' => 'control-label']) !!}
                                    {!! Form::select('decision', $decision, old('status'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('decision'))
                                      <p class="help-block">
                                        {{ $errors->first('decision') }}
                                      </p>
                                    @endif
                                  </div>
                                </div> 
                              @endhasanyrole
                            
                          
                            @endforeach
                            {!! Form::submit(trans('Update'), ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}



							</div><!-- /.card-body -->


          
            </div>
          </section>
                
        </div>
      </div><!-- /.container-fluid -->
		</section>
      
      
	</div>
@endsection('content')