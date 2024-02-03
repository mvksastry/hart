@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Admin Dashboard</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
			
				@hasrole('admin')
					@include('layouts.home.admin.flexMenuAdmin')
				@endhasrole

          <!-- Main content -->
          <section class="content">

            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Dashboard Admin and Employee</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                Start creating your amazing application!
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.content -->

								
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-7 connectedSortable">
						<!-- TO DO List -->
						<div class="card card-primary card-outline">
						  <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>
                
                <!--
                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                  <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                  <li class="page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
                -->
						  </div>
						  <!-- /.card-header -->
						  <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  @foreach($kbCards as $card)
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      <div  class="icheck-primary d-inline ml-2">    
                      </div>
                      <!-- todo text -->
                      <span class="text">{{ $card->item_desc }}</span>
                      <!-- Emphasis label -->                  
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="{{ route('kanban-cards.edit',$card->kbocard_id) }}"><i class="fas fa-edit"></i></a>
                      </div>
                    </li>
                  @endforeach  
                </ul>
						  </div>
						  <!-- /.card-body -->
						  <div class="card-footer clearfix">
                <a href="{{ route('kanban-cards.create') }}">
                  <button type="button" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> 
                      Add item
                  </button>
                </a>
						  </div>
						</div>
						<!-- /.card -->
					</section>
					<!-- /.Left col -->

					<!-- right col (We are only adding the ID to make the widgets sortable)-->          
          <section class="col-lg-5 connectedSortable">
						<!-- Calendar -->
						<div class="card bg-gradient-success">
						  <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="{{ route('events.create') }}" class="dropdown-item">Add new event</a>
                      <a href="{{ route('events.index') }}" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="{{ route('calendar.index') }}" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
						  </div>
						  <!-- /.card-header -->
						  <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
						  </div>
						  <!-- /.card-body -->
						</div>
						<!-- /.card -->
					</section>
					<!-- right col -->

				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
	</div>
@endsection('content')





