<?php
function connexion() {
    $dbHost="localhost";
    $dbName="tennis";
    $dbUser="dev";
    $dbPassword="13041996";
    $strConnex="host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";    

    $ptrDB = pg_connect($strConnex);
    if (!$ptrDB) {
        echo "<h1>Problème de connexion, vérifiez vos paramètres dans $strConnex</h1>";
        exit(1); // fin du programme
    }
    return $ptrDB;
}
?>