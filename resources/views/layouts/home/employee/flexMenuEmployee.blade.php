	<!-- Small boxes (Stat box) -->
	<div class="row">
	  
	  <div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
		  <div class="inner">
			<h3>AA</h3>

			<p>Employees</p>
		  </div>
		  <div class="icon">
			<i class="ion ion-bag"></i>
		  </div>
		  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	  
	  <div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
		  <div class="inner">
			<h3><sup style="font-size: 20px"></sup>BB</h3>

			<p>Kanban Board</p>
		  </div>
		  <div class="icon">
			<i class="ion ion-stats-bars"></i>
		  </div>
		  <a href="{{ route('kanban.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
		  <div class="inner">
			<h3>{{ count($communications) }}</h3>

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
		<div class="small-box bg-danger">
		  <div class="inner">
			<h3>Upcoming</h3>

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