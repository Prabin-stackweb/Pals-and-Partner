<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Cleaning Type
   </div>
   <?php
   $result  = getCleaningTypeSingle($_GET['id']);
   $row     = mysqli_fetch_assoc($result);
   ?>
    <div class="panel-body">
        <form class="mb-4"> 
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="type" placeholder="Cleaning Type" class="form-control" value="<?php echo $row['type']; ?>" required>
                </div>
                <div class="col-md-4">
                    <input type="number" step="0.01" name="price" placeholder="Price" class="form-control" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="col-md-4">
                    <input type="file" name="image" placeholder="image" class="form-control">
                </div>
            </div>
            <br> 
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
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
                url: './php/update_cleaning_type.php',
                data: new FormData(this), // $(this).serialize()
                contentType: false,  
                processData:false,  
                success: function(response)
                {
                    if (response == true) {   
                        window.location = 'cleaning_type.php';
                    }
                    else {
                    alert(response);
                    }
                }
              });
        });
    });
</script>