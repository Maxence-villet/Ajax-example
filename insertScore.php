<?php
session_start();
require_once("database.php");

$pdo = new Database();

$sql = "INSERT INTO score (player_id, game_id, difficulty, score, date) VALUES  (:player_id, :game_id, :difficulty, :time, CURRENT_TIMESTAMP())";

$params = [
    ":player_id" => $_SESSION["player_id"],
    ":game_id" => $_POST["game_id"],
    ":difficulty" => $_POST["difficulty"],
    ":time" => $_POST["time"],
];

$pdo->requestExecute($sql, $params);


?>