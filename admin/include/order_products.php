<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Alll appointments
   </div>
    <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Amount</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $result = getOrderProducts($_GET['id']);
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                            <?php 
                            $result_pro = getProductSingle($row['product_id']); 
                            $row_pro    = mysqli_fetch_assoc($result_pro);
                            ?>
                            <td><img src="../assets/uploads/<?php echo $row_pro['image']; ?>" width="50" height="50"></td>
                            <td><?php echo $row_pro['name']; ?></td>
                            <td><?php echo $row['qty']; ?></td>
                            <?php 
                            $sub_total = $row_pro['price']*$row['qty'];
                            $total += $sub_total;
                            ?>
                            <td>$<?php echo $sub_total; ?></td>
                        </tr>
                        <?php 
                        }
                    endif;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th>$<?php echo $total; ?></th>
                    </tr>
                </tfoot>
           </table> 
       </div>
    </div>
</div>