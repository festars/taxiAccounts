<?php
//contains properties and methods for "users" database queries.
class Users{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $username;
    public $password;
    public $user_permissions;
    public $date_started;
    public $date_finished;
    public $suspended;
    #details
    public $picture;
    public $first_name;
    public $last_name;
    public $street;
    public $town;
    public $county;
    public $postcode;
    public $mobile;
    public $email;
    #company
    public $company;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}