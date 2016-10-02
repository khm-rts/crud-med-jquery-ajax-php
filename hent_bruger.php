<?php
// Filnavn: hent_alle_brugere.php
require("includes/db_config.php"); // Din connection-fil

// Henter værdier fra POST og gemmer dem som variabler
$id		= intval($_POST["id"]);

// Forespørgsel på brugere hvor id er lig værdi fra variablen ovenfor
$query	= "SELECT * FROM brugere WHERE id = $id";
// Send forespørgslen til databasen
$result	= mysqli_query($link, $query) or die( mysqli_error($link) );
// Henter alt data fra ovenstående forespørgsel og gemmer i variablen $data
$data = mysqli_fetch_assoc($result);

// json_encode konverterer PHP array til JSON (JavaScript Object Notation bruges primært til at udveklse data mellem server og web applikationer, ligesom XML - da data kan læses uafhængigt af programmeringssprog) eksempel nederst på siden).
echo json_encode($data);

require("includes/db_close.php"); // Din fil hertil-, eller close af din connection
?>