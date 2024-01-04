<?php
    require_once("config.php");
    session_start();
    $userID = $_SESSION["id"];
    $roomID = $_SESSION["roomID"];
    $operator = $_GET["operator"];
if($operator == "GetPlayerPokemon"){
    getPlayerPokemon($db, $roomID);
}
/*
room(roomID, player1ID, player2ID,
    turn, effect, skills, damage, statu)
player(playerID, playerHp, playerPokemon, playerStatus)
*/
    function getPlayerPokemon($db, $roomID){
        $sql = 
        "SELECT 
            player1.playerPokemon AS player1Pokemon,
            player2.playerPokemon AS player2Pokemon
        FROM 
        room
        JOIN 
        player AS player1 ON room.player1ID = player1.playerID
        JOIN 
        player AS player2 ON room.player2ID = player2.playerID
        WHERE 
        room.roomID = :roomID;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':roomID', $roomID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $player1PokemonID = $row["player1Pokemon"];
        $player2PokemonID = $row["player2Pokemon"];
        // to JSON
        $result = [
            "player1PokemonID" => $player1PokemonID,
            "player2PokemonID" => $player2PokemonID
        ];
        echo json_encode($result);
    }


?>