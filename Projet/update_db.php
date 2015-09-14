<?php
include ('connexion.php');
error_reporting ( E_ALL );
ini_set ( 'display_errors', TRUE );
ini_set ( 'display_startup_errors', TRUE );
ini_set ( 'memory_limit', '-1' );
$req = 'select * from version order by version_id desc limit 1';
$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
$ver_curr = mysql_fetch_array ( $data_req );
echo 'Version courante=' . $ver_curr ['version_dist'];
if (isset ( $_POST ['submit'] )) {
	$old = umask ( 0 );
	echo 'Begin';
	 $svn = '--username pndiaye --password u5yayiyT --trust-server-cert --non-interactive https://reposetud.u-pem.fr/svn/pndiaye_ligm/';
	$path = dirname ( __FILE__ ) . '/SVN_EXPORT';
	exec ( "svn info -rHEAD " . $svn . " | grep Revision | cut -d' ' -f2", $revision );
	echo $rev = $revision [0];
	$path = dirname ( __FILE__ ) . '/databasewc';
	for($i = 0; $i <= $rev; $i ++) {
		mkdir ( dirname ( __FILE__ ) . '/databasewc/' . $i, 0777 );
		echo $cmd = "svn checkout --force " . $svn .  " " . $path . "/" . $i . '  2>&1';
		echo $cmd;
		echo (exec ( $cmd ));
	}
	
	$sql = "INSERT INTO `version`(`version_id`,`version_dist`)VALUES ('" . $rev . "','" . $_POST ['ver_value'] . "');";
	if (mysql_query ( $sql ) === TRUE) {
		echo "New version added successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	function insert($name, $path, $langue, $cat, $part, $revision) {
		$sql = 'INSERT INTO files (`name`,`path`,`language_id_FK`, `category_id_FK`,`part_of_speech_id_FK`,`version_id_FK`)VALUES ("' . $name . '", "' . $path . '", "' . $langue . '","' . $cat . '","' . $part . '","' . $revision . '");';
		if (mysql_query ( $sql ) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	function insert_doc($name, $path, $langue, $cat, $part, $revision) {
		$sql = 'INSERT INTO documentation (`name`,`path`,`language_id_FK`, `category_id_FK`,`part_of_speech_id_FK`,`version_id_FK`)VALUES ("' . $name . '", "' . $path . '", "' . $langue . '","' . $cat . '","' . $part . '","' . $revision . '");';
		
		if (mysql_query ( $sql ) === TRUE) {
			echo "New documentation created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	function find_all_files($dir, $deep, $name, $cat, $part, $langue, $revision) {
		$deep ++;
		
		$root = scandir ( $dir );
		foreach ( $root as $value ) {
			if ($value === '.' || $value === '..' || $value === '.svn') {
				continue;
			}
			switch ($deep) {
				case 1 :
					{
						echo "<br>Revision->: ";
						echo $revision = $value;
						
						break;
					}
				case 2 :
					{
						echo "<br>langue->: ";
						switch ($value) {
							case "French" :
								{
									$langue = 1;
									break;
								}
								;
							case "Korean" :
								{
									$langue = 2;
									break;
								}
								;
							case "PortugueseBrazil" :
								{
									$langue = 3;
									break;
								}
								;
							case "Romanian" :
								{
									$langue = 4;
									break;
								}
								;
							default :
								{
									$langue = 1;
									break;
								}
						}
						
						break;
					}
				case 3 :
					{
						echo "<br>category->: ";
						switch ($value) {
							case "free" :
								{
									echo $cat = 2;
									break;
								}
							case "multiword" :
								{
									echo $cat = 3;
									break;
								}
							case "docs" :
								{
									echo $cat = NULL;
									break;
								}
							default :
								{
									echo $cat = 2;
									break;
								}
						}
						break;
					}
				case 4 :
					{
						echo "<br>partofpeech->: ";
						switch ($value) {
							case "noun" :
								{
									echo $part = 1;
									break;
								}
								;
							case "verb" :
								{
									echo $part = 2;
									break;
								}
								;
							case "adverb" :
								{
									echo $part = 3;
									break;
								}
								;
							case "adjective" :
								{
									echo $part = 4;
									break;
								}
								;
							case "prepositional_phrase" :
								{
									echo $part = 5;
									break;
								}
								;
							default :
								{
									echo $part = NULL;
									break;
								}
						}
						break;
					}
			}
			
			if (is_file ( "$dir/$value" )) {
				$result [] = "$dir/$value";
				$path = "$dir/$value";
				echo "Path ->: " . $path . "<br>";
				$name = $value;
				if ($deep == 6) {
					insert_doc ( $name, $path, $langue, $cat, $part, $revision );
				} else if (($deep = 5) && ($cat == NULL)) {
					insert_doc ( $name, $path, $langue, $cat, $part, $revision );
				} else {
					insert ( $name, $path, $langue, $cat, $part, $revision );
				}
				
				continue;
			}
			if ($deep < 6)
				foreach ( find_all_files ( "$dir/$value", $deep, $name, $cat, $part, $langue, $revision ) as $value ) {
					$result [] = $value;
					// echo $value."<br>";
				}
		}
		return $result;
	}
	$variable = find_all_files ( $path, $deep, $name, $cat, $part, $langue, $revision );
	$sql = "update `files` set `downloadable`=1 where `name` in ( select `name` from (SELECT `name` FROM `files` WHERE `downloadable`=1) as temp_table);";
	mysql_query ( $sql );
	umask ( $old );
	echo 'end';
}
?>

<html>
<Title>Update Database</Title>
<body>
	<form method="post" action="#">
		<input type="text" name="ver_value"> <input type="submit"
			name="submit">
	</form>
</body>
</html>

