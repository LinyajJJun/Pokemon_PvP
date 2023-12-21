<?php
session_start();
// check if user is logged in 
if (!isset($_SESSION['userID'])) {
    header('location: login.php');
}
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'pokemon');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battle Page</title>
    <style>
        /* 定義血條的樣式 */
        .healthBar {
            width: 20%;
            height: 60px;
            margin: 10px;
            appearance: none;
            border: 5px solid black; /* 添加黑色边框 */
        }
        body {
            background-image: url('battlebackground.jpg');
            background-size: cover;
            background-color: rgba(13, 187, 235, 0.5); /* 設置半透明的背景色 */
            color: #fff; /* 設置文本顏色為白色，以提高可讀性 */
        }
        /* 血條滿時的顏色 */
        .healthBar::-webkit-progress-value {
            background-color: green;
        }

        /* 血條未滿時的顏色 */
        .healthBar::-webkit-progress-bar {
            background-color: red;
        }

        /* 將血條固定在頁面的左上角和右上角 */
        #player1Health {
            position: absolute;
            top: 0;
            left: 0;
        }

        #player2Health {
            position: absolute;
            top: 0;
            right: 0;
        }
        #pokemonIdDisplay {
            position: absolute;
            top: 80px;
            font-size: 30px;
            font-weight: 900;
            color:rgb(81, 17, 232);
        }

        /* 顯示Random ID 的樣式 */
        #randIdDisplay {
            position: absolute;
            top: 80px;
            right: 10px;
            font-size: 30px;
            font-weight: 900;
            color:rgb(81, 17, 232);
        }
        #playerimgDisplay{
            position: absolute;
            top:200px;
            width: 300px;
            height: 300px;
        }
        #ComputerimgDisplay{
            position: absolute;
            top:200px;
            right: 20px;
            width: 300px;
            height: 300px;
        }
        .button-container {
            text-align: center; /* 讓按鈕置中 */
        } 
        button {
            width: 20%;
            height: 100px;
            margin: 20px; /* 5% 的間隔分散在左右兩邊，共10% */
            padding: 10px; /* 可以根據需要調整內邊距 */
            box-sizing: border-box; /* 讓內邊距和邊框不影響元素的寬度計算 */
            position: relative;
            top:700px;
            font-size:20px;
            font-weight: 900;
            background: #eb94d0;
                /* 创建渐变 */
            background-image: -webkit-linear-gradient(top, #eb94d0, #2079b0);
                background-image: -moz-linear-gradient(top, #eb94d0, #2079b0);
                background-image: -ms-linear-gradient(top, #eb94d0, #2079b0);
                background-image: -o-linear-gradient(top, #eb94d0, #2079b0);
                background-image: linear-gradient(to bottom, #eb94d0, #2079b0);
                /* 给按钮添加圆角 */
                -webkit-border-radius: 28;
                -moz-border-radius: 28;
                border-radius: 28px;
                text-shadow: 3px 2px 1px #9daef5;
                -webkit-box-shadow: 6px 5px 24px #666666;
                -moz-box-shadow: 6px 5px 24px #666666;
                box-shadow: 6px 5px 24px #666666;
                font-family: Arial;
                color: #fafafa;
                font-size: 27px;
                padding: 19px;
                text-decoration: none;
        }
        button:hover{
            background: #2079b0;
            background-image: -webkit-linear-gradient(top, #2079b0, #eb94d0);
            background-image: -moz-linear-gradient(top, #2079b0, #eb94d0);
            background-image: -ms-linear-gradient(top, #2079b0, #eb94d0);
            background-image: -o-linear-gradient(top, #2079b0, #eb94d0);
            background-image: linear-gradient(to bottom, #2079b0, #eb94d0);
            text-decoration: none;
        }
            
        #battleLog {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid black;
            overflow: auto;
            max-width: 80%; /* 可根據需要調整最大寬度 */
            max-height: 80%; /* 可根據需要調整最大高度 */
        }
        #battleLog p:nth-child(odd) {
            color: red; /* 奇數行的文字顏色 */
        }
        
        #battleLog p:nth-child(even) {
            color: blue; /* 偶數行的文字顏色 */
        }
        .button-description {
            position: absolute;
            bottom: 0;
            right: 0;
            margin-bottom: 5px; /* 可以根据需要进行调整 */
            margin-right: 5px;  /* 可以根据需要进行调整 */
            color: #555; /* 文字颜色 */
            font-size: 12px; /* 文字大小 */
        }

    </style>
</head>
<body>

    <!-- 血條1 -->
    <progress id="player1Health" class="healthBar" value="100" max="300"></progress>

    <!-- 血條2 -->
    <progress id="player2Health" class="healthBar" value="100" max="300"></progress>
    <div id="pokemonIdDisplay"></div>
    <img src="Abra.png" id="playerimgDisplay">
    <!-- 顯示 Random ID 的元素 -->
    <div id="randIdDisplay"></div>
    <img src="Dragonite.png" id="ComputerimgDisplay">
    <div class="button-container">
        <button id="button1">
            Button1
            <span class="button-description">鋼</span> 
        </button>
        <button id="button2">Button 2</button>
        <button id="button3">Button 3</button>
        <button id="button4">Button 4</button>
    </div>
    <div id="battleLog" style="height: 200px; overflow-y: scroll; color: #e6de45; background-color: #dc8d17; width: 400px; height: 300px;">戰鬥情況-------------------</div>
    
    <script>          
        var userID;
        var player2ID;
        var player1ID;
        var player2PokemonId;
        var player1PokemonId;
        var player2PokemonName;
        var player1PokemonName;
        var player1PokemonHp;
        var player2PokemonHp;
        var player2hp;
        var player1hp;      
        var turn;
        var skills;
        var types;
        
        function init(){
            randomIndex = Math.floor(Math.random() * pokemonData.length); 
            userID = <?php echo $_SESSION['userID']; ?>;
            player2ID = <?php echo $player2Id; ?>;
            player1ID = <?php echo $player1Id; ?>;
            player2PokemonId = <?php echo $player2PokemonId; ?>;
            player1PokemonId = <?php echo $player1PokemonId; ?>;
            player2PokemonName = <?php echo $player2PokemonName; ?>;
            player1PokemonName = <?php echo $player1PokemonName; ?>;
            player2PokemonHp = <?php echo $player2hp; ?>;
            player1PokemonHp = <?php echo $player1hp; ?>;      
            turn = <?php echo $turn; ?>;
            skills = {<?php echo $player1PokemonSkill1; ?>, <?php echo $player1PokemonSkill2; ?>, <?php echo $player1PokemonSkill3; ?>, <?php echo $player1PokemonSkill4; ?>};
            // read types from json
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'types.json', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    types = JSON.parse(xhr.responseText);
                }
            };
        }
        
        // Simulate health bar decrease
        function decreaseHealth(turn, damage) {
            if(turn == player1ID){
                var healthBarId = 'player1Health';
            }
            else{
                var healthBarId = 'player2Health';
            }
            var healthBar = document.getElementById(healthBarId);
            healthBar.value -= damage;
        }
        
        // Get elements for health bars and buttons
        var battleLog = []; // Array to record battle logs
        
        // Get player's skill names
        var selectedPokemon = pokemonData.find(function (pokemon) {
            return pokemon.name === player1PokemonID;
        });
        var computerPokemon = pokemonData.find(function (pokemon) {
            return pokemon.name === player2PokemonID;
        });
        var skillsNames = selectedPokemon.skills.map(function (skillId) {
            var foundSkill = skill.find(function (s) {
                return s.id === skillId;
            });
            return foundSkill ? foundSkill.name : "Unknown Skill";
        });
        

        
        // Update displays
        document.getElementById('pokemonIdDisplay').innerText = 'You: ' + selectedPokemon.chineseName;
        document.getElementById('randIdDisplay').innerText = 'Computer: ' + computerPokemon.chineseName;
        document.getElementById('playerimgDisplay').src = player1PokemonID + '.png';
        document.getElementById('ComputerimgDisplay').src = player2PokemonID + '.png';
        
        // Add button click event listeners
        var buttons = [button1, button2, button3, button4];
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].innerText = skillsNames[i];
        }
        
        var playerTurn = true; 
        var battleOver = false;
        var playerSpeed = selectedPokemon.speed;
        var computerSpeed = computerPokemon.speed;
        var playerGoesFirst = playerSpeed > computerSpeed;
        if (!playerGoesFirst) {
                playerTurn=false;
                setTimeout(computerAttack, 2000);
        }
        
        button1.addEventListener('click', function () {
            if (playerTurn) {
                playerAttack(0);
            }
        });
        
        button2.addEventListener('click', function () {
            if (playerTurn) {
                playerAttack(1);
            }
        });
        
        button3.addEventListener('click', function () {
            if (playerTurn) {
                playerAttack(2);
            }
        });
        
        button4.addEventListener('click', function () {
            if (playerTurn) {
                playerAttack(3);
            }
        });
        
        function healthreset() {
            var playerHealthBar = document.getElementById('player1Health');
            var computerHealthBar = document.getElementById('player2Health');
            playerHealthBar.value = 150 + player1PokemonHp;
            computerHealthBar.value = 150 + player2PokemonHp;
            playerHealthBar.max = 150 + player1PokemonHp;
            computerHealthBar.max = 150 + player2PokemonHp;
        }
        
        function playerAttack(skillIndex) {
            if(turn != userID){
                alert("It's not your turn!");
                return;
            }
            var playerSkill = skills[skillIndex];
            var damage;
            console.log(playerSkill.types);
            var parm = typesparm(playerSkill.types, computerPokemon.types);
            damage = (playerSkill.power * 0.4 + selectedPokemon.attack) * parm - computerPokemon.defense;
            if (damage < 0) {
               damage = selectedPokemon.attack * 0.3;
            }
            decreaseHealth(turn, damage);
            if(userID == player1ID){
                turn = player2ID;
            }
            else if(userID == player2ID){
                turn = player1ID;
            }

            if (userID == player1ID && player2hp <= 0) {
                alert("You win! Congratulations!");
                window.location.href = 'choose.html';
            } 
            else if(userID == player2ID && player1hp <= 0){
                alert("You win! Congratulations!");
                window.location.href = 'choose.html';
            }
            else{
                setTimeout(skipFunc, 2000);
            }
            var effect;
            if (parm == 1 * 1.6 * 1.6) effect = "效果極佳";
            if (parm == 1 * 1.6) effect = "效果不錯";
            if (parm == 1) effect = "效果普通";
            if (parm == 1 / 1.6) effect = "效果不太好";
            if (parm == 1 / 1.6 / 1.6) effect = "效果極差";
            updateBattleLog('You attacked with ' + playerSkill.name + ' and dealt ' + Math.round(damage * 10) / 10 + ' damage. ' + effect);
            battleLog.push('You attacked with ' + playerSkill.name + ' and dealt ' + Math.round(damage * 10) / 10 + ' damage. ' + effect);
        }

        function skipFunc(){
            if(turn == player2ID){
                computerAttack();
            }
        }

        function updateSQL(){
                var player1hp = playerHealthBar.value;
                var player2hp = computerHealthBar.value;
                var turn = playerTurn;
                var roomId = <?php echo $roomId; ?>;
                var player1Id = <?php echo $player1Id; ?>;
                var player2Id = <?php echo $player2Id; ?>;
                var player1PokemonId = <?php echo $player1PokemonId; ?>;
                var player2PokemonId = <?php echo $player2PokemonId; ?>;
                var player1PokemonName = <?php echo $player1PokemonName; ?>;
                var player2PokemonName = <?php echo $player2PokemonName; ?>;
                var query = "UPDATE game_rooms SET player1Health = $player1hp, player2Health = $player2hp, turn = $turn WHERE roomID = $roomId";
                $db->query($query);
        }

        
        function updateBattleLog(message) {
            var battleLogDiv = document.getElementById('battleLog');
            var logEntry = document.createElement('p');
            logEntry.innerText = message;
            battleLogDiv.appendChild(logEntry);
            battleLogDiv.scrollTop = battleLogDiv.scrollHeight; // Auto-scroll to the bottom
        }
        
        function typesparm(attackTypes, defenseTypes) {
            var parm = 1;
            var attackTypes = skills.find(function (s) {
                return s.name == attackTypes;
            });
            if (defenseTypes.length > 1) {
                var defenseTypes1 = skills.find(function (s) {
                    return s.name == defenseTypes[0];
                });
                var defenseTypes2 = skills.find(function (s) {
                    return s.name == defenseTypes[1];
                });
                if (attackTypes.counter.includes(defenseTypes1.name)) {
                    parm *= 1.6;
                }
                if (attackTypes.counter.includes(defenseTypes2.name)) {
                    parm *= 1.6;
                }
                if (defenseTypes1.resistance.includes(attackTypes.name)) {
                    parm /= 1.6;
                }
                if (defenseTypes2.resistance.includes(attackTypes.name)) {
                    parm /= 1.6;
                }
            }
            console.log(defenseTypes);
            if (defenseTypes.length == 1) {
                var defenseTypes1 = skills.find(function (s) {
                    return s.name == defenseTypes;
                });
                if (attackTypes.counter.includes(defenseTypes1.name)) {
                    parm *= 1.6;
                }
                if (defenseTypes1.resistance.includes(attackTypes.name)) {
                    parm /= 1.6;
                }
            }
            console.log(parm);
            return parm;
        }


        healthreset();

        init();
    </script>
</body>
</html>
<?php

// update function
function update($db, $query){
    $result = $db->query($query);
    if($result){
        echo "Update successfully";
    }
    else{
        echo "Update failed";
    }
}


$roomId = $_GET['roomId']; 
$query = "SELECT * FROM game_rooms WHERE roomID = $roomId";
$result = $db->query($query);
$roomData = $result->fetch_assoc();

$player1Id = $roomData['player1ID'];
$player2Id = $roomData['player2ID'];
$player1hp = $roomData['player1Health'];
$player2hp = $roomData['player2Health'];
$player1PokemonId = $roomData['player1Pokemon'];
$player2PokemonId = $roomData['player2Pokemon'];
$turn = $roomData['turn'];

$query = "SELECT * FROM players WHERE userID = $player1Id";
$result = $db->query($query);
$player1Data = $result->fetch_assoc();
$player1Name = $player1Data['userName'];

$query = "SELECT * FROM players WHERE userID = $player2Id";
$result = $db->query($query);
$player2Data = $result->fetch_assoc();
$player2Name = $player2Data['userName'];


$query = "SELECT * FROM pokemon WHERE id = $player1PokemonId";
$result = $db->query($query);
$player1PokemonData = $result->fetch_assoc();
$player1PokemonSkill1 = $player1PokemonData['skill1'];
$player1PokemonSkill2 = $player1PokemonData['skill2'];
$player1PokemonSkill3 = $player1PokemonData['skill3'];
$player1PokemonSkill4 = $player1PokemonData['skill4'];
$player1PokemonName = $player1PokemonData['name'];


$query = "SELECT * FROM pokemon WHERE id = $player2PokemonId";
$result = $db->query($query);
$player2PokemonData = $result->fetch_assoc();
$player2PokemonSkill1 = $player2PokemonData['skill1'];
$player2PokemonSkill2 = $player2PokemonData['skill2'];
$player2PokemonSkill3 = $player2PokemonData['skill3'];
$player2PokemonSkill4 = $player2PokemonData['skill4'];
$player2PokemonName = $player2PokemonData['name'];
?>