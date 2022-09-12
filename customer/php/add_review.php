<?php
     include ('db_conn.php');
     if($_POST){
          $id = mysqli_escape_string($mysqli,$_POST['id']);
          $review = mysqli_escape_string($mysqli,$_POST['review']);

          $sql="UPDATE  `appointments` SET `review` = '$review' WHERE `id` = '$id';";
         
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


