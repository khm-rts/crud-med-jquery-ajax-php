<?php
// Filnavn: hent_bruger.php
require("includes/db_config.php"); // Din connection-fil

// Henter værdier fra POST og gemmer dem som variabler
$email		= mysqli_real_escape_string($link, $_POST["email"]);

// Hvis id er defineret og har en værdi henter vi værdi og tilføjer betingelse i variablen $where_id
if ( isset($_POST['id']) && !empty($_POST['id']) )
{
	// Henter felter fra POST og gemmer dem som variabler
	$id			= intval($_POST['id']);
	$where_id	= "AND id != $id";
}
// Ellers gemmer vi en tom streng i variablen $where_id, for at sikre den er defineret i forespørgslen nedenfor
else
{
	$where_id	= '';
}

// Forespørgsel på brugere med match af variabler ovenfor
$query		=  "SELECT COUNT(*) AS count FROM brugere WHERE email = '$email' $where_id";
// Send forespørgslen til databasen
$result		= mysqli_query($link, $query) or die( mysqli_error($link) );
// Gemmer data fra ovenstående forespørgsel
$row		= mysqli_fetch_assoc($result);


// If count returns any, the value is used and we set the variable $isAvailable to false
if ($row['count'] > 0) {
	$isAvailable = false;
// If count returns zero, the value is available and we set the variable to true
} else {
	$isAvailable = true;
}

// json_encode konverterer PHP array til JSON (JavaScript Object Notation bruges primært til at udveklse data mellem server og web applikationer, ligesom XML - da data kan læses uafhængigt af programmeringssprog) eksempel nederst på siden).
echo json_encode(array(
	'valid' => $isAvailable
));

require("includes/db_close.php"); // Din fil hertil-, eller close af din connection
?>