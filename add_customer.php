<?php
if(!isset($_SESSION)){
  session_start();
}

$isLoggedIn = false;
if(isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)){
  $isLoggedIn = true;
  if(!($_SESSION['user_type']=="admin")){
    echo '<script type="text/javascript">',
       'window.location.assign("index.php");',
       '</script>';
  }
}elseif (!$isLoggedIn){
  echo '<script type="text/javascript">',
     'window.location.assign("index.php");',
     '</script>';
}

?>
<?php include ('include/header.php');?>
<!-- Login css -->
<link rel="stylesheet" href="assets/css/login.css">
    <div class="main">

     

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register Customer</h2>
                        <form id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="phone" id="phone" placeholder="Your Phone Number"  maxlength = "10" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="address" id="address" placeholder="Your Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="pass" id="pass" placeholder="Password" minlength = "8" maxlength = "15" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="re_pass" id="re_pass" placeholder="Repeat your password"  minlength = "8" maxlength = "15" required/>
                            </div>
                            <input type="hidden" name="type" value="customer">
                             <input type="hidden" name="status" value="active">
                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/img/login/signup-image.jpg" alt="sign up image"></figure>
                        <a href="admin/index.php" class="signup-image-link">Go Back to Admin Panel</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
    //User Registration
    $('#register-form').submit(function(e) {
      e.preventDefault();
      console.log($(this).serialize());
      $.ajax({
        type: "POST",
        url: './php/add_customer.php',
        data: $(this).serialize(),
        success: function(response)
        {
            if (response == true) {
              //alert("Successfully Registered. Please login");
              window.location = 'login.php';
            }
            else {
              Swal.fire(response);
            }
        }
    });
    });

    </script>
