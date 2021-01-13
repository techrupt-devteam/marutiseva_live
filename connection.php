<?php 
$servername = "localhost";

//$username = "marutise_new_sev";
//$password = "9sBAOYro4e5y";

$username = "root";
$password = "";


$dbname = "marutise_new_seva";
 $conn    = new mysqli($servername, $username, $password, $dbname);

        // Check connection

        if ($conn->connect_error) {

          die("Connection failed: " . $conn->connect_error);

        }
?>