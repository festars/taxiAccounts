<?php
$payments = new objPayments;
    $searchWC = $payments->getWeekCommencingDate();
    $totals = $payments->getPaidTotalsForWC( $payments->getWeekCommencingDate() );
    $totalAmount = $totals['cash'] + $totals['acc'] + $totals['tv'];
?>


<table style="width:100%;">
    <tr>
        <td colspan="3"><h2>Car 2000</h2></td>
        <td><b>Summary (<?php echo $payments->DisplayWeekCommencingDate();?>)</b></td>
    </tr>
    <tr>
        <td><?php echo $payments->getPaymentsCount('PAID'); ;?> Drivers Paid</td>
        <td><?php echo $payments->getPaymentsCount('OFF'); ;?> Drivers Off</td>
        <td><?php echo $payments->getPaymentsCount('DUE'); ;?> Drivers Due</td>
        <td></td>
    </tr>
    <tr>
        <td><i class="fa fa-money"></i> Cash: &pound;<?php echo number_format((float)$totals['cash'],2); ?></td>
        <td><i class="fa fa-credit-card"></i> Account: &pound;<?php echo number_format((float)$totals['acc'],2); ?></td>
        <td><i class="fa fa-ticket"></i> Travel Vouchers: &pound;<?php echo number_format((float)$totals['tv'],2); ?></td>
        <td><i class="fa fa-calculator"></i> <b>Total &pound;<?php echo number_format((float)$totalAmount,2); ?></b></td>
    </tr>
</table>
<hr/>
<table style="width:100%;">
    <tr>
        <th>Driver</th>
        <th>Status</th>
        <th>Cash</th>
        <th>Account</th>
        <th>Travel Vouchers</th>
        <th>Total</th>
        <th>Notes</th>
    </tr>
        <?php
        echo $payments->getPaymentsByWCForTable();
        ?>
</table>




