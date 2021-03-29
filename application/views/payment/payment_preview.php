<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Data Payment</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">ID</th>
                            <th scope="col">Date Payment</th>
                            <th scope="col">ID Transaction</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Money</th>
                            <th scope="col">Total Change</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           
                            foreach ($get_payments as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td><?php echo $datas->id;?></td>
                                <td><?php echo $datas->payment_date;?></td>
                                <td><?php echo $datas->id_transaction;?></td>
                                <td><?php echo $datas->total_price;?></td>
                                <td><?php echo $datas->money;?></td>
                                <td><?php echo $datas->total_change;?></td>
                                <td><?php echo $datas->status;?></td>
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