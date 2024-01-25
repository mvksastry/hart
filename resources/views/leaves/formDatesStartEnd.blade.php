	<div class="row">
		<div class="col-xs-6 form-group">
		<label for="exampleInputBorderWidth2">Start Date*</label>
		  <input type="date" class="form-control form-control-border" 
		  name="leave_start" id="leave_start" placeholder="Path Name">
		</div>
			<p class="help-block"></p>
			@if($errors->has('leave_start'))
			  <p class="help-block">
				{{ $errors->first('leave_start') }}
			  </p>
			@endif
		</div>

		<div class="col-xs-6 form-group">
			<label for="exampleInputBorderWidth2">End Date*</label>
			  <input type="date" class="form-control form-control-border" 
			  name="leave_end" id="leave_end" placeholder="Path Name">
			</div>
			<p class="help-block"></p>
			@if($errors->has('leave_end'))
			  <p class="help-block">
				{{ $errors->first('leave_end') }}
			  </p>
			@endif
		</div>
	</div>