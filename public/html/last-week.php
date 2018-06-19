<?php
$payments = new objPayments;
$totals = $payments->getPaidTotalsForWC( $payments->getLastWeekDate() );
?>
<div class="row">
    <div class="col-md-6 lblDashboard driverSummary">
        <h3 class="dash-summary">Summary (<?php echo $payments->displayLastWeekDate() ;?>)</h3>
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('PAID',$payments->getLastWeekDate());?></i>
                </div>
                <p class="card-category">Drivers Paid</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('DUE',$payments->getLastWeekDate());?></i>
                </div>
                <p class="card-category">Drivers Due</p>
            </div>
        </div>
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"><?php echo $payments->getPaymentsCount('OFF',$payments->getLastWeekDate());?></i>
                </div>
                <p class="card-category">Drivers Off</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 lblDashboard driverTotals">
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
    <div class="col-md-6 lblDashboard driversList">
        <h3 class="dash-summary">Drivers List</h3>
        <?php
        echo $payments->getPaymentsByWC($payments->getLastWeekDate(),1);
        ?>
        <button type="button" onclick="window.history.back();" class="btn btn-default btn-lg btn-block"><i class="fa fa-arrow-left"></i> Go Back</button>
    </div>
</div>