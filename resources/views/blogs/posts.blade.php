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
          <div class="col-md-1">
          </div>
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
            <div class="card my-12">
              <!-- /.card-header -->
              <div class="card-body ">              
                <div class="col-md-2 float-sm-right my-12">
                  <a href="{{url()->previous()}}"><button type="button" class="btn btn-sm btn-primary btn-block text-white btn-inline"><i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
                <div class="col-md-2 pull-right my-12">
                  <a href="{{route('posts.add')}}"><button type="button" class="btn btn-sm btn-outline-primary btn-block"><i class="fa fa-add"></i> Add</button></a>
                </div>
                
                @if(isset($posts))
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Status</th>                     
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($posts as $data)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>
                          @if($data->image)
                          <img src="data:image/png;base64,{{$data->image}}" class="img-fluid" style="max-width: 200px" />
                          @endif
                        </td>
                        <td>{{$data->content}}</td>
                        <td>
                          @if($data->status == 1)
                          <a class="text-success">Published</a>
                          @else
                          <a class="text-warning">Unpublished</a>
                          @endif
                        </td>
                        <td>
                          <a href="{{route('posts.view',$data->slug)}}" class="btn btn-success btn-sm text-white">View</a>
                          <a href="{{route('posts.edit',$data->slug)}}" class="btn btn-primary btn-sm text-white">Edit</a>
                          @if($data->status == 1)
                          <a href="{{route('posts.deactivate',$data->slug)}}" class="btn btn-secondary btn-sm text-white">Deactivate</a>
                          @else
                          <a href="{{route('posts.activate',$data->slug)}}" class="btn btn-warning btn-sm text-white">Activate</a>
                          @endif
                          <a onclick="return deleteAction();" href="{{route('posts.delete',$data->slug)}}" class="btn btn-danger btn-sm text-white">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>                
                  </table>
                @else
                  No Blog Found
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-1">
          </div>
          <!-- /.col -->
        </div>
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
