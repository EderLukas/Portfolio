<?php
/*
 * source code:     connect.php
 * author:          Lukas Eder
 * date:            17.01.2018
 * 
 * Desc.:
 * Externe Datei die die Verbindung zur Datenbank fuer buch.php erstellt
 */

// Fehler-Behandlung
try{
    // Data Source Name (Driver, Host und DB)
    $db = new PDO ($server . $database, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch(PDOException $e){
    //Fehlermeldung ohne Details wird auch im produktiven Web gezeigt
    echo '<p>Verbindung fehlgeschlagen</p>';
    
    if(ini_get('display_errors')){
        echo '<br>' . $e->getMessage();
    }
    //Ausfuehrung des Scripts beenden
    exit;
}
?>