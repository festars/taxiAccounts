<?php 
class libTemplate{
    
    public $appName;
    public $appIcon;
    public $pageID;
    public $pageTitle;
    public $pageTitleH1;
    public $pageTitleIcon;
    public $pageContent;
    public $webMessage;
	
	function __construct($page){
	    //this class constructs and outputs page
	    
	    
        
        $this->appName = "taxiAccounts";
        $this->appIcon = "fa-taxi";
        $this->appVersion = taxiRent_APP_VERSION;
        $this->pageID = $page;
        $this->pageTitle = $this->appName;
        $this->pageTitleH1 = "taxiAccounts";
        $this->pageTitleIcon = "fa-taxi";
        $this->pageContent = $page;
        
        
	    
	    //$this->getPage();
		
	}
	
	function getPageInfo($page){
	    
	    
	    
	    $page = array(
	        "appName" > "taxiAccounts",
	        "appIcon" > "fa-taxi",
	        "appVersion" > "1.21",
	        "pageName" > "taxiAccounts",
	        "pageTitle" > "taxiAccounts",
	        "pageContent" >"login"
	        );
	    
	    
	}
	
	function getPage(){
	    
	    ob_start();
	    
	    require taxiRent_PUBLIC_DIR.'html/template/mobile.php';
	    // require taxiRent_PUBLIC_DIR.'html/404.php';
	     $page = ob_get_clean();
	   
	   echo $page;
	    
	}
	
	function getPageContent(){
	    ob_start();
	    require taxiRent_PUBLIC_DIR.'html/'.$this->pageContent.'.php';
	    return ob_get_clean();
	}
	
	function newWebMessage($type,$message){
	    if ($this->webMessage == null){
	        //if no messages create array
	        $this->webMessage = array( $type => $message );
	    } else{
	        //messages already exist, so add to array!
	        $this->webMessage[$type] = $message;
	    }
	        
	        
	        
	}
	
	function getWebMessage(){
	    //if no messages do nothing
	    if ($this->webMessage != null){
	        // run through messages and display!
            foreach($this->webMessage as $type => $message){
                $this->composeWebMessage($type,$message);
            }  
	    }
	}

	function getAppMenu($thisPage){
    
        $menu_items = array(
            'Dashboard'=>'/',
            'Reports'=>'/reports/',
            'Drivers'=>'/drivers/',
            'Settings'=>'/settings/',
            );
            
        foreach($menu_items as $item => $url){
            
            switch($item){
                case "Dashboard":
                    $icon="dashboard";
                    if($thisPage == "dash"){$class="active";}else{$class="";}
                    break;
                case "Reports":
                    $icon="copy";
                    if($thisPage == "reports"){$class="active";}else{$class="";}
                    break;
                case "Drivers":
                    $icon="users";
                    if($thisPage == "drivers"){$class="active";}else{$class="";}
                    break;
                case "Settings":
                    $icon="cogs";
                    if($thisPage == "settings"){$class="active";}else{$class="";}
                    break;
                case "Log Out":
                    $icon="sign-out";
                    break;
            }
            echo '<li class="'.$class.'"><a href="'.$url.'"><i class="fa fa-'.$icon.'"></i> '.$item.'</a></li>';
        }    
        
    }
    
    function composeWebMessage($type,$message){
        switch ($type) {
            case "danger":
            $bold = "Oh Snap!";
            break;
        case "warning":
            $bold = "Warning!";
            break;
        case "info":
            $bold = "Heads up!";
            break;
        case "success":
            $bold = "Success!";
            break;
        }
        echo '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>'.$bold.'</strong> '.$message.'</div>';
    }
	
	
}