<?php
require_once("config.php");
session_start();
// $userID = $_SESSION["id"];
$roomID = $_SESSION["roomID"];
$operator = $_GET["operator"];
$v = isset($_GET["value"]) ? $_GET["value"] : NULL;

if($operator == "GetPlayerInfo"){
    list($player1ID, $player2ID) = getPlayerID($db, $roomID); // Pass $roomID as a parameter
    list($player1Name, $player2Name) = getPlayerName($db, $player1ID, $player2ID); // Pass $player1ID and $player2ID as parameters
    list($player1Status, $player2Status) = getPlayerStatus($db, $roomID); // Pass $player1ID and $player2ID as parameters
    if($player1ID == NULL){
        $player1ID = "NULL";
        echo json_encode([]);
        return;
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
}
elseif ($operator == "UpdatePlayer2Status") {
    // UPDATE room SET player2Status = :v WHERE roomID = :roomID;
    $sql = "UPDATE player SET playerStatus = :v WHERE playerID = (select room.player2ID from room where roomID = :roomID)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':v', $v); // 绑定占位符 :v 的值
    $stmt->bindParam(':roomID', $roomID);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        echo "Update player2 status to ".$v. " successfully" ;
    } else {
        echo "Update player2 status ".$v. " failed";
    }
}
elseif($operator == "CheckRoom"){
    $resultJson = [];
    if(checkRoomExist($db, $roomID)){
        $resultJson = [
            "roomID" => $roomID,
            "status" => checkRoomStatus($db, $roomID)
        ];
    }else{
        $resultJson = [
            "roomID" => NULL,
            "status" => -1
        ];
    }
    echo json_encode($resultJson);
}
elseif($operator == "ResetPlayerRoom"){
    resetPlayerRoom($db, $userID);
}
elseif($operator == "Start" ){
    // UPDATE room SET status = 1 WHERE roomID = /*roomID*/;
    echo "Start";
    // get player1ID
    $sql = "SELECT * FROM room WHERE roomID = :roomID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':roomID', $roomID);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $player1ID = $row["player1ID"];
    echo $player1ID. " " .$v;
    if($player1ID == $v){
        $sql = "UPDATE room SET statu = 1 WHERE roomID = :roomID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
    }
}
elseif($operator == "LeaveRoom"){
    playerLeaveRoom($db, $v, $roomID);
}
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
        if($stmt->rowCount() == 0){
            return [NULL, NULL];
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1ID = $row["player1ID"];
        $player2ID = $row["player2ID"];
        return [$player1ID, $player2ID];
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
    }
}

function getPlayerName($db, $player1ID, $player2ID){
    try {
        $sql = "SELECT * FROM user WHERE userID = :player1ID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':player1ID', $player1ID);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return [NULL, NULL];
        }
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
        // echo "Error: " . $e->getMessage();
    }
}

function getPlayerStatus($db,$roomID){
    try {
        $sql = "SELECT 
                player1.playerStatus AS player1Status,
                player2.playerStatus AS player2Status
                FROM room
                LEFT JOIN player AS player1 ON room.player1ID = player1.playerID
                LEFT JOIN player AS player2 ON room.player2ID = player2.playerID
                WHERE room.roomID = :roomID";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return [NULL, NULL];
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1Status = $row["player1Status"];
        $player2Status = $row["player2Status"];
        return [$player1Status, $player2Status];
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
    }
}

function checkRoomExist($db, $roomID) {
    try {
        $sql = "SELECT COUNT(*) as count FROM room WHERE roomID = :roomID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

       
        return $result['count'] > 0;
    } catch (PDOException $e) {
       
        return false;
    }
}

function checkRoomStatus($db, $roomID){
    $sql = "SELECT * FROM room WHERE roomID = :roomID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':roomID', $roomID);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $statu = $row["statu"];
        return $statu;
    }else{
        return -1;
    }
}

function resetPlayerRoom($db, $userID){
    $_SESSION["roomID"] = NULL;
}

function playerLeaveRoom($db, $userID, $roomID){
    echo "playerLeaveRoom" . $userID . " " . $roomID;
    
    $sql = "SELECT * FROM room WHERE roomID = :roomID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':roomID', $roomID);

    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $roomID = $row["roomID"];
        $player1ID = $row["player1ID"];
        $player2ID = $row["player2ID"];

        if($player1ID == $userID){
            $sql = "DELETE FROM room WHERE roomID = :roomID";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':roomID', $roomID);
            $stmt->execute();
        } elseif ($player2ID == $userID){
            $sql = "UPDATE room SET player2ID = NULL WHERE roomID = :roomID";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':roomID', $roomID);
            $stmt->execute();
        }
    }
}

?>
