<!-- /. ROW  -->
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="board">
            <div class="panel panel-primary">
                <div class="number">
                    <h3>
                        <h3><?php echo getTotalNumberOfAppointmentsProcess();?></h3>
                        <small>Total In Process Appointments</small>
                    </h3>
                </div>
              <div class="icon">
                    <i class="fa fa-comments fa-5x blue"></i>
              </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="board">
            <div class="panel panel-primary">
                <div class="number">
                    <h3>
                        <h3><?php echo getTotalNumberOfAppointmentsCompleted();?></h3>
                        <small>Total Completed Appointments</small>
                    </h3>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart fa-5x green"></i>
                </div>
            </div>
        </div>
    </div>
</div>

