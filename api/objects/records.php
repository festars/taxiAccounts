<?php
//contains properties and methods for "records" database queries.
class Records{
 
    // database connection and table name
    private $conn;
    private $table_name = "records";
 
    // object properties
    public $id;
    public $booking_id;
    public $status;
    public $driver_id;
    public $vehicle_id;
    public $booking_type;#prebooked/asap
    public $source;#operator/web/app
    public $payment_type;#cash/card/account
    public $booked_by;
    public $dispatched_by;
    public $modified_by;
    #date/times
    public $time_booked;
    public $time_dispatched;
    public $time_arrived;
    public $time_picked_up;
    public $time_completed;
    #company
    public $company;
    public $company_booked_by;
    public $company_completed_by;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}