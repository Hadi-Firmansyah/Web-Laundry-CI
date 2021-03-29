<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 style="text-align: center">Data Transaction</h1>
            <p style="text-align: center"><?php echo "Tanggal: ".date('d-m-Y'); ?></p>
            <br><br>
            <div class="table-responsive mb-4">
            <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">ID</th>
                            <th scope="col">Date Transaction</th>
                            <th scope="col">ID Customer</th>
                            <th scope="col">Price Package</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           
                            foreach ($get_transactions as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td><?php echo $datas->id;?></td>
                                <td><?php echo $datas->transaction_date;?></td>
                                <td><?php echo $datas->id_member;?></td>
                                <td><?php echo $datas->price_package;?></td>
                                <td><?php echo $datas->quantity;?></td>
                                <td><?php echo $datas->notes;?></td>
                                <td><?php echo $datas->total_price;?></td>
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