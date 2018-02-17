<?php
/*
 * source code:     buch.php
 * author:          Lukas Eder
 * date.            17.01.2018
 * 
 * Descr.:
 * Eine Webaplikation mit Datenbank, die die Bücherliste aus 
 * der Datenbank anzeigt.
 */
header('Content-type: text/html; accept-charset="utf-8"');

// Variablen includieren
require_once 'inc/db_inc.php';

// Verbindung zum DB-Server aufbauen
require_once 'inc/connect.php';

// Daten von der Datenbank holen
$result = $db -> query($query);

// HMTL Dateikopf
echo<<<'HTML'
<!Doctype html>
<html lang="de-CH">
    <head>
        <meta charset="utf-8">
        <title>Bücherliste</title>
        <link rel="stylesheet" type="text/css" href="css/format.css">
    </head>
    <body>
    <h1>Bücher für PHP &amp; MySQL</h1>
    <table class="liste">
        <tr>
            <th class="titel">Titel</th>
            <th class="zahlen">ISBN-Nummer</th>
            <th class="zahlen">Peis</th>
        </tr>
HTML;


// jeden Datensatz behandeln (anzeigen)
while ($row = $result -> fetch()){
    // Verarbeitung des Arrays $row
echo<<<ROW
    <tr>
        <td class="titel">$row[buch_name]</td><td class="zahlen">$row[buch_isbn]</td><td class="zahlen">$row[buch_preis]</td>
    </tr>
ROW;

} // Auch moeglich ist: foreach($result as $row){}

echo '</table></body></html>';

// Verbindung schliessen
$db = NULL;
?>