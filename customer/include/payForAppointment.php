<?php 
include('php/db_conn.php');
//include('php/functions.php'); 
?>
<div id="response"></div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<?php 
$result = getMyLastAppointment($_GET['id']);
$appointment = mysqli_fetch_assoc($result);
?>
<script>
    paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'AWI5Lukt3ciwVeowvuqeOj-YgyP1RtaINfVSJzsvggOJAfVuzPnau1m412pYAPA_PCwKzWbSkUBGq0mu'
    },
    // Set up a payment
    payment: function(data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '<?php echo $appointment['price']; ?>',
                    currency: 'USD'
                }
            }] 
        });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            // document.getElementById("response").style.display = 'inline-block';
            // document.getElementById("response").innerHTML = 'Thank you for making the payment!';
            // document.getElementById("response").style.display = 'inline-block';
            // redirect to page to 
            window.location = 'php/appointmentPaid.php?id='+<?php echo $_GET['id']; ?>;
        });
    }
  }, '#paypal-button');
</script>