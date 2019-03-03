<div class="row">
<div class="col-lg-12">
	<h1 class="page-header">Ticket Details</h1>
</div>
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Ticket
		</div>

		<?php $this->load->view('message_temp'); ?>

		<div class="panel-body">
			<div class="row">
				
				<div class="col-lg-4"></div>
				
                <?php echo form_open("Dashboard/update_ticket"); ?>

				<input type="hidden" name="user_events_id" value="<?php echo $ticket->id; ?>">
				<input type="hidden" name="event_id" value="<?php echo $ticket->event_id; ?>">
                
				<div class="col-lg-4">
					<div class="form-group">
						<label>Customer Name</label>
						<input class="form-control" value="<?php echo $ticket->first_name . ' ' . $ticket->last_name; ?>" readonly>
					</div>
					<div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" value="<?php echo $ticket->phone_number; ?>" readonly>
                    </div>
                    <div class="form-group">
						<label>Event Title</label>
						<input class="form-control" value="<?php echo $ticket->event_title; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Activate / Deactivate Ticket</label>
						<select name="is_paid" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="1" <?php if ($ticket->is_paid == 1) echo 'selected'; ?> >Activate</option>
                            <option value="0" <?php if ($ticket->is_paid == 0) echo 'selected'; ?> >Deactivate</option>
                        </select>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				
				<?php echo form_close(); ?>
				
			</div>
		</div>
		<!-- /.panel-body -->
	</div>
</div>
</div>