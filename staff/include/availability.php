<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       availability
   </div>
    <div class="panel-body">
        <form class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="day" placeholder="Monday, Tuesday ..." class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="from_time" placeholder="Available from" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_time" placeholder="Available to" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-sm btn-primary" type="submit">save</button>
                </div>
            </div>
        </form>
        <br><br>
       <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" id="dataTables-example11">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>From Time</th> 
                        <th>To Time</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getAvailabilty();
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                            <td><?php echo $row['day']?></td>
                            <td><?php echo $row['from_time']?></td>
                            <td><?php echo $row['to_time']?></td>
                            <td>
                                <button class="btn btn-sm btn-danger" onclick="deleteAvailibilty(<?php echo $row['id']?>)">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
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
    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            console.log($(this).serialize());

            $.ajax({
                type: "POST", 
                url: './php/add_availability.php',
                data: $(this).serialize(),
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


        });
    });
</script>
<script>
    function deleteAvailibilty(id){
      //alert(id);
      $.ajax({
        type: "POST",
        url: './php/delete_availability.php',
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
