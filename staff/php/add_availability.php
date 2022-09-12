<?php
    include 'db_conn.php';
    if($_POST){

        $staff_id = $_SESSION['id'];

        $day         = mysqli_escape_string($mysqli, $_POST['day']);
        $from_time   = mysqli_escape_string($mysqli, $_POST['from_time']);
        $to_time     = mysqli_escape_string($mysqli, $_POST['to_time']);

        $sql = "INSERT INTO availabilty(staff_id, day, from_time, to_time) VALUES('$staff_id', '$day', '$from_time', '$to_time');";
        $result=mysqli_query($mysqli,$sql);

        if($result){
              echo true;
          }else{
            echo "something went wrong. please try again.";
          }
    }
?>
