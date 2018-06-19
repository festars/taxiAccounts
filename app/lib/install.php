<?php 
class libInstall{

function __construct(){
	
	
	// installTableUsers();
}


function installTableUsers(){
	$db = new libDatabase;
	$tableName = "users";
	$fieldsArray = array(
		"userID" => "INTEGER",
		"userName" => "VARCHAR",
		"userPasword" => "VARCHAR",
		"userEmail" => "VARCHAR",
		"userCreated" => "DATETIME",
	);
	$db->createTable($tableName,$fieldsArray);
}


function installTableSS(){
	
	
}



	
}