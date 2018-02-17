<?php

/*
 * Bestellformular, Uebung fuer die Auswahlelemente
 * 04.01.2018, Lukas Eder
 */
header('Content-type: text/html; accept-charset="utf-8"');

// Variablen
$name =htmlspecialchars($_POST['Name']);
$vorname =htmlspecialchars($_POST['Vorname']);
$email = htmlspecialchars($_POST['email']);
$infos = htmlspecialchars(implode(', ', $_POST['infos']));
$newsletter = htmlspecialchars($_POST['newsletter']);

$checkedPHP = '';
$checkedJavaScript = '';
$checkedCSS = '';
$checkedJa = '';
$checkedNein = '';

// RegEx
$emailformat = "/^.{2,}@.{2,}\..{2,}$/i";

// Fehlerpruefung
if(!empty($name) && !empty($vorname) && !empty($email) && preg_match($emailformat, $email)){
	echo '<p>Name: <strong>' . $name . '</strong><br>';
	echo 'Vorname: <strong>' . $vorname . '</strong><br>';
	echo 'E-Mail: <strong>' . $email . '</strong><br>';
	if (!empty($infos)){
		echo 'Ich bestelle Informationen zu: <strong>' . $infos . '</strong><br>';
	}
	if (!empty($newsletter)){
		echo 'Ich abonniere den Newsletter: <strong>' . $newsletter . '</strong><p>';
	}
echo '<p>Bestellung aufgegeben</p>';

// Mailbody
$mailbody = "***\n$name\n$vorname\n$email\nWill Infos zu: $infos\nWill Newsletter: $newsletter\n***";	

// Mail versenden
mail('ederlukas123@gmail.com', 'Anforderung Infos/Newsletter', $mailbody, 
	"From: info@webpubli.ch\t\nContent-type:text/plain; charset=UTF-8", '-finfo@webpubli.ch');
}else{
?>
<!Doctype html>
<html lang="de-CH">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="formular.css" type="text/css">
	<title>Bestellformular</title>
</head>
<body>
	<form method="post" action="formsend.php" accept-charset="utf-8">
<?php

	// Genaue Fehlerpruefung
	echo '<h2>Fehlerhafte Eingabe!</h2>';	
	if(!empty($name) == false){
		echo '<p>Name</p>';
	}
	if(!empty($vorname) == false){
		echo '<p>Vorname</p>';
	}
	if(!empty($email) == false){
		echo '<p>E-Mail</p>';
	}
	if(!empty($infos) == false){
		echo '<p>Bestellte Informationen</p>';
	}
	if( !preg_match($emailformat, $email)){
				echo '<p>E-Mailformat: Achten sie auf \'@\' und \'.\' . </p>';

	}
?>	

		<p><label><input type="text" name="Name" size="41" maxlenght="40" autofocus <?php echo 'value="'.$_POST['Name'].'"';?>> Name</label></p>
		<p><label><input type="text" name="Vorname" size="41" maxlenght="40" <?php echo 'value="'.$_POST['Vorname'].'"';?>> Vorname</label></p>
		<p><label><input type="text" name="email" size="41" maxlenght="40" <?php echo 'value="'.$_POST['email'].'"';?>> e-Mail</label></p>
		
		<fieldset>
		<legend>Ich bestelle Informationen zu</legend>
		
		<?php
			if(isset($__POST['infos'])){
				if(in_array)// lösung 3 seite 3 zeile 141
			}
		?>
		
		</fieldset>
		<legend>Ich abonniere den Newsletter</legend>
		<?php
			if($newsletter == 'ja'){
				echo '<label><input type="radio" name="newsletter" value="ja" class="check-radio" checked> ja</label><br>';
				echo '<label><input type="radio" name="newsletter" value="nein" class="check-radio"> nein</label><br>';
			}
			else if($newsletter == 'nein'){
				echo '<label><input type="radio" name="newsletter" value="ja" class="check-radio"> ja</label><br>';
				echo '<label><input type="radio" name="newsletter" value="nein" class="check-radio" checked> nein</label><br>';
			}
			else {
				echo '<label><input type="radio" name="newsletter" value="ja" class="check-radio"> ja</label><br>';
				echo '<label><input type="radio" name="newsletter" value="nein" class="check-radio"> nein</label><br>';
			}
		?>
		<p><label><input type="submit" name="senden" value="Senden"></label></p>
	</form>
</body>
</html>
<?php } ?>

