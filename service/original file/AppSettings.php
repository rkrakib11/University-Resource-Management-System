<?php

class AppSettings {
    private static ?AppSettings $instance = null;

   

    //  Define conn as a public property
    public mysqli $conn;

    private function __construct() {
       

        //  Database connection setup
        $servername = "127.0.0.1";
        $username = "root";
        $password = ""; // your MySQL password
        $dbname = "projectums";

        // Create connection and assign to public property
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance(): AppSettings {
        if (self::$instance === null) {
            self::$instance = new AppSettings();
        }
        return self::$instance;
    }
}
