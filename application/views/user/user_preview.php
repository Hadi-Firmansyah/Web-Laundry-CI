<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Data User</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <td scope="col">ID</td>
                            <td scope="col">Name</td>
                            <td scope="col">Username</td>
                            <td scope="col">Email</td>
                            <td scope="col">Phone</td>
                            <td scope="col">Password</td>
                            <td scope="col">ID Outlet</td>
                            <td scope="col">Role</td>
                            <td scope="col">Image</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           
                            foreach ($get_user as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td><?php echo $datas->id;?></td>
                                <td><?php echo $datas->name?></td>
                                <td><?php echo $datas->username;?></td>
                                <td><?php echo $datas->email;?></td>
                                <td><?php echo $datas->phone;?></td>
                                <td><?php echo $datas->password;?></td>
                                <td><?php echo $datas->id_outlet;?></td>
                                <td><?php echo $datas->role;?></td>
                                <td><img style="width: 10px" src="<?php echo base_url('assets/'.$datas->image)?>" alt=""></td>
                            </tr>
                        <?php } 
                        ?>
                    </tbody>
            </table>            
            </div>
        </div>
      </div>
      </div>
</body>