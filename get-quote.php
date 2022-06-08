<?php
  include ('include/header.php');

  if($isLoggedIn):
    include ('php/user_details.php');
?>
<!-- Login css -->
<link rel="stylesheet" href="assets/css/login.css">

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Get Quote</h2>
                        <form id="get-quote-form">
                          <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php echo $name ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"  value="<?php echo $email ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number"  value="<?php echo $phone ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="sqfootage"><i class="zmdi zmdi-n-4-square"></i></label>
                                <input type="number" name="area" id="area" placeholder="Square Footage in Number" required/>
                            </div>
                            <div class="form-group">
                                <label for="frequency"><i class="zmdi zmdi-view-week" required></i></label>
                                <select name="frequency" id="frequency">
                  								<option value="Weekly">Weekly</option>
                  								<option value="Fortnightly">Fortnightly</option>
                                  <option value="Monthly">Monthly</option>
                  							</select>
                            </div>
                            <div class="form-group">
                                <label for="service"><i class="zmdi zmdi-star"></i></label>
                                <select name="service" id="service" required>
                  								<option value="Office Cleaning">Office Cleaning</option>
                  								<option value="Commercial Cleaning">Commercial Cleaning</option>
                                  <option value="House Cleaning">House Cleaning</option>
                                  <option value="Vacant Cleaning">Vacant Cleaning</option>
                                  <option value="Apartment Cleaning">Apartment Cleaning</option>
                  							</select>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="get-quote" id="get-quote" class="form-submit" value="Get Quote"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/img/quote.jpg" alt="request quote"></figure>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
    //Get Quote
    $('#get-quote-form').submit(function(e) {
      e.preventDefault();
      console.log($(this).serialize());
      $.ajax({
        type: "POST",
        url: './php/get-quote.php',
        data: $(this).serialize(),
        success: function(response)
        {          
            if (response == true) {
              Swal.fire(
                'Quote Requested Successfully',
                '',
                'success'
              );
              Swal.success();
            }
            else {
              Swal.fire(response);
            }
        }
    });
    });
    </script>



<?php else:?>
  <br/>
  <br/>
  <br/>
  <div class="container">
    <h5 class="display-4">Please Login to Get Quote</h5>
  </div>
<?php endif;?>
