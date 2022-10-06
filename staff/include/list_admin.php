<!--    Hover Rows  -->
<div class="panel panel-default">
   
   <div class="panel-heading">
       List of Admin
   <section align="right">  <a href="../add_admin.php"> <button style="color:#f26a5a">Add New Admin <i class="fa fa-plus" style="color:#f26a5a"></i></button></a> </section>
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
                       
                   </tr>
               </thead>
               <tbody>
                 <?php
                   $result = getAdmin();
                   $sn=1;
                   while($row=mysqli_fetch_assoc($result)){
                   ?>
                   <tr>
                       <td><?php echo $sn?></td>
                       <td><?php echo $row['name']?></td>
                       <td><?php echo $row['email']?></td>
                       <td><?php echo $row['phone']?></td>
                       <td><?php echo $row['address']?></td>
                        
                       
                      
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

