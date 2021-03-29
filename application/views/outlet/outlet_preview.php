<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Data Outlet</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Price Package</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           
                            foreach ($get_outlets as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td><?php echo $datas->id;?></td>
                                <td><?php echo $datas->name;?></td>
                                <td><?php echo $datas->address;?></td>
                                <td><?php echo $datas->phone;?></td>
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