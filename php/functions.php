<?php
include('db_conn.php');

function getProducts(){
    global $mysqli;
    $query="SELECT * FROM products";
    $result=mysqli_query($mysqli,$query);
    return $result; 
}

function getProductSingle($id){
    global $mysqli;
    $query="SELECT * FROM products WHERE id='$id' LIMIT 1";
    $result=mysqli_query($mysqli,$query);
    return $result; 
}

function getMyLastOrder($id){ 
  	global $mysqli;

  	$query="SELECT * FROM orders WHERE id='$id' LIMIT 1";
  	$result=mysqli_query($mysqli,$query);
  	// get products
  	$query_products  = "SELECT * FROM ordered_products WHERE order_id='$id' LIMIT 1";
  	$result_products = mysqli_query($mysqli,$query_products);
 
 	$price = 0;
 	if(mysqli_num_rows($result_products) > 0): 
	    while($row=mysqli_fetch_assoc($result_products)){ 
	    	$result_pro = getProductSingle($row['product_id']); 
	    	$row_pro    = mysqli_fetch_assoc($result_pro);
	    	$sub_total = $row_pro['price']*$row['qty'];
    		$price += $sub_total;
	    }
	endif;

  return $price; 
}


function getServices(){
    global $mysqli;
    $query="SELECT * FROM cleaningtype";
    $result=mysqli_query($mysqli,$query);
    return $result; 
}
?>

