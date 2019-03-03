<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Manage Events</h1>
	</div>
</div>
<?php $this->load->view('message_temp'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				All Event Bookings
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Event Title</th>
								<th>Begins</th>
								<th>Ends</th>
								<th>Event Description</th>
								<th>Amount</th>
								<th>Available Seats</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($events as $event): ?>
                                <tr>
                                    <td><?php echo $event['event_title']; ?></td>
                                    <td><?php echo $event['start_date_time']; ?></td>
                                    <td><?php echo $event['end_date_time']; ?></td>
									<td><?php echo $event['event_description']; ?></td>
									<td>N<?php echo number_format($event['amount'], 2); ?></td>
									<td><?php echo number_format($event['available_seats']); ?> Seats</td>
                                    <td>
                                        <a href="<?php echo base_url('Event/delete/' . $event['id']); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
						</tbody>
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
       