<?php
/*
 * source code:     file_upload.php
 * author:          Lukas Eder
 * date:            02.02.2018 
 * 
 * Descr.:
 * Ermoeglicht den Fileupload in die Datenbank clup
 */

// Verbindung zu DB aufbauen
include 'inc/db_inc.php';
include 'inc/connect.php';

// Default array festlegen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// File hochladen
if(isset($_POST['upload'])){
    
    // Datei oeffnen
    $file = fopen($_FILES['bild'], 'rb');
    
    //Datei-Inhalt in einen String speichern
    $image = fread($file, $_FILES['bild']['size']);
    
    // Quotes einen Backslash voranstellen (escapen)
    $image = addslashes($image);
    
}


header('Contenttype: text/html; accept-charset="utf-8"');
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Clup - File Upload</title>
</head>
<body>
	<h1>Clup - File Upload</h1>

	<form method="post" action="file_upload.php" accept-charset="utf-8" enctype="multipart/form-data">
	<fieldset>
	<legend>Datei für Upload auswählen...</legend>
	<p><label><input type="file" name="bild" size="50"></label></p>
	<p><label><input type="submit" name="upload" value="Upload"></label></p>
	</fieldset>
	</form>
</body>
</html>