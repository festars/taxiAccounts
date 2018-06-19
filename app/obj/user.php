<?php
class objUser{
    
    public $data;
    
    
    public function __construct($username=null){
        //if initiated with username, get user data
        if($username != null){
            $this->data = getUserData($username);
        }
    }

    public function getUserData($username){
        //get user data from username and store in $data
        $db = new libDatabase;
		$data = $db->selectRow("users","userName","chris");
		$this->userName = $data;
    }
    
    public function getUserDataFromUsername($username){
        //get user data from username and store in $data
        $db = new libDatabase;
		$data = $db->selectRow("users","userName",$username);
		
		if($data == null){
		    return false;
		}else{
		    return $data;
		}
    }
    
    public function verifyUser($username,$password){
        //md5 hash password
        $password = md5($password);
        //get user data from username and store in $data
        $db = new libDatabase;
		$data = $db->selectRowBy2("users","userName",$username,"userPassword",$password);
		
		$this->data = $data;
		
		
		if($data == null){
		    return false;
		}else{
		    return true;
		}
        
        
        
    }
    
    public function createUser($userData){
        
//     	$userData = array(
// 			"userName" => "ben",
// 			"userPasword" => "123",
// 			"userEmail" => "ben@outlook.com",
// 			"userDisplayName" => "Ben"
// 		);
        
        $db = new libDatabase;
		$db->insertData("users",$userData);
    }
    
    public function updateUserInfo($username,$displayName,$email){
        
        
		## update user password ##
		$tableName = "users";
		$fieldsArray = array(
			"userDisplayName" => $displayName,
			"userEmail" => $email
		);
		$whereField = "userName";
		$whereValue = $username; 
		
		$db = new libDatabase;
		$db->updateRow($tableName,$fieldsArray,$whereField,$whereValue);
        
    }  
    
    public function updateUserPassword($username,$newPassword){
        //md5 hash password
        $newPassword = md5($newPassword);
        
		## update user password ##
		$tableName = "users";
		$fieldsArray = array(
			"userPassword" => $newPassword
		);
		$whereField = "userName";
		$whereValue = $username; 
		
		$db = new libDatabase;
		$db->updateRow($tableName,$fieldsArray,$whereField,$whereValue);
        
    }
    
    
    
    
}