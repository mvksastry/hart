@extends('layouts.app')
@section('content')
	<?php
		$decision = array("1"=> "None", "2" => "Pending", "3" => "Returned", "4"=> "Rejected", "5"=> "Approved"); 
		$defDecision = 2;
	?>
  
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Tours</h1>
            @include('layouts.partials.messages')
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Tours</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @include('tours.flexMenuTours')
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  TOURS BY SELF
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
                    
                    @if (count($tourSelf) > 0)
                      <table class="table table-bordered table-striped {{ count($tourSelf) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                          <tr>
                            <th style="text-align:center;">
                              <input type="checkbox" id="select-all" />
                            </th>
                            <!-- th>Name</th -->
                            <th>Purpose</th>
                            <th>Destination</th>
                            <th>Departure</th>
                            <th>Return</th>
                            <th>Comments</th>
                            <th>Status</th>						
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tourSelf as $tourdetail)	
                            <?php $tx = explode(";;;", $tourdetail->comments); ?>
                            <tr data-entry-id="{{ $tourdetail->tour_id }}">
                              <td></td>
                              <!--td>{{ $tourdetail->employee_id }}</td -->
                              <td>{{ ($tourdetail->tour_purpose) }}</td>
                              <td>{{ $tourdetail->destination }}</td>                             
                              <td>{{ date('d-m-Y', strtotime($tourdetail->dep_station_date)) }}</td>
                              <td>{{ date('d-m-Y', strtotime($tourdetail->rj_origin_arr_date)) }}</td>
                              <td>
                                @foreach($tx as $val)
                                {{ ucfirst($val) }} <br/>
                                @endforeach
                              </td>
                              <td>
                                {{ $decision[$tourdetail->tour_status] }}
                              </td>								
                              <td>
                                @hasrole('employee')	
                                  @if( $tourdetail->tour_status <= 1 )
                                    <a href="{{ route('tours.edit',[$tourdetail->uuid]) }}" class="btn btn-xs btn-info">Edit</a>
                                  @endif
                                @endrole
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
            <!-- right col -->
          </div><!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>


    @hasanyrole('supervisor|admin|director')	
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  TOURS FOR APPROVAL
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
                    @if (count($tourGroup) > 0)
                      <table class="table table-bordered table-striped {{ count($tourGroup) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                          <tr>
                            <th style="text-align:center;">
                              <input type="checkbox" id="select-all" />
                            </th>
                            <th>Name</th>
                            <th>Purpose</th>
                            <th>Destination</th>
                            <th>Departure</th>
                            <th>Return</th>
                            <th>Notes</th>
                            <th>Status</th>						
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tourGroup as $tourdetail)                  
                            <?php $tx = explode(";;;", $tourdetail->notes); ?>
                            <tr data-entry-id="{{ $tourdetail->tour_id }}">
                              <td></td>
                              <td>{{ ucfirst($tourdetail->name) }}</td>
                              <td>{{ ($tourdetail->tour_purpose) }}</td>
                              <td>{{ $tourdetail->destination }}</td>                             
                              <td>{{ date('d-m-Y', strtotime($tourdetail->dep_station_date)) }}</td>
                              <td>{{ date('d-m-Y', strtotime($tourdetail->rj_origin_arr_date)) }}</td>
                              <td>
                                @foreach($tx as $val)
                                {{ $val }} <br/>
                                @endforeach
                              </td>
                              <td>
                                  {{ $decision[$tourdetail->tour_status] }}
                              </td>								
                              <td>
                                @hasrole('supervisor|dean|admin|director')	
                                  @if( $tourdetail->tour_status <= 2 )
                                  <a href="{{ route('tours.decision',[$tourdetail->uuid]) }}" class="btn btn-xs btn-info">Decision</a>
                                  @endif
                                @endrole
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
            <!-- right col -->
          </div>
        </div>
      </section>
    @endhasanyrole  
	</div>  	
@endsection('content')