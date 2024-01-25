@extends('faq.faq')
@section('content')

@include('faq.navbarFaq')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-1">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <h3 class="m-0">@if(isset($page_title)){{$page_title}}@endif</h3>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">@if(isset($page_title)){{$page_title}}@endif</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li class="text-capitalize">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if(session('msg'))
              <div class="alert alert-info alert-sm alert-dismissible">
                {{session('msg')}}
              </div>
            @endif
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{route('posts.save')}}" enctype="multipart/form-data">
                  @csrf()
                  <div class="card-body">                    
                    @if(session('msg'))
                      <div class="alert alert-info alert-sm alert-dismissible">{{session('msg')}}</div>
                    @endif                   
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="name">Post Name</label>
                          <input type="text" class="form-control" name="name" required>
                        </div>
                      </div> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="name">Post Image</label>
                          <input type="file" class="form-control" name="postimage">
                        </div>
                      </div>                     
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="name">Post Content</label>
                          <textarea class="form-control" name="content"></textarea>
                        </div>
                      </div>                      
                    </div>                                                      
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                </br></br>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.col -->
          </div>
          <div class="col-md-1"></div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
@endsection('content')
