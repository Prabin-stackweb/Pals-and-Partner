<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Alll appointments
   </div>
    <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Category</th> 
                        <th>Time</th>
                        <th>Date</th>
                        <th>Status</th>
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
                            <td><?php echo $row['timing']; ?></td>
                            <td><?php echo $row['dated']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo ($row['assigned_to']) ? $row['assigned_to'] : 'N/A'; ?></td>
                            <th>
                                <?php if($row['status'] == 'Completed' && $row['review'] == ''): ?>
                                <a href="add_review.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">add review</a>
                                <?php 
                                elseif($row['status'] == 'Completed' && $row['review'] != ''): 
                                    echo $row['review']; 
                                else: 
                                    echo "N/A"; 
                                endif; 
                                ?>
                            </th>
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