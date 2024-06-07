<?php
    $servername = "mysql";
    $username = "sql_injection";
    $password = "inject";
    $database = "sql_injection";

    // Connessione al database
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verifica la connessione
    if ($conn->connect_error || mysqli_connect_errno()) {
        die("Connection failed: " . $conn->connect_error);
    }


?>
