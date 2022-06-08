<?php
     include ('db_conn.php');
     if($_POST){
          $active_id=mysqli_escape_string($mysqli,$_POST['id']);
          $sql="UPDATE  `user` SET `status` = 'active' WHERE `user`.`id` = $active_id;";
         
          $result=mysqli_query($mysqli,$sql);
          if($result){
              echo true;
          }else{
            echo "Active Status successful";
          }
    }
    else{
        echo 'No Data';
     }
    ?>


