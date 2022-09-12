<?php
include('db_conn.php');

function getTotalNumberOfCustomers(){
  global $mysqli;
  $query="SELECT COUNT(type) AS totalCustomers FROM user WHERE type='customer';";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['totalCustomers'];
}

function getTotalNumberOfStaff(){
  global $mysqli;
  $query="SELECT COUNT(type) AS totalStaff FROM user WHERE type='staff';";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['totalStaff'];
}

function getTotalNumberOfQuotes(){
  global $mysqli;
  $query="SELECT COUNT(id) AS totalQuotes FROM quote_request;";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['totalQuotes'];
}

function getTotalNumberOfMessages(){
  global $mysqli;
  $query="SELECT COUNT(id) AS messages FROM message;";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['messages'];
}


function getAppointments(){
  global $mysqli;
  $query="SELECT * FROM appointments WHERE customer_id=".$_SESSION['id'];
  $result=mysqli_query($mysqli,$query);
  return $result; 
}

function getStaff(){
  global $mysqli;
  $query="SELECT id,name,email,phone,address,status FROM user WHERE type='staff';";
  $result=mysqli_query($mysqli,$query);
  return $result;
}
function getAdmin(){
  global $mysqli;
  $query="SELECT id,name,email,phone,address,status FROM user WHERE type='admin';";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function getCleaningType(){
  global $mysqli;
  $query="SELECT * FROM cleaningtype";
  $result=mysqli_query($mysqli,$query);
  return $result; 
}

function getCleaningTypeSingle($id){
  global $mysqli;
  $query="SELECT * FROM cleaningtype WHERE id='$id' LIMIT 1";
  $result=mysqli_query($mysqli,$query);
  return $result; 
}


function getOrders(){
  global $mysqli;
  $query="SELECT * FROM orders WHERE customer_id=".$_SESSION['id'];
  $result=mysqli_query($mysqli,$query);
  return $result; 
}

function getOrderProducts($id){
  global $mysqli;
  $query="SELECT * FROM ordered_products WHERE order_id=".$id;
  $result=mysqli_query($mysqli,$query);
  return $result; 
}

function getProductSingle($id){
  global $mysqli;
  $query="SELECT * FROM products WHERE id='$id' LIMIT 1";
  $result=mysqli_query($mysqli,$query);
  return $result; 
}

function getMyLastAppointment($id){
  global $mysqli;

  $query="SELECT * FROM appointments WHERE id='$id' LIMIT 1";
  $result=mysqli_query($mysqli,$query);
  return $result; 
}

function getUserData($id){
  global $mysqli;

  $query="SELECT * FROM user WHERE id='$id' LIMIT 1";
  $result=mysqli_query($mysqli,$query);
  return $result; 
}


function getTotalNumberOfAppointments(){
    global $mysqli;
    $query="SELECT COUNT(type) AS appointments FROM appointments WHERE customer_id=".$_SESSION['id'];;
    $result=mysqli_query($mysqli,$query);
    $user_details=mysqli_fetch_assoc($result);
    return $user_details['appointments'];
}

function getTotalNumberOfOrders(){
    global $mysqli;
    $query="SELECT COUNT(id) AS orders FROM orders WHERE customer_id=".$_SESSION['id'];
    $result=mysqli_query($mysqli,$query);
    $user_details=mysqli_fetch_assoc($result);
    return $user_details['orders'];
}

?>

