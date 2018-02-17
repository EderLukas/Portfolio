<?php
/*
 * source code:     cd_erfassen.php
 * author:          Lukas Eder
 * date:            22.01.2018
 * 
 * Descr.:
 * Erlaubt einen neuen Interpreten mit Albumtitel und Erscheinungsjahr eintragen.
 * Erlaubt einen bereits vorhandenen Interpreten zu erweitern mit neuem Album und dessen
 * Erscheinungsjahr.
 */

// Verbindung zu Datenbank aufbauen
include 'inc/db_param.php';
include 'inc/connect.php';

// Standart fuer Arrays waehlen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Abfrage auf DB absetzen, interpreten
$queryArtist =  "SELECT *
                FROM interpreten";
$result = $db -> query($queryArtist);

if(isset($_GET['senden'])){
    
    // Schutz Cross side scripting
    $album = htmlspecialchars($_GET['cdName']);
    $jahr = htmlspecialchars($_GET['printyear']);
    $artist = htmlspecialchars($_GET['artist']);
    $newArtist = htmlspecialchars($_GET['newArtist']);
        
    // Abfrage auf Datenbank absetzen, cds
    if(!empty($newArtist)){
        
        $queryArtist =  "INSERT INTO $tableArtist (band)
                            VALUES
                            (:band)";
        
        
        $queryCD =    "INSERT INTO $tableCDs (album, jahr, interpret)
                        VALUES
                        (:album, :jahr, :artist)";
        
        // Abfangen von SQL-Injection, prepared Statement
        $prepStatArtist = $db -> prepare($queryArtist);
        $prepStatCD = $db -> prepare($queryCD);
        
        //Parameter binden, Artist
        $prepStatArtist -> bindParam(':band', $newArtist);
        
        //Prepared Statement ausfuehren, Artist
        $prepStatArtist -> execute();

        //Artist ID herausfinden
        $artist_id = $db -> lastInsertId();
        
        // Parameter binden, CDs
        $prepStatCD -> bindParam(':album', $album);
        $prepStatCD -> bindParam(':jahr', $jahr);
        $prepStatCD -> bindParam(':artist', $artist_id);
        
        //Prepared Statement ausfuehren, CDs
        $prepStatCD -> execute();
    }
    else {
        $query =    "INSERT INTO cds (album, jahr, interpret)
                            VALUES
                            (:album, :jahr, :artist)";
        
        // Abfangen von SQL-Injection, prepared Statement
        $prepStat = $db -> prepare($query);
        
        //Parameter binden
        $prepStat -> bindParam(':album', $album);
        $prepStat -> bindParam(':jahr', $jahr);
        $prepStat -> bindParam(':artist', $artist);
        
        //Prepared Statement ausfuehren
        $prepStat -> execute();
    }
}

// Formularausbage in Browser
header('Contenttype: text/html; accept-charset="utf-8"');
?>
<!Doctype html>
<html lang="de-ch">
<head>
	<meta charset="utf-8">
	<title>CD erfassen</title>
</head>
<body>
	<h1>CD-Sammlung, CD erfassen</h1>
	
	<?php include 'inc/menue.html'; ?>

	<form method="get" action="cd_erfassen.php" accept-charset="utf-8">	
	<fieldset>
	<legend>CD erfassen</legend>
    	<p><label>Name der CD <input type="text" name="cdName" size="35" maxlength="33" autofocus></label></p>
    	<p><label>Erschienungsjahr <input type="number" name="printyear"></label></p>
	
		Interpret (Auswahl)
		<select name="artist">
			 <option value=""> Bitte wählen...
<?php 
foreach($result as $row){
    echo '<option value="' . $row['id'] . '">' .$row['band'];
}
?>
		</select>
    	<p><label>Interpret (Neu) <input type="text" name="newArtist" size="35" maxlength="33"></label></p>
		<p><label><input type="submit" name="senden" value="senden"></label></p>
	</fieldset>
	</form>
</body>
</html>
