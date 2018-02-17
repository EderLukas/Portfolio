<?php
/*
Uebung Gallery, automatisches anzeigen von thumbnails
15.12.2017, Lukas Eder
*/
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
			$verz = opendir('C:\xampp\htdocs\_gallery\thumbnails');
			
			//Objekte in Verzeichnis lesen
			while(false !== ($dname = readdir($verz))){
				if(is_file('thumbnails/' . $dname)){					
					$text = str_replace('.jpg', '', $dname);
					$text = str_replace('_', ' ', $text);
					$text = str_replace('ae', 'ä', $text);
					$text = ucwords($text);
					
					//Ausgabe
					echo "<figure>\n";
					echo "<a href=\"=images/$dname\" target=\"bild\"><img src=\"thumbnails/$dname\" alt=\"$text\"></a>\n";
					echo "</a>\n";
					echo "<figcaption>\n";
					echo "<p>$text</p>\n";
					echo "</figcapiton>\n";
					echo "</figure>\n";
				}
			}
			closedir($verz);
		?>
	</body>
</html>