		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">Payment</h1>
			</div>
			<br>
			<div class="card">
			<div class="card-body">
			<table id="table" class="table table-bordered">
				<thead align="center" class="bg-primary" style="color:white;">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Payment Date</th>
						<th scope="col">ID Transaction</th>
						<th scope="col">Total Price</th>
						<th scope="col">Money</th>
						<th scope="col">Total Change</th>
						<th scope="col">Status</th>
					</tr>
				</thead>

				<tbody align="center" id="target">

				</tbody>
			</table>
			</div>
			</div>

			<script type="text/javascript">
				$(document).ready(function () {
					$('#table').DataTable({
						"ordering": false
					});
				});

			</script>

			<script type="text/javascript">
				getData();

				function getData() {
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url(). "Payment/payment_show" ?>',
						dataType: 'Json',
						success: function (data) {
		
							var row = '';
							for (var i = 0; i < data.length; i++) {
								row += '<tr>' +
									'<td>' + (i+1) + '</td>' +
									'<td>' + data[i].payment_date + '</td>' +
									'<td>' + data[i].id_transaction + '</td>' +
									'<td>' + data[i].total_price + '</td>' +
									'<td>' + data[i].money + '</td>' +
									'<td>' + data[i].total_change + '</td>' +
									'<td>' + data[i].status + '</td>' +
									'</tr>';
							}

							$('#target').html(row);
						}
					});
                }
                
			</script>
		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->
