<?php
/*
 * source code:     cd_anzeigen.php
 * author:          Lukas Eder 
 * date:            21.01.2018
 * 
 * Descr.:
 * Uebersicht ueber Datenbank cdsammlung.
 * - Zeigt alle Datensaetze der DB an.
*/

// Verbindung zur DB aufbauen Tabelle
include'inc/db_param.php';
include'inc/connect.php';

// Standart fuer Arrays waehlen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Abfrage auf DB absetzen, Interpreten
$queryArtist =      "SELECT *
                    FROM $tableArtist
                    ORDER BY band ASC";

// Abfrage auf DB absetzen, CDs
$prepStatement = $db -> prepare("SELECT album
                                FROM $tableCDs
                                WHERE interpret = ?
                                ORDER BY jahr ASC");

// Ausgabe in Browsers
header('Contenttype: text/html; accept-charset="utf-8"');
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>CD-Sammlung</title>
</head>
<body>
	<h1>CD-Sammlung DB, CDs anzeigen</h1>
	
	<?php include('inc/menue.html')?>
	
<?php 
// Schleife ueber die einzelnen Interpreten
foreach($db -> query($queryArtist) as $rowArtist){
    // Ausgabe des einzelnen Interpreten
    echo '<h2>' . $rowArtist['band'] . '</h2>
    <ul>';

/*
Alle CDs des aktuellen Interpreten holen
Wird für jeden Interpreten einmal ausgeführt, also mehrmals, deshalb mit Prepared
Statement
*/
// Prepared Statement ausführen, indiziertes Array mit der Parameter-Zuordnung übergeben
$prepStatement -> execute(array($rowArtist['id']));

// Schleife durch das Abfrage-Ergebnis
while($rowCds = $prepStatement -> fetch()){
echo'
    <li>' . $rowCds['album'];
    }

echo '</ul>';
}
?>
	
</body>
</html>