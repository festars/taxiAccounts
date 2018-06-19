<?php
class objPayments{
    // "id""paymentStatus""paymentWC""paymentNote""amountCash""amountAccount""amountTravelVouchers""userSubmitted""driverID""PaymentDate"
    public $data;
    
    
    public function __construct($username=null){
        //if initiated with username, get user data
        // if($username != null){
        //     $this->data = getUserData($username);
        // }
    }
    
    public function getWeekCommencingDate($date=null){
        //input date: Y-m-d
        //Returns monday week commencing date (uk date dmy) for any date entered, this monday if no date entered.
        $dateTime = new DateTime($date);
        $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
        $monday = get_object_vars($monday);
        $date = date('Y-m-d H:i:s', strtotime($monday['date']));
        return $date;
    }  
    
    public function getLastWeekDate($date=null){
        //input date: Y-m-d
        //Returns monday week commencing date (uk date dmy) for any date entered, this monday if no date entered.
        $dateTime = new DateTime($date);
        $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
        $monday = get_object_vars($monday);
        $date = date('Y-m-d H:i:s', strtotime($monday['date']));
        $date = strtotime($date);
        $lastmonday = strtotime("-7 day", $date);
        
        $lastmonday = date('Y-m-d H:i:s',$lastmonday );
        return $lastmonday;
    } 
    
    public function displayLastWeekDate($date=null){
        //input date: Y-m-d
        //Returns monday week commencing date (uk date dmy) for any date entered, this monday if no date entered.
        $dateTime = new DateTime($date);
        $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
        $monday = get_object_vars($monday);
        $date = date('Y-m-d H:i:s', strtotime($monday['date']));
        $date = strtotime($date);
        $lastmonday = strtotime("-7 day", $date);
        
        $lastmonday = date('d/m/Y',$lastmonday );
        return $lastmonday;
    }
        
    public function getPaymentsByWC($weekCommencing=null,$disabled=null){
        
        if ($weekCommencing==null){
            $weekCommencing = $this->getWeekCommencingDate();
        }
        
        $db = new libDatabase;
        $results = $db->selectAllPaymentsWhere("paymentWC",$weekCommencing);
        $html=null;
        if ($disabled==null){
            foreach ($results as $result) {
                $html.= $this->getPaymentListItem($result);
            }
        }else{
            //disabled
            foreach ($results as $result) {
                $html.= $this->getPaymentListItemDisabled($result);
            }
        }
        
        return $html;
        
    }
    
    public function getPaymentsByWCForTable($weekCommencing=null){
        
        if ($weekCommencing==null){
            $weekCommencing = $this->getWeekCommencingDate();
        }
        
        $db = new libDatabase;
        $results = $db->selectAllPaymentsWhere("paymentWC",$weekCommencing);
        $html=null;
        foreach ($results as $result) {
            $total = $result['amountCash'] + $result['amountAccount'] + $result['amountTravelVouchers'];
            $html.= '
            <tr>
                <td>'.$result['driverID'].'</td>
                <td>'.$result['paymentStatus'].'</td>
                <td>'.number_format((float)$result['amountCash'],2).'</td>
                <td>'.number_format((float)$result['amountAccount'],2).'</td>
                <td>'.number_format((float)$result['amountTravelVouchers'],2).'</td>
                <td>'.number_format((float)$total,2).'</td>
                <td>'.$result['paymentNote'].'</td>
            </tr>';
        }
        return $html;
        
    }    
    
    public function getPaymentsByDriverID($driverID){
        
        $db = new libDatabase;
        $results = $db->selectAllPaymentsWhere("driverID",$driverID);
        
        foreach ($results as $result) {
            $date = date("d/m/y",strtotime($result['paymentWC']));
            
            echo $this->getPaymentHistoryListItem($date,$result['paymentStatus'],$result['id']);
        }
    }
    
    public function getPaymentByID($paymentID){
        
        $db = new libDatabase;
        $result = $db->selectAllPaymentsWhere("id",$paymentID);
        
        return $result;
    }

    public function DisplayWeekCommencingDate($date=null){
        //input date: Y-m-d
        //Returns monday week commencing date (uk date dmy) for any date entered, this monday if no date entered.
        $dateTime = new DateTime($date);
        $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
        $monday = get_object_vars($monday);
        $date = date('d/m/Y', strtotime($monday['date']));
        return $date;
    }
    
    public function getPaymentListItem($data){
                
        switch ($data['paymentStatus']) {
            // OFF
            case 'OFF':
                $bgColour = "info";
                $listHTML = '<div class="card card-stats">
                        <div class="card-header card-header-'.$bgColour.' card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">'.$data['driverID'].'</i>
                            </div>
                            <p class="card-category">'.$data['paymentStatus'].'. ('.$data['userSubmitted'].')
                            <a href="/payment/edit/?driverID='.$data['driverID'].'" class="btn btn-default"><i class="fa fa-edit"></i> EDIT</a>
                            </p>
                        </div>
                    </div>';
            break;
            // DUE
            case 'DUE':
                $bgColour = "danger";
                $listHTML = '<div class="card card-stats">
                        <div class="card-header card-header-'.$bgColour.' card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">'.$data['driverID'].'</i>
                            </div>
                            <p class="card-category">'.$data['paymentStatus'].'.
                            <a href="/payment/edit/?driverID='.$data['driverID'].'" class="btn btn-default"><i class="fa fa-plus-circle"></i> PAY</a>
                            <a href="/payment/edit/?driverID='.$data['driverID'].'&paymentStatus=OFF" class="btn btn-default"><i class="fa fa-times-circle"></i> OFF</a>
                            </p>
                        </div>
                    </div>';
            break;
            // PAID
            case 'PAID':
                $bgColour = "success";
                $listHTML = '<div class="card card-stats">
                        <div class="card-header card-header-'.$bgColour.' card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">'.$data['driverID'].'</i>
                            </div>
                            <p class="card-category"><span class="driverPaidDetails"><i class="fa fa-money"></i> &pound;'.number_format((float)$data['amountCash'],2).' <i class="fa fa-credit-card"></i> &pound;'.number_format((float)$data['amountAccount'],2).' <i class="fa fa-ticket"></i> &pound;'.number_format((float)$data['amountTravelVouchers'],2).'<br/> ('.$data['userSubmitted'].')</span></p>
                        </div>
                    </div>';
            break;
        }
        return $listHTML;
    }
    
    public function getPaymentListItemDisabled($data){
        
        switch ($data['paymentStatus']) {
            // OFF
            case 'OFF':
                $bgColour = "info";
                $listHTML = '<div class="card card-stats card-status-off">
                        <div class="card-header card-header-'.$bgColour.' card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">'.$data['driverID'].'</i>
                            </div>
                            <p class="card-category">'.$data['paymentStatus'].'. ('.$data['userSubmitted'].')
                            </p>
                        </div>
                    </div>';
            break;
            // DUE
            case 'DUE':
                $bgColour = "danger";
                $listHTML = '<div class="card card-stats card-status-due">
                        <div class="card-header card-header-'.$bgColour.' card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">'.$data['driverID'].'</i>
                            </div>
                            <p class="card-category">'.$data['paymentStatus'].'.
                            </p>
                        </div>
                    </div>';
            break;
            // PAID
            case 'PAID':
                $bgColour = "success";
                $listHTML = '<div class="card card-stats card-status-paid">
                        <div class="card-header card-header-'.$bgColour.' card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">'.$data['driverID'].'</i>
                            </div>
                            <p class="card-category"><span class="driverPaidDetails"><i class="fa fa-money"></i> &pound;'.number_format((float)$data['amountCash'],2).' <i class="fa fa-credit-card"></i> &pound;'.number_format((float)$data['amountAccount'],2).' <i class="fa fa-ticket"></i> &pound;'.number_format((float)$data['amountTravelVouchers'],2).' ('.$data['userSubmitted'].')</span></p>
                        </div>
                    </div>';
            break;
        }
        return $listHTML;
    }
    
    public function getPaymentsCount($status,$wc=null){
        if ($wc==null){
            $wc = $this->getWeekCommencingDate();
        }
        $db = new libDatabase;
        $amount = $db->countPaymentsStatus($wc,$status);
        
        return $amount;
        
        
    }
    
    public function getPaidTotalsForWC($wc){
        
        $db = new libDatabase;
        $amount = $db->getPaidTotalsForWC($wc);
        return $amount;
	}
    
    public function newPaymentsWC(){
        
        $today = date('Y-m-d H:i:s');
        $paymentWC = $this->getWeekCommencingDate();
        $db = new libDatabase;
        
        $result = $db->selectAllDrivers();
        foreach($result as $id => $driverID){
        	$paymentData = array(
    			"paymentWC" => $paymentWC,
    			"PaymentDate" => $today,
    			"paymentStatus" => "DUE",
    			"paymentNote" => "",
    			"amountCash" => "",
    			"amountAccount" => "",
    			"userSubmitted" => "XX",
    			"driverID" => $driverID,
    		);
    		$db->insertData("payments",$paymentData);
        }
    }
    
    public function newPayment($paymentData){
        
        $today = date('Y-m-d H:i:s');
        
    	$paymentData = array(
			"paymentWC" => "04/06/2018",
			"PaymentDate" => $today,
			"paymentStatus" => "DUE",
			"paymentNote" => "",
			"amountCash" => "",
			"amountAccount" => "",
			"userSubmitted" => "",
			"driverID" => "44",
		);
        
        $db = new libDatabase;
		$db->insertData("payments",$paymentData);
    }
        
    public function editPaymentByID($paymentID,$paymentData){
        
    	$paymentData = array(
			"paymentWC" => "04/06/2018",
			"PaymentDate" => "08/06/2018",
			"paymentStatus" => "DUE",
			"paymentNote" => "",
			"amountCash" => "",
			"amountAccount" => "",
			"userSubmitted" => "",
			"driverID" => "44",
		);
        
        $db = new libDatabase;
		$db->updateRow("payments",$paymentData,"id",$paymentID);
    }    
    
    public function editPaymentByDriverIDandWC($paymentID,$paymentWC,$paymentData){
        
//     	$paymentData = array(
// 			"paymentWC" => "04/06/2018",
// 			"PaymentDate" => "08/06/2018",
// 			"paymentStatus" => "DUE",
// 			"paymentNote" => "",
// 			"amountCash" => "",
// 			"amountAccount" => "",
// 			"userSubmitted" => "",
// 			"driverID" => "44",
// 		);
        
        $db = new libDatabase;
		$db->updateRowBy2("payments",$paymentData,"driverID",$paymentID,"paymentWC",$paymentWC);
    }
    
    public function getPaymentHistoryListItem($weekCommencing,$driverStatus,$paymentID){
                
        switch ($driverStatus) {
            // OFF
            case 'OFF':
                $bgColour = "info";
            break;
            // DUE
            case 'DUE':
                $bgColour = "danger";
            break;
            // PAID
            case 'PAID':
                $bgColour = "success";
            break;
            
        }
        
        $listHTML = '<p class="bg-'.$bgColour.'"><span class="listPaymentHistory">'.$weekCommencing.' - '.$driverStatus.'</span>';
        $listHTML .= '<a href="/payment/view/?paymentID='.$paymentID.'" class="btn btn-default"><i class="fa fa-eye"></i> VIEW</a>';
        $listHTML .= '</p>';
        return $listHTML;
    }
    
}