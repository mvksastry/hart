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
                {!! Form::open(['method' => 'POST', 'route' => ['iocomms.decisionupdate', $val->communication_id ]]) !!}
              
                  @foreach($comdetails as $val)
                    <div class="form-group">
                        {!! Form::label('name', 'Name:  ', ['class' => 'control-label']) !!}
                        {{ ($val->user)->name }}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                        {!! $val->description !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
                          <?php $tx = explode(';;;', $val->comments); ?>
                          <br/>
                          @foreach($tx as $valx)
                            {{ ucfirst($valx) }}<br/>
                          @endforeach
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
                        {!! Form::label('comments', 'Supervisor Comment', ['class' => 'control-label']) !!}
                        {!! Form::text('comments', '',['class' => 'form-control', 'placeholder' => 'Comments']) !!}
                        @if($errors->has('comments'))
                          <p class="help-block">
                            {{ $errors->first('comments') }}
                          </p>
                        @endif
                    </div>
                      
                    <div class="form-group">
                        {!! Form::label('decision', 'Supervisor Decision', ['class' => 'control-label']) !!}
                        {!! Form::select('decision', $decision, old('decision'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if($errors->has('decision'))
                          <p class="help-block">
                            {{ $errors->first('decision') }}
                          </p>
                        @endif
                    </div> 
                  @endforeach
                  {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}    
              </div>                
							
            </div>
          </section>
        </div>
      </div><!-- /.container-fluid -->
		</section>
  </div>
@endsection('content')

