<?php
    include ('db_conn.php');
    $id       = mysqli_escape_string($mysqli,$_GET['id']);

    $sql="UPDATE  `orders` SET `status` = 'Pending' WHERE `id` = $id;";
    $result=mysqli_query($mysqli,$sql);


    if($result){
        // empty cart
        unset($_SESSION["shopping_cart"]);
        header('Location: ../thankyou.php');
    }else{
        header('Location: payForOrder.php?id='.$id);
    }
?>


