<?php
/*
 * source code:     loeschen.php
 * author:          Lukas Eder
 * date:            18.01.2018
 * 
 * Descr.:
 * Loescht Eintraege aus der Datenbank Buecher -> Tabelle Buch. Ist ein Admintool
 */
header('Content-type: text/html; accept-charset="utf-8"');

// Datenbank-Verbindung aufbauen, Datenbank waehlen
require_once 'inc/db_inc.php';
require_once 'inc/connect.php';

// Daten aus Datenbank hohlen
$query = "SELECT buch_id as ID,
            buch_name as Titel 
          FROM buch";

$result = $db -> query($query);

//Loeschvorgang
if(isset($_POST['loeschen'])){
    $id = $_POST['buchLoeschen'];
    $delQuery = "DELETE FROM buch
                WHERE buch_id = '$id'";
    
    $db -> exec($delQuery);
}



echo<<<'HEAD'
<!Doctype html>
<html lang="de-CH">
    <head>
        <meta charset="utf-8">
        <title>Bücher löschen</title>
    </head>
    <body>
    <h1>Bücher für PHP &amp; MySQL, Buch löschen</h1>
HEAD;

include('inc/nav_admin.html');

echo<<<'BODY'
    <form method="post" action="loeschen.php" accept-charset="utf-8">
    <fieldset>
    <legend>Zu löschendes Buch wählen</legend>
    <select name="buchLoeschen">
        <option value="" selected> Bitte wählen...
BODY;

    // Auswahlliste -> Optionen generieren
    while($row = $result -> fetch()){
        echo "<option value=\"$row[ID]\"> $row[Titel]";
    }
echo<<<'FILEEND'
</select>
</fieldset>
<p><label><input type="submit" name="loeschen" value="Löschen"></label></p>
</form>
</body>
</html>
FILEEND;

?>