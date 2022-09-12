<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Products List
   </div>
    <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th style="width: 10%;">Image</th>
                        <th style="width: 18%;">Product Name</th>
                        <th style="width: 10%;">Product Price</th>
                        <th style="width: 60%;">Description</th>
                        <th style="width: 12%;">Action</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    $result = getProducts(); 
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                            <td><img src="../assets/uploads/<?php echo $row['image']; ?>" width="50" height="50"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['description']; ?></td> 
                            <td>
                                <a href="product_update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <button onclick="deleteProduct(<?php echo $row['id']?>)" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
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
function deleteProduct(id){
    //alert(id);
    $.ajax({
        type: "POST",
        url: './php/delete_product.php',
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
