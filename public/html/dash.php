<?php
$payments = new objPayments;
$totals = $payments->getPaidTotalsForWC( $payments->getWeekCommencingDate() );


$paid = $payments->getPaymentsCount('PAID');
$due = $payments->getPaymentsCount('DUE');
$off = $payments->getPaymentsCount('OFF');

if($paid == 0 && $due == 0 && $off == 0){
    $disabled = "disabled";
    $disabledStyle = 'style="pointer-events: none;"';
}else{
    $disabled = null;
    $disabledStyle = null;
}

?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <a <?php echo $disabledStyle; ?> href="/payment/edit/" class="btn btn-primary btn-lg btn-block" <?php echo $disabled; ?>><i class="fa fa-plus-circle"></i> New Payment</a>
        <a href="/reports/this-week/" class="btn btn-default btn-lg btn-block"><i class="fa fa-calendar"></i> View This Week</a>
        <h3 class="dash-summary">Summary (<?php echo $payments->DisplayWeekCommencingDate(); ?>)</h3>
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $paid; ?></i>
                </div>
                <p class="card-category">Drivers Paid</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $due; ?></i>
                </div>
                <p class="card-category">Drivers Due</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $off; ?></i>
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
</div>