<?php
    include 'db_conn.php';
    if($_POST){

        $customer_id = $_SESSION['id'];

        $type       = mysqli_escape_string($mysqli, $_POST['type']);
        $category   = mysqli_escape_string($mysqli, $_POST['category']);
        $details    = mysqli_escape_string($mysqli, $_POST['details']);
        $dated      = mysqli_escape_string($mysqli, $_POST['dated']);
        $timing     = mysqli_escape_string($mysqli, $_POST['timing']);


        $query_type  = "SELECT * FROM cleaningtype WHERE id= '$type' LIMIT 1";
        $result_type = mysqli_query($mysqli,$query_type);
        $row_type    = mysqli_fetch_assoc($result_type);

        $price      = $row_type['price'];

        $sql = "INSERT INTO appointments(customer_id, type, category, price, details, dated, timing, status) VALUES('$customer_id', '$type', '$category', '$price', '$details', '$dated', '$timing', 'Unpaid');";

        $result=mysqli_query($mysqli,$sql);

        $last_id = $mysqli->insert_id;

        if($result){
            echo $last_id; 
        }else{
            echo "error";
        }
    }
?>
