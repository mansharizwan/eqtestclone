<?php
$servername = "localhost";
$username = "ufmo7njmacww5";
$password = "11sfr0qvmbjh";
$dbname = "db42k5g1pigsit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
