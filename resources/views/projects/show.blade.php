@extends('layouts.app')
@section('content')
	<?php 
		$holidaychoice = array("0" => "Gazetted Holiday", "1"=> "Restricted Holiday");
		$holidaySel = 0;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Project Detail</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Project Detail</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary card-outline">
        <div class="card-header card-primary card-outline">
          <h3 class="card-title">{{ $project->title }}</h3>

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
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span class="info-box-number text-center text-muted mb-0">&#8377; {{ $project->total_budget }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span class="info-box-number text-center text-muted mb-0">*</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">*</span>
                    </div>
                  </div>
                </div>
              </div>
                           
              
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>

                  <div class="post clearfix">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{asset('assets/dist/img/user7-128x128.jpg')}}" alt="User Image">
                      <span class="username">
                        <a href="#">Sarah Ross</a>
                      </span>
                      <span class="description">Sent you a message - 3 days ago</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore.
                    </p>
                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                    </p>
                  </div>

                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="user image">
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                      </span>
                      <span class="description">Shared publicly - 5 days ago</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore.
                    </p>

                    <p>
                      <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Description</h3>
              <p class="text-muted">{{ $project->description }}</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client/Service Company
                  <b class="d-block">{{ $project->agency }}</b>
                </p>
                <p class="text-sm">Project Owner
                  <b class="d-block">{{ ucwords($project->proj_owner->name) }}</b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">{{ ucwords($project->proj_lead->name) }}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files (Latest)</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
          
          
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card card-primary card-outline">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Comprehensive Project Data</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Meta Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Budgets</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Goals</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Tasks</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Timelines</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Files</a></li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                      Actions... <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <!--
                        <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                        <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                        <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                        -->
                    </div>
                  </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <p class="text-sm">Description
                        <b class="d-block">{{ $project->description }}</b>
                      </p>
                      <p class="text-sm">Client/Service Company
                        <b class="d-block">{{ $project->agency }}</b>
                      </p>
                      <p class="text-sm">Project Owner
                        <b class="d-block">{{ ucwords($project->proj_owner->name) }}</b>
                      </p>
                      <p class="text-sm">Project Leader
                        <b class="d-block">{{ ucwords($project->proj_lead->name) }}</b>
                      </p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                      <p class="text-sm">Estimated Budget
                        <b class="d-block">&#8377; {{ $project->total_budget }}</b>
                      </p>
                      <p class="text-sm">Description
                        <b class="d-block">The budget details are presented in section document</b>
                      </p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    @foreach($projGoalsAssigned as $row)
                      <div class="row">
                        <div class="col-4">
                          <p class="text-sm">Goal
                            <b class="d-block">{{ ucfirst($row->goal) }}</b>
                          </p>
                        </div>
                        <div class="col-6">
                          <p class="text-sm">Description
                            <b class="d-block">{{ ucfirst($row->desc) }}</b>
                          </p>
                        </div>
                        <div class="col-2">
                          <a class="btn btn-primary btn-sm mt-1" href="{{ route('projtasks.show', $row->projectgoal_id) }}">
                            <button type="button" class="btn btn-primary btn-block"><i class="fa fa-book"></i>Update</button>
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <!-- Timelime example  -->
                        <div class="row">
                          <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                              <!-- timeline time label -->
                              <div class="time-label">
                                <span class="bg-red">10 Jan. 2024</span>
                              </div>
                              <!-- /.timeline-label -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                  <div class="timeline-body">
                                    Message regarding permissions received and work in-progress
                                  </div>
                                  <!--
                                  <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm">Read more</a>
                                    <a class="btn btn-danger btn-sm">Delete</a>
                                  </div>
                                  -->
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-user bg-green"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                  <h3 class="timeline-header no-border"><a href="#">User05 User05</a> accepted your friend request</h3>
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-comments bg-yellow"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                                  <h3 class="timeline-header"><a href="#">User03 User03</a> commented on your post</h3>
                                  <div class="timeline-body">
                                    Message: received xyz abcd
                                  </div>
                                  <!--
                                  <div class="timeline-footer">
                                    <a class="btn btn-warning btn-sm">View comment</a>
                                  </div>
                                  -->
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline time label -->
                              <div class="time-label">
                                <span class="bg-green">21 Dec. 2023</span>
                              </div>
                              <!-- /.timeline-label -->
                              <!-- timeline item -->
                              <div>
                                <i class="fa fa-camera bg-purple"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                  <h3 class="timeline-header"><a href="#">Admin Smoffice</a> uploaded new photos</h3>
                                  <div class="timeline-body">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                  </div>
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-video bg-maroon"></i>

                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>

                                  <h3 class="timeline-header"><a href="#">Pune Pune</a> shared a video</h3>

                                  <div class="timeline-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                                    </div>
                                  </div>
                                  <div class="timeline-footer">
                                    <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                                  </div>
                                </div>
                              </div>
                              <!-- END timeline item -->
                              <div>
                                <i class="fas fa-clock bg-gray"></i>
                              </div>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                      </div>
                      <!-- /.timeline -->
                    </section>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_6">
                    <h5 class="mt-5 text-muted">Project files (Latest)</h5>
                    <ul class="list-unstyled">
                      <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                      </li>
                      <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                      </li>
                      <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                      </li>
                      <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                      </li>
                      <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                      </li>
                    </ul>
                  <div class="text-center mt-5 mb-3">
                    <a href="#" class="btn btn-sm btn-primary">Add files</a>
                    <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->                        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
	</div>
@endsection('content')