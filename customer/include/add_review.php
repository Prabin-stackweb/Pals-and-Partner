<!--    Hover Rows  -->
<div class="panel panel-default">
   <div class="panel-heading">
       Add review
   </div>
    <div class="panel-body">
        <form class="mb-4">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="review" placeholder="Write your review here..." class="form-control" required>
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
                url: './php/add_review.php',
                data: $(this).serialize(),
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


        });
    });
</script>
