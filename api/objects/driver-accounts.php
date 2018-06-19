<?php
//contains properties and methods for "driver-accounts" database queries.
class DriverAccounts{
 
    // database connection and table name
    private $conn;
    private $table_name = "driver-accounts";
 
    // object properties
    public $id;
    public $driver_callsign;
    public $previous_balance;
    public $current_balance;
    public $last_processed;#date/time
    public $last_processed_by;
    #totals
    public $cash_amount;
    public $account_amount;
    public $card_amount;
    public $total_amount;
    #
    public $week_commencing;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}