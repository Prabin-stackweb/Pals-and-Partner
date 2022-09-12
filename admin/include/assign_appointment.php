<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       All Staff
   </div>
    <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th> 
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Availability</th>
                        <th>Assign</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getStaff();
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                            <?php 
                                $result1 = getAvailability($row['id']); 
                                if(mysqli_num_rows($result1) > 0): 
                                    while($row1=mysqli_fetch_assoc($result1)):
                                    ?>
                                    <ul>
                                        <li>Day: <?php echo $row1['day'];?></li>
                                        <li>From: <?php echo $row1['from_time'];?></li>
                                        <li>To: <?php echo $row1['to_time'];?></li>
                                    </ul>
                                    <?php
                                    endwhile;
                                endif;
                            ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="assignAppt(<?php echo $row['id']?>)">assign</button>
                            </td>
                        </tr>
                        <?php 
                        endwhile;
                    endif;
                    ?>
                </tbody>
           </table> 
       </div>
    </div>
</div>
<input type="hidden" name="appt_id" id="appt_id" value="<?php echo $_GET['appointment_id']; ?>">
<!-- End  Hover Rows  -->
<script>
function assignAppt(id){
    var appt_id = $("#appt_id").val();
    $.ajax({
        type: "POST",
        url: './php/assign_appointment.php',
        data: {id:id, appt_id:appt_id},
        success: function(response)
        {
            if (response == true) {           
                window.location = 'all_appointments.php';
            }
            else {
            alert(response);
            }
        }
    });
}
</script>
