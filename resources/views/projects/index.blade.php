@extends('layouts.app')
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Projects</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Projects</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('projects.flexMenuProjects')
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Projects</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped projects table-responsive">
                  <thead>
                    <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th>
                          Project Progress
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($projects as $row)
                      <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                              {{ $row->title }}
                            </a>
                            <br/>
                            <small>
                              Started: {{ date('d-m-Y', strtotime($row->start_date)) }}
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/dist/img/avatar.png') }}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/dist/img/avatar2.png') }}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/dist/img/avatar3.png') }}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/dist/img/avatar4.png') }}">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $row->progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $row->progress }}%">
                                </div>
                            </div>
                            <small>
                            {{ $row->progress }}% Complete
                            </br>
                            as on {{ date('d-m-Y', strtotime($row->progress_date)) }}
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">On-time</span>
                        </td>
                        <td class="project-actions text-right">
                          @haspermission('project_view')
                            <a class="btn btn-primary btn-sm mt-1" href="{{ route('projects.show', $row->uuid) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                          @endhaspermission
                          @haspermission('project_edit')
                          <a class="btn btn-info btn-sm mt-1" href="{{ route('projects.edit', $row->uuid) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          @endhaspermission
                          @haspermission('project_delete')
                          <a class="btn btn-danger btn-sm mt-1" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          @endhaspermission
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- /.card -->
          <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
              <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                  <div class="card card-primary card-outline">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">                   
                          <!-- Post -->
                          <div class="post">
                            <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="{{ asset('assets/dist/img/user6-128x128.jpg') }}" alt="User Image">
                              <span class="username">
                                <a href="#">Adam Jones</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                              </span>
                              <span class="description">Posted 5 photos - 5 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="row mb-3">
                              <div class="col-sm-6">
                                <img class="img-fluid" src="{{ asset('assets/dist/img/photo1.png') }}" alt="Photo">
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <img class="img-fluid mb-3" src="{{ asset('assets/dist/img/photo2.png') }}" alt="Photo">
                                    <img class="img-fluid" src="{{ asset('assets/dist/img/photo3.jpg') }}" alt="Photo">
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-6">
                                    <img class="img-fluid mb-3" src="{{ asset('assets/dist/img/photo4.jpg') }}" alt="Photo">
                                    <img class="img-fluid" src="{{ asset('assets/dist/img/photo1.png') }}" alt="Photo">
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <p>
                              <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                              <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                              <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                  <i class="far fa-comments mr-1"></i> Comments (5)
                                </a>
                              </span>
                            </p>

                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                          </div>
                          <!-- /.post -->
                        </div>
                        
                        
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                          <!-- The timeline -->
                          <div class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-danger">
                                10 Feb. 2014
                              </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-envelope bg-primary"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                  quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-user bg-info"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-comments bg-warning"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                  Take me to your leader!
                                  Switzerland is small and neutral!
                                  We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-success">
                                3 Jan. 2014
                              </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-camera bg-purple"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                              
                                  <img class="img-fluid img-thumbnail mb-3" width="250" height="200" src="{{ asset('assets/dist/img/photo2.png') }}" alt="...">
                                  <img class="img-fluid img-thumbnail" width="250" height="200" src="{{ asset('assets/dist/img/photo4.jpg') }}" alt="...">
                                  <img class="img-fluid img-thumbnail" width="250" height="200"src="{{ asset('assets/dist/img/photo3.jpg') }}" alt="...">
                                  <img class="img-fluid img-thumbnail" width="250" height="200" src="{{ asset('assets/dist/img/photo1.png') }}" alt="...">
                                  <!--                        
                                  <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/def1.png') }}" alt="...">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/def1.png') }}" alt="...">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/def1.png') }}" alt="...">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/def1.png') }}" alt="...">
                                  -->
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                              <i class="far fa-clock bg-gray"></i>
                            </div>
                          </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                          <form class="form-horizontal">
                          @csrf
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Project</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="title" id="title" placeholder="Name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Activity</label>
                              <div class="col-sm-10">
                              
                                <input type="text" class="form-control" name="activity" id="activity" placeholder="Activity">
                              </div>
                            </div>                
                            
                            <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">Next Step</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="next_step" placeholder="Skills">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </section>
          <!-- /.container-fluid -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection('content')