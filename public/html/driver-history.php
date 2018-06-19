<?php
$payments = new objPayments;
if( !isset($_POST['formSubmitted']) && !isset($_POST['driverID']) ){
    //search form
?>
<div class="row">
    <div class="col-md-6">
     <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="driverID" placeholder="Driver No*" value="" required>
            </div>
            <input type="hidden" name="formSubmitted" value="1"/>
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search"></i> Search</button>
    </form>
    </div>
</div>
<?php    
}else{
    //search results
?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <h3 class="dash-summary">Driver History (#<?php echo $_POST['driverID'];?>)</h3>
        <?php
            echo $payments->getPaymentsByDriverID($_POST['driverID']); 
        ?>
        <button type="button" onclick="window.history.back();" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left"></i> Go Back</button>
    </div>
</div><?php    
}
?>