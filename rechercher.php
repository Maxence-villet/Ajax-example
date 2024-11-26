<?php
require_once("../utils/database.php");


$sql = "SELECT player_id, nickname FROM player";
$params = [];
$pdo = new Database();
$resultat = $pdo->requestExecute($sql, $params);

$donnees = [];
foreach($resultat as $row) {
    $donnees[] = $row; 
}
//var_dump($donnees);


echo json_encode($donnees);