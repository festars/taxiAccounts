<?php
//contains properties and methods for "users" database queries.
class Capabilities{
 
    // database connection and table name
    private $conn;
    private $table_name = "capabilities";
 
    // object properties
    public $id;
    public $apperance;#color/bold-undecided
    public $shortcode;#a-z
    public $name;
    public $requirement;#driver/vehicle
    public $priority;
    public $exclude_broadcast;
    public $enabled;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}