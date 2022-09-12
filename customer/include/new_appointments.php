<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Appointments
   </div>
    <div class="panel-body">
        <form class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <select name="type" id="type" class="form-control" required>
                        <option value="" selected disabled>select type</option>
                        <?php
                        $result = getCleaningType(); 
                        if(mysqli_num_rows($result) > 0): 
                            while($row=mysqli_fetch_assoc($result)){ 
                            ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['type']; ?>
                                -
                                $<?php echo $row['price']; ?>
                            </option>
                            <?php 
                            }
                        endif;
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" name="category" placeholder="Cleaning Category" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class="col-md-6">
                    <input type="date" name="dated" placeholder="date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="time" name="timing" placeholder="time" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class="col-md-12">
                    <textarea name="details" placeholder="Details" class="form-control" required></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-sm btn-primary" type="submit">save</button>
                </div>
            </div>
        </form>
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
                url: './php/add_appointments.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    if (response == 'error') {       
                        alert('something went wrong. please try again.');   

                    }
                    else {
                        window.location = 'payForAppointment.php?id='+response;
                    }
                }
              });


        });
    });
</script>
