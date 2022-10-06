<?php include('include/header.php');?>
<?php include('php/functions.php');?>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      
        <div class="container">
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Shop</li>
            </ol>
            <h2>Products</h2>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-12">
                    <?php
                    if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    <div class="cart_div">
                    <a href="cart.php"><img src="assets/img/cart-icon.png"> Cart<span><?php echo $cart_count; ?></span></a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <br><br>

                <?php
                $result = getProducts(); 
                if(mysqli_num_rows($result) > 0): 
                    while($row=mysqli_fetch_assoc($result)){ 
                    ?>

                    <div class="col-lg-4 entries">
                        <article class="entry">
                             <img src="assets/uploads/<?php echo $row['image']; ?>" alt="" style="width: 100%; height: 250px;" class="img-fluid">
                            <h2 class="entry-title">
                                <a href="#"><?php echo $row['name']; ?></a>
                            </h2>

                            <div class="entry-content">
                                <h3>$<?php echo $row['price']; ?></h3>
                                <p><?php echo $row['description']; ?></p>
                                <div class="read-more">
                                    <button onclick="addToCart(<?php echo $row['id']?>)" class='btn btn-sm btn-info'>add to cart</button>
                                </div>
                            </div>
                        </article>
                    </div> 
                    <?php 
                    }
                endif;
                ?>

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
