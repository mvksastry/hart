@extends('layouts.partials.calendar.calApp')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h4 class="card-title">Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">

                  <!-- /btn-group -->
                  <div class="form-group">
                    <form id="calEventForm" role="form" method="POST" data-action="{{ route('calendar.store') }}">
                      @csrf
                      <select class="custom-select rounded-0" id="event_type">
                        <option value="0">Select Event Type</option>
                          @foreach($eventypes as $type)
                          <option value="{{ $type->eventype_id }}">{{ $type->eventname }}</option>
                          @endforeach
                      </select>
                
                      <input id="new_event" type="text"  class="form-control mt-1" placeholder="Event Title">
                      <input id="start_date" type="date"  class="form-control mt-1" placeholder="Start">
                      
                      <select class="custom-select rounded-0 mt-1" id="start_time">
                        <option value="0">Start Time</option>
                          @foreach($timespans as $span)
                          <option value="{{ $span }}">{{ $span }}</option>
                          @endforeach
                      </select>                     
                      
                      <input id="end_date" type="date" class="form-control mt-1" placeholder="End">
                      <input id="end_time" type="text" class="form-control mt-1" placeholder="End Time">

                      <select class="custom-select rounded-0 mt-1" id="end_time">
                        <option value="0">Start Time</option>
                          @foreach($timespans as $span)
                          <option value="{{ $span }}">{{ $span }}</option>
                          @endforeach
                      </select>                      
                      
                      <input id="event_venue" type="text" class="form-control mt-1" placeholder="venue">
                      
                      <div class="form-group mt-3">
                        <button id="add-new-event" type="submit" class="btn btn-primary">Add</button>
                      </div>
                      <!-- /btn-group -->
                    </form>
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
      
@endsection('content')
@push('scripts')
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/fullcalendar/main.js')}}"></script>
<script src="{{asset('assets/dist/js/calendar.js')}}"></script>
@endpush