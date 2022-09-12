<?php 
    include ('db_conn.php');
    include ('functions.php');
    $id       = mysqli_escape_string($mysqli,$_GET['id']);

    $sql="UPDATE  `appointments` SET `status` = 'Pending' WHERE `id` = $id;";
    $result=mysqli_query($mysqli,$sql);
 
    if($result){
        $result_customer = getUserData($_SESSION['id']);
        $row_customer    = mysqli_fetch_assoc($result_customer);
        $customer_email  = $row_customer['email'];

    	// email to customer
        $to      = $customer_email;
        $subject = "New Appointment";
        $txt = "Your appointment placed successfully.";
        $headers = "From: palsnpartnerscln@gmail.com";
        mail($to,$subject,$txt,$headers);
 
        // email to admins
        $result = getAppointments();
        if(mysqli_num_rows($result) > 0): 
            while($row=mysqli_fetch_assoc($result)){ 
                $to      = $row['email'];
                $subject = "New Appointment";
                $txt = "<h1>You have recieved a new appointment.</h1>";
                $headers = "From: palsnpartnerscln@gmail.com";
                mail($to,$subject,$txt,$headers);
            }
        endif;
 
        header('Location: ../all_appointments.php');
    }else{
        header('Location: payForAppointment.php?id='.$id);
    }
?>


