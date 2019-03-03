<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Generated Report</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
            Generated Report
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Total Bookings</th>
								<th>Total Amount</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <td><?php echo $report->total_count; ?> Bookings</td>
                                <td>N<?php echo number_format($report->total_amount, 2); ?></td>
                            </tr>
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
       