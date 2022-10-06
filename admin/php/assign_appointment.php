<?php
    include ('db_conn.php');
    include ('functions.php');
    $staff_if = mysqli_escape_string($mysqli,$_POST['id']);
    $appt_id  = mysqli_escape_string($mysqli,$_POST['appt_id']);

    $sql="UPDATE  `appointments` SET `assigned_to` = '$staff_if', `status` = 'In Process' WHERE `id` = $appt_id;";
 
    $result=mysqli_query($mysqli,$sql);

    if($result){
        // email to staff
        $result_staff = getStaffById($staff_if);
        $row_staff    = mysqli_fetch_assoc($result_staff);
        $staff_email  = $row_staff['email'];

        // email to customer
        $to      = $staff_email;
        $subject = "New Appointment";
        $txt = "Your appointment placed successfully.";
        $headers = "From: palsnpartnerscln@gmail.com";
        mail($to,$subject,$txt,$headers);

        echo true;
    }else{
    echo "Something went wrong, please try again.";
    }
?>

