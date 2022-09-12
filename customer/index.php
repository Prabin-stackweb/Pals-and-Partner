<?php
	include('include/header.php');
	include('php/functions.php');
?>
<div id="page-wrapper">
	<div class="header">
	  	<h1 class="page-header">
	    Dashboard <small><?php echo $_SESSION['username'];?></small>
	  	</h1>
	</div>
	<div id="page-inner">
		<?php include('include/inner-index.php');?>
	</div>
	<!-- /. PAGE INNER  -->
	<div data-tockify-component="mini" data-tockify-calendar="spirited"></div>
	<script data-cfasync="false" data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>
</div>
<footer>
    <p>Copyright Pals and Partners. All Rights Reserved</a></p>
  </footer>
<?php include('include/footer.php');?>
