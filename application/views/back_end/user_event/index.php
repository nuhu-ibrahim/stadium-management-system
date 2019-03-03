<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Manage Events</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				My Event Bookings
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
								<th>Description</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Reciept</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($user_events as $row): ?>
							<tr>
								<td><?php echo ucwords($row['event_title']); ?></td>
								<td><?php echo $row['start_date_time']; ?></td>
								<td><?php echo $row['end_date_time']; ?></td>
								<td><?php echo $row['event_description']; ?></td>
								<td>N<?php echo number_format($row['amount'], 2); ?></td>
								<td>
									<?php if ($row['is_paid'] == 0) : ?>
										<a style = "color:red;">Unpaid</a>
									<?php elseif ($row['is_paid'] == 1): ?>
										<a style = "color:green;">Paid</a>
									<?php endif; ?>					
								</td>
								<td>
									<?php if ($row['is_paid'] == 0) : ?>
										<a style = "color:red;">No Receipt</a>
									<?php elseif ($row['is_paid'] == 1): ?>
									<a href="<?php echo base_url('User_Event/receipt/' . $row['event_id'] . '/' . $row['user_id']); ?>" class="btn btn-primary">Reciept</a href="<?php echo base_url('User_Event/receipt/' . $row['event_id']); ?>">
									<?php endif; ?>
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
       