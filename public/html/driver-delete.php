<?php
if (isset($_GET['driverID']) ){
	$driver=$_GET['driverID'];
}else{
	$driver='';
}
?>
<div class="row">
    <div class="col-md-6">
     <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="driverID" placeholder="Driver No*" value="<?php echo $driver;?>" required>
            </div>
            <input type="hidden" name="formSubmitted" value="1"/>
            <input type="hidden" name="formDelete" value="1"/>
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-minus-circle"></i> Delete Driver</button>
    </form>
    </div>
</div>