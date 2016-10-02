<?php
// Filnavn: hent_alle_brugere.php
require("includes/db_config.php"); // Din connection-fil

// Forespørgsel på alle brugere or sorter dem stigende på brugernavn
$query	= "SELECT * FROM brugere ORDER BY brugernavn ASC";
// Send forespørgslen til databasen
$result	= mysqli_query($link, $query) or die( mysqli_error($link) );

// Variabel med tomt array til at gemme rækker i
$data	= array();
// Henter alt data fra ovenstående forespørgsel og gemmer i variablen $row
while( $row = mysqli_fetch_assoc($result) )
{
	// I stedet for echo tabel med data direkte, returnerer vi alle værdier som et multi-array, så vi via jQuery kan generere rækker i vores tabel
	$data[] = $row;
}

// json_encode konverterer PHP array til JSON (JavaScript Object Notation bruges primært til at udveklse data mellem server og web applikationer, ligesom XML - da data kan læses uafhængigt af programmeringssprog) eksempel nederst på siden).
echo json_encode($data);

require("includes/db_close.php"); // Din fil hertil-, eller close af din connection
?>