<?php
/*
 * source code:     registrieren.php
 * author:          Lukas Eder
 * date:            19.01.2018
 *
 * Descr.:
 * Bild in einem serverseitigen Verzeichnis.
 * - Laedt einen neuen Nutzer in die DB.
 */

$message = '';

        if(isset($_FILES['bild']['name']) && preg_match('/^[\w\.-]+$/', $_FILES['bild']['name'])){
if(isset($_POST['register'])){
    // wenn ein Bild hochgeladen wurde, und der Dateiname Buchstaben, Zahlen, Underlines, Punkte und Bindestrichen besteht
        $vorname = htmlspecialchars($_POST['vorname']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $alternativtext = htmlspecialchars($_POST['alternativtext']);
        
        // aktuelles Datum fuer upload-Datum
        $uploadDate = date('Y-m-d');
        
        // Datenbankverbindung aufbauen, Datenbank waehlen
        require_once 'inc/db_inc.php';
        require_once 'inc/connect.php';
    
        // Abfrage auf DB absetzen
        $query =    "INSERT INTO $table
                       (personen_vorname, personen_name, personen_birthday, personen_email, 
                            personen_bild, personen_alt, personen_upload_date)
                    VALUES
                        (:vorname, :name, :birthday, :email, :bildname, :alternativtext, :uploadDate)";
    
        // Prepared Statement
        $prepStat = $db -> prepare($query);
        
        
        // Parameter binden
        $prepStat -> bindParam(':vorname', $vorname);
        $prepStat -> bindParam(':name', $name);
        $prepStat -> bindParam(':birthday', $_POST['geburtstag']);
        $prepStat -> bindParam(':email', $email);
        $prepStat -> bindParam(':bildname', $_FILES['bild']['name']);
        $prepStat -> bindParam(':alternativtext', $alternativtext);
        $prepStat -> bindParam(':uploadDate', $uploadDate);
        
        // Prepared Statement ausfuehren
        $prepStat -> execute();
        
        // Das Bild in das Verzeichnis images verschieben
        move_uploaded_file($_FILES['bild']['tmp_name'], 'images/' . $_FILES['bild']['name']);
        
        // Bestätigungsmeldung
        $message = '<p class="erfolgsmeldung">Der Datensatz wurde gespeichert.</p>';
    }
    else{
        // Fehlermeldung
        $message = '<p class="fehlermeldung">NICHT gespeichert!</p>';
        
    }
}

// Ausgabe
header('Content-type: text/html; accept-charset="utf-8"');
?>

<!Doctype html>
<html lang="de-ch">
<head>
	<meta charset="utf-8">
	<title>Club, registrieren</title>
</head>
<body>
	<h1>Club, registrieren</h1>
	
	<?php echo $message?>
	
	<form method="post" action="/_151/club/registrieren.php" enctype="multipart/form-data" accept-charset="utf-8">
		<p><label><input type="text" name="vorname" size="20"> Vorname</label></p>
		<p><label><input type="text" name="name" size="20"> Name</label></p>
		<p><label><input type="email" name="email" size="50"> E-Mail</label></p>
		<p><label><input type="date" name="geburtstag"> Geburtsdatum</label></p>
		<p><label>Bild: <input type="file" name="bild"></label></p>
		<p><label><input type="text" name="alternativtext"> Bildbeschreibung</label></p>
		<p><label><input type="submit" name="register" value="Einschreiben"></label></p>
	</form>
</body>
</html>