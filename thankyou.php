<?php include('include/header.php');?>
<?php include('php/functions.php');?>

  <main id="main" style="padding-top: 2em;">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Order</li>
            </ol>
            <h2>Order Completed</h2>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 entries">
                    <article class="entry">
                        <h2 class="entry-title">
                            Thank You
                        </h2> 
                        <p>
                            Your order has been recieved successfully.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section><!-- End Blog Section -->
  </main><!-- End #main -->

<script>
    function addToCart(id){
        //alert(id);
        $.ajax({
            type: "POST",
            url: 'php/add_to_cart.php',
            data: {id:id},
            success: function(response)
            {
                alert(response);
            }
        });
    }
</script>

  <?php include('include/footer.php');?>
