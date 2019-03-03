<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php if ($this->session->userdata('is_admin') == 1): ?>
				All Event Bookings
			<?php elseif ($this->session->userdata('is_admin') == 0): ?>
				Available Events
			<?php endif; ?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<?php if ($this->session->userdata('is_admin') == 1): ?>
								<th>Customer Name</th>
								<?php endif; ?>
								<th>Event Title</th>
								<th>Begins</th>
								<th>Ends</th>
								<th>Description</th>
								<?php if ($this->session->userdata('is_admin') == 1): ?>
								<th>Payment Status</th>
								<th>Action</th>
								<?php elseif ($this->session->userdata('is_admin') == 0): ?>
								<th>Available Seats</th>
								<?php endif; ?>
							</tr>
						</thead>
						<?php if ($this->session->userdata('is_admin') == 1): ?>
						<tbody>
							<?php foreach($bookings as $row): ?>
							<tr>
								<td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
								<td><?php echo ucwords($row['event_title']); ?></td>
								<td><?php echo $row['start_date_time']; ?></td>
								<td><?php echo $row['end_date_time']; ?></td>
								<td><?php echo $row['event_description']; ?></td>

								<?php if ($this->session->userdata('is_admin') == 1): ?>
								<td>
									<?php if ($row['is_paid'] == 0) : ?>
										<a style = "color:red">Unpaid</a>
									<?php elseif ($row['is_paid'] == 1): ?>
										<a style = "color:green">Paid</a>
									<?php endif; ?>
								</td>
								<td>	
									<a href="<?php echo base_url('Dashboard/ticket/' . $row['id']); ?>" class="btn btn-primary">Ticket Details</a>
								</td>
								<?php endif; ?>
							</tr>
							<?php endforeach; ?>
						</tbody>
						<?php endif; ?>

						<?php if ($this->session->userdata('is_admin') == 0): ?>
						<tbody>
							<?php foreach($available_events as $row): ?>
							<tr>
								<td><?php echo ucwords($row['event_title']); ?></td>
								<td><?php echo $row['start_date_time']; ?></td>
								<td><?php echo $row['end_date_time']; ?></td>
								<td><?php echo $row['event_description']; ?></td>
								<td><?php echo number_format($row['available_seats']); ?></td>								
							</tr>
							<?php endforeach; ?>
						</tbody>
						<?php endif; ?>

					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
       