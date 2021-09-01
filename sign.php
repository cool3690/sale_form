<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sign</title>
    <style>
    
    </style>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
<div>
    <button id="displaysign" onclick="start()">點選登入</button>
</div>
<div class="signform" id="signform" style="display: none">
    
    <div class="userdiv">
    <input id="user" class="signinput" type="text" placeholder="mail" name="user" >
    </div>
     <div class="signclose">
        <img src="image/signclose.ico" width="35px" height="35px" onclick="signclose()">
    </div>
    <div class="postdiv">
    <button>確認</button>
    </div>
    <br>
   
</div>



<div class="signform" id="registerform" style="display: none">
        <div class="signclose">
            <img src="image/signclose.ico" width="35px" height="35px" onclick="signclose()">
        </div>
        <div class="userdiv">
            <input  id="registeruser" class="signinput" onblur="loading()" type="text" placeholder="使用者名稱" name="user">
        </div>
   
        <div class="postdiv">
            <button>確認</button>
        </div>
        <br>
      
</div>
</body>
<script src="./jquery-3.2.1.min.js"></script>
<script src="signformchange.js"></script>
</html>