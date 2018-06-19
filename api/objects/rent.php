<?php
//contains properties and methods for "rent" database queries.
class Rent{
 
    // database connection and table name
    private $conn;
    private $table_name = "rents";
 
    // object properties
    public $id;
    public $driver_id;#driver id for which rent is assigned to
    public $cash_amount;
    public $account_amount;
    public $travelvouchers_amount;
    public $total_amount;
    public $week_commencing;
    public $status_last_changed;#date-time when rent was last paid/due/off
    public $status;#options = paid, due, off
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}