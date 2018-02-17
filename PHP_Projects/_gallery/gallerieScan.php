<?php
/*
 * Uebung Gallery, automatisches anzeigen von thumbnails
 * 04.04.2018, Lukas Eder
*/
header('Content-type: text/html; accept-charset="utf-8"');

?>
<Doctype html>
<html lang="de-CH">
	<head>
		<meta charset="utf-8">
		<style>Gallery</style>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<h1>Gallerie von Guarda</h1>
		
		<?php
			//Verzeichnis definieren
			$verz = 'C:\xampp\htdocs\_gallery\thumbnails';
			
			$files1 = scandir($verz);
			$loop = count($files1);
	
			if(isset($_GET['delete'])){
				unlink('thumbnails/' . $_GET['picname']);
				unlink('images/' . $_GET['picname']);
			}
			
			if(isset($_FILES['bild'])){
				$tmp_name = $_FILES['bild']['tmp_name'];
				$dateiname = 'images/' . $_FILES['bild']['name'];
				move_uploaded_file($tmp_name, $dateiname);
				$meldung = '<p class="erfolgsmeldung">Das Bild wurde gespeichert</p>';
				
				$im = imagecreatefromjpeg($quelle);
				$width = imagesx($im);
				$height = imagesy($im);
				
			}
			
			
			//Objekte in Verzeichnis lesen
			for($i = 2; $i < $loop; $i++){
				$hiddenname = $files1[$i];
				$text = str_replace('.jpg', '', $files1[$i]);
				$text = str_replace('_', ' ', $text);
				$text = str_replace('ae', 'ä', $text);
				$text = ucwords($text);
			
				//Ausgabe
				echo "<figure>\n";
				echo "<a href=\"images/$files1[$i]\" target=\"bild\"><img src=\"thumbnails/$files1[$i]\" alt=\"$text\"></a>\n";
				echo "</a>\n";
				echo "<figcaption>\n";
				echo "<p>$text</p>\n";
				echo "<form method=\"get\" action=\"$_SERVER[PHP_SELF]\" accept-charset=\"utf-8\">";
				echo "<input type=\"hidden\" name=\"picname\" value=\"$hiddenname\">";
				echo "<label><input type=\"submit\" name=\"delete\" value=\"Löschen\"></label>";
				echo '</form>';
				echo "</figcapiton>\n";
				echo "</figure>\n";
			}
			echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\" enctype=\"multipart/form-data\">";
			echo "<label><input type=\"file\" size=\"50\" name=\"bild\"></label>";
			echo "<label><input type=\"submit\" name=\"send\" value=\"Hochladen\"></label>";
			echo "</form>";
echo <<<LINK
<a href="gallerieScan.php"> Seite aktualisieren<a/>
LINK;
		?>
	</body>
</html>