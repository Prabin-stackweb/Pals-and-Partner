<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Cleaning Type
   </div>
    <div class="panel-body">
        <form class="mb-4"> 
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="type" placeholder="Cleaning Type" class="form-control" required>
                </div> 
                <div class="col-md-4">
                    <input type="number" step="0.01" name="price" placeholder="Price" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="file" name="image" placeholder="image" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                </div>
            </div> 
        </form>
        <br> 
        <hr>
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead> 
                    <tr>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    $result = getCleaningType(); 
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                            <td><img src="../assets/uploads/<?php echo $row['image']; ?>" width="50" height="50"></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <th>
                                <a href="update_cleaning_type.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <button onclick="deleteType(<?php echo $row['id']?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </th>
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
 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            console.log($(this).serialize());
 
            $.ajax({
                type: "POST", 
                url: './php/add_cleaning_type.php',
                data: new FormData(this), // $(this).serialize()
                contentType: false,  
                processData:false,  
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
        });
    });
</script>
<script>
function deleteType(id){
  //alert(id);
  $.ajax({
    type: "POST",
    url: './php/delete_cleaning_type.php',
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