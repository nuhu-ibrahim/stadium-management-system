<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Event</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Event Information
			</div>

			<?php $this->load->view('message_temp'); ?>

			<div class="panel-body">
				<div class="row">
					
					<div class="col-lg-2"></div>
					
					<?php echo form_open("Event/store"); ?>
					
					<div class="col-lg-4">
						<div class="form-group">
							<label>Event Title</label>
							<input class="form-control" name="event_title">
						</div>
						<div class="form-group">
							<label>Start Date / Time</label>
							<input class="form-control" name="start_date_time" id="start_date_time">
						</div>	
						<div class="form-group">
							<label>Event Description</label>
							<textarea class="form-control" rows="3" name="event_description"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Add Event</button>
					</div>
					
					<div class="col-lg-4">	
						<div class="form-group">
							<label>Amount</label>
							<input class="form-control" name="amount" placeholder="0.00">
						</div>
						<div class="form-group">
							<label>End Date / Time</label>
							<input class="form-control" name="end_date_time" id="end_date_time">
						</div>
						<div class="form-group">
							<label>Available Seats</label>
							<input type="number" class="form-control" name="available_seats">
						</div>
					</div>
					
					<?php echo form_close(); ?>
					
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
</div>