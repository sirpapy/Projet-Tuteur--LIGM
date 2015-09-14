<?php
// On définit les 4 variables nécessaires à la connexion MySQL :
$hostname = "localhost";
$user = "root";
$password = "mamina";
$nom_base_donnees = "ligm";

// Connexion au serveur MySQL
$conn = mysql_connect ( $hostname, $user, $password ) or die ( mysql_error () );

// Choix de la base sur laquelle travailler
mysql_select_db ( $nom_base_donnees, $conn );
mysql_query ( "SET NAMES 'utf8'" );
// echo "Connected to MySQL<br>";
?>