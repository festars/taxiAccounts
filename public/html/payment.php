<?php
$payments = new objPayments;

if(isset($_GET['paymentStatus']) && $_GET['paymentStatus'] == "OFF"){
    $options ='<option value="PAID">Worked</option>
                <option value="OFF" selected>Week Off</option>';
}else{
    $options ='<option value="PAID" selected>Worked</option>
                <option value="OFF">Week Off</option>';
}


?>
<div class="row">
    <div class="col-md-6">
        <label class="lblWeekCommencing">w/c: <?php echo $payments->DisplayWeekCommencingDate();?></label>
        <form method="post">
            <div class="form-group">
                <input type="number" class="form-control" name="driverID" placeholder="'&#xf007; Driver No*" value="<?php echo $_GET['driverID'];?>" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="paymentStatus">
                    <?php echo $options;?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="amountCash" step="0.05" placeholder="'&#xf0d6; Cash">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="amountAccount" step="0.05" placeholder="'&#xf09d; Account">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="amountTravelVouchers" step="0.05" placeholder="'&#xf145; Travel Vouchers">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="paymentNote" placeholder="'&#xf249; Note">
            </div>
            <input type="hidden" name="paymentWC" value="<?php echo $payments->getWeekCommencingDate();?>"/>
            <input type="hidden" name="userSubmitted" value="<?php echo $_SESSION['userLoggedIn']['userName'];?>"/>
            <input type="hidden" name="formSubmitted" value="1"/>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>
</div>

