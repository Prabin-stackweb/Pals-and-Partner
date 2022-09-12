<?php
    include 'db_conn.php';
    if($_POST){
        $id           = mysqli_escape_string($mysqli, $_POST['id']);
        $name           = mysqli_escape_string($mysqli, $_POST['name']);
        $price          = mysqli_escape_string($mysqli, $_POST['price']);
        $description    = mysqli_escape_string($mysqli, $_POST['description']);

        // upload file
        if($_FILES['image']['error'] == 0):
            $target_dir     = "../../assets/uploads/";
            $file_name      = time().basename($_FILES["image"]["name"]);

            $target_file    = $target_dir.$file_name;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql_file     = "UPDATE  `products` SET `image` = '$file_name' WHERE `id` = $id;";
                $result_file  = mysqli_query($mysqli,$sql_file);
            }
        endif; 


        $sql = "UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description' WHERE `id` = $id;";
        $result=mysqli_query($mysqli,$sql);

        if($result){
            echo true; 
          }else{
            echo "something went wrong. please try again.";
          }
    }
?> 