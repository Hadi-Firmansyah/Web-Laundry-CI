		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">Outlet</h1>
			</div>

			<div>
				<button class="btn btn-primary mb-3" type="button" data-toggle="modal"
					href="#exampleModal" onclick="submit('add')">Add Outlet</button>
			</div>
			<br>
			<div class="card">
			<div class="card-body">
			<table id="table" class="table table-bordered">
				<thead align="center" class="bg-primary" style="color:white;">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Name</th>
						<th scope="col">Address</th>
						<th scope="col">Phone</th>
						<th scope="col">Action</th>
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
						url: '<?php echo base_url(). "Outlet/outlet_show" ?>',
						dataType: 'Json',
						success: function (data) {
		
							var row = '';
							for (var i = 0; i < data.length; i++) {
								row += '<tr>' +
									'<td>' + (i+1) + '</td>' +
									'<td>' + data[i].name + '</td>' +
									'<td>' + data[i].address + '</td>' +
									'<td>' + data[i].phone + '</td>' +
									'<td><a href="#exampleModal" data-toggle="modal" class="btn btn-success" onclick="submit('+ data[i].id +')">Edit</a>'+
									' <a class="btn btn-danger" onclick="deleteData('+ data[i].id +')" style="color:white;" >Delete</a></td>' +
									'</tr>';
							}

							$('#target').html(row);
						}
					});
                }
                
                function addData(){
                    var name = $("[name = 'name']").val();
                    var address = $("[name = 'address']").val();
                    var phone = $("[name = 'phone']").val();

                    $.ajax({
                        type : 'POST',
                        data : 'name='+name+'&address='+address+'&phone='+phone,
                        url : '<?php echo base_url(). "Outlet/outlet_save" ?>',
                        dataType : 'Json',
                        success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

								$("[name = 'name']").val('');
								$("[name = 'address']").val('');
								$("[name = 'phone']").val('');

							}	
                        }
                    });
                }

				function submit(x){
					if(x  == "add"){
						$('#btn-add').show();
						$('#btn-edit').hide();
					}else{
						$('#btn-add').hide();
						$('#btn-edit').show();

						$.ajax({
							type : 'POST',
							data : 'id=' + x,
							url : '<?php echo base_url(). "Outlet/outlet_get" ?>',
							dataType : 'Json',
							success : function(result){
								// console.log(result);
								$("[name = 'id']").val(result[0].id);
								$("[name = 'name']").val(result[0].name);
								$("[name = 'address']").val(result[0].address);
								$("[name = 'phone']").val(result[0].phone);
							}

						});
					}

				}
				function editData(){

					var id = $("[name = 'id']").val();
					var name = $("[name = 'name']").val();
                    var address = $("[name = 'address']").val();
                    var phone = $("[name = 'phone']").val();

					$.ajax({
						type : 'POST',
                        data : 'id='+id+'&name='+name+'&address='+address+'&phone='+phone,
                        url : '<?php echo base_url(). "Outlet/outlet_edit" ?>',
                        dataType : 'Json',
						success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

								// $("[name = 'name']").val('');
								// $("[name = 'address']").val('');
								// $("[name = 'phone']").val('');

							}	
                        }
					});
				}

				function deleteData(id){
					var ask = confirm("Are You Sure?");

					if(ask){
						$.ajax({
							type : 'POST',
							data : 'id=' +id,
							url : '<?php echo base_url(). "Outlet/outlet_delete" ?>',
							success : function(){
								getData();
							}


						})
					}

				}

			</script>

			<!-- Modal Add Data -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Outlet</h5>
						</div>

						<div class="modal-body">
									<p id="message" align="center" style="color:red;"></p>
										<form>
											<input type="hidden" name="id"  value="">
											<div class="form-group">
												<input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
											</div>
											<div class="form-group">
												<input type="text" name="address" class="form-control" placeholder="Address">
											</div>
 											<div class="form-group">
												<input type="number" name="phone" class="form-control" placeholder="Phone Number">
											</div>

											<div class="form-group" align="center">
												<button class="btn btn-primary" type="button" id="btn-add" onclick="addData()">Add</button>
												<button class="btn btn-primary" type="button" id="btn-edit" onclick="editData()">Edit</button>
											</div>
										</form>
                        </div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
            <!-- End Modal -->

		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->
