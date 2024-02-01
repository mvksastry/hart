@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Kanban Board</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kanban Board</li>
            </ol>
          </div>
        </div>
        <!-- / end header -->
        <!-- begin kanban input fields -->
        <div class="row">
          <div class="col-sm-12">        
            <div class="controls p-3">
              <form class="form-inline">
                <label class="ml-4" for="titleInput">Title:</label>
                <input class="form-control form-control-sm ml-2" type="text" name="title" id="titleInput" autocomplete="off">
                <label class="ml-2" for="descriptionInput">Description:</label>
                <input class="form-control form-control-sm ml-2" type="text" name="description" id="descriptionInput" autocomplete="off">
                <button class="btn btn-dark ml-2" id="add">Add</button>
                <button class="btn btn-danger mx-2" id="deleteAll">Delete All</button>
              </form>
            </div>
          </div>
        </div> 
        <!-- / begin kanban input fields -->        
      </div>
    </section>

		<!-- Main content -->
		<section class="content pb-3">
			<div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            <div class="card card-row card-secondary">
              <div class="card-header">
                <h3 class="card-title">
                  Backlog
                </h3>
              </div>
              <div class="card-body">
                <div class="card card-info card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Labels</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#3</a>
                      <a href="#" class="btn btn-tool"><i class="fas fa-pen"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                      <label for="customCheckbox1" class="custom-control-label">Bug</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled>
                      <label for="customCheckbox2" class="custom-control-label">Feature</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled>
                      <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled>
                      <label for="customCheckbox4" class="custom-control-label">Documentation</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled>
                      <label for="customCheckbox5" class="custom-control-label">Examples</label>
                    </div>
                  </div>
                </div>
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Issues</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#4</a>
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1_1" disabled>
                      <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1_2" disabled>
                      <label for="customCheckbox1_2" class="custom-control-label">Feature Request</label>
                    </div>
                  </div>
                </div>
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">PR</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#6</a>
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Actions</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#7</a>
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>
                      Some text here.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card card-row card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  To Do
                </h3>
              </div>
              <div class="card-body">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Milestone</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#5</a>
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">              
            <div class="card card-row card-default">
              <div class="card-header bg-info">
                <h3 class="card-title">
                  In Progress
                </h3>
              </div>
              <div class="card-body">
                <div class="card card-light card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Updates</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#2</a>
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>
                      Some text here
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">              
            <div class="card card-row card-success">
              <div class="card-header">
                <h3 class="card-title">
                  Done
                </h3>
              </div>
              <div class="card-body">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Reports</h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">#1</a>
                      <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>              
      </div>
    </section>
	</div>	
@endsection('content')