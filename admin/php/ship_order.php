<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include ('db_conn.php');
    include ('functions.php');
    if($_POST){
        $id = mysqli_escape_string($mysqli,$_POST['id']);
        $sql="UPDATE  `orders` SET `shipped` = 'Yes' WHERE `id` = $id;";
        $result=mysqli_query($mysqli,$sql);
        if($result){
            
            $result_customer = getUserData($result['customer_id']);
            $row_customer    = mysqli_fetch_assoc($result_customer);
            $customer_email  = $row_customer['email'];

            // email to customer
            $to      = $customer_email;
            $subject = "Order Shipped";
            $txt = "You order has been shipped successfully.";
            $headers = "From: palsnpartnerscln@gmail.com";
            mail($to,$subject,$txt,$headers);

            echo true; 
        }else{
            echo "Something went wrong. Please try again.";
        }
    }
    else{ 
        echo 'No Data';
    }
?>


