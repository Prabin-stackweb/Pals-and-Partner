<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
     include ('db_conn.php');
     if($_POST){

          $id       = mysqli_escape_string($mysqli,$_POST['id']);
          $type     = mysqli_escape_string($mysqli,$_POST['type']);
          $price    = mysqli_escape_string($mysqli,$_POST['price']); 

            // upload file
            if($_FILES['image']['error'] == 0):
                $target_dir     = "../../assets/uploads/";
                $file_name      = time().basename($_FILES["image"]["name"]);

                $target_file    = $target_dir.$file_name;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql_file     = "UPDATE  `cleaningtype` SET `image` = '$file_name' WHERE `id` = $id;";
                    $result_file  = mysqli_query($mysqli,$sql_file);
                }
            endif; 


          $sql="UPDATE  `cleaningtype` SET `type` = '$type', `price` = '$price' WHERE `id` = $id;";
         
          $result=mysqli_query($mysqli,$sql);
          if($result){
              echo true; 
          }else{
            echo "Something went wrong. Please try again.";
          }
    }
    else{ 
        echo 'No Data';
     }
    ?>


