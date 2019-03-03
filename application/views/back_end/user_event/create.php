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
				
				<?php echo form_open("User_Event/store"); ?>

				<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
				
				<div class="col-lg-4">
					<div class="form-group">
						<label>Event Title</label>
						<select name="event_id" id="event_id" class="form-control">
							<option value="">--- Select Event ---</option>
							<?php foreach($events as $event): ?>
								<option value="<?php echo $event['id']; ?>"><?php echo $event['event_title']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Start Date / Time</label>
						<input class="form-control" name="start_date_time" id="start_date_time" readonly>
					</div>
					<div class="form-group">
						<label>Event Description</label>
						<textarea class="form-control" rows="3" name="event_description" id="event_description" readonly></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Add Event</button>
				</div>
				
				<div class="col-lg-4">	
					<div class="form-group">
						<label>Amount</label>
						<input class="form-control" name="amount" id="amount" readonly>
					</div>		
					<div class="form-group">
						<label>End Date / Time</label>
						<input class="form-control" name="end_date_time" id="end_date_time" readonly>
					</div>
				</div>
				
				<?php echo form_close(); ?>
				
			</div>
		</div>
		<!-- /.panel-body -->
	</div>
</div>
</div>

<script>
	
	$("#event_id").on("change", function() {

		var event_id = $(this).val();

		$.post("<?php echo base_url() . 'User_Event/get_event_details'; ?>", { event_id: event_id }, function(data){

		    var start_date_time = data[0].start_date_time;
			$("#start_date_time").val(start_date_time);

			var event_description = data[0].event_description;
			$("#event_description").val(event_description);

			var end_date_time = data[0].end_date_time;
			$("#end_date_time").val(end_date_time);

			var amount = data[0].amount;
			$("#amount").val(amount);
			
		}, "json");

	 });

</script>