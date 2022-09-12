<!--    Hover Rows  -->
<div class="panel panel-default">
    <div class="panel-body">
        <?php
       $result  = getProductSingle($_GET['id']);
       $row     = mysqli_fetch_assoc($result);
       ?>
        <form class="mb-4"> 
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" placeholder="Product Name" class="form-control" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="price">Product Price</label>
                    <input type="number" step="0.01" name="price" id="price" placeholder="Product Price" class="form-control" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="description">Product Image</label>
                    <input type="file" name="image" placeholder="image" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Write your description here..." class="form-control" required rows="10"><?php echo $row['description']; ?></textarea>
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
                url: './php/update_product.php',
                data: new FormData(this), // $(this).serialize()
                contentType: false,  
                processData:false, 
                success: function(response)
                {
                    if (response == true) { 
                        window.location = 'products_list.php';
                    }
                    else {
                    alert(response);
                    }
                }
              });
        });
    });
</script>