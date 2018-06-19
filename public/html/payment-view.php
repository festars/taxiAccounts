<?php
$payments = new objPayments;
if( !isset($_GET['paymentID']) ){
    //search form
?>
<div class="row">
    <div class="col-md-6">
     <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="paymentID" placeholder="Payment Ref*" value="" required>
            </div>
            <input type="hidden" name="formSubmitted" value="1"/>
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search"></i> Search</button>
    </form>
    </div>
</div>
<?php    
}else{
    //search results
        $payment = $payments->getPaymentByID($_GET['paymentID']);
        $payment = $payment[0];
?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <h3 class="dash-summary">Payment (#<?php echo $payment['driverID'];?>)</h3>
        <p class="bg-info">DATE: <b><?php echo date("d/m/y",strtotime($payment['paymentWC']));?></b></p>
        <p class="bg-info">DRIVER: <b><?php echo $payment['driverID'];?></b></p>
        <p class="bg-info">STATUS: <b><?php echo $payment['paymentStatus'];?></b></p>
        <p class="bg-info">CASH: <b><?php echo $payment['amountCash'];?></b></p>
        <p class="bg-info">ACCOUNT: <b><?php echo $payment['amountAccount'];?></b></p>
        <p class="bg-info">TRAVEL VOUCHERS: <b><?php echo $payment['amountTravelVouchers'];?></b></p>
        <p class="bg-info">USER: <b><?php echo $payment['userSubmitted'];?></b></p>
        <p class="bg-info">DATE PAID: <b><?php echo $payment['PaymentDate'];?></b></p>
        <button type="button" onclick="window.history.back();" class="btn btn-default btn-lg btn-block"><i class="fa fa-arrow-left"></i> Go Back</button>
    </div>
</div>
<?php    
}
?>