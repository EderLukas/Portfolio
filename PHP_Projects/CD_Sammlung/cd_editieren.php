<?php
/*
 * source code:     cd_editieren.php
 * author:          Lukas Eder 
 * date:            28.01.2018 
 * 
 * Descr.:
 * Es koennen Aenderungen an vorhandenen Datensaetzen von 
 * Interpreten und CDs vorgenommen werden. (Erster Teil des Formulars).
 */

// Verbindung zu DB erstellen
include 'inc/db_param.php';
include 'inc/connect.php';

// Standart fuer Arrays waehlen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Abfrage vorbereiten
$queryCD =  "SELECT *
            FROM $tableCDs";

$queryArtist =  "SELECT *
                FROM $tableArtist";

header('Content-type: text/html; accept-charset="utf-8"');
?>
<!Doctype html>
<html lang="de-ch">
<head>
	<meta charset="utf-8">
	<title>CD editieren</title>
</head>
<body>
	<h1>CD-Sammlung, Editieren Auswahl</h1>
	
	<?php include 'inc/menue.html'; ?>
	
    <form method="get" action="cd_edit_cd.php" accept-charset="utf-8">
		
		<fieldset>
		<legend>CD zum editieren auswählen</legend>
		<select name="cd">
			<option value=""> bitte wählen...
<?php 
foreach($db -> query($queryCD) as $row){
    echo '<option value="' . $row['id'] . '"> ' . $row['album'];
}
?>		
		</select>	
		<p><label><input type="submit" name="edit_cd" value="editieren"></label></p>
		</fieldset>
	</form>
	
	<form method="get" action="cd_edit_artist.php" accept-charset="utf-8">
		
		<fieldset>
		<legend>Interpret zum editieren auswählen</legend>
		<select name="artist">
			<option value=""> bitte wählen...
<?php 
foreach($db -> query($queryArtist) as $row){
    echo '<option value="' . $row['band'] . '"> ' . $row['band'];
}
?>		
		</select>
		<p><label><input type="submit" name="edit_artist" value="editieren"></label></p>		
		</fieldset>
    </form>
    

</body>
</html>