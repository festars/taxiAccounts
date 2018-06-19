<?php
$payments = new objPayments;
$totals = $payments->getPaidTotalsForWC( $payments->getWeekCommencingDate() );
?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <a href="/payment/edit/" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus-circle"></i> New Payment</a>
        <h3 class="dash-summary">Summary (<?php echo $payments->DisplayWeekCommencingDate() ;?>)</h3>
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('PAID'); ;?></i>
                </div>
                <p class="card-category">Drivers Paid</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('DUE'); ;?></i>
                </div>
                <p class="card-category">Drivers Due</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('OFF'); ;?></i>
                </div>
                <p class="card-category">Drivers Off</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 lblDashboard">
        <div class="card card-stats card-total">
            <div class="card-header">
                <p class="card-category"><i class="fa fa-money"></i> Cash : <b>&pound;<?php echo $totals['cash']; ?></b></p>
            </div>
        </div>
        <div class="card card-stats card-total">
            <div class="card-header">
                <p class="card-category"><i class="fa fa-credit-card"></i> Account : <b> &pound;<?php echo $totals['acc'];?></b></p>
            </div>
        </div>
        <div class="card card-stats card-total">
            <div class="card-header">
                <p class="card-category"><i class="fa fa-ticket"></i> Travel Vouchers : <b>&pound;<?php echo $totals['tv'];?></b></p>
            </div>
        </div>
        <div class="card card-stats card-total">
            <div class="card-header">
                <p class="card-category"><i class="fa fa-calculator"></i> Total : <b>&pound;<?php echo $totals['total'];?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3 class="dash-summary">Actions</h3>
        <a href="/reports/this-week/" class="btn btn-default btn-lg btn-block"><i class="fa fa-calendar"></i> View This Week</a>
        <a href="/reports/last-week/" class="btn btn-default btn-lg btn-block"><i class="fa fa-undo"></i> View Last Week</a>
        <a href="/logout/" class="btn btn-default btn-lg btn-block"><i class="fa fa-sign-out"></i> Log Out</a>
    </div>
</div>