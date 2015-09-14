<?php

// //////////////////////
// ////////Avant d'executer ce fichier il faut s'assurer qu'on a les droits sur le repertoire ou est installer le repository
// //////// sudo chmod -R 0777 /var/www/html/Projet
// //////////////////////////////////////////////////////////////////////
echo $_FILES ['UploadFileName'] ['tmp_name'];
include ('connexion.php');

$old = umask ( 0 );
error_reporting ( E_ALL );
ini_set ( 'display_errors', TRUE );
ini_set ( 'display_startup_errors', TRUE );
ini_set ( 'memory_limit', '-1' );
ini_set ( 'max_execution_time', 600 );

echo exec('sudo chmod -R 0777 /var/www/html/Projet');

$svn = '--username pndiaye --password u5yayiyT --trust-server-cert --non-interactive https://reposetud.u-pem.fr/svn/pndiaye_ligm/';
$path = dirname ( __FILE__ ) . '/SVN_EXPORT';
exec ( "svn info -rHEAD " . $svn . " | grep Revision | cut -d' ' -f2", $revision );
echo $rev = $revision [0];
echo exec ( "chmod 777 " . $path );

echo "</br>Checkout command </br>";
$cmd = "svn checkout --force " . $svn . " " . $path;
echo $cmd;
echo (exec ( $cmd ));

echo "</br>Add command</br>";
echo $cmd = 'svn add --force ' . $path . '  2>&1';
echo (exec ( $cmd ));

echo "</br>Commit command </br>";
echo $cmd = "svn commit " . $path . " -m 'Fichier ajoute' --username pndiaye --password u5yayiyT --trust-server-cert --non-interactive 2>&1";
echo (exec ( $cmd ));
umask ( $old );
?>
