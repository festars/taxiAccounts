<?php
//contains properties and methods for "booking" database queries.
class Bookings{
 
    // database connection and table name
    private $conn;
    private $table_name = "bookings";
 
    // object properties
    public $id;
    public $pickup_datetime;
    public $vias;#array of addresses
    public $destination;
    public $name;
    public $driver_note;
    public $telephone;
    public $email;
    public $capabilities;
    public $passengers;#default:0
    public $luggage;#default:0
    public $priority;
    public $flight_info;
    public $office_note;
    #return
    public $return_datetime;
    public $return_flight_info;
    #repeat bookings
    public $repeat_days;#mtwtfss
    public $repeat_days_end;#end date for repeat
    public $repeat_days_suspended;
    #account
    public $account;
    public $account_client_ref;
    public $account_office_ref;
    #req/rej
    public $required_vehicles;#array of vehicle(s)
    public $rejected_vehicles;
    public $required_drivers;#array of driver(s)
    #company
    public $company;
    public $company_only;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}