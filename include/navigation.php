<nav class="nav-menu d-none d-lg-block">
  
  <ul>
    <li class="active"><a href="index.php#header">Home</a></li>
    <li><a href="index.php#about">About</a></li>
    <li><a href="index.php#tabs">Products</a></li>
    <li><a href="index.php#services">Services</a></li>

    <li><a href="index.php#contact">Contact</a></li>
    <?php if(!$isLoggedIn){

      echo "<li><a href='login.php'>Login</a></li>";
    //  echo "not logged in";
    }else{
      if($_SESSION["user_type"]=="admin"){
        echo "
        <li class='drop-down'><a href=''>Admin</a>
          <ul>
            <li><a href='admin/index.php'>Admin Panel</a></li>            
          </ul>
        </li>
        <li><a href='register-staff.php'>Register Staff</a></li>
        ";
      }else{
        echo "<li><a href='get-quote.php'>Get Quote</a></li>";
      }
      echo "<li class='drop-down'><a href=''>Account</a>
              <ul>
                <li><a href='profile.php'>Profile</a></li>
                <li><a href='php/logout.php'>Logout</a></li>
              </ul>
            </li>
            ";
    } ?>




  </ul>
</nav><!-- .nav-menu -->
