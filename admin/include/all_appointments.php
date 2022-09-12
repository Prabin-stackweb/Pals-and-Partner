<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       All appointments
   </div>
    <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Category</th> 
                        <th>Details</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Transaction ID</th>
                        <th>Assigned To</th>
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
                            <td><?php echo $row_type['price']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['details']; ?></td>
                            <td><?php echo $row['timing']; ?></td>
                            <td><?php echo $row['dated']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo ($row['transaction_id']) ? $row['transaction_id'] : 'N/A'; ?></td>
                            <td>
                                <?php 
                                if(!isset($row['assigned_to'])): 
                                ?>
                                <a href="assign_appointment.php?appointment_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">
                                Assign to staff
                                </a>
                                <?php
                                else:
                                    $result_staff = getStaffById($row['assigned_to']);
                                    $row_staff=mysqli_fetch_assoc($result_staff);
                                    echo $row_staff['name'].' - '.$row_staff['phone'];
                                endif; 
                                ?>
                            </td>
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