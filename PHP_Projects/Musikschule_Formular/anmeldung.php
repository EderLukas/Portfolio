<?php
/*
 * Anmeldung.php , Kontroll- und Verarbietungsformular von anmeldeformularMusikschule.html
 * 13.01.2018 , Lukas Eder
*/
header('Content-type: text/html; accept-charset="utf-8"');

// Formularvariablen validieren, Schutz vor Security Cross Side Scripting
$sname = htmlspecialchars($_POST['sName']);
$svorname = htmlspecialchars($_POST['sVorname']);
$geburtsdatum = htmlspecialchars($_POST['Geburtsdatum']);
$geschlecht = htmlspecialchars($_POST['Geschlecht']);
$ename = htmlspecialchars($_POST['eName']);
$evorname = htmlspecialchars($_POST['eVorname']);
$strasse = htmlspecialchars($_POST['Strasse']);
$strassennr = htmlspecialchars($_POST['streetnr']);
$plz = htmlspecialchars($_POST['PLZ']);
$ort = htmlspecialchars($_POST['Ort']);
$telefon = htmlspecialchars($_POST['Telefon']);
$natel = htmlspecialchars($_POST['Natel']);
$email = htmlspecialchars($_POST['E-Mail']);
$schulstufe = htmlspecialchars($_POST['Schulstufe']);
$andereStufe = htmlspecialchars($_POST['andereStufe']);
$schulhaus = htmlspecialchars($_POST['Schulhaus']);
$instrument = htmlspecialchars($_POST['Instrument/Fach']);
$kleinEunterricht = htmlspecialchars($_POST['klein_EinzelU']);
$kleinGunterricht = htmlspecialchars($_POST['klein_GruppenU']);
$grossEunterricht = htmlspecialchars($_POST['gross_EinzelU']);
$grossGunterricht = htmlspecialchars($_POST['gross_GruppenU']);
$allgFaecherEnsembles = htmlspecialchars($_POST['Allg_Fächer/Ensembles']);

$mailbody = "Schüler/in\t\t\tEltern/Erziehungsberechtigte\n
Nachname: $sname\t\t\t$ename\n
Vorname: $svorname\t\t\t$evorname\n
Geburtsdatum: $geburtsdatum\n
Geschlecht: $geschlecht\n\n
Kontaktinformationen\n
Strasse: $strasse $strassennr\n
PLZ/Ort: $plz $ort\n
Telefon: $telefon\n
Natel: $natel\n
E-Mail: $email\n\n
Klasseneinteilung:\n
$schulstufe in $schulhaus\n
Andere:\n$andereStufe\n\n
Instrument/Fach: $instrument\n\n
Einzel- oder Gruppenunterricht & Alterskategorie\n
Kindergarten, Primarschule 1-5, Zweitinstrument Oberstufe, Auszubildende bis 20 Jahre\n
$kleinEunterricht\n$kleinGunterricht\n\n
Primar 6 und Oberstufe mit Kantonsbeitrag\n
$grossEunterricht\n$grossGunterricht\n\n
Allgemeine Fächer / Ensembles\n
$allgFaecherEnsembles";

//Anmeldeformular weiterleiten	
mail("placeholder@gmail.com", "Anmeldung Musikunterricht $svorname $sname", $mailbody,
"From: info@serverXY.ch\t\nContent-type:text/plain; charset=UTF-8", '-finfo@serverXY.ch');

// Client informieren
echo '<p><strong>Anmeldung abgeschickt!</strong></p>';

// Wiederhohlung des Anmeldeprozesses
echo "<p><a href=\"anmeldeformularMusikschule.html\">Erneute Eingabe</a></p>";
























?>