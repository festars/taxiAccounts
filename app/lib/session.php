<?php 
class libSession{
    
    public $userLoggedIn;
    public $userDisplayName;
    public $userExpiry;
    
    public function __construct(){
        //start session
        session_start();
        
        if($_SESSION['userLoggedIn']){
            //get username of logged in user.
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        
        
    }
    
    
    
    public function logIn($userName,$userPassword){
        
        //
        $userHash = md5($userPassword);
        
        $db = new libDatabase;
        
        $db->connection->
        
        $_SESSION
        
        if()
        
        
    }
    
    
    public function logOut(){
        //end session
        session_destroy();
    }
    
}