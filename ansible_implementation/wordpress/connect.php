<?php
$servername = "192.168.33.34";
$username = "redhat";
$password = "redhat";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to app1";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>