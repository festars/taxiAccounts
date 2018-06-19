<?php
//contains properties and methods for "accounts" database queries.
class Accounts{
 
    // database connection and table name
    private $conn;
    private $table_name = "accounts";
 
    // object properties
    public $id;
    public $callsign;
    public $pin;
    public $capabilities;
    public $no_account_bookings;
    public $no_cash_bookings;
    public $date_started;
    public $date_finished;
    public $suspended;
    public $suspended_expiry;
    public $suspended_history;
    public $comments;
    #details
    public $contact_name;
    public $client_name;
    public $street;
    public $town;
    public $county;
    public $postcode;
    public $telephone;
    public $email;
    #license
    public $badge;
    public $badge_expiry;
    public $driving_license;
    public $driving_license_expiry;
    #company
    public $company;
    public $company_only;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}