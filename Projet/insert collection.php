<?php
error_reporting ( E_ALL );
ini_set ( 'display_errors', TRUE );
ini_set ( 'display_startup_errors', TRUE );
require_once 'PHPExcel/excel_reader2.php';
include ('connexion.php');

$data = new Spreadsheet_Excel_Reader("example.xls");
//format de fichier enregistré sur la base de données
$format=".xls";



echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";

$html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	//if($i==0)
	//continue;
	if(count($data->sheets[$i][cells])>0) // checking sheet not empty
	{
		echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i][cells])."<br />";
		for($j=1;$j<=count($data->sheets[$i][cells]);$j++) // loop used to get each row of the sheet
		{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i][cells][$j]);$k++) // This loop is created to get data in a table format.
			{
				$html.="<td>";
				$html.=$data->sheets[$i][cells][$j][$k];
				$html.="</td>";
			}
			
			$name = $data->sheets[$i][cells][$j][1];
			$_1975 = $data->sheets[$i][cells][$j][2];
			$_1976a = $data->sheets[$i][cells][$j][3];
			$_1976b = $data->sheets[$i][cells][$j][4];
			$_1992 = $data->sheets[$i][cells][$j][5];
			$_1990 = $data->sheets[$i][cells][$j][6];
			$sanscompletive = $data->sheets[$i][cells][$j][7];
			$intransitif = $data->sheets[$i][cells][$j][8];
			$transitif = $data->sheets[$i][cells][$j][9];
			$locatif = $data->sheets[$i][cells][$j][10];
			$query = "insert into collection_files(`name`, `1975`, `1976a`, `1976b`, `1992`, `1990`, `sanscompletive`, `intransitif`, `transitif`, `locatif`) values('V_".$name.".lgt','".$_1975."','".$_1976a."','".$_1976b."','".$_1992."','".$_1990."','".$sanscompletive."','".$intransitif."','".$transitif."','".$locatif."');";
			if (mysql_query ( $query ) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $query . "<br>" . $conn->error;
			}
			$html.="</tr>";
		}
	}

}

$html.="</table>";
echo $html;
echo "<br />Data Inserted in dababase";
?>