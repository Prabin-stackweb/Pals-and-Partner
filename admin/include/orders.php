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
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Payment Status</th>
                        <th>Shipped</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getOrders();
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                            $result_customer = getStaff($row['customer_id']);
                            $row_customer    = mysqli_fetch_assoc($result_customer);
                        ?>
                        <tr>
                            <td><?php echo $row_customer['name']; ?></td>
                            <td><?php echo $row_customer['email']; ?></td>
                            <td><?php echo $row_customer['phone']; ?></td>
                            <td><?php echo $row_customer['address']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td> 
                                <?php if($row['shipped'] == 'No'): ?>
                                <button class="btn btn-sm btn-success" onclick="shipOrdder(<?php echo $row['id']?>)">ship now</button>  
                                <?php else: echo $row['shipped']; endif; ?>  
                            </td>
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

<script>
function shipOrdder(id){
    $.ajax({
        type: "POST",
        url: './php/ship_order.php',
        data: {id:id},
        success: function(response)
        {
            if (response == true) {           
                location.reload();
            }
            else {
            alert(response);
            }
        }
    });
}
</script>