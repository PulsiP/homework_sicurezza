<?php
$servername = "mysql";
$username = "sql_injection";
$password = "inject";
$database = "sql_injection";

// Connessione al database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>