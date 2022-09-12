<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       List of Staffs
   <section align="right">  <a href="../register-staff.php"> <button style="color:#f26a5a">Add New Staff <i class="fa fa-plus" style="color:#f26a5a"></i></button></a> </section>
   </div>
   <div class="panel-body">
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr>
                       <th>SN</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Address</th>
                       <th>Status</th>
                       <th>Delete</th>
                       <th>Inactive</th>
                       <th>Active</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
                   $result = getStaff();
                   $sn=1;
                   while($row=mysqli_fetch_assoc($result)){
                   ?>
                   <tr>
                       <td><?php echo $sn?></td>
                       <td><?php echo $row['name']?></td>
                       <td><?php echo $row['email']?></td>
                       <td><?php echo $row['phone']?></td>
                       <td><?php echo $row['address']?></td>
                        <td><?php echo $row['status']?></td>
                       <td><button onclick="deleteCustomer(<?php echo $row['id']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                       <td><button onclick="inactiveStaff(<?php echo $row['id']?>)"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
                       <td><button onclick="activeStaff(<?php echo $row['id']?>)"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                   </tr>
                 <?php
                   $sn++;
                   }
                 ?>


               </tbody>
           </table>
       </div>
   </div>
</div>
<!-- End  Hover Rows  -->
<script>
function deleteCustomer(id){
  //alert(id);
  $.ajax({
    type: "POST",
    url: './php/delete_customer.php',
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
<script>
function inactiveStaff(id){
  //alert(id);
  $.ajax({
    type: "POST",
    url: './php/inactive_staff.php',
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
<script>
function activeStaff(id){
  //alert(id);
  $.ajax({
    type: "POST",
    url: './php/active_staff.php',
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

