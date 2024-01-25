@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
	<?php
		$subjects[] = "Select Broad Area";
		foreach($pathNames as $val)
		{
			$subjects[$val->path_id] = $val->controller;
		}
		
	?>
	{!! Form::open(['method' => 'POST', 'route' => ['communications.store'], 'file' => true, 'enctype' => 'multipart/form-data']) !!}
  <h3 class="page-title">IOC</h3>
    <div class="panel panel-default">
      <div class="panel-heading">
        @lang('global.app_list')
      </div>
			<?php $users = array(); ?>
      <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
          <thead>
            <tr>
              <th>Item</th>
              <th>Details</th>
            </tr>
          </thead>
               
          <tbody>
						<tr>
		  				<td>From </td>
							<td>{{ Auth::user()->name }}</td>
						</tr>
						
						<tr>
							<td>
								Upload FIle
							</td>
							<td>
								{!! Form::file('fileToUpload', null, [ "enctype" => "multipart/form-data"]) !!}
							</td>
						</tr>
					
						<tr>
		  				<td>Subject </td>
							<td>
								{!! Form::select('subject', $subjects, '0', [ 'class' => 'form-class']) !!}
							</td>
						</tr>
												
						@if(isset($filename))
						<tr>
							<td>File Name </td>
							<td>
								{{ $filename }}
							</td>
						</tr>
						@endif
						
						<tr>
							<td>Description</td>
							<td>
							<!-- /.box -->
							<div class="box">
								<div class="box-header">
									<h3 class="box-title"><font color="red">IOC:</font>
										<small>Enter below</small>
									</h3>
									<!-- tools box -->
									<div class="pull-right box-tools">
										<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
										<i class="fa fa-minus"></i></button>
											<button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
										<i class="fa fa-times"></i></button>
									</div>
									<!-- /. tools -->
								</div>
								<!-- /.box-header -->
								<div class="box-body pad">
									<textarea name="description" id="notes" class="textarea" 					 placeholder="Type Notes here"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
									{!! old('description') !!}
									</textarea>
								</div>
							</div>
						</tr>
          </tbody>
        </table>
      </div>
    </div>
		{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@stop

@section('javascript') 
		@role('dean')
			<script>
        window.route_mass_crud_entries_destroy = '{{ route('communications.mass_destroy') }}';
			</script>
		@endrole
@endsection