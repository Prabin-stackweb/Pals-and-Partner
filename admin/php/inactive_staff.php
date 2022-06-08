<?php
     include ('db_conn.php');
     if($_POST){
          $inactive_id=mysqli_escape_string($mysqli,$_POST['id']);
          $sql="UPDATE  `user` SET `status` = 'Inactive' WHERE `user`.`id` = $inactive_id;";
         
          $result=mysqli_query($mysqli,$sql);
          if($result){
              echo true;
          }else{
            echo "Inactive Unsuccessful";
          }
    }
    else{
        echo 'No Data';
     }
    ?>


