<?php
/*
 * source code:     cd_edit_aritst.php
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


// CD anpassen
if(isset($_GET['anpassen'])){
    
    $band = htmlspecialchars($_GET['band']);
    $artist = htmlspecialchars($_GET['artist']);
    
    if(!empty($band)){
        
        $queryUp =    "UPDATE $tableArtist
                      SET band=:band
                      WHERE band=:artist";
        // Prepared Statement
        $prepStat = $db -> prepare($queryUp);
        // Parameter binden
        $prepStat -> bindParam(':band', $band);
        $prepStat -> bindParam(':artist', $artist);
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
	<h1>CD-Sammlung, Artist editieren</h1>
	<?php include 'inc/menue.html'; ?>
	
	<h2><?php if(isset($_GET['artist'])){echo $_GET['artist'];} else {echo $artist;} ?> anpassen</h2>
	<?php echo $flag; ?>
	
	<form method="get" action="cd_edit_artist.php" accept-charset="utf-8">
		<p><label><input type="text" name="band" size="33" maxlength="35" autofocus> Band</label></p>
		<p><label><input type="hidden" name="artist" value="<?php echo $_GET['artist'];?>"></label></p>
			
		<p><label><input type="submit" name="anpassen" value="anpassen"></label></p>
	</form>
</body>
</html>