<?php
/* Inzializza la sessione */
session_start();
 
/* Liberare tutte le variabili della sessione */
$_SESSION = array();
 
/* Rimuovi la sessione */
session_destroy();
 

header("location: index.php");
exit;

?>