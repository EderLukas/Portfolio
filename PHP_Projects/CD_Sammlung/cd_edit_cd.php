<?php
/*
 * source code:     cd_edit_cd.php
 * author:          Lukas Eder
 * date:            28.01.2018
 *
 * Descr.:
 * Es koennen Aenderungen an vorhandenen Datensaetzen von
 * Interpreten und CDs vorgenommen werden. (2 Teil des Formulars).
 */

// Verbindung zu DB erstellen
include 'inc/db_param.php';
include 'inc/connect.php';

// Standart fuer Arrays waehlen
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['cd'])){
    var_dump($_GET['cd']);
    // Crosssidescript
    $idtitel = htmlspecialchars($_GET['cd']);
    
    // abfrage auf DB absetzen
    $result = $db -> query("SELECT *
                            FROM $tableCDs
                            WHERE id=$idtitel");
    
    $row = $result -> fetch();
}
// CD anpassen
if(isset($_GET['anpassen'])){

    $album = htmlspecialchars($_GET['album']);
    $jahr = htmlspecialchars($_GET['jahr']);
    $id = htmlspecialchars($_GET['id']);
    
    if(!empty($jahr)){
        $queryUp2 =    "UPDATE $tableCDs
                      SET jahr=:jahr
                      WHERE id=:id";
        // Prepared Statement
        $prepStat2 = $db -> prepare($queryUp2);
        // Parameter binden
        $prepStat2 -> bindParam(':jahr', $jahr);
        $prepStat2 -> bindParam(':id', $id);
        // absetzten auf DB
        try {
            $prepStat2 -> execute();
            $flag = "<p>Update erfolgreich</p>";
        } catch (Exception $e){
            $flag ="<p>Update gescheitert. Fehler: " . $e -> getMessage() . "</p>";
        }
        $prepStat2 -> closeCursor();
    }
    
    if(!empty($album)){
    
        $queryUp =    "UPDATE $tableCDs
                      SET album=:album
                      WHERE id=:id";
        // Prepared Statement
        $prepStat = $db -> prepare($queryUp);
        // Parameter binden
        $prepStat -> bindParam(':album', $album);
        $prepStat -> bindParam(':id', $id);
        // absetzten auf DB
        try {
            $prepStat -> execute();
            $flag = "<p>Update erfolgreich</p>";
        } catch (Exception $e){
            $flag ="<p>Update gescheitert. Fehler: " . $e -> getMessage() . "</p>";
        }
    }
}

header('Content-type: text/html; accept-charset="utf-8"');
?>

<!Doctype html>
<html lang="de-ch">
<head>
	<meta charset="utf-8">
	<title>CD editieren</title>
</head>
<body>
	<h1>CD-Sammlung, CD editieren</h1>
	<?php include 'inc/menue.html'; ?>
	
	<?php echo $flag; ?>
	
	<form method="get" action="cd_edit_cd.php" accept-charset="utf-8">
		<p><label><input type="text" name="album" size="33" maxlength="35" value="<?php if(!empty($row['album'])){echo $row['album'];};?>" autofocus> Album</label></p>
		<p><label><input type="number" name="jahr"> Erscheinungsjahr</label></p>
		<p><label><input type="hidden" name="id" value="<?php echo $row['id']?>"></label></p>	
		<p><label><input type="submit" name="anpassen" value="anpassen"></label></p>
	</form>
</body>
</html>