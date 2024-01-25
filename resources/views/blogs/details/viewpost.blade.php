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
        <div class="col-sm-7">
          <h3 class="m-0">@if(isset($page_title)){{$page_title}}@endif</h3>
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="alert alert-info alert-sm alert-dismissible">{{session('msg')}}</div>
          @endif
          
          
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card-body">                    
                  @if(session('msg'))
                  <div class="alert alert-info alert-sm alert-dismissible">{{session('msg')}}</div>
                  @endif    
                  <div class="col-md-2 float-sm-right my-2">
                    <a href="{{route('posts.all')}}"><button type="button" class="btn btn-sm btn-primary btn-block text-white btn-inline"><i class="fa fa-arrow-left"></i> Back to Posts</button></a>
                  </div>               
                  <div class="row">
                    <div class="col-md-12">
                      <strong>Name: </strong> {{$data->name}}
                      <small>
                        <br>
                        <strong>Added By: </strong>
                        @if($data->getUser()) {{ ucwords($data->getUser()->name) }} @endif
                        <br><strong>Date Added: </strong>{{\Carbon\Carbon::parse($data->created_at)->format('d-M-Y g:i:A')}}
                      </small>
                      <br>
                      <strong>Image</strong><br>
                      <img src="data:image/png;base64,{{$data->image}}" class="img-fluid"/>
                    </div>
                  </div>                     
                  <div class="row">
                    <div class="col-md-12">
                      <strong>Content</strong>
                      {{$data->content}}
                    </div>
                  </div>                      
                </div>                                                      
              </div>
            </div>
            <!-- /.card-body -->
          
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
