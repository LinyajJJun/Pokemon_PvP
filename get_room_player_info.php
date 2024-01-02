<?php
require_once("config.php");
session_start();
// $userID = $_SESSION["id"];
$roomID = $_GET["roomID"];
list($player1ID, $player2ID) = getPlayerID($db, $roomID); // Pass $roomID as a parameter
list($player1Name, $player2Name) = getPlayerName($db, $player1ID, $player2ID); // Pass $player1ID and $player2ID as parameters
list($player1Status, $player2Status) = getPlayerStatus($db, $roomID); // Pass $player1ID and $player2ID as parameters

/*
room(roomID,
    player1ID, player1Hp, player1Pokemon, player1Status,
    player2ID, player2Hp, player2Pokemon, player2Status,
    turn, effect, skills, damage, status)
*/

function getPlayerID($db, $roomID){
    try {
        $sql = "SELECT * FROM room WHERE roomID = :roomID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1ID = $row["player1ID"];
        $player2ID = $row["player2ID"];
        return [$player1ID, $player2ID];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getPlayerName($db, $player1ID, $player2ID){
    try {
        $sql = "SELECT * FROM user WHERE userID = :player1ID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':player1ID', $player1ID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1Name = $row["username"];
        if($player2ID == NULL){
            return [$player1Name, NULL];
        }
        $sql = "SELECT * FROM user WHERE userID = :player2ID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':player2ID', $player2ID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player2Name = $row["username"];
        return [$player1Name, $player2Name];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getPlayerStatus($db,$roomID){
    try {
        $sql = "SELECT * FROM room WHERE roomID = :roomID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1Status = $row["player1Status"];
        $player2Status = $row["player2Status"];
        return [$player1Status, $player2Status];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$returnData = [
    "roomID" => $roomID,
    "player1ID" => $player1ID,
    "player2ID" => $player2ID,
    "player1Name" => $player1Name,
    "player2Name" => $player2Name,
    "player1Status" => $player1Status,
    "player2Status" => $player2Status
];

echo json_encode($returnData);

?>
