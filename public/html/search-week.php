<?php
$payments = new objPayments;
if( !isset($_POST['formSubmitted']) && !isset($_POST['paymentWC']) ){
    //search form
?>
<div class="row">
    <div class="col-md-6">
     <form method="post">
            <div class="form-group">
                <input type="date" class="form-control" name="paymentWC" placeholder="Week Commencing*" value="" required>
            </div>
            <input type="hidden" name="formSubmitted" value="1"/>
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search"></i> Search</button>
    </form>
    </div>
</div>
<?php    
}else{
    //search results
    $searchWC = $payments->getWeekCommencingDate($_POST['paymentWC']);
    $totals = $payments->getPaidTotalsForWC( $searchWC );
?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <h3 class="dash-summary">Summary (<?php echo $payments->DisplayWeekCommencingDate($searchWC);?>)</h3>
        <div class="row">
            <div class="col-xs-4"><p class="count-box bg-danger"><?php echo $payments->getPaymentsCount('DUE',$searchWC); ;?> DUE.</p></div>
            <div class="col-xs-4"><p class="count-box bg-success"><?php echo $payments->getPaymentsCount('PAID',$searchWC); ;?> PAID.</p></div>
            <div class="col-xs-4"><p class="count-box bg-info"><?php echo $payments->getPaymentsCount('OFF',$searchWC); ;?> OFF.</p></div>
        </div>
    </div>
    <div class="col-md-6 lblDashboard">
        <p class="bg-info">CASH: <b>&pound;<?php echo $totals['cash']; ?></b></p>
        <p class="bg-info">ACCOUNT: <b> &pound;<?php echo $totals['acc'];?></b></p>
        <p class="bg-info">TRAVEL VOUCHERS: <b>&pound;<?php echo $totals['tv'];?></b></p>
    </div>
    <div class="col-md-6 lblDashboard">
        <h3 class="dash-summary">Drivers List</h3>
        <?php
        $payments->getPaymentsByWC($searchWC,1);
        ?>
        <button type="button" onclick="window.history.back();" class="btn btn-default btn-lg btn-block"><i class="fa fa-arrow-left"></i> Go Back</button>
    </div>
</div>
<?php    
}
?>