<?php
require_once("config.php");
session_start();
$userID = $_SESSION["id"];  
// echo $userID;

$roomID = $_GET["roomID"];
echo $roomID;

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
                    header("refresh:3;url=room.php");
                    exit;
                }else{
                    echo "加入房間失敗";
                    header("refresh:3;url=enter.php");
                    exit;
                }
            }
        }else{
            echo "房間已滿";
            header("refresh:3;url=enter.php");
            exit;
        }
    } else {
        echo "房間不存在";
        header("refresh:3;url=enter.php");
        exit;
    }
}

join_room($db, $userID, $roomID);

?>