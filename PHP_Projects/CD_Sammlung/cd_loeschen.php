<?php
/*
 * source code:     cd_loeschen.php
 * author:          Lukas Eder
 * date:            26.01.2018
 * 
 * Descr.:
 * Das Script gibt eine Auswahlliste aller CDs und deren Interpreten.
 * Die einzelne Auswahl kann geloescht werden. Dies wird auch in der Datenbank angepasst.
 */

// Variablen und Verbindung integrieren
include 'inc/db_param.php';
include 'inc/connect.php';

// Standart fuer Arrays waehlen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Abfrage auf Datenbank absetzen
$query =    "SELECT $tableCDs.id AS id_cd, $tableCDs.album, $tableCDs.jahr, $tableCDs.interpret,
            $tableArtist.*
            FROM $tableCDs
            INNER JOIN $tableArtist
            ON $tableCDs.interpret = $tableArtist.id
            ORDER BY $tableArtist.band";
            
$queryArtist =  "SELECT DISTINCT *
                FROM $tableArtist"; 
           
// CD loeschen
if(isset($_GET['loeschen1'])){
    // SQL Injection defense
    $prepStatCdDel = $db -> prepare("DELETE FROM $tableCDs
                                   WHERE id = :wahl");
    
    // Parameter binden
    $prepStatCdDel -> bindParam(':wahl', $_GET['cdWahl']);
     
    // Try fuer das Loeschen. Fehlerausgabe fals nicht moeglich

    $prepStatCdDel -> execute();
}

// Interpret loeschen
if(isset($_GET['loeschen2'])){
    
    $queryCheck =   "SELECT COUNT(interpret)
                    FROM $tableCDs
                    WHERE interpret = $_GET[artistAusw]";
    
    $resultCheck = $db -> query($queryCheck);
    
    if(!empty($resultCheck)){
        $prepArtistDel = $db -> prepare("DELETE FROM $tableArtist
                                WHERE id = :id");
        
        // Parameter binden
        $prepArtistDel -> bindParam(':id', $_GET['artistAusw']);
        
        $prepArtistDel -> execute();
        $flag = '<p>Interpret gelöscht</p>';
    }
    else {
        $flag = '<p>Nicht gelöscht. Interpret enthält noch Alben</p>';
    }
}

                     
header('Content-type: text/html; accept-charset="utf-8"');
?>

<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>CD löschen</title>
</head>
<body>
	<h1>CD-Sammlung, CD löschen</h1>
	
	<?php include'inc/menue.html'; ?>
	<?php echo $flag; ?>
	
	<form method="get" action="cd_loeschen.php" accept-charset="utf-8">
	<fieldset class="cdAuswahl">
	<legend>CD (Auswahl) löschen</legend>
	<select name="cdWahl">
			<option value=""> Bitte wählen...
<?php

foreach($db -> query($query) as $row){
    echo '<option value="' . $row['id_cd'] . '">' . $row['band'] . ', ' . $row['album'];
}

?>
		</select>
	<p><label><input type="submit" name="loeschen1" value="Löschen"></label></p>
	</fieldset>
	</form>
	
		<form method="get" action="cd_loeschen.php" accept-charset="utf-8">
	<fieldset class="artistAusw">
	<legend>Interpret (Auswahl) löschen</legend>
	<select name="artistAusw">
			<option value=""> Bitte wählen...
<?php

foreach($db -> query($queryArtist) as $row){
    echo '<option value="' . $row['id'] . '">' . $row['band'];
}

?>
		</select>
	<p><label><input type="submit" name="loeschen2" value="Löschen"></label></p>
	</fieldset>
	</form>

</body>
</html>