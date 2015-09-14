<?php
include ('PHPExcel/IOFactory.php');
error_reporting ( E_ALL );
ini_set ( 'display_errors', TRUE );
ini_set ( 'display_startup_errors', TRUE );
ini_set ( 'memory_limit', '-1' );
ini_set ( 'memory_limit', '2000M' ); // for 2GB
ini_set('max_execution_time', 300);

if (isset ( $_POST ['encoding'] )) {
	$encoding = $_POST ['encoding'];
}
if (isset ( $_POST ['file_format'] )) {
	$format = $_POST ['file_format'];
	// echo $format;
}
if (isset ( $_POST ['version'] )) {
	$revision = $_POST ['version'];
	// echo $format;
}
// // WARNING
// // This code should NOT be used as is. It is vulnerable to path traversal. https://www.owasp.org/index.php/Path_Traversal
// // You should sanitize $_GET['directtozip']
// // For tips to get started see http://stackoverflow.com/questions/4205141/preventing-directory-traversal-in-php-but-allowing-paths
if (isset ( $_POST ['resultat'] )||isset ( $_POST ['documentation'] )) {
	$old = umask ( 0 );
	$resultat = $_POST ['resultat'];
	mkdir ( dirname ( __FILE__ ) . '/archive', 0777 );
	foreach ( $resultat as $item ) {
		
		echo exec ( 'cp ' . $item . ' ' . dirname ( __FILE__ ) . '/archive' );
		
		// svn_export ( $item, "/home/sirpapy/Documents/archive" );
	}
	
	$the_folder = dirname ( __FILE__ ) . '/archive';
	$files = glob ( $the_folder . "/*.xls", GLOB_BRACE );
	mkdir ( dirname ( __FILE__ ) . '/archive/LIGM', 0777 );
	// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// /////////////////////////////////////CONVERSION XLS EN ODS OU CONVERSION EN XLS///////////////////////////////////////////////
	// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($format != "csv") {
		foreach ( $files as $file ) {
			$objReader = PHPExcel_IOFactory::createReader ( 'Excel5' );
			$objPHPExcel = $objReader->load ( $file );
			$title = array (
					'borders' => array (
							'bottom' => array (
									'style' => PHPExcel_Style_Border::BORDER_THIN,
									'color' => array (
											'rgb' => '000000' 
									) 
							),
							'right' => array (
									'style' => PHPExcel_Style_Border::BORDER_THIN,
									'color' => array (
											'rgb' => '000000' 
									) 
							) 
					),
					'fill' => array (
							'type' => PHPExcel_Style_Fill::FILL_NONE,
							'startcolor' => array (
									'rgb' => 'FFFFFF' 
							) 
					) 
			);
			$objPHPExcel->getActiveSheet ()->getDefaultRowDimension ()->setRowHeight ( - 1 );
			$objPHPExcel->getActiveSheet ()->getStyle ( 'A1:' . $objPHPExcel->getActiveSheet ()->getHighestColumn () . $objPHPExcel->getActiveSheet ()->getHighestRow () )->applyFromArray ( $title );
			$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel5' );
			$objWriter->save ( dirname ( __FILE__ ) . '/archive/LIGM/' . basename ( $file, ".xls" ) . '.' . $format );
			echo 'file created';
		}
	} else {
		// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// ///////////////////////////////////CONVERSION DE XLS EN CSV///////////////////////////////////////////////////
		// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		foreach ( $files as $file ) {
			mkdir ( dirname ( __FILE__ ) . '/archive/csv', 0777 );
			$objReader = PHPExcel_IOFactory::createReader ( 'Excel5' );
			$objPHPExcelReader = $objReader->load ( $file );
			$loadedSheetNames = $objPHPExcelReader->getSheetNames ();
			$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcelReader, 'CSV' );
			$objWriter->save (dirname ( __FILE__ ) . '/archive/csv/' . basename ( $file, ".xls" ) . '.' . $format );
			echo 'file created';
		}
		
		// ////////////////////////////////////////////////////////////////////////////////
		// //////////////////////Mettre les fichiers dans le dossier CSV pour changer l'encodage et les remettre dans l'archive
		// //////////////////////////////////////////////////////////////////////////////////////////
		
		$files = glob ( dirname ( __FILE__ ) . '/archive/csv' . "/*.csv", GLOB_BRACE );
		
		foreach ( $files as $file ) {
			$objReader = PHPExcel_IOFactory::createReader ( 'CSV' );
			
			// If the files uses a delimiter other than a comma (e.g. a tab), then tell the reader
			$objReader->setDelimiter ( ";" );
			// If the files uses an encoding other than UTF-8 or ASCII, then tell the reader
			$objReader->setInputEncoding ( $encoding );
			
			$objPHPExcel = $objReader->load ( $file );
			$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'CSV' );
			$objWriter->save (dirname ( __FILE__ ) . '/archive/LIGM/'. basename ( $file,".csv" ) . '.csv' );
			echo 'file created';
		}
	}
	// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// Pour déplacer les fichiers qui n'ont pas besoin d'etre convertis
	$files = glob ( $the_folder . "*.xls", GLOB_BRACE );
	foreach ( $files as $file ) {
		if (copy ( $the_folder . basename ( $file ), $the_folder . "/LIGM/" . basename ( $file, ".xls" ) )) {
			unlink ( $the_folder . basename ( $file, ".*" ) );
		}
		// exec ( "mv " . dirname ( __FILE__ ) . "/archive/".$file." ".dirname ( __FILE__ ) . "/archive/LIGM/".$file );
	}
	
	if (isset ( $_POST ['documentation_result'] )) {
		$resultat = $_POST ['documentation_result'];
		mkdir ( dirname ( __FILE__ ) . '/archive/LIGM/Documentation/', 0777 );
		foreach ( $resultat as $item ) {
			echo $item . '<br> ';
			exec ( 'cp ' . $item . ' ' . dirname ( __FILE__ ) . '/archive/LIGM/Documentation' );
			
			// svn_export ( $item, "/home/sirpapy/Documents/archive" );
		}
	}
	
	$zip_file_name = 'tables.zip';
	
	$download_file = true;
	// $delete_file_after_download= true; doesnt work!!
	class FlxZipArchive extends ZipArchive {
		/**
		 * Add a Dir with Files and Subdirs to the archive;;;;; @param string $location Real Location;;;; @param string $name Name in Archive;;; @author Nicolas Heimann;;;; @access private *
		 */
		public function addDir($location, $name) {
			$this->addEmptyDir ( $name );
			
			$this->addDirDo ( $location, $name );
		} // EO addDir;
		
		/**
		 * Add Files & Dirs to archive;;;; @param string $location Real Location; @param string $name Name in Archive;;;;;; @author Nicolas Heimann
		 *
		 * @access private *
		 *        
		 */
		private function addDirDo($location, $name) {
			$name .= '/';
			$location .= '/';
			
			// Read all Files in Dir
			$dir = opendir ( $location );
			while ( $file = readdir ( $dir ) ) {
				if ($file == '.' || $file == '..')
					continue;
					// Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
				$do = (filetype ( $location . $file ) == 'dir') ? 'addDir' : 'addFile';
				$this->$do ( $location . $file, $name . $file );
			}
		} // EO addDirDo();
	}
	
	$za = new FlxZipArchive ();
	$res = $za->open ( $zip_file_name, ZipArchive::CREATE );
	if ($res === TRUE) {
		$za->addDir ( $the_folder . '/LIGM/', basename ( $the_folder . '/LIGM/' ) );
		$za->close ();
	} else {
		echo 'Could not create a zip archive';
	}
	
	if ($download_file) {
		ob_get_clean ();
		header ( "Pragma: public" );
		header ( "Expires: 0" );
		header ( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
		header ( "Cache-Control: private", false );
		header ( "Content-Type: application/zip" );
		header ( "Content-Disposition: attachment; filename=" . basename ( $zip_file_name ) . ";" );
		header ( "Content-Transfer-Encoding: binary" );
		header ( "Content-Length: " . filesize ( $zip_file_name ) );
		readfile ( $zip_file_name );
	}
	unlink ( $zip_file_name );
	exec ( "rm -Rf " . dirname ( __FILE__ ) . "/archive" );
	umask ( $old );
}
?>