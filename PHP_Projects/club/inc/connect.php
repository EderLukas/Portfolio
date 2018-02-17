<?php
/*
 * source code:     connect.php
 * author:          Lukas Eder
 * date:            19.01.2018
 * 
 * Desc.:
 * Erstellt Verbindung zur Datenbank mit gegebenen Parametern.
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