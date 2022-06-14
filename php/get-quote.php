<?php
    include 'db_conn.php';
    $errors=array();

	if($_POST){
        $user_id= mysqli_escape_string($mysqli, $_POST['user_id']);
        $name= mysqli_escape_string($mysqli, $_POST['name']);
        $email= mysqli_escape_string($mysqli, $_POST['email']);
        $phone= mysqli_escape_string($mysqli, $_POST['phone']);
        $area= mysqli_escape_string($mysqli, $_POST['area']);
        $frequency= mysqli_escape_string($mysqli, $_POST['frequency']);
        $service= mysqli_escape_string($mysqli, $_POST['service']);

        $sql="INSERT INTO quote_request(user_id, name, email, phone, area, frequency, service)
                              VALUES('$user_id','$name', '$email', '$phone', '$area', '$frequency', '$service');";
        $result=mysqli_query($mysqli,$sql);
        if($result){
            echo true;
          }else{
            array_push($errors, "Can't insert the data");
            echo $errors[0].$mysqli -> error;
          }
  }


?>
