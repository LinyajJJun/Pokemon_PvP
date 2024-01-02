<!DOCTYPE html>
<html lang="en">

<?php
require_once("config.php");
session_start();
$userID = $_SESSION["id"];
// echo $userID;
$roomID = $_SESSION["roomID"];

?>

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>玩家信息</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #ffffff;
        }

        .background-container {
            background-image: url("background/menu.png");
            background-size: cover;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .player-container {
            text-align: center;
            background-color: #b5eef9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* 添加陰影效果 */
            width: 60%;
            /* 調整容器寬度 */
            height: 45%;
        }

        .player {
            display: inline-block;
            margin: 100px;
        }

        .player img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 30px;
            /* 向上調整圖片位置 */
        }

        .player-info {
            margin-top: -80px;
            /* 向上調整 Player ID 位置 */
        }

        .status-text {
            margin-top: 10px;
            background-color: #e0e0e0;
            /* 背景區隔顏色 */
            padding: 10px;
            border-radius: 5px;
        }

        .button-container {
            margin-top: 20px;
        }

        #player1start {
            display: none;
            position: absolute;
            bottom: 300px;
            right: 280px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        #player2ready {
            display: none;
            position: absolute;
            bottom: 230px;
            right: 400px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        #player2cancelready {
            display: none;
            position: absolute;
            bottom: 230px;
            right: 280px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        button {
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

        button:hover {
            background: #2079b0;
            background-image: -webkit-linear-gradient(top, #2079b0, #eb94d0);
            background-image: -moz-linear-gradient(top, #2079b0, #eb94d0);
            background-image: -ms-linear-gradient(top, #2079b0, #eb94d0);
            background-image: -o-linear-gradient(top, #2079b0, #eb94d0);
            background-image: linear-gradient(to bottom, #2079b0, #eb94d0);
            text-decoration: none;
        }

        .status-text {
            position: absolute;
            width: 110px;
            height: 30px;
            right: 480px;
            bottom: 350px;
        }
    </style>
</head>

<body>
    <div class="background-container"></div>
    <div class="player-container">
        <div class="player" id="player1">
            <div class="player-info"></div>
            <img src="" alt="Player 1">
        </div>
        <div class="player" id="player2">
            <div class="player-info"></div>
            <img src="" alt="Player 2">
        </div>
        <div class="status-text">未準備</div>
        <button id="player1start">開始</button>
        <button id="player2ready">準備</button>
        <button id="player2cancelready">取消準備</button>
        <button id="showButtons">顯示隱藏buttons</button>
    </div>
    <script>
        // 你的圖片文件
        const images = ['background/picture1.jpg', 'background/picture2.jpg', 'background/picture3.jpg', 'background/picture4.jpg'];

        // 隨機選擇圖片
        function getRandomImage() {
            return images[Math.floor(Math.random() * images.length)];
        }

        // 設定玩家信息
        function setPlayerInfo(playerId, playerElement) {
            const playerImage = getRandomImage();
            const playerInfoElement = playerElement.querySelector('.player-info');

            // 設定玩家ID
            playerInfoElement.textContent = `Player ID: ${playerId}`;

            // 設定圖片
            playerElement.querySelector('img').src = playerImage;
        }

        // 設定兩個玩家的信息
        setPlayerInfo(1, document.getElementById('player1'));
        setPlayerInfo(2, document.getElementById('player2'));

        // 開始遊戲的函數
        function startGame() {
            alert('游戏开始！');
            // 在這裡可以添加進一步的遊戲開始相關邏輯
        }

        // 准备的函數
        function prepare() {
            alert('玩家准备！');
            // 在這裡可以添加進一步的准备相關邏輯
        }

        // 取消准备的函數
        function cancelPrepare() {
            alert('取消准备！');
            // 在這裡可以添加進一步的取消准备相關邏輯
        }
        document.getElementById('showButtons').addEventListener('click', function () {
            document.getElementById('player1start').style.display = 'inline-block';
            document.getElementById('player2ready').style.display = 'inline-block';
            document.getElementById('player2cancelready').style.display = 'inline-block';
        });
    </script>
    <script>
        var interval = null;
        /*
        [
            "roomID" => $roomID,
            "player1ID" => $player1ID,
            "player2ID" => $player2ID,
            "player1Name" => $player1Name,
            "player2Name" => $player2Name,
            "player1Status" => $player1Status,
            "player2Status" => $player2Status
        ];  
        */
        function getPlayerInfo() {
            // room.php 會回傳一個 JSON 格式的字串
            // 裡面包含了兩個玩家的狀態
            // GET 參數為 room_id
            console.log("getPlayerInfo");
            $.ajax({
                url: "get_room_player_info.php",
                type: "GET",
                data: {
                    roomID: "<?php echo $roomID; ?>"
                },
                success: function (response) {
                    console.log(response);
                    // 將 JSON 格式的字串轉換成 JavaScript 的物件
                    const playerInfo = JSON.parse(response);
                    console.log(playerInfo);
                    // // 更新玩家1的狀態
                    // document.getElementById('player1').querySelector('.status-text').textContent = playerInfo.player1Status;
                    // // 更新玩家2的狀態
                    // document.getElementById('player2').querySelector('.status-text').textContent = playerInfo.player2Status;
                    // // 如果兩個玩家都準備好了，就開始遊戲
                    // if (playerInfo.player1Status === '準備好了' && playerInfo.player2Status === '準備好了') {
                    //     startGame();
                    // }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            

            });
        }

        // 一秒執行一次
        interval = setInterval(function () {
            getPlayerInfo();
        }, 1000);
    </script>
</body>

</html>