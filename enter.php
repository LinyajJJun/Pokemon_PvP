<?php
session_start();  //很重要，可以用的變數存在session裡
$username=$_SESSION["username"];
$id = $_SESSION["id"];
echo "<h1>你好 ".$username."</h1>";
echo "<h1>你的ID是 ".$id."</h1>";


?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-image: url('background/login.png');
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #loginButton {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 30px;
      margin: 30% 2px 0;
      cursor: pointer;
      border-radius: 8px;
      transition: background-color 0.3s;
      width: 18%;
      height: 10%;
    }

    #logoutButton {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 30px;
      margin: 2% 2px 0;
      cursor: pointer;
      border-radius: 8px;
      transition: background-color 0.3s;
      width: 18%;
      height: 10%;
      position: absolute;
      right: 20px;
      top: 20px;
    }
    #createRoomButton {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 30px;
      margin: 30% 2px 0;
      cursor: pointer;
      border-radius: 8px;
      transition: background-color 0.3s;
      width: 18%;
      height: 10%;
    }
    #loginButton:hover {
      background-color: #3b4af6;
    }
  </style>
  <script>
    function redirectToChoosePage() {
      // 跳轉到 choose.html 文件
      window.location.href = 'choose.html';
    }
    function redirectToindexPage() {
      // 跳轉到 choose.html 文件
      window.location.href = 'logout.php';
    }

    function createRoomButtom() {
      window.location.href = 'create_room.php';
    }

    function joinRoomButtom() {
      roomID = prompt("請輸入房間號碼");
      window.location.href = 'join_room.php?roomID=' + roomID;
      

    }
  </script>
</head>
<body>
    <button id="loginButton" onclick="redirectToChoosePage()">Enter</button>
    <button id="createRoomButton" onclick="createRoomButtom()">Create Room</button>
    <button id="createRoomButton" onclick="joinRoomButtom()">Join Room</button>
    <button id="logoutButton" onclick="redirectToindexPage()">登出</button>
</body>
</html>
