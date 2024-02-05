<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-info">
	  <div class="inner">
		<h4> {{ count($users) }} </h4>
		<p>Create New</p>
	  </div>
	  <div class="icon">
		<i class="ion ion-bag"></i>
	  </div>
	  <a href="{{ route('users.create') }}" class="small-box-footer">Create New<i class="fas fa-arrow-circle-right"></i></a>
	</div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-success">
	  <div class="inner">
		<h4> 0 <sup style="font-size: 20px"></sup></h4>

		<p>Permissions</p>
	  </div>
	  <div class="icon">
		<i class="ion ion-stats-bars"></i>
	  </div>
	  <a href="{{ route('users.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-secondary">
	  <div class="inner">
		<h4> Upcoming</h4>

		<p>Not Coded</p>
	  </div>
	  <div class="icon">
		<i class="ion ion-person-add"></i>
	  </div>
	  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-secondary">
	  <div class="inner">
		<h4> Upcoming </h4>

		<p>Not Coded</p>
	  </div>
	  <div class="icon">
		<i class="ion ion-pie-graph"></i>
	  </div>
	  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
  </div>
  <!-- ./col -->
</div> <!-- /.Small boxes end -->
<!-- /.row -->