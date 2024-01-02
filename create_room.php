<?php
require_once("config.php");
session_start();
$userID = $_SESSION["id"];  
echo $userID;
//
/*
room(roomID,
    player1ID, player1Hp, player1Pokemon, player1Status,
    player2ID, player2Hp, player2Pokemon, player2Status,
    turn, effect, skills, damage, status)
*/
function create_room($db, $userID){
    // get time stamp
    $time = time();
    // get hash result
    $hashResult = sha($userID + $time);
    // get first 5 characters
    $room_id = substr($hashResult, 0, 5);
    echo $room_id;
    echo $player1ID;
    // update room table, player1ID = userID, other NULL
    $sql = "INSERT INTO room (roomID, player1ID) VALUES (:roomID, :player1ID)";
    $_SESSION["roomID"] = $room_id;
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':roomID', $room_id);
    $stmt->bindParam(':player1ID', $userID);
    $stmt->execute();
    if($stmt->rowCount() == 1){
        echo "create room success";
        header("refresh:3;url=room.php");
        exit;
    }else{
        echo "create room fail";
        header("refresh:3;url=enter.php");
        exit;
    }
}

function sha($str){
    return hash('sha256', $str);
}

create_room($db, $userID);

?>