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

// Verbindungsaufbau zu Datenbank
require_once 'inc/db_inc.php';
require_once 'inc/connect.php';

// Array-Typ für die Datensätze festlegen, assoziativ
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Anzeige aktualisieren wenn editieren.php ausgefuehrt wurde
if(isset($_GET['speichern']) && isset($_GET['id'])){
    // Daten in lokalen Variablen speichern
    $id = $_GET['id'];
    $name = htmlspecialchars($_GET['name']);
    $isbn = htmlspecialchars($_GET['isbn']);
    $preis = htmlspecialchars($_GET['preis']);

    // Geänderte Daten speichern
    $query =    "UPDATE buch
                SET
                    buch_name = '$name',
                    buch_isbn = '$isbn',
                    buch_preis = '$preis'
                WHERE buch_id = '$id'";
    $db -> exec($query);
}

//***ANZEIGEN***
// Abfrage auf DB absetzen
$query =    "SELECT *
            FROM buch";

// Alle Daten aus DB fuer Anzeige hohlen
$result = $db -> query($query);


header('Content-type: text/html; accept-charset="utf-8"');
// HMTL Dateikopf
echo<<<'HEAD'
<!Doctype html>
<html lang="de-CH">
    <head>
        <meta charset="utf-8">
        <title>Bücherliste</title>
        <link rel="stylesheet" type="text/css" href="css/format.css">
    </head>
    <body>
    <h1>Bücher für PHP &amp; MySQL</h1>
HEAD;

    include('inc/nav_admin.html');

echo<<<'TABLE'
    <table class="liste">
        <tr>
            <th class="titel">Titel</th>
            <th class="zahlen">ISBN-Nummer</th>
            <th class="zahlen">Preis</th>
        </tr>
TABLE;

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