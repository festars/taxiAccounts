<?php
$drivers = new objDrivers;
?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <a href="/drivers/add/" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus-circle"></i> Add Driver</a>
        <br/>
        <?php
            $list =  $drivers->getDriversList();
            if($list == null){
                ?>
                <p>There are no drivers to list, consider adding some.</p>
                <?php
            }else{
                echo $list;
            }
        ?>
        <button type="button" onclick="window.history.back();" class="btn btn-default btn-lg btn-block"><i class="fa fa-arrow-left"></i> Go Back</button>
    </div>
</div>
