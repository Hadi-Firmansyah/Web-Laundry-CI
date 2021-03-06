		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">User</h1>
			</div>

			<div>
				<button class="btn btn-primary mb-3" style="width:15%;" type="button" 
					data-toggle="modal" data-target="#exampleModal">Add User</button>
				<!-- <a href="<?php echo base_url("User/user_print_xls")?>">
					<button class="btn btn-success mb-3" style="width:15%;" >Generate XLS</button></a> -->
			</div>
			<br>
		<div class="card">
			<div class="card-body">
			<table id="table" class="table table-bordered">
				<thead align="center" class="bg-primary" style="color:white;">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">Username</th>
						<th scope="col">Outlet</th>
						<th scope="col">Role</th>
						<th scope="col">Image</th>
                        <th scope="col">Action</th>
					</tr>
				</thead>

				<tbody align="center">
					<?php
          				if($count_user>0){
            			foreach($get_user as $datas){
          			?>
					<tr>
						<td><?php echo $datas->id;?></td>
						<td><?php echo $datas->name;?></td>
						<td><?php echo $datas->email;?></td>
						<td><?php echo $datas->phone;?></td>
						<td><?php echo $datas->username;?></td>
                        <td><?php echo $datas->id_outlet;?></td>
                        <td><?php echo $datas->role;?></td>
                        <td><img style="width : 75px;" src="<?php echo base_url('profile/'.$datas->image)?>"></td>
						<td>
							<div>
								<a href="<?php echo site_url('User/user_edit/'.$datas->id);?>">
									<button class="btn btn-success btn-block">Edit</button></a>
							</div>
							<div class="mt-2">
								<a href="<?php echo site_url('User/user_delete/'.$datas->id);?>">
									<button class="btn btn-danger btn-block">Delete</button></a>
							</div>
						</td>
					</tr>
					<?php } } else { ?>
					<tr>
						<td colspan="9">
							<center><b>Nothing !</b></center>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>DataTables/datatables.min.css"/> 
<script type="text/javascript" src="<?php echo base_url('assets/');?>DataTables/datatables.min.js"></script> -->

<script type="text/javascript">
	$(document).ready( function () {
   		$('#table').DataTable({
			"ordering": false
		   });
	});
</script>

			<!-- Modal Add Data -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div> 
						<div class="modal-body">
							<div class="row justify-content-center">
								<div class="card text-center">
									<div class="card-body">
										<form action="<?php echo site_url('User/user_save');?>"  method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" name="name" class="form-control" placeholder="Name" required>
											</div>
											<div class="form-group">
												<input type="text" name="email" class="form-control" placeholder="Email" required>
											</div>
											<div class="form-group">
												<input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
											</div>
											<div class="form-group">
												<input type="text" name="username" class="form-control" placeholder="Username" required>
											</div>
											<div class="form-group">
												<input type="password" name="password" class="form-control" placeholder="Password" required>
											</div>
											<div class="form-group">
                                                <select name="id_outlet" id="id_outlet" class="form-control" required>
                                                    <option selected disabled>Select Outlet...</option>
                                                    <?php foreach ($get_outlets as $name) : ?>
                                                    <option value="<?php echo $name->id; ?>"> <?php echo $name->name;?> </option>
                                                    <?php endforeach; ?>
                                                </select>  
											</div>
											<div class="form-group">
                                                <select name="role" id="role" class="form-control" required>
                                                    <option selected disabled>Select Role...</option>
													<option value="Admin">Admin</option>
													<option value="Cashier">Cashier</option>
													<option value="Owner">Owner</option>
												</select>
											</div>
											<div class="form-group">
												<input type="file" id="image" name="image" class="form-control">
											</div>

											<div class="form-group">
												<button class="btn btn-primary" type="submit">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
							</div>

						</div>

					</div>
				</div>
                <!-- End Modal -->
			</div>


		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->
