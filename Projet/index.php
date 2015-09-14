<!DOCTYPE HTML>
<?php
include ('connexion.php');
// error_reporting ( E_ALL );
// ini_set ( 'display_errors', TRUE );
// ini_set ( 'display_startup_errors', TRUE );
if (isset ( $_POST ['language'] )) {
	$langue = $_POST ['language'];
	// echo $langue;
}
if (isset ( $_POST ['version'] )) {
	$revision = $_POST ['version'];
	// echo $revision;
}
if (isset ( $_POST ['type_cat'] )) {
	$category = $_POST ['type_cat'];
	// echo $category;/
}
if (isset ( $_POST ['type_cat'] )) {
	$collection = $_POST ['type_cat'];
	// echo $collection;
}
if (isset ( $_POST ['part_of_speech'] )) {
	$part_of_speech = $_POST ['part_of_speech'];
	// echo $part_of_speech;
}

if (isset ( $_POST ['file_format'] )) {
	$format = $_POST ['file_format'];
	echo $format;
}
if (isset ( $_POST ['documentation_result'] )) {
	$documentation_test = $_POST ['documentation_result'];
	// echo $documentation_test;
}
if (isset ( $_POST ['documentation'] )) {
	$documentation = $_POST ['documentation'];
	// echo $documentation;
}
if (isset ( $_POST ['encoding'] )) {
	$encoding = $_POST ['encoding'];
}

if (isset ( $_POST ['part_of_speech'] )) {
	$part_of_speech = $_POST ['part_of_speech'];
}
if (isset ( $_POST ['free'] )) {
	// $cat_free = $_POST ['free'];
	// echo $cat_free;
}
if (isset ( $_POST ['fixed'] )) {
	// $cat_fixed = $_POST ['fixed'];
	// echo $cat_fixed;
}
if (isset ( $_POST ['all'] )) {
	// $cat_all = $_POST ['all'];
	// echo $cat_all;
}
if (isset ( $_POST ['download'] ))
	include ('download.php');
$url = 'file:///var/www/html/Projet/database';

// echo 'end';

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// /////////////////////////////////// DOWNLOAD//////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// /////////////////////////////////// DOWNLOAD//////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Variables gloables
?>

<html>
<head>
<title>LIGM</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/jquery.scrollzer.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>

<noscript>
	<link rel="stylesheet" href="css/skel.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/style-wide.css" />
</noscript>
<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>


	<!-- Header -->
	<div id="header" class="skel-layers-fixed">

		<div class="top">

			<!-- Logo -->
			<div id="logo">
				<span class="image avatar48"><img src="images/logo.png" alt="" /></span>
				<h1 id="title">LIGM</h1>
				<!--<p>Hyperspace Engineer</p> -->
			</div>

			<!-- Nav -->
			<nav id="nav">

				<ul>
					<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span
							class="icon fa-home">Home</span></a></li>
					<li><a href="#search" id="search-link"
						class="skel-layers-ignoreHref"><span class="icon fa-th">Search</span></a></li>
					<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span
							class="icon fa-user">Licence</span></a></li>
					<li><a href="#contact" id="contact-link"
						class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact-us</span></a></li>
					<li><a href="http://infolingu.univ-mlv.fr/" id="contact-link"
						class="skel-layers-ignoreHref"><h3>Back</h3></a></li>
				</ul>
			</nav>

		</div>



	</div>

	<!-- Main -->
	<div id="main">

		<!-- Intro -->

		<section id="top" class="one dark cover">
			<div class="top">
				<strong>Linguistics for Language Processing </strong> From
				Linguistic Research to Linguistic Engineering</br> </br>
			</div>
			<div class="container">

				<header>
					<h2>
						<strong>Download a lexicon-grammar</strong>
					</h2>

				</header>

				<footer>
					<a id="hov" href="#search" class="button scrolly">Start Browsing</a>
				</footer>

			</div>
		</section>

		<!-- search -->
		<section id="search" class="two">
			<div class="container">


				By clicking the "Download" button below, you acknowledge that you
				have read, understood, and agree to be legally bound by the terms
				and conditions of the <strong><a
					href="http://infolingu.univ-mlv.fr/DonneesLinguistiques/Lexiques-Grammaires/lgpllr.html">LGPLLR</a></strong>
				license <br>
				<div>
					</br>
					<form name="theForm" action="index.php#search" method="post">
						<table width="100%" border="1">
							<tr>
								<td><h3>Language</h3>
<?php
echo '<select id="langage"  onChange="this.form.submit()" name="language">';
$req = "SELECT * FROM language ORDER BY `language_id` ASC;";
$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
while ( $language = mysql_fetch_array ( $data_req ) ) {
	if (isset ( $_POST ['language'] )) {
		$langue = $_POST ['language'];
		if ($langue == $language ['language_id']) {
			echo "<option selected  value=" . $language ['language_id'] . ">" . $language ['name'] . "</option>\n";
			continue;
		}
	}
	echo "<option value=" . $language ['language_id'] . ">" . $language ['name'] . "</option>\n";
}
echo "</select>";

?></td>
								<td><h3>Version</h3>
							<?php
							echo '<select id=version name=version onChange="this.form.submit()">';
							$req = "SELECT * FROM version;";
							$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
							while ( $version = mysql_fetch_array ( $data_req ) ) {
								if (isset ( $_POST ['version'] )) {
									$revision = $_POST ['version'];
									if ($revision == $version ['version_id']) {
										echo "<option selected  value=" . $revision . ">" . $version ['version_dist'] . "</option>\n";
										continue;
									}
								}
								echo "<option value=" . $version ['version_id'] . ">" . $version ['version_dist'] . "</option>\n";
							}
							echo "</select>";
							
							echo '</br><h3>Part of speech</h3>';
							$type_catt = $_POST ['type_cat'];
							echo '<select id="part_of_speech" name="part_of_speech">';
							$req = "select * from part_of_speech";
							$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
							$rowCount = mysql_num_rows ( $data_req );
							if ($rowCount == 0) {
								echo "<option value=0> Empty </option>\n";
							} else {
								while ( $part_of_speech_req = mysql_fetch_array ( $data_req ) ) {
									$type_cat_testeur = $_POST ['part_of_speech'];
									if ($type_cat_testeur == $part_of_speech_req ['part_of_speech_id']) {
										echo "<option selected value=" . $part_of_speech_req ['part_of_speech_id'] . ">" . $part_of_speech_req ['name'] . "</option>\n";
									} else {
										echo "<option value=" . $part_of_speech_req ['part_of_speech_id'] . ">" . $part_of_speech_req ['name'] . "</option>\n";
									}
								}
							}
							echo "</select>";
							echo '</br>';
							?>								
								</td>
								<td><h3>Free/Multiword</h3> 
	
	<?php
	echo '<select id="type_cat" name="type_cat" name="version" onChange="this.form.submit()">';
	$req = "SELECT * FROM category";
	$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
	while ( $cat = mysql_fetch_array ( $data_req ) ) {
		if (isset ( $_POST ['type_cat'] )) {
			$type_catt = $_POST ['type_cat'];
			if ($type_catt == $cat ['category_id']) {
				echo "<option selected  value=" . $cat ['category_id'] . ">" . $cat ['name'] . "</option>\n";
				continue;
			}
		}
		echo "<option value=" . $cat ['category_id'] . ">" . $cat ['name'] . "</option>\n";
	}
	
	echo "</select>";
	
	if (! isset ( $_POST ['language'] ) || $langue == 1) {
		echo '</br><h3>Collection of tables</h3>';
		echo '<select id="collection" name="collection">';
		echo '<option selected  value="0"> All </option>\n';
		$req = "SELECT * FROM collection";
		$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
		while ( $collect = mysql_fetch_array ( $data_req ) ) {
			if (isset ( $_POST ['collection'] )) {
				$collection = $_POST ['collection'];
				if ($collection == $collect ['value']) {
					echo "<option selected  value=" . $collect ['value'] . ">" . $collect ['name'] . "</option>\n";
					continue;
				}
			}
			echo "<option value=" . $collect ['value'] . ">" . $collect ['name'] . "</option>\n";
		}
		echo "</select>";
	}
	?>
	
								 </td>
							</tr>
							<tr>
								<td><h3>File Format</h3> 
								<?php
								echo '<select id="file_format"  onChange="this.form.submit()" name="file_format">';
								$req = "SELECT * FROM file_format;";
								$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
								while ( $formats = mysql_fetch_array ( $data_req ) ) {
									if (isset ( $_POST ['file_format'] )) {
										$format = $_POST ['file_format'];
										if ($format == $formats ['value']) {
											echo "<option selected  value=" . $formats ['value'] . ">" . $formats ['name'] . "</option>\n";
											continue;
										}
									}
									echo "<option value=" . $formats ['value'] . ">" . $formats ['name'] . "</option>\n";
								}
								echo "</select>";
								
								?>
								</td>
								<td><h3>Include documentation</h3>
								<?php
								if (isset ( $_POST ['documentation'] )) {
									if ($_POST ['documentation'] == "yes") {
										echo '<input checked onChange="this.form.submit()" type="radio" name="documentation" value="yes">Yes</input>';
										echo '<input onChange="this.form.submit()" type="radio" name="documentation" value="no">No</input>';
									} else {
										echo '<input onChange="this.form.submit()" type="radio" name="documentation" value="yes">Yes</input>';
										echo '<input checked onChange="this.form.submit()" type="radio" name="documentation" value="no">No</input>';
									}
								} else {
									echo '<input onChange="this.form.submit()" type="radio" name="documentation" value="yes">Yes</input>';
									echo '<input checked onChange="this.form.submit()" type="radio" name="documentation" value="no">No</input>';
								}
								?>
									</td>
								</td>
								
								<?php
								if ($_POST ['file_format'] == 1) {
								} else {
									echo '<td><h3>Character Encoding</h3>';
									echo '<select id="encoding" name="encoding">';
									$req = "SELECT * FROM encoding;";
									$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
									while ( $encoding_list = mysql_fetch_array ( $data_req ) ) {
										echo "<option value=" . $encoding_list ['name'] . ">" . $encoding_list ['name'] . "</option>\n";
									}
								}
								
								echo "</select>";
								?>
								</td>
							</tr>


						</table>



						<input type="submit" value="Search" name="search" />



						<div id="recherche_result">
					
					<?php
					
					$files_id = array ();
					
					if (isset ( $_POST ['search'] )) {
						if ($_POST ['documentation'] == "no") {
							echo '<select multiple name="resultat[]" >';
							$req = "SELECT distinct files.* FROM files,collection_files where language_id_FK=" . $langue . " and version_id_FK=" . $revision;
							if ($collection != "0") { // Pour dire que si la collection est different de All
								$req = $req . " and files.name = collection_files.name and collection_files." . $collection . "!='-'";
							}
							if ($type_catt != 1) { // Pour dire que si la category est differente de All
								$req = $req . " and category_id_FK=" . $category;
							}
							echo $req = $req . " and part_of_speech_id_FK=" . $part_of_speech . ";";
							$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
							while ( $resultats = mysql_fetch_array ( $data_req ) ) {
								echo "<option value=" . $resultats ['path'] . ">" . $resultats ['name'] . "</option>\n";
							}
							
							echo '</select>';
						} else {
							echo '<table>';
							echo '<tr>';
							echo '<td width="60%">';
							echo '<h3> Results</h3>';
							echo '<select multiple name="resultat[]" >';
							$req = "SELECT distinct files.* FROM files,collection_files where language_id_FK=" . $langue . " and version_id_FK=" . $revision;
							if ($collection != "0") { // Pour dire que si la collection est different de All
								$req = $req . " and files.name = collection_files.name and collection_files." . $collection . "!='-'";
							}
							if ($type_catt != 1) { // Pour dire que si la category est differente de All
								$req = $req . " and category_id_FK=" . $category;
							}
							echo $req = $req . " and part_of_speech_id_FK=" . $part_of_speech . ";";
							$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
							while ( $resultats = mysql_fetch_array ( $data_req ) ) {
								echo "<option value=" . $resultats ['path'] . ">" . $resultats ['name'] . "</option>\n";
							}
							
							echo '</select>';
							
							echo '</td>';
							echo '<td>';
							echo '<h3> Documentation</h3>';
							echo '<select multiple name="documentation_result[]" >';
							echo "Begin->";
							// echo $element;
							$req = "SELECT * FROM documentation where language_id_FK='" . $langue . "' and downloadable=1 and category_id_FK=0 union SELECT * FROM documentation where downloadable=1 and part_of_speech_id_FK='" . $part_of_speech . "';";
							$data_req = mysql_query ( $req ) or die ( $req . "<br />\n" . mysql_error () );
							while ( $doc = mysql_fetch_array ( $data_req ) ) {
								echo "<option value=" . $doc ['path'] . ">" . $doc ['name'] . "</option>\n";
							}
							echo "<-End";
							echo '</select>';
							echo '</td>';
							echo '</tr>';
							echo '</table>';
						}
					}
					
					?>
					
					</div>
					<?php
					if (isset ( $_POST ['search'] )) {
						echo '<input type="submit" value="download" name="download" />';
					}
					?>
					</form>
				</div>
		
		</section>

		<!-- About Me -->
		<section id="about" class="three">
			<div class="container">

				<header>
					<h2>License</h2>
				</header>

				<h1 class="western" align="justify">
					<span style="color: #333333;"><span
						style="font-family: Tahoma, Georgia, 'Times New Roman', Times, serif;">Lesser
							General Public License For Linguistic Resources</span></span>
				</h1>
				<h1 class="western" align="justify">
					<span style="color: #333333;"><span
						style="font-family: Tahoma, Georgia, 'Times New Roman', Times, serif;"><strong>Preamble</strong></span></span>
				</h1>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">The licenses
							for most data are designed to take away your freedom to share and
							change it. By contrast, this License is intended to guarantee
							your freedom to share and change free data--to make sure the data
							are free for all their users.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">This license,
							the Lesser General Public License for Linguistic Resources,
							applies to some specially designated linguistic resources --
							typically lexicons, grammars, thesauri and textual corpora.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Tahoma, Georgia, 'Times New Roman', Times, serif;"><strong>TERMS
								AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION</strong></span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">This License
							Agreement applies to any Linguistic Resource which contains a
							notice placed by the copyright holder or other authorized party
							saying it may be distributed under the terms of this Lesser
							General Public License for Linguistic Resources (also called
							"this License"). Each licensee is addressed as "you".</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">A "linguistic
							resource" means a collection of data about language prepared so
							as to be used with application programs.<br />The "Linguistic
							Resource", below, refers to any such work which has been
							distributed under these terms. A "work based on the Linguistic
							Resource" means either the Linguistic Resource or any derivative
							work under copyright law: that is to say, a work containing the
							Linguistic Resource or a portion of it, either verbatim or with
							modifications and/or translated straightforwardly into another
							language. (Hereinafter, translation is included without
							limitation in the term "modification".)<br />"Legible form" for a
							linguistic resource means the preferred form of the resource for
							making modifications to it. Activities other than copying,
							distribution and modification are not covered by this License;
							they are outside its scope. The act of running a program using
							the Linguistic Resource is not restricted, and output from such a
							program is covered only if its contents constitute a work based
							on the Linguistic Resource (independent of the use of the
							Linguistic Resource in a tool for writing it). Whether that is
							true depends on what the program that uses the Linguistic
							Resource does.
					</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">1.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;You may
							copy and distribute verbatim copies of the Linguistic Resource as
							you receive it, in any medium, provided that you conspicuously
							and appropriately publish on each copy an appropriate copyright
							notice and disclaimer of warranty; keep intact all the notices
							that refer to this License and to the absence of any warranty;
							and distribute a copy of this License along with the Linguistic
							Resource.<br />You may charge a fee for the physical act of
							transferring a copy, and you may at your option offer warranty
							protection in exchange for a fee.
					</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">2.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;You may
							modify your copy or copies of the Linguistic Resource or any
							portion of it, thus forming a work based on the Linguistic
							Resource, and copy and distribute such modifications or work
							under the terms of Section 1 above, provided that you also meet
							all of these conditions:</span></span>
				</p>
				<ul>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">a)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;The
									modified work must itself be a linguistic resource.</span></span>
						</p>
					</li>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">b)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;You
									must cause the files modified to carry prominent notices
									stating that you changed the files and the date of any change.</span></span>
						</p>
					</li>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">c)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;You
									must cause the whole of the work to be licensed at no charge to
									all third parties under the terms of this License.</span></span>
						</p>
					</li>
				</ul>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">These
							requirements apply to the modified work as a whole. If
							identifiable sections of that work are not derived from the
							Linguistic Resource, and can be reasonably considered independent
							and separate works in themselves, then this License, and its
							terms, do not apply to those sections when you distribute them as
							separate works. But when you distribute the same sections as part
							of a whole which is a work based on the Linguistic Resource, the
							distribution of the whole must be on the terms of this License,
							whose permissions for other licensees extend to the entire whole,
							and thus to each and every part regardless of who wrote it. Thus,
							it is not the intent of this section to claim rights or contest
							your rights to work written entirely by you; rather, the intent
							is to exercise the right to control the distribution of
							derivative or collective works based on the Linguistic Resource.
							In addition, mere aggregation of another work not based on the
							Linguistic Resource with the Linguistic Resource (or with a work
							based on the Linguistic Resource) on a volume of a storage or
							distribution medium does not bring the other work under the scope
							of this License.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">3.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;A program
							that contains no derivative of any portion of the Linguistic
							Resource, but is designed to work with the Linguistic Resource
							(or an encrypted form of the Linguistic Resource) by reading it
							or being compiled or linked with it, is called a "work that uses
							the Linguistic Resource". Such a work, in isolation, is not a
							derivative work of the Linguistic Resource, and therefore falls
							outside the scope of this License. However, combining a "work
							that uses the Linguistic Resource" with the Linguistic Resource
							(or an encrypted form of the Linguistic Resource) creates a
							package that is a derivative of the Linguistic Resource (because
							it contains portions of the Linguistic Resource), rather than a
							"work that uses the Linguistic Resource". If the package is a
							derivative of the Linguistic Resource, you may distribute the
							package under the terms of Section 4. Any works containing that
							package also fall under Section(4).</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">4.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;As an
							exception to the Sections above, you may also combine a "work
							that uses the Linguistic Resource" with the Linguistic Resource
							(or an encrypted form of the Linguistic Resource) to produce a
							package containing portions of the Linguistic Resource, and
							distribute that package under terms of your choice, provided that
							the terms permit modification of the package for the customer's
							own use and reverse engineering for debugging such modifications.<br />You
							must give prominent notice with each copy of the package that the
							Linguistic Resource is used in it and that the Linguistic
							Resource and its use are covered by this License. You must supply
							a copy of this License. If the package during execution displays
							copyright notices, you must include the copyright notice for the
							Linguistic Resource among them, as well as a reference directing
							the user to the copy of this License. Also, you must do one of
							these things:
					</span></span>
				</p>
				<ul>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">a)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;Accompany
									the package with the complete corresponding machine-readable
									legible form of the Linguistic Resource including whatever
									changes were used in the package (which must be distributed
									under Sections 1 and 2 above); and, if the package contains an
									encrypted form of the Linguistic Resource, with the complete
									machine-readable "work that uses the Linguistic Resource", as
									object code and/or source code, so that the user can modify the
									Linguistic Resource and then encrypt it to produce a modified
									package containing the modified Linguistic Resource.</span></span>
						</p>
					</li>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">b)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;Use a
									suitable mechanism for combining with the Linguistic Resource.
									A suitable mechanism is one that will operate properly with a
									modified version of the Linguistic Resource, if the user
									installs one, as long as the modified version is
									interface-compatible with the version that the package was made
									with.</span></span>
						</p>
					</li>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">c)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;Accompany
									the package with a written offer, valid for at least three
									years, to give the same user the materials specified in
									Subsection 4a, above, for a charge no more than the cost of
									performing this distribution.</span></span>
						</p>
					</li>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">d)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;If
									distribution of the package is made by offering access to copy
									from a designated place, offer equivalent access to copy the
									above specified materials from the same place.</span></span>
						</p>
					</li>
					<li>
						<p align="justify">
							<span style="color: #333333;"><strong><span
									style="font-family: Arial, Helvetica, sans-serif;">e)</span></strong><span
								style="font-family: Arial, Helvetica, sans-serif;">&nbsp;Verify
									that the user has already received a copy of these materials or
									that you have already sent this user a copy.</span></span>
						</p>
					</li>
				</ul>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">If the package
							includes an encrypted form of the Linguistic Resource, the
							required form of the "work that uses the Linguistic Resource"
							must include any data and utility programs needed for reproducing
							the package from it. However, as a special exception, the
							materials to be distributed need not include anything that is
							normally distributed (in either source or binary form) with the
							major components (compiler, kernel, and so on) of the operating
							system on which the executable runs, unless that component itself
							accompanies the executable.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;">It may happen
							that this requirement contradicts the license restrictions of
							proprietary libraries that do not normally accompany the
							operating system. Such a contradiction means you cannot use both
							them and the Linguistic Resource together in a package that you
							distribute.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">5.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;You may
							not copy, modify, sublicense, link with, or distribute the
							Linguistic Resource except as expressly provided under this
							License. Any attempt otherwise to copy, modify, sublicense, link
							with, or distribute the Linguistic Resource is void, and will
							automatically terminate your rights under this License. However,
							parties who have received copies, or rights, from you under this
							License will not have their licenses terminated so long as such
							parties remain in full compliance.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">6.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;You are
							not required to accept this License, since you have not signed
							it. However, nothing else grants you permission to modify or
							distribute the Linguistic Resource or its derivative works. These
							actions are prohibited by law if you do not accept this License.
							Therefore, by modifying or distributing the Linguistic Resource
							(or any work based on the Linguistic Resource), you indicate your
							acceptance of this License to do so, and all its terms and
							conditions for copying, distributing or modifying the Linguistic
							Resource or works based on it.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">7.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;Each time
							you redistribute the Linguistic Resource (or any work based on
							the Linguistic Resource), the recipient automatically receives a
							license from the original licensor to copy, distribute, link with
							or modify the Linguistic Resource subject to these terms and
							conditions. You may not impose any further restrictions on the
							recipients' exercise of the rights granted herein. You are not
							responsible for enforcing compliance by third parties with this
							License.</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">8.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;If, as a
							consequence of a court judgment or allegation of patent
							infringement or for any other reason (not limited to patent
							issues), conditions are imposed on you (whether by court order,
							agreement or otherwise) that contradict the conditions of this
							License, they do not excuse you from the conditions of this
							License. If you cannot distribute so as to satisfy simultaneously
							your obligations under this License and any other pertinent
							obligations, then as a consequence you may not distribute the
							Linguistic Resource at all. For example, if a patent license
							would not permit royalty-free redistribution of the Linguistic
							Resource by all those who receive copies directly or indirectly
							through you, then the only way you could satisfy both it and this
							License would be to refrain entirely from distribution of the
							Linguistic Resource. If any portion of this section is held
							invalid or unenforceable under any particular circumstance, the
							balance of the section is intended to apply, and the section as a
							whole is intended to apply in other circumstances.<br />It is not
							the purpose of this section to induce you to infringe any patents
							or other property right claims or to contest validity of any such
							claims; this section has the sole purpose of protecting the
							integrity of the free resource distribution system which is
							implemented by public license practices. Many people have made
							generous contributions to the wide range of data distributed
							through that system in reliance on consistent application of that
							system; it is up to the author/donor to decide if he or she is
							willing to distribute resources through any other system and a
							licensee cannot impose that choice. This section is intended to
							make thoroughly clear what is believed to be a consequence of the
							rest of this License.
					</span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Arial, Helvetica, sans-serif;"><br /></span><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">9.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;If the
							distribution and/or use of the Linguistic Resource is restricted
							in certain countries either by patents or by copyrighted
							interfaces, the original copyright holder who places the
							Linguistic Resource under this License may add an explicit
							geographical distribution limitation excluding those countries,
							so that distribution is permitted only in or among countries not
							thus excluded. In such case, this License incorporates the
							limitation as if written in the body of this License.<br />
					</span><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">10.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;The Free
							Software Foundation may publish revised and/or new versions of
							the Lesser General Public License for Linguistic Resources from
							time to time. Such new versions will be similar in spirit to the
							present version, but may differ in detail to address new problems
							or concerns.<br />Each version is given a distinguishing version
							number. If the Linguistic Resource specifies a version number of
							this License which applies to it and "any later version", you
							have the option of following the terms and conditions either of
							that version or of any later version published by the Free
							Software Foundation. If the Linguistic Resource does not specify
							a license version number, you may choose any version ever
							published by the Free Software Foundation.<br />
					</span><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">11.</span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">&nbsp;If you
							wish to incorporate parts of the Linguistic Resource into other
							free programs whose distribution conditions are incompatible with
							these, write to the author to ask for permission.<br /> <br />
					</span><strong><span
							style="font-family: Arial, Helvetica, sans-serif;">NO WARRANTY<br /></span></strong><span
						style="font-family: Arial, Helvetica, sans-serif;">BECAUSE THE
							LINGUISTIC RESOURCE IS LICENSED FREE OF CHARGE, THERE IS NO
							WARRANTY FOR THE LINGUISTIC RESOURCE, TO THE EXTENT PERMITTED BY
							APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE
							COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE LINGUISTIC
							RESOURCE "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED
							OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
							OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE
							ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE LINGUISTIC
							RESOURCE IS WITH YOU. SHOULD THE LINGUISTIC RESOURCE PROVE
							DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR
							OR CORRECTION.<br />IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW
							OR AGREED TO IN WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER
							PARTY WHO MAY MODIFY AND/OR REDISTRIBUTE THE LINGUISTIC RESOURCE
							AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY
							GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT
							OF THE USE OR INABILITY TO USE THE LINGUISTIC RESOURCE (INCLUDING
							BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE
							OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE
							LINGUISTIC RESOURCE TO OPERATE WITH ANY OTHER SOFTWARE), EVEN IF
							SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF
							SUCH DAMAGES.<br />
					</span><span
						style="font-family: Tahoma, Georgia, 'Times New Roman', Times, serif;"><strong>END
								OF TERMS AND CONDITIONS</strong></span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;"><span
						style="font-family: Tahoma, Georgia, 'Times New Roman', Times, serif;"><strong><br />
								<br /></strong></span><span
						style="font-family: Verdana, Arial, Helvetica, sans-serif;"><strong>Last
								modification on this page: June 26, 2009</strong></span></span>
				</p>
				<p align="justify">
					<span style="color: #333333;">&nbsp;</span>
				</p>
				<div style="text-align: justify;">&nbsp;</div>

			</div>
		</section>

		<!-- Contact -->
		<section id="contact" class="four">
			<div class="container">
				<header>
					<h2>Contact</h2>
				</header>

				<p>If You have any question or suggestion, please contact-us</p>

				<form method="post" action="index.php#contact">
					<div class="row 50%">
						<div class="6u">
							<input type="text" id="name" name="name" placeholder="Name" />
						</div>
						<div class="6u">
							<input type="text" id="email" name="email" placeholder="Email" />
						</div>
					</div>
					<div class="row 50%">
						<div class="12u">
							<textarea id="message" id="message" name="message"
								placeholder="Message"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<input type="submit" name="send" value="Send Message" />
						</div>
					</div>
				</form>

			</div>	
		<?php
		/*
		 * *******************************************************************************************
		 * CONFIGURATION
		 * *******************************************************************************************
		 */
		// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
		$destinataire = 'papeballe@gmail.com';
		
		// copie ? (envoie une copie au visiteur)
		$copie = 'non';
		
		// Action du formulaire (si votre page a des paramètres dans l'URL)
		// si cette page est index.php?page=contact alors mettez index.php?page=contact
		// sinon, laissez vide
		$form_action = '';
		
		// Messages de confirmation du mail
		$message_envoye = "Successful";
		$message_non_envoye = "Sending failed, Please try again!";
		
		// Message d'erreur du formulaire
		$message_formulaire_invalide = "Please check the informations";
		
		/*
		 * *******************************************************************************************
		 * FIN DE LA CONFIGURATION
		 * *******************************************************************************************
		 */
		
		/*
		 * cette fonction sert à nettoyer et enregistrer un texte
		 */
		function Rec($text) {
			$text = htmlspecialchars ( trim ( $text ), ENT_QUOTES );
			if (1 === get_magic_quotes_gpc ()) {
				$text = stripslashes ( $text );
			}
			
			$text = nl2br ( $text );
			return $text;
		}
		;
		
		/*
		 * Cette fonction sert à vérifier la syntaxe d'un email
		 */
		function IsEmail($email) {
			$value = preg_match ( '/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email );
			return (($value === 0) || ($value === false)) ? false : true;
		}
		
		// formulaire envoyé, on récupère tous les champs.
		$nom = (isset ( $_POST ['name'] )) ? Rec ( $_POST ['name'] ) : '';
		$email = (isset ( $_POST ['email'] )) ? Rec ( $_POST ['email'] ) : '';
		$objet = (isset ( $_POST ['objet'] )) ? Rec ( $_POST ['objet'] ) : "Demande d'informations";
		$message = (isset ( $_POST ['message'] )) ? Rec ( $_POST ['message'] ) : '';
		
		// On va vérifier les variables et l'email ...
		$email = (IsEmail ( $email )) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
		$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
		
		if (isset ( $_POST ['send'] )) {
			
			$headers = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers .= "From: <test@gmail.com>\n";
			$headers .= "X-Priority: 1\n";
			echo $nom;
			echo $email;
			echo $objet;
			echo $message;
			if (($nom != '') && ($email != '') && ($objet != '') && ($message != '')) {
				// les 4 variables sont remplies, on génère puis envoie le mail
				$headers = 'From:' . $nom . ' <' . $email . '>' . "\r\n";
				// $headers .= 'Reply-To: '.$email. "\r\n" ;
				// $headers .= 'X-Mailer:PHP/'.phpversion();
				
				// envoyer une copie au visiteur ?
				if ($copie == 'oui') {
					$cible = $destinataire . ',' . $email;
				} else {
					$cible = $destinataire;
				}
				;
				
				// Remplacement de certains caractères spéciaux
				$message = str_replace ( "&#039;", "'", $message );
				$message = str_replace ( "&#8217;", "'", $message );
				$message = str_replace ( "&quot;", '"', $message );
				$message = str_replace ( '<br>', '', $message );
				$message = str_replace ( '<br />', '', $message );
				$message = str_replace ( "&lt;", "<", $message );
				$message = str_replace ( "&gt;", ">", $message );
				$message = str_replace ( "&amp;", "&", $message );
				
				// Envoi du mail
				echo "Destinaire ->" . $cible . "<-";
				if (mail ( $cible, $objet, $message, $headers )) {
					echo '<p>' . $message_envoye . '</p>';
				} else {
					echo '<p>' . $message_non_envoye . '</p>';
				}
				;
			} else {
				// une des 3 variables (ou plus) est vide ...
				echo '<p>' . $message_formulaire_invalide . '</p>';
				$err_formulaire = true;
			}
			;
		}
		; // fin du if (!isset($_POST['envoi']))
		?>
					
		</section>

	</div>

	<!-- Footer -->
	<div id="footer">

		<!-- Copyright -->
		<ul class="copyright">
			<li>&copy; Institut Gaspard Monge. All rights reserved.</li>
		</ul>

	</div>
	<script type="text/javascript">
	//alert("mkjmkjmkj");
	</script>

	<!--************************************************************Connexion a la base SVN**********
****************************************************!-->
<?php
/*
 * echo ($cat_list);
 *
 * echo 'Begin <br>';
 * // function download(String $url, String $name_output ){
 * $contents = svn_cat ( $url . '/trunk/French/number_entries_and_references.csv', 0 );
 * echo exec ( 'svn cat' . $contents . '>>' . $$contents . '.csv' );
 * // }
 * // print_r($contents);
 *
 * $files_now = svn_ls ( '-r' . $revision . ' ' . $url . '/trunk' );
 *
 * foreach ( $files_now as $iter ) {
 * print_r ( $iter );
 * echo '<br>';
 * }
 * // print_r ($files_now);
 * echo '<br>End';
 */
?>


<!--************************************** Fin Connexion a la base SVN*****************************************!-->










	<!--************************************************************DEBUT JAVASCRIPT POUR LA RECHERCHE**********
****************************************************!-->

	<script type="text/javascript">
 
 
 /*-------debut-----Variable a utiliser pour les requetes SVN-----*/
 
 var langage_search,version_search,categorie_search,encoding_search,format_search, documentation_search;
 /*-------fin-----Variable a utiliser pour les requetes SVN-----*/
 			 
 			 lang_id = document.getElementById('langage');
			 version_id = document.getElementById('version');
			 category_id = document.getElementById('categorie');
			 format_id=document.getElementById('format');
			 documentation_id=document.getElementById('documentation');
			 encoding_id=document.getElementById('encoding');
			 type_cat_all=document.getElementById('all');
			 type_cat_free=document.getElementById('free');
			 type_cat_fixed=document.getElementById('fixed');
			 documentation_result=document.getElementById('documentation_result');
			 

function init(){
		lang_id.length=0;
		version_id.length=0;
		category_id.length=0;
		format_id.length=0;
		encoding_id.length=0;		
}

function init_version(){
		version_id.length=0;
		category_id.length=0;
		format_id.length=0;
		encoding_id.length=0;	
}
function init_categorie(){
		category_id.length=0;
		format_id.length=0;
		encoding_id.length=0;	
}
function init_format(){
		format_id.length=0;
		encoding_id.length=0;	
}
function init_encoding(){
			encoding_id.length=0;	
}
 
 
 



				
var version =new Array(
			new Option("A", "A", false, false),
			new Option("B", "B", false, false),
			new Option("C", "C", false, false)
					);
var version2 =new Array(
			new Option("D", "D", false, false),
			new Option("E", "E", false, false),
			new Option("F", "F", false, false)
					);
var categorie_fige =new Array(
			new Option("Nom_fixed", "1_fig", false, false),
			new Option("Verbe_fixed", "2_fig", false, false),
			new Option("Adverbe_fixed", "3_fig", false, false)
					);
var categorie_libre =new Array(
			new Option("Nom_free", "1_lib", false, false),
			new Option("Verbe_free", "2_lib", false, false),
			new Option("Adverbe_free", "3_lib", false, false)
					);
var encoding =new Array(
			new Option("UTF-8", "1", false, false),
			new Option("ISO-8859-1", "2", false, false),
			new Option("Windows-1252", "3", false, false)
					);
var format =new Array(
			new Option("Microsoft Office", "1", true, true),
			new Option("Libre-Office", "2", false, false)		
					);


			


/*là on va remplir les langues, car c'est la chose qui predéfini les autres valeurs*/
				/*var i, n;
						n = langue.length;
					    lang_id = document.getElementById('langage');
						for (i=0; i<n; i++)
							{
								lang_id.options.add(langue[i]);
							}*/

					

documentation_result.disabled;

							n_for = format.length;
							for (i=0; i<n_for; i++)
								{
									format_id.options.add(format[i]);
								}//fin for
function ajout_format(){
									
								n_for = format.length;
								for (i=0; i<n_form; i++)
									{
										encoding_id.options.add(encoding[i]);
									}//fin for
}


function ajout_option(cas){
	switch(cas){

		case "langage":{
							
				switch(lang_id.value){
					case "French":{	
								n_for = format.length;
								for (i=0; i<n_for; i++)
									{
										format_id.options.add(format[i]);
									}//fin for
								langage_search="french";	
								//alert(langage);
								init_version();											
								var i, n;
								n = version.length;								
								for (i=0; i<n; i++)
									{
										//alert(version[i].valueOf());
										version_id.options.add(version[i]);
									}//fin for
			  					break;}//fin case
					case "korean":{																
								langage_search="korean";	
								init_version();									
								var i, n;
								n = version2.length;																
								for (i=0; i<n; i++)
									{
										version_id.options.add(version2[i]);
									}//fin for
			  					break;}//fin case
					case "brazil":{															
								langage_search="brazil";
								init_version();												
								var i, n;
								n = version.length;
								for (i=0; i<n; i++)
									{
										version_id.options.add(version[i]);
									}//fin for
			  					break;}//fin case
					case "romanian":{																
								langage_search="romanian";
								init_version();												
								var i, n;
								n = version.length;
								for (i=0; i<n; i++)
									{
										version_id.options.add(version[i]);
									}//fin for
			  					break;}//fin case
					default:	
								  }//fin switch
			
						break;}//fin case cas langage
						
	case "version":{			
				switch(version_id.value){					
					case "A":{		
								version_search="1.1";	
								//alert(langage);
								init_categorie();											
								var i, n;
								n = langue.length;
								
							if(type_cat_free.checked){
								n = categorie_libre.length;
								type_cat_fixed.checked=false;
								//alert("Free");
								for (i=0; i<n; i++)
									{
										category_id.options.add(categorie_libre[i]);
									}//fin for
							}
							if(type_cat_fixed.checked){
								type_cat_free.checked=false;
								//alert("fixed");
								n = categorie_fige.length;
								for (i=0; i<n; i++)
									{
										category_id.options.add(categorie_fige[i]);
									}//fin for
							}
			  					break;}//fin case
					case "B":{																
								version_search="1.2";
								init_categorie();										
								var i, n;
								n = langue.length;

								for (i=0; i<n; i++)
									{
										category_id.options.add(categorie_libre[i]);
									}//fin for
			  					break;}//fin case
					
						
								  }//fin switch
			
						break;}//fin case cas version
						
	case "categorie":{					
								categorie_search="Cat A";												
								var i, n_cod, n_for;
								n_cod = encoding.length;								
								
								for (i=0; i<n_cod; i++)
									{
										encoding_id.options.add(encoding[i]);
									}//fin for
									for (i=0; i<format.length; i++)
									{
										format_id.options.add(format[i]);
									}//fin for
						
						break;}//fin case cas categorie
  


			}//fin switch cas
}//fin function




function reload()
{
	self.location='index.php#search';
	
}

function populate_encoding(){
	alert("Free");
	if(type_cat_all.checked){
		alert("Free");
		categorie.disable;
	}
	if(type_cat_free.checked){
		alert("mlkjklj");
		n = categorie_libre.length;
		type_cat_fixed.checked=false;
		
		<?php
		
		$cat_list = svn_ls ( $url . '/trunk/' . $langue . '/Free' );
		echo '<select id=categorie name=categorie[] onChange="populate_encoding()">';
		foreach ( $cat_list as $iter => $name ) {
			echo "<option value=" . $iter . ">" . $iter . "</option>\n";
		}
		echo "</select>";
		?>
		alert("Free");
		for (i=0; i<n; i++)
			{
				category_id.options.add(categorie_libre[i]);
			}//fin for
	}
	if(type_cat_fixed.checked){
		type_cat_free.checked=false;
		alert("fixed");
		n = categorie_fige.length;
		for (i=0; i<n; i++)
			{
				category_id.options.add(categorie_fige[i]);
			}//fin for
	}
}

function test(){	
	alert('mlkjlkjmkj');
}

function valider(){	
	<?php
	$contents = svn_cat ( $url . '/trunk/French/number_entries_and_references.csv', 0 );
	// echo $contents;
	// alert("Langage selectionné : "+langage_search);
	// alert("Version selectionné : "+version_search);
	// alert("encoding selectionné : "+categorie_search);
	?>
}
alert(lang_id.value);

</script>


	<!--******************************Fin JAVASCRIPT POUR LA RECHERCHE*********************************************!-->
</body>
</html>