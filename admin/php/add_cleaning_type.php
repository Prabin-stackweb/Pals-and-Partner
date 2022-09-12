<?php
    include 'db_conn.php';
    if($_POST){

        // upload file
        $target_dir     = "../../assets/uploads/";
        $file_name      = time().basename($_FILES["image"]["name"]);
        
        $target_file    = $target_dir.time().$file_name; 

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $type         = mysqli_escape_string($mysqli, $_POST['type']);
            $price   = mysqli_escape_string($mysqli, $_POST['price']);

            $sql = "INSERT INTO cleaningtype(type, price, image) VALUES('$type', '$price', '$file_name');";
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
