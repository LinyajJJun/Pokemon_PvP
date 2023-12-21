<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-image: url('login.png');
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #loginButton {
      background-color: #4CAF50; /* Green background */
      border: none; /* Remove borders */
      color: white; /* White text */
      padding: 15px 32px; /* Some padding */
      text-align: center; /* Center text */
      text-decoration: none; /* Remove underline */
      display: inline-block;
      font-size: 30px; /* Set a font size */
      margin: 30% 2px 0; /* Adjusted margin (top 20px) */
      cursor: pointer; /* Add a pointer cursor on hover */
      border-radius: 8px; /* Rounded corners */
      transition: background-color 0.3s; /* Add a transition effect */
      width: 18%;
      height: 10%;
    }

    #loginButton:hover {
      background-color: #3b4af6; /* Darker green on hover */
    }
  </style>
  <script>
    function redirectToChoosePage() {
      // 跳轉到 choose.html 文件
      window.location.href = 'choose.html';
    }
  </script>
</head>
<body>
    <button id="loginButton" onclick="redirectToChoosePage()">Enter</button>
</body>
</html>
