<?php include('include/header.php');?>
<?php include('php/functions.php');?>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>All Services</li>
        </ol>
        <h2>Services</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                    <?php
                    $result = getServices(); 
                    if(mysqli_num_rows($result) > 0): 
                        while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <div class="col-lg-4 entries">
                            <article class="entry" style="text-align: center;">
                                <div class="entry-img">
                                    <img src="assets/uploads/<?php echo $row['image']; ?>" alt="" class="img-fluid">
                                </div>
                                <h2 class="entry-title">
                                    <a href="#"><?php echo $row['type']; ?></a>
                                </h2>

                                <div class="entry-content">
                                    <p>$<?php echo $row['price']; ?></p>
                                    <!-- <div class="read-more">
                                        <a href="login.php">Login to book</a>
                                    </div> -->
                                </div>
                            </article><!-- End blog entry -->
                        </div>
                        <?php 
                        }
                    endif;
                    ?>
            </div>
        </div>
    </section><!-- End Blog Section -->
  </main><!-- End #main -->
<?php include('include/footer.php');?>
