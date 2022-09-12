<?php
    include 'db_conn.php';
    if($_POST):

        $id = mysqli_escape_string($mysqli,$_POST['id']);

        $cartArray = array(
            $id=>array(
            'id'        => $id,
            'quantity'  => 1)
        );
 
        if(empty($_SESSION["shopping_cart"])):
            $_SESSION["shopping_cart"] = $cartArray;
            echo "Product is added to your cart!";
        else:
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if(in_array($id,$array_keys)):
                echo "Product is already added to your cart!";
            else:
                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                echo "Product is added to your cart!";
            endif;
        endif;
    else:
        echo 'No Data';
    endif;
?>
