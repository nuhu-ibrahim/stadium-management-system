<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reports</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Generate Report
			</div>

			<?php $this->load->view('message_temp'); ?>

			<div class="panel-body">
				<div class="row">
					
					<div class="col-lg-4"></div>
					
					<?php echo form_open("Report/get_report"); ?>
					
					<div class="col-lg-4">
						<div class="form-group">
							<label>Start Date</label>
							<input class="form-control" name="start_date_time" id="start_date_time" placeholder="Select From Picker...">
						</div>
						<div class="form-group">
							<label>End Date</label>
							<input class="form-control" name="end_date_time" id="end_date_time" placeholder="Select From Picker...">
						</div>
						<button type="submit" class="btn btn-primary">Generate Report</button>
					</div>
					
					<?php echo form_close(); ?>
					
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
</div>