<?php
    include 'db_conn.php';
    if($_POST){

        $customer_id = $_SESSION['id'];

        $type         = mysqli_escape_string($mysqli, $_POST['type']);
        $category   = mysqli_escape_string($mysqli, $_POST['category']);
        $details     = mysqli_escape_string($mysqli, $_POST['details']);

        $sql = "INSERT INTO appointments(customer_id, type, category, details, status) VALUES('$customer_id', '$type', '$category', '$details', 'Unpaid');";
        $result=mysqli_query($mysqli,$sql);

        if($result){
            echo true; 
          }else{
            echo "something went wrong. please try again.";
          }
    }
?>
 