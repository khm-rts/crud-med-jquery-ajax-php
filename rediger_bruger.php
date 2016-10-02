<?php
// Filnavn: opret_bruger.php
require("includes/db_config.php"); // Din connection-fil

// Henter værdier fra POST og gemmer dem som variabler
$id			= intval($_POST["id"]);
$brugernavn	= mysqli_real_escape_string($link, $_POST["brugernavn"]);
$email		= mysqli_real_escape_string($link, $_POST["email"]);

// Forespørgsel på opdatering af bruger med værdi fra variabler ovenfor
$query		= "UPDATE brugere SET brugernavn = '$brugernavn', email = '$email' WHERE id = $id";
// Send forespørgslen til databasen og gem boolean (true/false) i variablen $result
$result		= mysqli_query($link, $query) or die( mysqli_error($link) );

// json_encode konverterer PHP array til JSON (JavaScript Object Notation bruges primært til at udveklse data mellem server og web applikationer, ligesom XML - da data kan læses uafhængigt af programmeringssprog) eksempel nederst på siden).
echo json_encode(array(
	'status' => $result
));

require("includes/db_close.php"); // Din fil hertil-, eller close af din connection
?>