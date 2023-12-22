<?php
$db_host	= "localhost"; // Hostnavn på database
$db_user	= "root"; // Brugernavn til database
$db_pass	= ""; // Adgangskode til database
$db_name	= "crud_med_jquery_ajax_php"; // Databasenavn

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Opretter forbindelse til databasen
mysqli_set_charset($link, "utf8"); // Sætter tegnsætning til utf8
mysqli_query($link, "SET lc_time_names = 'da_DK'"); // Sætter navne på måneder og dage til dansk

// tjek forbindelse
if (!$link) {
	die('Connection error: '. mysqli_connect_error());
}

session_start(); // Starter en session, uden denne kan vi ikke gemme SESSION-variabler
ob_start(); // Starter output buffer for at kunne ændre i header uden risiko for advarsler
?>