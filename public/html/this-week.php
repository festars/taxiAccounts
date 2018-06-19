<?php
$payments = new objPayments;
$totals = $payments->getPaidTotalsForWC( $payments->getWeekCommencingDate() );
?>
<div class="row">
    <div class="col-md-6 lblDashboard">
        <h3 class="dash-summary">Summary (<?php echo $payments->DisplayWeekCommencingDate() ;?>)</h3>
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('PAID',$payments->getWeekCommencingDate());?></i>
                </div>
                <p class="card-category">Drivers Paid</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('DUE',$payments->getWeekCommencingDate());?></i>
                </div>
                <p class="card-category">Drivers Due</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('OFF',$payments->getWeekCommencingDate());?></i>
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
    <div class="col-md-6 lblDashboard">
        <h3 class="dash-summary">Drivers List</h3>
        <?php
        $list = $payments->getPaymentsByWC();
        if($list == null){
            ?>
            <div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> This is a new week, you must process the drivers first before adding transactions. </div>
            <a href="/drivers/process/?process=1"class="btn btn-primary btn-lg btn-block"><i class="fa fa-cog"></i> Process Drivers</a>
            <?php
        }else{
            echo $list;
        }
        ?>
        <button type="button" onclick="window.history.back();" class="btn btn-default btn-lg btn-block"><i class="fa fa-arrow-left"></i> Go Back</button>
    </div>
</div>