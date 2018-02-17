<?php
/*
 * source code:     edit_anzeigen.php
 * author:          Lukas Eder
 * date:            18.01.2018
 *
 * Descr.:
 * Gibt eine Auswahl ueber die vorhandenen Daten in DB Buecher und leitet an editieren.php weiter.
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



echo<<<'HEAD'
<!Doctype html>
<html lang="de-CH">
    <head>
        <meta charset="utf-8">
        <title>Buch editieren</title>
    </head>
    <body>
    <h1>Bücher für PHP &amp; MySQL, Buch editieren, Auswahl</h1>
HEAD;

include('inc/nav_admin.html');

echo<<<'BODY'
    <form method="get" action="editieren.php" accept-charset="utf-8">
    <fieldset>
    <legend>Zu editierendes Buch wählen</legend>
    <select name="id">
        <option value="" selected> Bitte wählen...
BODY;

// Auswahlliste -> Optionen generieren
while($row = $result -> fetch()){
    echo "<option value=\"$row[ID]\"> $row[Titel]";
}
echo<<<'FILEEND'
</select>
</fieldset>
<p><label><input type="submit" name="wahl" value="auswählen"></label></p>
</form>
</body>
</html>
FILEEND;

?>