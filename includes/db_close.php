<?php
ob_end_flush(); // Tømmer output bufferen
mysqli_close($link); // Lukker forbindelsen til databasen
?>