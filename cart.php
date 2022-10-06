<?php include('include/header.php');?>
<?php include('php/functions.php');?>
<?php
if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
        if($value['id'] === $_POST["id"]){
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product.
        }
    }
}

if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $key => $value) {
            if($_POST["id"] == $key){
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
                Product is removed from your cart!</div>";
            }
            if(empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }       
    }
}
?>
  <main id="main" style="padding-top: 2em;">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container"> 
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Shop</li>
            </ol>
            <h2>Cart</h2>
        </div>
    </section>
    <!-- End Breadcrumbs --> 

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-12">
                    <?php
                    if(!empty($_SESSION["shopping_cart"])):
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    <div class="cart_div">
                    <a href="cart.php"><img src="assets/img/cart-icon.png"> Cart<span><?php echo $cart_count; ?></span></a>
                    </div>
                    <?php
                    endif;
                    ?>
                </div>
                <br><br>

                <div class="col-lg-12" style="width:700px; margin:50 auto;">
                    <h2>Shopping Cart</h2>

                    <div class="cart">
                        <?php
                        if(isset($_SESSION["shopping_cart"])):
                            $total_price = 0;
                            ?>  
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>ITEM NAME</td>
                                        <td>QUANTITY</td>
                                        <td>UNIT PRICE</td>
                                        <td>ITEMS TOTAL</td>
                                    </tr>   
                                    <?php
                                    foreach ($_SESSION["shopping_cart"] as $product):
                                        // get product details
                                        $result = getProductSingle($product["id"]);  
                                        $row=mysqli_fetch_assoc($result);
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $row["name"]; ?><br />
                                                <form method='post' action=''>
                                                    <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                                                    <input type='hidden' name='action' value="remove" />
                                                    <button type='submit' class='remove'>Remove Item</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method='post' action=''>
                                                    <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                                                    <input type='hidden' name='action' value="change" />
                                                    <select name='quantity' class='quantity' onchange="this.form.submit()">
                                                        <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                                                        <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                                                        <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                                                        <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                                                        <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><?php echo "$".$row["price"]; ?></td>
                                            <td><?php echo "$".$row["price"]*$product["quantity"]; ?></td>
                                        </tr>
                                        <?php
                                        $total_price += ($row["price"]*$product["quantity"]);
                                    endforeach;
                                    ?>
                                    <tr>
                                        <td colspan="5" align="right">
                                            <strong>TOTAL: <?php echo "$".$total_price; ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right">
                                            <?php
                                            if(isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)):
                                            ?>
                                            <a onclick="Checkout()" class="btn btn-sm btn-primary">Checkout</a>
                                            <?php 
                                            else:
                                                echo "<h4 class='btn btn-sm btn-danger'>Login to proceed.</h4>";
                                            endif;
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>        
                            <?php
                        else:
                            echo "<h3>Your cart is empty!</h3>";
                        endif;
                        ?>
                    </div>

                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
    </section><!-- End Blog Section -->
  </main><!-- End #main -->
 
 <script>
    function Checkout(){
        $.ajax({
            type: "POST",
            url: 'php/checkout.php',
            success: function(response)
            {
                if (response == 'error') {
                    alert('Something went wrong. please try again.');
                }
                else {
                    window.location = 'payForOrder.php?id='+response;
                }
            }
        });
    }
</script>

<?php include('include/footer.php');?>
