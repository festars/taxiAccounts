<?php 
class libRoute{
	
	public $currentUser;
	
	function __construct($loggedIn=null){
		
		//get url excluding query string.
		$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
		      
        if(isset($_SESSION['userLoggedIn'])){
            //get username of logged in user.
            $this->currentUser = $_SESSION['userLoggedIn'];
            $this->userLoggedIn($request_uri);
        }else{
        	//unkown user - only home and login +404 allowed.
        	$this->userUnknown($request_uri);
        }
	}
		
	
	public function userUnknown($request_uri){
		
		switch ($request_uri[0]) {
			// Home page
		    case '/':
		    	$page = new libTemplate("home");
		    	$page->pageTitle = $page->appName ." v".$page->appVersion;
		    	if( isset($_GET['logged_out'])){
		    		$page->newWebMessage("info","You have been logged out!");
		    	}elseif( isset($_GET['req'])){
		    		$page->newWebMessage("warning","You must be logged in to view this page!");
		    	}
		    	$page->getPage();
		        break;
		        
		    // login page
		    case '/login/':
		    	$page = new libTemplate("login");
		    	$page->pageTitleIcon = "fa-lock";
		    	$page->pageTitle = "Login  | ".$page->appName;
		    	$page->pageTitleH1 = "User Login";
		    	
		    	if( isset($_POST["loginUsername"]) && isset($_POST["loginPassword"]) ){
		    		//verify login
		    		$user = new objUser; 
		    		$loggedIn =  $user->verifyUser($_POST["loginUsername"],$_POST["loginPassword"]);
		    		if($loggedIn == true){
		    			//set user logged in.
		    			$_SESSION['userLoggedIn'] = $user->data;
		    			//redirect
		    			header('Location: /');
		    		}else{
		    			$page->newWebMessage("danger","Incorrect Username or Password.");
		    		}
		    	}
		    	$page->getPage();
		        break;
		        
		    // Error 404
		    default:
		    	header('Location: /?req=1');
		        break;
		}
		
	}
	
	public function userLoggedIn($request_uri) {
		
		switch ($request_uri[0]) {
		        
			// dashboard page
		    case '/':
		    	$page = new libTemplate("dash");
		    	$page->pageTitle = "Dashboard | ".$page->appName." v".$page->appVersion;
		    	$page->pageTitleIcon = "fa-dashboard";
		    	$page->pageTitleH1 = "Dashboard";
		    	if(isset($_GET['PaymentSuccess']) && $_GET['PaymentSuccess'] == 1 ){
		    		$driver=$_GET['driverID'];
		    		$page->newWebMessage("success","Driver #$driver's payment has been saved.");
		    	}elseif(isset($_GET['PaymentSuccess']) && $_GET['PaymentSuccess'] == 0){
		    		$page->newWebMessage("danger","Driver's payment could not be saved!");
		    	}elseif(isset($_GET['driversProcessed']) && $_GET['driversProcessed'] == 1 ){
		    		$page->newWebMessage("success","Driver's have been processed.");
		    	}
		    	$page->getPage();
		    	break;   
		        
		    // log out page
		    case '/logout/':
		    	session_destroy();
		    	header('Location: /?logged_out=1');
		        break;
		  
			// edit payment page
		    case '/payment/edit/':
		    	
		    	if(isset($_POST['formSubmitted'])){
		    		$driver=$_GET['driverID'];
		    		$payments = new objPayments;
			    	$paymentData = array(
						"paymentWC" => $payments->getWeekCommencingDate(),
						"PaymentDate" => date('Y-m-d H:i:s'),
						"paymentStatus" => $_POST['paymentStatus'],
						"paymentNote" => $_POST['paymentNote'],
						"amountCash" => $_POST['amountCash'],
						"amountAccount" => $_POST['amountAccount'],
						"amountTravelVouchers" => $_POST['amountTravelVouchers'],
						"userSubmitted" => $_POST['userSubmitted']
					);
		    		$payments->editPaymentByDriverIDandWC($_POST['driverID'],$payments->getWeekCommencingDate(),$paymentData);
		    		header("Location: /?PaymentSuccess=1&driverID=$driver");
		    	}
		    	$page = new libTemplate("payment");
		    	$page->pageTitle = "Edit Payment | ".$page->appName;
		    	$page->pageTitleIcon = "fa-plus-circle";
		    	$page->pageTitleH1 = "Edit Payment";
		    	$page->getPage();
		    	break;   
		    	
			case '/payment/view/':
		    	$page = new libTemplate("payment-view");
		    	$page->pageTitle = "View Payment | ".$page->appName;
		    	$page->pageTitleIcon = "fa-file-o";
		    	$page->pageTitleH1 = "View Payment";
		    	$page->getPage();
		    	break;   
		    	
		        // settings
		    case '/settings/':
		    	$page = new libTemplate("settings");
		    	$page->pageTitle = "Settings | ".$page->appName;
		    	$page->pageTitleIcon = "fa-cogs";
		    	$page->pageTitleH1 = "Settings";
		    	$page->getPage();
		    	break;  
		    	
		    case '/settings/profile/':
		    	
		    	$page = new libTemplate("profile");
		    	
		    	if( isset($_POST['frmSubmitted']) && $_POST['frmSubmitted'] == 1 ){
		    	 	$objUser = new objUser;
		    	 	$objUser->updateUserInfo($_POST['profileUsername'],$_POST['profileUserDisplayName'],$_POST['profileEmail']);
		    		$page->newWebMessage("success","Profile has been updated.");
		    		
		    		if( isset($_POST['profilePassword']) && $_POST['profilePassword'] != null && isset($_POST['profilePasswordVerify']) ){
		    			if( $_POST['profilePassword'] === $_POST['profilePasswordVerify']){
		    				$objUser->updateUserPassword($_POST['profileUsername'],$_POST['profilePassword']);
		    				$page->newWebMessage("success","Password has been updated.");
		    			}else{
		    				$page->newWebMessage("danger","Passwords do not match.");
		    			}
		    		}
		    	}
		    	
		    	$page->pageTitle = "User Profile | ".$page->appName;
		    	$page->pageTitleIcon = "fa-calendar";
		    	$page->pageTitleH1 = "User Profile";
		    	$page->getPage();
		    	break;   
		    	
		    	
			// list driver page
		    case '/drivers/':
		    	$page = new libTemplate("driver-list");
		    	
		    	if(isset($_GET['delete_driver']) && $_GET['delete_driver'] == 1 ){
		    		$driver=$_GET['driverID'];
		    		$page->newWebMessage("success","Driver #$driver has been deleted.");
		    	}elseif(isset($_GET['delete_driver']) && $_GET['delete_driver'] == 0){
		    		$page->newWebMessage("danger","Driver could not be deleted!");
		    	}	
		    	
		    	if(isset($_GET['add_driver']) && $_GET['add_driver'] == 1 ){
		    		$driver=$_GET['driverID'];
		    		$page->newWebMessage("success","Driver #$driver has been added.");
		    	}elseif(isset($_GET['add_driver']) && $_GET['add_driver'] == 0){
		    		$page->newWebMessage("danger","Driver could not be added!");
		    	}
		    	
			    $page->pageTitle = "Active Drivers | ".$page->appName;
			    $page->pageTitleIcon = "fa-users";
			    $page->pageTitleH1 = "Active Drivers";
			    $page->getPage();
		    	break; 
		    	
			// add driver page
		    case '/drivers/add/':
		    	if(isset($_POST['formSubmitted']) && isset($_POST['formAdd'])){
		    		$driver=$_POST['driverID'];
		    		$driverName=$_POST['driverName'];
		    		$db = new libDatabase;
					$tableName = "drivers";
					$fieldsArray = array(
						"driverID" => $driver,
						"driverName" => $driverName,
					);
					$db->insertData($tableName,$fieldsArray);
		    		header("Location: /drivers/?add_driver=1&driverID=$driver");
		    	}else{
			    	$page = new libTemplate("driver-add");
			    	$page->pageTitle = "Add Driver | ".$page->appName;
			    	$page->pageTitleIcon = "fa-user";
			    	$page->pageTitleH1 = "Add Driver";
			    	$page->getPage();
		    	}
		    	break;  
		    	
			// delete driver page
		    case '/drivers/delete/':
		    	if(isset($_POST['formSubmitted']) && isset($_POST['formDelete'])){
		    		$driver=$_POST['driverID'];
		    		$db = new libDatabase;
					$db->deleteData("drivers","driverID",$driver);
		    		header("Location: /drivers/?delete_driver=1&driverID=$driver");
		    	}else{
			    	$page = new libTemplate("driver-delete");
			    	$page->pageTitle = "Delete Driver | ".$page->appName;
			    	$page->pageTitleIcon = "fa-user";
			    	$page->pageTitleH1 = "Delete Driver";
			    	$page->getPage();
		    	}
		    	break;  	  
		    	
			// process driver page
		    case '/drivers/process/':
		    	if( isset($_GET['process']) ){
		    		$payments = new objPayments;
		    		$payments->newPaymentsWC();
		    		header("Location: /?driversProcessed=1");
		    	}
		    	break;  
		    	
		        // reports
		    case '/reports/':
		    	$page = new libTemplate("reports");
		    	$page->pageTitle = "Reports | ".$page->appName;
		    	$page->pageTitleIcon = "fa-copy";
		    	$page->pageTitleH1 = "Reports";
		    	$page->getPage();
		    	break;  
		    	
		        // report this week
		    case '/reports/this-week/':
		    	$page = new libTemplate("this-week");
		    	$page->pageTitle = "This Week | ".$page->appName;
		    	$page->pageTitleIcon = "fa-calendar";
		    	$page->pageTitleH1 = "This Week";
		    	$page->getPage();
		    	break;   
		    	
		        // report last week
		    case '/reports/last-week/':
		    	$page = new libTemplate("last-week");
		    	$page->pageTitle = "Last Week | ".$page->appName;
		    	$page->pageTitleIcon = "fa-calendar";
		    	$page->pageTitleH1 = "Last Week";
		    	$page->getPage();
		    	break; 
		    	
		        // report last week
		    case '/reports/search-week/':
		    	$page = new libTemplate("search-week");
		    	$page->pageTitle = "Search W/C History | ".$page->appName;
		    	$page->pageTitleIcon = "fa-calendar";
		    	$page->pageTitleH1 = "Search History";
		    	$page->getPage();
		    	break;  
		    	
		        // report last week
		    case '/reports/print-week/':
		    	$page = new libTemplate("print-week");
		    	$page->pageTitle = "Print W/C History | ".$page->appName;
		    	$page->pageTitleIcon = "fa-calendar";
		    	$page->pageTitleH1 = "Print History";
		    	$page->getPage();
		    	break;   
		        
		    case '/reports/driver-history/':
		    	$page = new libTemplate("driver-history");
		    	$page->pageTitle = "Driver History | ".$page->appName;
		    	$page->pageTitleIcon = "fa-calendar";
		    	$page->pageTitleH1 = "Driver History";
		    	$page->getPage();
		    	break;  
		        
		    // Error 404
		    default:
		        header('HTTP/1.0 404 Not Found');
		    	$page = new libTemplate("404");
		    	$page->pageTitle = "404 | ".$page->appName;
		    	$page->pageTitleH1 = "404 | Not Found";
		    	$page->pageTitleIcon = "fa-times-circle";
		    	$page->getPage();
		        break;
		}
		
	}
	
}