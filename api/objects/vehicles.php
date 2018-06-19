<?php
//contains properties and methods for "vehicles" database queries.
class Vehicles{
 
    // database connection and table name
    private $conn;
    private $table_name = "vehicles";
 
    // object properties
    public $id;
    public $callsign;
    public $suspended;
    public $suspended_history;
    public $comments;
    #vehicle
    public $make;
    public $model;
    public $colour;
    public $registration;
    public $max_passengers;
    public $capabilities;
    #license
    public $plate;
    public $plate_expiry;
    public $mot_expiry;
    public $tax_expiry;
    public $insurance_expiry;
    #comms & config
    public $terminal_id;
    public $terminal_type;
    public $terminal_phone_number;
    public $terminal_serial;
    public $terminal_config;
    #company
    public $company;
    public $company_only;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}