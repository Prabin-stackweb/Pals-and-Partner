<?php
    include 'db_conn.php';
    if($_POST){
        $name           = mysqli_escape_string($mysqli, $_POST['name']);
        $price          = mysqli_escape_string($mysqli, $_POST['price']);
        $description    = mysqli_escape_string($mysqli, $_POST['description']);
 
        // upload file
        $target_dir     = "../../assets/uploads/";
        $file_name      = time().basename($_FILES["image"]["name"]);
        
        $target_file    = $target_dir.time().$file_name;
 
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO products(name, price, description, image) VALUES('$name', '$price', '$description', '$file_name');";
            $result=mysqli_query($mysqli,$sql);

            if($result){
                echo true; 
            }else{
                echo "something went wrong. please try again.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
