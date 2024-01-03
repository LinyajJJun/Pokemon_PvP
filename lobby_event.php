<?php
require_once("config.php");
session_start();
$userID = $_SESSION["id"];  
echo $userID;
$operator = $_GET["operator"];
$roomID = isset($_GET["roomID"]) ? $_GET["roomID"] : NULL;
//
/*
room(roomID,
    player1ID, player1Hp, player1Pokemon, player1Status,
    player2ID, player2Hp, player2Pokemon, player2Status,
    turn, effect, skills, damage, status)
*/

if($operator == "create"){
    create_room($db, $userID);
}else if($operator == "join"){
    join_room($db, $userID, $roomID);
}
function create_room($db, $userID){
    // get time stamp
    $time = time();
    // get hash result
    $hashResult = sha($userID + $time);
    // get first 5 characters
    $room_id = substr($hashResult, 0, 5);
    echo $room_id;
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
        header("refresh:3;url=lobby.php");
        exit;
    }
}

function join_room($db, $userID, $roomID){
    $sql = "SELECT * FROM room WHERE roomID = :roomID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':roomID', $roomID);
    $stmt->execute();
    // 檢查房間是否存在
    if ($stmt->rowCount() == 1) {
        // Fetch the row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // 檢查房間是否已滿
        if($row["player2ID"] == NULL){
            // 檢查玩家是否已在房間內
            if($row["player1ID"] == $userID){
                echo "你已在房間內";
                header("refresh:3;url=room.php");
                exit;
            }else{
                // 更新房間資訊
                $sql = "UPDATE room SET player2ID = :player2ID WHERE roomID = :roomID";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':player2ID', $userID);
                $stmt->bindParam(':roomID', $roomID);
                $stmt->execute();
                if($stmt->rowCount() == 1){
                    echo "加入房間成功";
                    $_SESSION["roomID"] = $roomID;
                    header("refresh:3;url=room.php");
                    exit;
                }else{
                    echo "加入房間失敗";
                    header("refresh:3;url=lobby.php");
                    exit;
                }
            }
        }else{
            echo "房間已滿";
            header("refresh:3;url=lobby.php");
            exit;
        }
    } else {
        echo "房間不存在";
        header("refresh:3;url=lobby.php");
        exit;
    }
}



function sha($str){
    return hash('sha256', $str);
}


?>