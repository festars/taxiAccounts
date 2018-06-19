<?php
//contains properties and methods for "ratings" database queries.
class Ratings{
 
    // database connection and table name
    private $conn;
    private $table_name = "ratings";
 
    // object properties
    public $id;
    public $datetime;
    #rating
    public $status;
    public $comment;
    public $rating;
    public $notes;
    public $source;
    public $user;
    public $booking_id;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}