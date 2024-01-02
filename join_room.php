<?php
require_once("config.php");
session_start();
$userID = $_SESSION["id"];  
// echo $userID;

$roomID = $_GET["roomID"];
echo $roomID;



join_room($db, $userID, $roomID);

?>