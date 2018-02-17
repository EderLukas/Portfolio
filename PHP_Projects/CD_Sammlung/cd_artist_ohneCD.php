<?php
/*
 * source code:     cd_artist_ohneCD.php
 * author:          Lukas Eder
 * date:            02.02.2018
 * 
 * Descr.:
 * Ermoeglicht das Finden aller Interpreten aus der Tabelle interpreten in der DB cdsammlung
 * die keine CDs zugeteilt haben.
 */

// Verbindung zur DB aufbauen
include 'inc/db_param.php';
include 'inc/connect.php';

// Default array festlegen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// abfrage auf DB absetzten
$result = $db -> query("SELECT $tableArtist.*
                        FROM $tableArtist
                        LEFT JOIN $tableCDs
                        ON $tableArtist.id=$tableCDs.interpret
                        WHERE $tableCDs.interpret IS NULL");

// Angezeigte Interpreten loeschen
if(isset($_GET['loeschen'])){
    foreach($result as $row){
        $prepStat = $db -> prepare("DELETE FROM $tableArtist
                                    WHERE id=:artist");
        // Parameter binden
        $prepStat -> bindParam(':artist', $row['id']);
        // Update auf db absetzten
        try{
            $prepStat -> execute();
            $flag = '<p>Update erfolgreich</p>';
        } catch(Exception $e){
            $flag='<p> Update fehlgeschlagen. Fehler: ' . $e->getMessage() . '</p>';
        }
    } 
}

header('Contenttype: text/html; accept-charset="utf-8"');
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>CD Sammlung - Interpreten ohne CD finden</title>
</head>
<body>
	<h1>CD Sammlung - Interpreten ohne CD finden</h1>
	
	<?php include 'inc/menue.html'; ?>
	
	<fieldset>
	<legend>Interpreten ohne CDs</legend>
	<ul>
<?php 
foreach($result as $row){
    echo '<li>' . $row['band'] . '</li>';
}
?>
	</ul>
	</fieldset>
	
	<form  method="get" action="cd_artist_ohneCD.php" accept-charset="utf-8">
	<fieldset>
	<legend>Die angezeigten Interpreten löschen?</legend>
	<p><label><input type="submit" name="loeschen" value="Löschen"></label></p>
	</fieldset>
	</form>
	
</body>
</html>