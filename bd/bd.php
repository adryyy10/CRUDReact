<?php

$pdo = null;
$host = "localhost";
$user = "root";
$password = "";
$bd = "tutoriales":

function conectar(){
    try {
        $GLOBALS['pdo'] = new PDO("mysql: host=". $GLOBALS['host'].";dbname=". $GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOEXCEPTION $e) {
        print "Error!: No se pudo contectar a la bd ".$bd."<br/>";
        print "\nError!: ".$e."<br/>";
        die();
    }
}
function desconectar(){
    $GLOBALS['pdo'] = null;
}

?>