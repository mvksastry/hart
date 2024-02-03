@extends('layouts.app')
@section('content')


<script>
    var dataKboards = '<?=$kb?>';
    var dataKcards  = '<?=$kc?>';
</script>
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Kanban: Office</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kanban Board</li>
            </ol>
          </div>
        </div>
        <!-- / end header -->
      				@include('layouts.kanban.flexMenuKanban')
      </div>
    </section>

		<section class="content">
			<div class="container-fluid">
        <div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">
						  <i class="fas fa-chart-pie mr-1"></i>
                Boards
						</h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item"></li>
                <li class="nav-item"></li>
              </ul>
            </div>
          </div><!-- /.card-header -->
 
          <!-- begin kanban input fields -->
          <div class="row">
            <div class="col-sm-12">        
              <div class="controls p-3">
                <form class="form-inline">
                  <label class="ml-4" for="titleInput">New Card Title:</label>
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
      

          <div class="row">
          
            <div class="col-sm-3">
              <div class="card card-row card-warning ml-3">
                <div class="card-header">
                  <h3 class="card-title">Backlog</h3>
                </div>
                <div class="dropzone" id="yellow">
                </div>
              </div>
            </div>

            <div class="col-sm-3">              
              <div class="card card-row card-success">
                <div class="card-header">
                  <h3 class="card-title">To Do</h3>
                </div>
                <div class="dropzone" id="green">
                  <div class="kanbanCard green" draggable="true">
                    <div class="card-body">
                      <div class="card card-outline" >
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>

            <div class="col-sm-3">              
              <div class="card card-row card-info">
                <div class="card-header">
                  <h3 class="card-title">In Progress</h3>
                </div>
                  <div class="dropzone" id="blue">
                    <div class="kanbanCard blue" draggable="true">
                      <div class="card-body">
                        <div class="card card-outline" >
                        </div>
                      </div>
                    </div>  
                  </div>
              </div>
            </div>

            <div class="col-sm-3">              
              <div class="card card-row card-red mr-3">
                <div class="card-header">
                  <h3 class="card-title">Done</h3>
                </div>
                <div class="dropzone" id="red">
                  <div class="kanbanCard red" draggable="true">
                    <div class="card-body">
                      <div class="card card-outline">
                      </div>
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