@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: I O Comms</h1>
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
				@include('communications.flexMenuIOComms')
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Self
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
									
                  
                  
                  @if (count($comSelf) > 0)
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
													<th>IoC Id /
                              </br>
                              Controller
                          </th>
													<th>Description</th>
													<th>File</th>
													<th>Comments</th>
													<th>Decision</th>		
													<th>Operations</th>	
												</tr>
											</thead>
											<tbody>
											@foreach ($comSelf as $communication)
												<?php $tx = explode(";;;", $communication->comments); ?>
												<tr data-entry-id="{{ $communication->communication_id }}">
													<td></td>
													<td>{{ $communication->communication_id }}
                              </br>
                              {{ $communication->subject }}
                          </td>
													<td>
														{!! $communication->description !!}					
													</td>
													<td>
														@if( $communication->filename != null)
														<a href="/download/ioc/{{ $communication->uuid}}">
														{{ $communication->filename }}
														</a>
														@else
															File Not Present
														@endif
													</td>
													<td>
														@if( $communication->comments != null)
															@foreach($tx as $val)
																{{ ucfirst($val) }}<br/>
															@endforeach
														@else
															No Comments
														@endif
													</td>
													<td>
														@if( $communication->status != null)
															{{ $decision[$communication->status] }}
														@endif
													</td>
													<td>
													@if( $communication->status < 2)
														<a href="{{ route('iocomms.edit',[$communication->uuid]) }}" class="btn btn-xs btn-info">@lang('Edit')</a>
													@endif
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									@else
										No Information to display
									@endif
                  
                  
								</div>
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
					<!-- /.Left col -->

        @hasexactroles('director')
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Self
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
									
                  @if (count($comDir) > 0)
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
													<th>IoC Id /
                              </br>
                              Controller
                          </th>
													<th>Description</th>
													<th>File</th>
													<th>Comments</th>
													<th>Decision</th>		
													<th>Operations</th>	
												</tr>
											</thead>
											<tbody>
											@foreach ($comDir as $communication)
												<?php $tx = explode(";;;", $communication->comments); ?>
												<tr data-entry-id="{{ $communication->communication_id }}">
													<td></td>
													<td>{{ $communication->communication_id }}
                              </br>
                              {{ $communication->subject }}
                          </td>
													<td>
														{!! $communication->description !!}					
													</td>
													<td>
														@if( $communication->filename != null)
														<a href="/download/ioc/{{ $communication->uuid}}">
														{{ $communication->filename }}
														</a>
														@else
															File Not Present
														@endif
													</td>
													<td>
														@if( $communication->comments != null)
															@foreach($tx as $val)
																{{ ucfirst($val) }}<br/>
															@endforeach
														@else
															No Comments
														@endif
													</td>
													<td>
														@if( $communication->status != null)
															{{ $decision[$communication->status] }}
														@endif
													</td>
													<td>
                          @if( $communication->status < 3 )
                            <a href="{{ route('iocomms.decision',[$communication->uuid]) }}" class="btn btn-xs btn-info">Decision</a>
                          @endif                          
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									@else
										No Information to display
									@endif
                  
                  
								</div>
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
					<!-- /.Left col -->  
        @endhasexactroles
        
        @hasexactroles('admin|team_leader')
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Group
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
									@if (count($result) > 0)
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
													<th>IoC Id</th>
													<th>Description</th>
													<th>File</th>
													<th>Comments</th>
													<th>Decision</th>		
													<th>Operations</th>	
												</tr>
											</thead>
											<tbody>
												@foreach ($result as $val)
                          
                          @foreach($val as $row)
                              <?php $tx = explode(';;;', $row->comments); ?>
                              <tr data-entry-id="{{ $row->communication_id }}">
                                <td></td>
                                <td>{{ $row->employee_id }}</td>
                                <td>
                                  {{ $row->description }}	
                                </td>
                                <td>
                                  <a href="/download/{{ $row->filename }}">
                                  {{ $row->filename }}
                                  </a>
                                </td>
                                <td>
                                  @foreach($tx as $val)
                                    {{ ucfirst($val) }}<br/>
                                  @endforeach
                                </td>
                                <td>
                                  @if( $row->status != null)
                                    {{ $decision[$row->status] }}
                                  @endif
                                </td>
                                <td>
                                @if( $row->status < 3 )
                                  <a href="{{ route('iocomms.decision',[$row->uuid]) }}" class="btn btn-xs btn-info">Decision</a>
                                @endif
                                </td>
                              </tr>
                          @endforeach
                          
                          
												@endforeach
										</tbody>
									</table>
									@else
										No Information to display
									@endif
                  
								</div>
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>          
        @endhasexactroles  
          
          
          
          
          
          
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
	</div>
@endsection