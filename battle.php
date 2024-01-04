<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            background-image: url('background/battlebackground.jpg');
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
        #player1PokemonImage{
            position: absolute;
            top:200px;
            width: 300px;
            height: 300px;
        }
        #player2PokemonImage{
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
    <div id="player1PokemonDisplay"></div>
    <img src="Abra.png" id="player1PokemonImage">
    <!-- 顯示 Random ID 的元素 -->
    <div id="player2PokemonDisplay"></div>
    <img src="Dragonite.png" id="player2PokemonImage">
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
        var pokemonData = [];
        var skill = [];
        var type = [];
        var player1Pokemon = null;
        var player2Pokemon = null;
        
        function caculateDamage(){

        }
        function setFirstAttacker(){

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
        function getPlayerPokemon(){
            $.ajax({
                url: "battle_event.php",
                type: "GET",
                data: {
                    operator: "GetPlayerPokemon"
                },
                success: function (result) {
                    console.log(result);
                    var playerPokemon = JSON.parse(result);
                    player1Pokemon = playerPokemon.player1PokemonID;
                    player2Pokemon = playerPokemon.player2PokemonID;
                    console.log(player1Pokemon);
                    console.log(player2Pokemon);
                    $("#player1PokemonDisplay").html(player1Pokemon);
                    $("#player2PokemonDisplay").html(player2Pokemon);
                    $("#player1PokemonImage").attr("src", "pokemon/" + player1Pokemon + ".png");
                    $("#player2PokemonImage").attr("src", "pokemon/" + player2Pokemon + ".png");
                    $("body").show();
                },
                error: function (message) {
                    console.log(message);
                }
            });
        }
        function getData(){
            // get pokemon.json
            $.ajax({
                url: "pokemon.json",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    pokemonData = data;
                    console.log(pokemonData);
                    // get skill.json
                    $.ajax({
                        url: "skill.json",
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            skill = data;
                            console.log(skill);
                            // get type.json
                            $.ajax({
                                url: "type.json",
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    type = data;
                                    getPlayerPokemon();
                                },
                                error: function (jqXHR) {
                                    alert("發生錯誤: " + jqXHR.status);
                                }
                            });                                    
                        },
                        error: function (jqXHR) {
                            alert("發生錯誤: " + jqXHR.status);
                        }
                    });
                },
                error: function (jqXHR) {
                    alert("發生錯誤: " + jqXHR.status);
                }
            });
            

                
        }
        function init(){
            //hide body
            $("body").hide();
            getData();

        }
        init();
        
    </script>
</body>
</html>