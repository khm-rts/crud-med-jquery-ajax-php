<?php
// Filnavn: hent_bruger.php
require("includes/db_config.php"); // Din connection-fil

// Henter værdier fra POST og gemmer dem som variabler
$id		= intval($_POST["id"]);

// Forespørgsel på bruger med match af variabel ovenfor
$query	= "DELETE FROM brugere WHERE id = '$id'";
$result = mysqli_query($link, $query) or die( mysqli_error($link) );

// json_encode konverterer PHP array til JSON (JavaScript Object Notation bruges primært til at udveklse data mellem server og web applikationer, ligesom XML - da data kan læses uafhængigt af programmeringssprog) eksempel nederst på siden).
echo json_encode(array(
	'status' => $result
));

require("includes/db_close.php"); // Din fil hertil-, eller close af din connection
?>