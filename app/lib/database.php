<?php 
class libDatabase {
	
	public $connection;
	public $success = array();
	public $errors = array();
	
	function __construct(){
		//open,else if not exist create + open db.
		$this->connection = new SQLite3('app/taxiAccounts.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    	$this->connection->enableExceptions(true);
		
		// create table ##
		
		// $tableName = "users";
		// $fieldsArray = array(
		// 	"userName" => "VARCHAR",
		// 	"userPasword" => "VARCHAR",
		// 	"userEmail" => "VARCHAR",
		// 	"userDisplayName" => "VARCHAR",
		// );
		
		// $this->createTable($tableName,$fieldsArray);
		#  ##  ##  ##  ##  ##  ##  ##  ##
		
		
		// # insert new user ##
		
		// $tableName = "users";
		// $fieldsArray = array(
		// 	"userID" => "2",
		// 	"userName" => "gill",
		// 	"userPasword" => "456",
		// 	"userEmail" => "gill@outlook.com",
		// 	"userCreated" => "",
		// );
		
		// $this->insertData($tableName,$fieldsArray);
		// ##  ##  ##  ##  ##  ##  ##  ##  ##
		
	
		
		
		## select user by username ##
		//var_dump($this->selectRow("users","userName","chris"));
		
		## select user by 2 values ##
		// var_dump($this->selectRowBy2("users","userName","chris","userPasword","123"));
		
		
		// ## update user password ##
		// $tableName = "users";
		// $fieldsArray = array(
		// 	"userPasword" => "123",
		// );
		// $whereField = "userName";
		// $whereValue = "chris";
		// $this->updateRow($tableName,$fieldsArray,$whereField,$whereValue);
		 ##  ##  ##  ##  ##  ##  ##  ##  ##
		
		// var_dump($this->success);
		// var_dump($this->errors);
	}
	
	public function createTable($tableName,$fieldsArray) {
		#sample data#
		
		// $tableName = "users";
		// $fieldsArray = array(
		// 	"userID" > "INTEGER",
		// 	"userName" > "VARCHAR",
		// 	"userPasword" > "VARCHAR",
		// 	"userEmail" > "VARCHAR",
		// 	"userCreated" > "DATETIME",
		// 	"lastLoginTime" > "DATETIME",
		// 	);
			
			
		//begin query string and set id as primary key
		$queryString = 'CREATE TABLE IF NOT EXISTS "'.$tableName.'" (
			"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,';	
			
		//append fields and types from array	
        foreach($fieldsArray as $field => $type){
            $queryString .= '"'.$field.'" '.$type.',';
        }
        
        //remove last comma from fields
        $queryString = substr($queryString, 0, -1);
        
		//close tag for query string	
		$queryString .= ')';	
		
		//execute query
		try {    
			// ...SQLite stuff...
			$this->connection->query($queryString);
			//add to success list.
			array_push($this->success, "table_created" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		
	}
	
	public function deleteData($tableName,$delCol,$delVal){
		
		//begin query string
		$queryString = 'DELETE FROM "'.$tableName.'" WHERE '.$delCol.' = "'.$delVal.'"';
		
		$statement = $this->connection->prepare($queryString);
		
		//execute query
		try {    
			// ...SQLite stuff...
			$statement->execute();
			//add to success list.
			array_push($this->success, "data_deleted" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
	}
	
	public function insertData($tableName,$insertArray){
		
		//begin query string
		$queryString = 'INSERT INTO "'.$tableName.'" ("id",';
		
		//append fields from array	
        foreach($insertArray as $field => $value){
            $queryString .= ' "'.$field.'",';
        }
        
        //remove last comma from fields
        $queryString = substr($queryString, 0, -1);
		
		//close tag for query string	
		$queryString .= ') VALUES (:id,';	
		
		//append fields from array	
        foreach($insertArray as $field => $value){
            $queryString .= ' :'.$field.',';
        }
        
        //remove last comma from fields
        $queryString = substr($queryString, 0, -1);
		
		//close tag for query string	
		$queryString .= ')';
		
		//prepare query string
		$statement = $this->connection->prepare($queryString);
		
		//bind fields with values from array	
        foreach($insertArray as $field => $value){
            $fieldBind = ':'.$field;
            $statement->bindValue($fieldBind, $value);
        }
        
		//execute query
		try {    
			// ...SQLite stuff...
			$statement->execute();
			//add to success list.
			array_push($this->success, "data_inserted" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
	}

	public function selectRow($tableName,$fieldName,$fieldValue){
		
		
		//begin query string
		$queryString = 'SELECT * FROM "'.$tableName.'" WHERE "'.$fieldName.'" = ?';
		
		//do query
		$statement = $this->connection->prepare($queryString);
		
		//bind fields with values from $fieldValue	
		$statement->bindValue(1, $fieldValue);
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		//free memory
		$result->finalize();
		
		//return result as associative array.
		return $result->fetchArray(SQLITE3_ASSOC);
		
	}
	
	public function selectAllPaymentsWhere($column,$value){
		
		//begin query string
		$queryString = 'SELECT * FROM "payments" WHERE "'.$column.'" = ? ORDER BY paymentStatus';
		//do query
		$statement = $this->connection->prepare($queryString);
		//bind fields with values from $fieldValue	
		$statement->bindValue(1, $value);
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		//free memory
		$result->finalize();
		
		$all = array();
		
		while ($one = $result->fetchArray(SQLITE3_ASSOC))
        {
	        foreach($one as $key => $value){
	        	$one[$key] = $value;
	        }
            array_push($all,$one);
            //do stuff here, DO NOT $query->fetchArray() again, use $result.
        }
		
		//return result as associative array.
		return $all;
		
		
	}
	
	public function countPaymentsStatus($wc,$status){
		
		//begin query string
		$queryString = 'SELECT Count(*) FROM "payments" WHERE paymentWC = "'.$wc.'" AND paymentStatus = ?';
		//do query
		$statement = $this->connection->prepare($queryString);
		//bind fields with values from $fieldValue	
		$statement->bindValue(1, $status);
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		$rtn = $result->fetchArray(SQLITE3_ASSOC);
		
		//free memory
		$result->finalize();
		
		//return result as associative array.
		return $rtn['Count(*)'];
	}
	
	public function getPaidTotalsForWC($wc){
		
		//begin query string
		$queryString = 'SELECT * FROM "payments" WHERE paymentWC = "'.$wc.'" AND paymentStatus = "PAID"';
		//do query
		$statement = $this->connection->prepare($queryString);
		//bind fields with values from $fieldValue	
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		//free memory
		$result->finalize();
		
		$totalCASH = 0;
		$totalACC = 0;
		$totalTV = 0;
		
		while ($one = $result->fetchArray(SQLITE3_ASSOC))
        {
            $totalCASH = $totalCASH + $one['amountCash'];
            $totalACC = $totalACC + $one['amountAccount'];
            $totalTV = $totalTV + $one['amountTravelVouchers'];
        }
        $total = $totalCASH + $totalACC + $totalTV;
        
        $totals = array();
        $totals['cash'] = number_format($totalCASH, 2);
        $totals['acc'] = number_format($totalACC, 2);
        $totals['tv'] = number_format($totalTV, 2);
        $totals['total'] = number_format($total, 2);
		
		//return result as associative array.
		return $totals;
	}
	
	public function selectAllDrivers(){
		
		
		//begin query string
		$queryString = 'SELECT * FROM "drivers"';
		
		//do query
		$statement = $this->connection->prepare($queryString);
		
		//bind fields with values from $fieldValue	
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		//free memory
		$result->finalize();
		
		$all = array();
		
		while ($one = $result->fetchArray(SQLITE3_ASSOC))
        {
            array_push($all,$one['driverID']);
            //do stuff here, DO NOT $query->fetchArray() again, use $result.
        }
		
		//return result as associative array.
		return $all;
		
		
		// return $result->fetchArray(SQLITE3_ASSOC);
		
	}
	
		public function selectAllDriversAsArray(){
		
		
		//begin query string
		$queryString = 'SELECT * FROM "drivers"';
		
		//do query
		$statement = $this->connection->prepare($queryString);
		
		//bind fields with values from $fieldValue	
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		//free memory
		$result->finalize();
		
		$all = array();
		
		while ($one = $result->fetchArray(SQLITE3_ASSOC))
        {
            array_push($all,$one);
            //do stuff here, DO NOT $query->fetchArray() again, use $result.
        }
		
		//return result as associative array.
		return $all;
		
		
		// return $result->fetchArray(SQLITE3_ASSOC);
		
	}
	
	public function selectRowBy2($tableName,$fieldName1,$fieldValue1,$fieldName2,$fieldValue2){
		
		
		//begin query string
		$queryString = 'SELECT * FROM "'.$tableName.'" WHERE "'.$fieldName1.'" = ? AND "'.$fieldName2.'" = ?';
		
		//do query
		$statement = $this->connection->prepare($queryString);
		
		//bind fields with values from $fieldValue	
		$statement->bindValue(1, $fieldValue1);
		$statement->bindValue(2, $fieldValue2);
		
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			//add to success list.
			array_push($this->success, "data_selected" );
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
		
		//free memory
		$result->finalize();
		
		//return result as associative array.
		return $result->fetchArray(SQLITE3_ASSOC);
		
	}
	
	public function updateRow($tableName,$fieldsArray,$whereField,$whereValue) {
			
		//begin query string and set id as primary key
		$queryString = 'UPDATE "'.$tableName.'" SET';
		
		//append fields from array	
        foreach($fieldsArray as $field => $value){
            $queryString .= ' '.$field.'=:'.$field.',';
        }
		
        //remove last comma from fields
        $queryString = substr($queryString, 0, -1);
		
		//append query string with WHERE statment
		$queryString .=' WHERE '.$whereField.'="'.$whereValue.'"';	
		
		//prepare query string
		$statement = $this->connection->prepare($queryString);
			
		//bind fields with values from array	
        foreach($fieldsArray as $field => $value){
            $fieldBind = ':'.$field;
            $statement->bindValue($fieldBind, $value);
        }    
        
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			if ($this->connection->changes() == 1){
				//add to success list.
				array_push($this->success, "data_updated" );
			}else{
				//not updated.
				array_push($this->success, "data_not_updated" );
			}
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
        
	}
	
	public function updateRowBy2($tableName,$fieldsArray,$whereField,$whereValue,$whereField2,$whereValue2) {
			
		//begin query string and set id as primary key
		$queryString = 'UPDATE "'.$tableName.'" SET';
		
		//append fields from array	
        foreach($fieldsArray as $field => $value){
            $queryString .= ' '.$field.'=:'.$field.',';
        }
		
        //remove last comma from fields
        $queryString = substr($queryString, 0, -1);
		
		//append query string with WHERE statment
		$queryString .=' WHERE '.$whereField.'="'.$whereValue.'" AND '.$whereField2.'="'.$whereValue2.'"';	
		
		//prepare query string
		$statement = $this->connection->prepare($queryString);
			
		//bind fields with values from array	
        foreach($fieldsArray as $field => $value){
            $fieldBind = ':'.$field;
            $statement->bindValue($fieldBind, $value);
        }    
        
		//execute query
		try {    
			// ...SQLite stuff...
			$result = $statement->execute();
			if ($this->connection->changes() == 1){
				//add to success list.
				array_push($this->success, "data_updated" );
			}else{
				//not updated.
				array_push($this->success, "data_not_updated" );
			}
		} catch(Exception $e) {
			//add to error list.
			array_push($this->errors, $e->getMessage() );
		}
        
	}

}