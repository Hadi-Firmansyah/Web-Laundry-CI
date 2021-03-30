<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h1 class="h2 mb-0 text-gray-800">User / <small> Edit</small></h1>
</div> 
<div class="card-body">
	<form action="<?php echo site_url('User/action_edit');?>" method="POST" enctype="multipart/form-data">
    <?php foreach($data_edit as $edit): ?>
        <input type="hidden" name="id" id="id" value="<?php echo $edit->id; ?>">
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $edit->name; ?>" required>
		</div>
		<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $edit->email; ?>" required>
		</div>
		<div class="form-group">
			<input type="number" name="phone" class="form-control" placeholder="Phone" value="<?php echo $edit->phone; ?>" required>
		</div>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $edit->username; ?>" required>
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>
        <!-- <div class="form-group">
			<input type="number" name="id_outlet" class="form-control" placeholder="ID Outlet" value="<?php echo $edit->id_outlet; ?>" required>
		</div> -->
		<div class="form-group">
			<select name="id_outlet" class="form-control">
			<?php foreach ($get_outlets as $name) : ?>
                <option value="<?php echo $name->id; ?>"> <?php echo $name->name;?></option>
            <?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<select name="role" id="role" class="form-control" readonly>
			<option value="<?php echo $edit->role; ?>"> <?php echo $edit->role;?></option>
			</select>
		</div>
		<div class="form-group">
			<input type="file" name="image" class="form-control" placeholder="Image" required>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
        <?php endforeach; ?>
	</form>
</div>

</div>
		<!-- End of Main Content -->

<!-- End Page Content -->
</div
