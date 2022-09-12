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
                        <th>Date</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getOrders();
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                            <td><?php echo $row['dated']; ?></td>
                            <td><a href="order_products.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">view details</a></td>
                        </tr>
                        <?php 
                        }
                    endif;
                    ?>
                </tbody>
           </table> 
       </div>
    </div>
</div>