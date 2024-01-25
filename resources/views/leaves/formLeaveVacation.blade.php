	<div class="card-body">
		<form method="POST" action="{{ route('leaves.store') }}">
			@csrf

			<div class="form-group">
			  <label for="exampleInputBorderWidth2">Leave Type*</label>
				<select name="leavetype_id" id="leavetype_id" class = 'form-control select'>
					@foreach($leavetypes as $val)
						<option value="{{ $val->leavetype_id }}">{{ $val->leavetype_name }}</option>
					@endforeach
				</select>
			</div>
			@if($errors->has('leavetype_id'))
				<p class="help-block text-danger">
					{{ $errors->first('leavetype_id') }}
				</p>
			@endif
			
			<div class="form-group">
				<label for="exampleInputBorderWidth2">Leave Conditions*</label>
			</div>
			<div class="col-xs-12 form-group">
				Eg. For 1 day Casual Leave, you must check start date forenoon and end date afternoon. <br/>
				Eg. For half day, start date and forenoon/afternoon, End date and forenoon/afternoon.<br/>
				Eg. For 1 and 1/2 day, start date and forenoon, End date and forenoon.<br/>
			</div>

			<div class="row">
				<div class="col-xs-6 form-group">
					<label for="exampleInputBorderWidth2">Start Date*</label>
					<input type="date" class="form-control form-control-border" 
					name="leave_start" id="leave_start" placeholder="Start Date">
					<p class="help-block"></p>
					@if($errors->has('leave_start'))
					  <p class="help-block">
						{{ $errors->first('leave_start') }}
					  </p>
					@endif
				</div>
			</div>
			
			<div class="row">	
				<div class="col-xs-6 form-group">
					<label for="exampleInputBorderWidth2">End Date*</label>
					  <input type="date" class="form-control form-control-border" 
					  name="leave_end" id="leave_end" placeholder="End Date">
					<p class="help-block"></p>
					@if($errors->has('leave_end'))
					  <p class="help-block">
						{{ $errors->first('leave_end') }}
					  </p>
					@endif    
				</div>					
			</div>

			<div class="col-xs-12 form-group">
				<label for="exampleInputBorderWidth2">Reason*</label>
				<input type="text" class="form-control form-control-border" 
				name="leave_reason" id="leave_reason" placeholder="Leave Reason">
				<p class="help-block"></p>
				@if($errors->has('leave_reason'))
					<p class="help-block">
						{{ $errors->first('leave_reason') }}
					</p>
				@endif
			</div>

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
























	

	