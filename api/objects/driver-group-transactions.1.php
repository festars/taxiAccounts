<?php
//contains properties and methods for "driver-group-transactions" database queries.
class DriverGroupTransactions{
 
    // database connection and table name
    private $conn;
    private $table_name = "driver-group-transactions";
 
    // object properties
    public $id;    
    public $transaction;#£90dayrent/£70dayrent
    public $debit_amount;#-90rent/-70rent
    public $credit_amount;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}