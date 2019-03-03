<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Customers</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				All Customers
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Customer Name</th>
								<th>Phone Number</th>
								<th>Email</th>
								<th>Total Bookings</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($customers as $row): ?>
                                <tr>
                                    <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                    <td><?php echo $row['phone_number']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['total_events']; ?></td>
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
       