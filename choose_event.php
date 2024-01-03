<?php
    require_once("config.php");
    session_start();
    $operator = $_GET['operator'];
    $pokemonID = isset($_GET['pokemon'])? $_GET['pokemon'] : NULL;
    $roomID = $_SESSION["roomID"];
    $userID = $_SESSION["id"];  

    if($operator == "UpdatePlayerPokemon"){
        updatePlayerPokemon($db, $userID, $pokemonID);
    }
    elseif($operator == "CheckAllPlayerStatus"){
        echo checkAllPlayerStatus($db, $roomID);
    }
    elseif($operator == "UpdateRoomStatus"){
        updateRoomStatus($db, $roomID);
    }
    
         
    
    //player(playerID, playerHp, playerPokemon, playerStatus)
    function updatePlayerPokemon($db, $userID, $pokemonID){
        $sql = "UPDATE player SET playerPokemon = :pokemonID WHERE playerID = :userID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':pokemonID', $pokemonID);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            echo "update player pokemon success";
            // header("refresh:3;url=lobby.php");
            updatePlayerStatus($db, $userID, 2);
            exit;
        }else{
            echo "update player pokemon fail";
            // header("refresh:3;url=lobby.php");
            exit;
        }
    }
    function updatePlayerStatus($db, $userID, $status){
        $sql = "UPDATE player SET playerStatus = :statu WHERE playerID = :userID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':statu', $status);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            echo "update player status success";
            // header("refresh:3;url=lobby.php");
            exit;
        }else{
            echo "update player status fail";
            // header("refresh:3;url=lobby.php");
            exit;
        }
    }

    function checkAllPlayerStatus($db, $roomID){
        // get player1 and player2 status
        $sql = 
        "SELECT 
            player1.playerStatus AS player1Status,
            player2.playerStatus AS player2Status
        FROM room
        LEFT JOIN player AS player1 ON room.player1ID = player1.playerID
        LEFT JOIN player AS player2 ON room.player2ID = player2.playerID
        WHERE room.roomID = :roomID;
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return [NULL, NULL];
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1Status = $row["player1Status"];
        $player2Status = $row["player2Status"];
        if($player1Status == 2 && $player2Status == 2){
            return 1;
        }else{
            return 0;
        }
    }
    function updateRoomStatus($db, $roomID){
        $sql = "UPDATE room SET statu = 2 WHERE roomID = :roomID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            echo "update room status success";
            // header("refresh:3;url=lobby.php");
            exit;
        }else{
            echo "update room status fail";
            exit;
        }
    }
    function checkRoomStatus($db, $roomID){
        $sql = "SELECT roomStatus FROM room WHERE roomID = :roomID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return NULL;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row["roomStatus"];
    }
?>