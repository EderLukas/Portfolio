<?php
/*
 * source code:     erfassen.php
 * author:          Lukas Eder
 * date.            17.01.2018
 *
 * Descr.:
 * Formular, dass den Admin neue Titel in die DB Buch von buch.php integrieren laesst.
 */
header('Content-type: text/html; accept-charset="utf-8"');


// wenn Request vom Formular -> Datensatz speichern
if(isset($_POST['save'])){
    $name = htmlspecialchars($_POST['name']);
    $isbn = htmlspecialchars($_POST['isbn']);
    $preis = htmlspecialchars($_POST['preis']);
    
    // Datenbank-Verbindung aufbauen, Datenbank waehlen
    require_once 'inc/db_inc.php';
    require_once 'inc/connect.php';

    // Datensatz speichern
    $query = "INSERT INTO buch
            (buch_name, buch_isbn, buch_preis)
            VALUES ('$name', '$isbn', '$preis')";
    $db -> exec($query);
    
}


// HMTL Dateikopf
echo<<<HTML
<!Doctype html>
<html lang="de-CH">
    <head>
        <meta charset="utf-8">
        <title>Buch erfassen</title>
        <link rel="stylesheet" type="text/css" href="css/format.css">
    </head>
    <body>
    <h1>Bücher für PHP &amp; MySQL, Neues Buch erfassen</h1>
HTML;
    include 'inc/nav_admin.html';
echo<<<HTML2
    <form method="post" action="$_SERVER[PHP_SELF]" accept-charset="utf-8">
        <table class="liste">
            <tr>
                <td class="titelerfassen">Name </td><td class="titel"><label><input type="text" name="name" placeholder="Titel" size="50"></label></td>
            </tr>
            <tr>
                <td class="zahlenerfassen">ISBN-Nummer </td><td class="zahlen"><label><input type="text" name="isbn" placeholder="ISBN" size="50"></label></td>
            </tr>
            <tr>
                <td class="zahlenerfassen">Preis </td><td class="zahlen"><label><input type="text" name="preis" placeholder="Preis" size="50"></label></td>
            </tr>
            <tr>
                <td class="zahlen"></td><td class="zahlen"><label><input type="submit" name="save" value="speichern"></label></td>
            </tr>
        </table>
    </form>
    </body>
</html>
HTML2;
