<?php
    include 'db_conn.php';

    $customer_id = $_SESSION['id'];
    $dated =  date('Y-m-d');

    $sql = "INSERT INTO orders(customer_id, dated) VALUES ($customer_id, $dated)";
    $result=mysqli_query($mysqli,$sql);
    
    if($result):
        $order_id = $mysqli->insert_id;
        // store products
        foreach ($_SESSION["shopping_cart"] as $product):
            
            $product_id = $product['id'];
            $quantity   = $product['quantity'];

            $sql_pro    = "INSERT INTO ordered_products(order_id, product_id, qty) 
                            VALUES($order_id, $product_id, $quantity);";
            $result_pro = mysqli_query($mysqli,$sql_pro);

            if ($result_pro):
                // empty cart
                //unset($_SESSION["shopping_cart"]);
            else:
               echo("Error description: " . $mysqli->error);
            endif;
        endforeach;

        echo $order_id; 
    else:
        echo "error";
    endif;
?>