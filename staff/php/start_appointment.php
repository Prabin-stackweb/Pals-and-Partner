<?php
     include ('db_conn.php');
     if($_POST){
          $id = mysqli_escape_string($mysqli,$_POST['id']);

          $sql="UPDATE  `appointments` SET `status` = 'Started' WHERE `id` = '$id';";
         
          $result=mysqli_query($mysqli,$sql);
          if($result){
              echo true;
          }else{
            echo "Something went wrong, please try again.";
          }
    }
    else{
        echo 'No Data';
     }
    ?>
a

