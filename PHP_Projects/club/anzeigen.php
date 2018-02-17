 <?php
/*
 * source code:     anzeigen.php
 * author:          Lukas Eder
 * date:            19.01.2018
 * 
 * Descr.:
 * Bild in einem serverseitigen Verzeichnis.
 * - Zeigt alle Mitglieder
 */

// Datenbankverbindung aufbauen, Datenbank waehlen
require_once 'inc/db_inc.php';
require_once 'inc/connect.php';

// Array-Typ fuer die Datensaetze, assoziativ
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Datenbank-Abfrage
$query =    "SELECT
                personen_vorname,
                personen_name,
                personen_alt,
                DATE_FORMAT(personen_upload_date, '%d.%m.%Y') as upload_date_formatted,
                DATE_FORMAT(personen_birthday, '%d.%m.%Y') as birthday_formatted,
                personen_email,
                personen_bild
            FROM $table";

// Abfrage auf der DB absetzen
$result = $db -> query($query);
echo $db -> errorInfo()[2];

// Ausgabe
header('Content-type: text/html; accept-charset="utf-8"');
?>

<!Doctype html>
<html lang="de-ch">
<head>
	<meta charset="utf-8">
	<title>Club</title>
</head>
<body>
	<h1>Club, Mitglieder</h1>
	<table>
		<tr>
			<th>Mitglied</th>
			<th>Vorname</th>
			<th>Name</th>
			<th>E-Mail</th>
			<th>Geburtstag</th>
		</tr>
		
<?php 

// fuer jeden Datensatz eine Tabellenzeile anzeigen
foreach($result as $row){
    // Groesse fuer das Bild in der Form: width="XXX" height="YYY"
    $size = getimagesize('images/' . $row['personen_bild']);
    // Zeile
    echo '<tr>';
    
    // Zelle fuer das Bild
    echo '<td>';
    echo '<img src="images/'. $row['personen_bild'] . '" alt="' . $row['personen_alt']  . 
            ', uploaded: ' . $row['upload_date_formatted'] . '" ' . $size[3] . '>';
    echo '</td>';
    
    // 4 Zellen für Vorname, Name, E-Mail und Geburtstag
    echo '<td>' . $row['personen_vorname'] . '</td>';
    echo '<td>' . $row['personen_name'] . '</td>';
    echo '<td>' . $row['personen_email'] . '</td>';
    echo '<td>' . $row['birthday_formatted'] . '</td>';
    
}

?>

	</table>
</body>
</html>