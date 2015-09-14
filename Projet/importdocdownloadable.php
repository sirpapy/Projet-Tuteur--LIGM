<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
 <div align='CENTER'>
<form method="POST" action="#" enctype="multipart/form-data">
    <p>File to upload : <input type ="file" name = "UploadFileName"></p><br />
    <input type = "submit" name = "valider" value = "Press THIS to upload">
</form>
  <a href="importdocdownloadable.php">Next</a>
  </div>
  
</body>
</html>

<?php
if (isset ( $_POST ['valider'] )) {
//echo $_FILES['UploadFileName']['tmp_name'];

	//error_reporting ( E_ALL );
	//ini_set ( 'display_errors', TRUE );
	//ini_set ( 'display_startup_errors', TRUE );
	require_once 'PHPExcel/excel_reader2.php';
	include ('connexion.php');
	
	$data = new Spreadsheet_Excel_Reader ( $_FILES['UploadFileName']['tmp_name'] );
	// format de fichier enregistré sur la base de données
	$format = ".xls";
	
	echo "Total Sheets in this xls file: " . count ( $data->sheets ) . "<br/><br />";
	
	$html = "<table border='1'>";
	for($i = 0; $i < 1; $i ++) // Loop to get all sheets in a file.
{
		if (count ( $data->sheets [$i] [cells] ) > 0) // checking sheet not empty
{
			echo "Sheet $i:<br /><br />Total rows in sheet $i  " . count ( $data->sheets [$i] [cells] ) . "<br />";
			for($j = 2; $j <= count ( $data->sheets [$i] [cells] ); $j ++) // loop used to get each row of the sheet
{
				$html .= "<tr>";
				for($k = 1; $k <= count ( $data->sheets [$i] [cells] [$j] ); $k ++) // This loop is created to get data in a table format.
{
					$html .= "<td>";
					$html .= $data->sheets [$i] [cells] [$j] [$k];
					$html .= "</td>";
				}
				
				$id = $data->sheets [$i] [cells] [$j] [1];				
				$downloadable = $data->sheets [$i] [cells] [$j] [8];
				if (!$id)
					continue;
				
				$query = "UPDATE `documentation` SET `downloadable`=".$downloadable." WHERE `doc_id`=".$id;
				if (mysql_query ( $query ) === TRUE) {
					//echo "Downloadable option added successfully";
				} else {
					//echo "Error: " . $query . "<br>" . $conn->error;
				}
				$html .= "</tr>";
			}
		}
	}
	
	$html .= "</table>";
	echo $html;
	echo "<br />Data Inserted in dababase";
}

?>

