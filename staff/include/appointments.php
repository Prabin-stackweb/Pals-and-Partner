<!--    Hover Rows  -->
<div class="panel panel-default">
    <div class="panel-heading">Aappointments</div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Time</th> 
                        <th>Date</th> 
                        <th>Details</th> 
                        <th>Review</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    $result = getAppointments();
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr> 
                            <?php 
                            $result_type = getCleaningTypeSingle($row['type']); 
                            $row_type    = mysqli_fetch_assoc($result_type);
                            ?>
                            <td><?php echo $row_type['type']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['timing']; ?></td>
                            <td><?php echo $row['dated']; ?></td>
                            <td>
                                <?php if($row['status'] != 'Completed' && $row['status'] == 'In Process'): ?>
                                    <button onclick="startAppointment(<?php echo $row['id']?>)" class="btn btn-info btn-sm">Start Now</button>
                                <?php elseif($row['status'] != 'Completed'): ?>
                                    <button onclick="completeAppointment(<?php echo $row['id']?>)" class="btn btn-success btn-sm">complete now</button>
                                <?php else: echo $row['status']; endif; ?>
                                
                            </td>
                            <td><?php echo $row['details']; ?></td>
                            <td><?php echo ($row['review']) ? $row['review'] : 'N/A'; ?></td>
                        </tr>
                        <?php 
                        }
                    endif;
                    ?>
                </tbody>
           </table> 
        </div>
    </div>
</div>
<!-- End  Hover Rows  -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    function completeAppointment(id){
      //alert(id);
      $.ajax({
        type: "POST",
        url: './php/complete_appointment.php',
        data: {id:id},
        success: function(response)
        {
            if (response == true) {          
              location.reload();
            }
            else {
            alert(response);
            }
        }
      });
    }

    function startAppointment(id){
      //alert(id);
      $.ajax({
        type: "POST",
        url: './php/start_appointment.php',
        data: {id:id},
        success: function(response)
        {
            if (response == true) {          
              location.reload();
            }
            else {
            alert(response);
            }
        }
      });
    }
</script>
