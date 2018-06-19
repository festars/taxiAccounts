<?php
//contains properties and methods for "driver-profile" database queries.
class DriverProfile{
 
    // database connection and table name
    private $conn;
    private $table_name = "driver-profile";
 
    // object properties
    public $id;
    public $callsign;
    #ratings
    public $passenger_rating;
    public $operator_rating;
    public $total_rating_count;
    public $overall_rating;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}