<?php
//contains properties and methods for "driver-transactions" database queries.
class DriverTransactions{
 
    // database connection and table name
    private $conn;
    private $table_name = "driver-transactions";
 
    // object properties
    public $id;    
    public $driver_callsign;#driver for which transaction is assigned to
    public $datetime;
    public $transaction;#1dayrent/2driverpayment
    public $debit_amount;#1-90rent
    public $credit_amount;#2+50cash(40acc)2transactions
    public $processed_by;#user
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}