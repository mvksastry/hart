@extends('layouts.app')

@section('content')

  <?php $status = array('0'=>'On-hold', '1'=>'Running','2'=>'Cancelled','3'=>'Success'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card card-secondary card-outline">
            <div class="card-header">
              <h3 class="card-title">Edit Project</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form method="POST" action="{{ route('projects.update', $project->uuid) }}">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="row mt-2">
                  <div class="col-md-6">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Office Reference</label>
                          <input disabled type="text" name="office_reference" id="office_reference" 
                            class="form-control" value="{{ $project->office_reference }}">
                          </br>
                          @if($errors->has('office_reference'))
                            <p class="help-block text-danger">
                              {{ $errors->first('office_reference') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputName">Project Name</label>
                          <input disabled type="text" name="title" id="title" 
                          class="form-control" value="{{ $project->title }}">
                          </br>
                          @if($errors->has('title'))
                            <p class="help-block text-danger">
                              {{ $errors->first('title') }}
                            </p>
                          @endif
                        </div>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="inputName">Start Date</label>
                              <input type="date" name="start_date" id="start_date" 
                              class="form-control" value="{{ $project->start_date }}">
                              </br>
                              @if($errors->has('start_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('start_date') }}
                                </p>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="inputName">End Date</label>
                              <input type="date" name="end_date" id="end_date" 
                              class="form-control" value="{{ $project->end_date }}">
                              </br>
                              @if($errors->has('end_date'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('end_date') }}
                                </p>
                              @endif
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="inputDescription">Project Description</label>
                          <textarea name="description" id="description" 
                          class="form-control" rows="3">
                          {{ $project->description }}</textarea>
                          </br>
                          @if($errors->has('description'))
                            <p class="help-block text-danger">
                              {{ $errors->first('description') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select name="status" id="status" class="form-control custom-select">
                            <option disabled>Select</option>
                              @foreach($status as $key => $val)
                                @if($key == $project->status)
                                <option value="{{ $key }}" selected>{{ $val }}</option>
                                @else
                                <option value="{{ $key }}">{{ $val }}</option>
                                @endif
                              @endforeach
                          </select>
                          </br>
                          @if($errors->has('status'))
                            <p class="help-block text-danger">
                              {{ $errors->first('status') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputClientCompany">Client Company</label>
                          <input type="text" name="agency" id="agency" class="form-control" value="{{ $project->agency }}">
                          </br>
                          @if($errors->has('agency'))
                            <p class="help-block text-danger">
                              {{ $errors->first('agency') }}
                            </p>
                          @endif                       
                       </div>                      
                        <div class="form-group">
                          <label for="inputStatus">Project Leader</label>
                          <select id="project_leader" name="project_leader"  
                            class="form-control custom-select">
                            <option value="0">Select one</option>
                            @foreach($users as $row)
                            @if($row->id == $project->proj_lead->id)
                            <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                            @else
                            <option value="{{ $row->id }}">{{ $row->name }}</option>  
                            @endif
                            @endforeach
                          </select>
                          </br>
                          @if($errors->has('project_leader'))
                            <p class="help-block text-danger">
                              {{ $errors->first('project_leader') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputEstimatedDuration">Est. Project Time (Weeks)</label>
                          <input type="number" name="est_time_weeks" id="est_time_weeks" class="form-control" value="{{ $project->est_time_weeks }}" step="0.1">
                          </br>
                          @if($errors->has('est_time_weeks'))
                            <p class="help-block text-danger">
                              {{ $errors->first('est_time_weeks') }}
                            </p>
                          @endif
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <div class="col-md-6">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Budget</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputEstimatedBudget">Estimated budget</label>
                          <input type="number" name="total_budget" id="total_budget" class="form-control" value="{{ $project->total_budget }}" step="1">
                          </br>
                          @if($errors->has('total_budget'))
                            <p class="help-block text-danger">
                              {{ $errors->first('total_budget') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputSpentBudget">Total Amount Spent</label>
                          <input type="number" name="spent_budget" id="spent_budget" class="form-control" value="{{ $project->spent_budget }}" step="1">
                           </br>
                          @if($errors->has('spent_budget'))
                            <p class="help-block text-danger">
                              {{ $errors->first('spent_budget') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="inputEstimatedDuration">Comments</label>
                          <input type="text" name="comments" id="comments" class="form-control" value="{{ $project->comments }}" step="">
                           </br>
                          @if($errors->has('comments'))
                            <p class="help-block text-danger">
                              {{ $errors->first('comments') }}
                            </p>
                          @endif
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Files</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>File Name</th>
                              <th>File Size</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td>Functional-requirements.docx</td>
                              <td>49.8005 kb</td>
                              <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="#" class="btn btn-info ml-1"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="btn btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>UAT.pdf</td>
                              <td>28.4883 kb</td>
                              <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="#" class="btn btn-info ml-1"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="btn btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Email-from-flatbal.mln</td>
                              <td>57.9003 kb</td>
                              <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="#" class="btn btn-info ml-1"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="btn btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Logo.png</td>
                              <td>50.5190 kb</td>
                              <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="#" class="btn btn-info ml-1"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="btn btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Contract-10_12_2014.docx</td>
                              <td>44.9715 kb</td>
                              <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="#" class="btn btn-info ml-1"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="btn btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div> 
                </div>
        
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-header">
                      <h3 class="card-title"><b>S</b>pecific <b>M</b>easurable <b>A</b>chievable <b>R</b>elevant <b>T</b>imebound Goals</h3>
                    </div>
                    <div class="card-body">
                      @foreach($project->smart_goals as $smart_goal)
                        <?php $projectgoal_id = $smart_goal->projectgoal_id; ?>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="inputEstimatedBudget">Goal</label>
                              <input type="text" name="goals[{{$projectgoal_id}}]" id="goals[{{$projectgoal_id}}]" 
                                value="{{ $smart_goal->goal }}" class="form-control">
                              @if($errors->has('goals'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('goals') }}
                                </p>
                              @endif
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="inputEstimatedDuration">Goal: Budget</label>
                              <input type="text" name="goal_budget[{{$projectgoal_id}}]" id="goal_budget[{{$projectgoal_id}}]" 
                                value="{{ $smart_goal->budget }}" class="form-control">
                                @if($errors->has('goal_budget'))
                                  <p class="help-block text-danger">
                                    {{ $errors->first('goal_budget') }}
                                  </p>
                                @endif
                            </div>
                          </div>
                        </div>                          
                                  
                        <div class="row">  
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="inputEstimatedDuration">Goal: Description</label>
                              <input type="text" name="goal_desc[{{$projectgoal_id}}]" id="goal_desc[{{$projectgoal_id}}]" 
                              value="{{ $smart_goal->desc }}" class="form-control">
                              @if($errors->has('goal_desc'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('goal_desc') }}
                                </p>
                              @endif
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="inputEstimatedDuration">Goal: Estimated Time</label>
                              <input type="text" name="goal_estime[{{$projectgoal_id}}]" id="goal_estime[{{$projectgoal_id}}]" 
                              value="{{ $smart_goal->est_time }}" class="form-control">
                              @if($errors->has('goal_estime'))
                                <p class="help-block text-danger">
                                  {{ $errors->first('goal_estime') }}
                                </p>
                              @endif
                            </div>
                          </div>                          
                        </div>
                            
                        <div class="form-group">
                          <label for="inputEstimatedDuration">Comments</label>
                          <input type="text" name="gcomments[{{$projectgoal_id}}]" id="gcomments[{{$projectgoal_id}}]" 
                          value="{{ $smart_goal->comments }}" class="form-control">
                          @if($errors->has('gcomments'))
                            <p class="help-block text-danger">
                              {{ $errors->first('gcomments') }}
                            </p>
                          @endif
                        </div>
                      @endforeach
                    </div>                  
                  </div>
                </div>
                <!-- /.card -->     
                <div class="row">
                  <div class="col-4">
                  </div>
                  <div class="col-4">
                    <input type="submit" value="Save Changes" class="btn btn-success float-centre">
                  </div>
                  <div class="col-4">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection('content')