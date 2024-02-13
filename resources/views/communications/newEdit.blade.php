@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">I O Comms: Edit</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">I O Comms</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<?php
			$decision = array(
				"0" => "None", 			
				"1" => "Submitted", 
				"2" => "Pending",	"3" => "Returned", 
				"4" => "Rejected",	"5" => "Approved", 
				"6" => "Forwarded", "7" => "Under Review",
				"9" => "Notified", 	"9" => "Sealed" );
		?>


		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  IOC - Self
							</h3>
							<div class="card-tools">
							  <ul class="nav nav-pills ml-auto">
								<li class="nav-item"></li>
								<li class="nav-item"></li>
							  </ul>
							</div>
						  </div><!-- /.card-header -->
						  <div class="card-body">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								<div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
									

                        <?php $users = array(); ?>
                        <div class="panel-body table-responsive">
                        {!! Form::open(['method' => 'POST', 'route' => ['iocomms.update', $uuid], 'files' => true, 'enctype' => 'multipart/form-data', 'multiple'=>'multiple' ]) !!}
                          @csrf
                          @method('PUT')
                          
                        {!! Form::hidden('uuid', $uuid, ["readonly"=>"readonly"]) !!}
                          <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                              <tr>
                                <th>Item</th>
                                <th>Details</th>
                              </tr>
                            </thead>
                                 
                            <tbody>						
                              <tr>
                                <td>
                                  Upload FIle
                                </td>
                                <td>
                                  {!! Form::file('fileToUpload', null, [ "enctype" => "multipart/form-data"]) !!}
                                </td>
                              </tr>			
                            
                              {!! Form::model($communication, ['method' => 'PUT', 'route' => ['iocomms.update', $communication->uuid ]]) !!}
                              {!! Form::hidden('uuid', $uuid, ["readonly"=>"readonly"]) !!}

                              <tr>
                                <td>From </td>
                                <td>{{ Auth::user()->name }}</td>
                              </tr>

                              <tr>
                                <td>Subject </td>
                                <td>
                                  {!! Form::text('subject', old('subject'), [ 'class' => 'form-control', "placeholder" => "Broad subject area"]) !!}
                                </td>
                              </tr>
                                          
                              @if(isset($filename))
                              <tr>
                                <td>File Name </td>
                                <td>
                                  {{ $filename }}
                                </td>
                              </tr>
                              @endif
                              
                              <tr>
                                <td>Description</td>
                                <td>
                                <!-- /.box -->
                                <div class="box">
                                  <div class="box-header">
                                    <h5 class="box-title"><font color="red">IOC:</font>
                                      <small>Enter below</small>
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
                                    <textarea name="description" id="notes" class="textarea" placeholder="Type Notes here"
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {!! $communication->description !!}
                                    </textarea>
                                  </div>
                                </div>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      
                      {!! Form::submit("Save IOC", ['class' => 'btn btn-success']) !!}
                      {!! Form::close() !!}











								</div>
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
					<!-- right col -->
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
	</div>
@stop

@section('javascript') 
		@role('dean')
			<script>
        window.route_mass_crud_entries_destroy = '{{ route('iocomms.mass_destroy') }}';
			</script>
		@endrole
@endsection