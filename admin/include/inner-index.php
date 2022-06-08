<!-- /. ROW  -->
<div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="board">
        <div class="panel panel-primary">
          <div class="number">
            <h3>
              <h3><?php echo getTotalNumberOfMessages();?></h3>
              <small>Total Messages</small>
            </h3>
          </div>
          <div class="icon">
            <i class="fa fa-comments fa-5x blue"></i>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="board">
        <div class="panel panel-primary">
          <div class="number">
            <h3>
              <h3><?php echo getTotalNumberOfQuotes();?></h3>
              <small>Total Quotes</small>
            </h3>
          </div>
          <div class="icon">
             <i class="fa fa-shopping-cart fa-5x green"></i>
          </div>

        </div>
      </div>
  </div>

  <div class="col-md-3 col-sm-12 col-xs-12">
    <div class="board">
      <div class="panel panel-primary">
        <div class="number">
          <h3>
            <h3><?php echo getTotalNumberOfCustomers();?></h3>
            <small>Total Customers</small>
          </h3>
        </div>
        <div class="icon">
           <i class="fa fa-user fa-5x yellow"></i>
        </div>
      </div>
    </div>
  </div>
    
      <div class="col-md-3 col-sm-12 col-xs-12">
    <div class="board">
      <div class="panel panel-primary">
        <div class="number">
          <h3>
            <h3><?php echo getTotalNumberOfStaff();?></h3>
            <small>Total Staff</small>
          </h3>
        </div>
        <div class="icon">
           <i class="fa fa-sitemap fa-5x red"></i>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-md-6 col-sm-12 col-xs-12">
      
      <div class="panel panel-default">
          <div class="number">
     <h3>&nbsp;&nbsp;Latest Message</h3>
      </div>
        
          <div class="panel-heading">
              <?php $query="SELECT * FROM message ORDER BY id DESC LIMIT 4;";
              $result=mysqli_query($mysqli,$query);
              while($row=mysqli_fetch_assoc($result)){
              ?>
                <br>
                    
                        <div>
                        <i class="fa fa-user"></i> <?php echo $row['name']?><br>
                        <i class="fa fa-comments"></i>  <?php echo $row['message']?><br>
                         <a href="messages.php">  </a><a href="mailto:<?php echo $row['email']?>"><i class="fa fa-envelope" aria-hidden="true">&nbsp;Reply Now</i></a>
                
                </div>
              <hr class="dashed" style="hr.dashed {
  border-top: 3px dashed #bbb;
}">
              <?php
              }
              ?>
                
                    <a class="text-center" href="messages.php">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
          
          <div class="panel-body">
              <div id="morris-donut-chart"></div>
          </div>
      </div>
  </div>
</div> 
    <div class="col-md-6 col-sm-12 col-xs-12">
      
      <div class="panel panel-default">
          <div class="number">
     <h3>&nbsp;&nbsp;Latest Quote Request</h3>
      </div>
        
          <div class="panel-heading">
              <?php $query="SELECT * FROM quote_request ORDER BY id DESC LIMIT 4;";
              $result=mysqli_query($mysqli,$query);
              while($row=mysqli_fetch_assoc($result)){
              ?>
                <br>
                    
                        <div>
                        <i class="fa fa-user"></i> <?php echo $row['name']?>
                            /<a href="messages.php">  </a><a href="mailto:<?php echo $row['email']?>"><i class="fa fa-envelope" aria-hidden="true">&nbsp;Reply Now</i></a><br>
                            
                        <i class="fa fa-book"></i>  <?php echo $row['service']?><br>
                            <i class="fa fa-dashboard"></i>  <?php echo $row['frequency']?>
                            
                         
                
                </div>
              <hr class="dashed" style="hr.dashed {
  border-top: 3px dashed #bbb;
}">
              <?php
              }
              ?>
                
                    <a class="text-center" href="quotes.php">
                        <strong>See All Quotes</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
          
          <div class="panel-body">
              <div id="morris-donut-chart"></div>
          </div>
      </div>
  </div>
</div> 
