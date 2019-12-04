<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Welcome to DreamLand
        </title>
        <style>
            .opacity{ opacity:0.3; filter: alpha(opacity=30); background-color:#000; } 
           // body{
           // background-image:url(video-bg.webm) }
           
            p{
                color: rgb(252, 194, 0);
                font-size: 50px;
                font-family:mv boli;
                background-color: #e5e4d7;
                //margin-left: 300px;
               // margin-right: 250px;
                opacity:0.5; filter: alpha(opacity=30); background-color:#000;
            }
        </style>
    </head>
    <body>
        <video autoplay="" muted="" loop="" poster="" class="c-video-bg js-video-bg">
                <source src="http://s.lolstatic.com/site/taric-comic/db9babd9f498c7a6338b0d276cad89e3431d023d/video/video-bg.webm" type="video/webm">
                <source src="http://s.lolstatic.com/site/taric-comic/db9babd9f498c7a6338b0d276cad89e3431d023d/video/video-bg.mp4" type="video/mp4">
                <img src="http://s.lolstatic.com/site/taric-comic/db9babd9f498c7a6338b0d276cad89e3431d023d/img/video-bg-fallback.jpg" class="u-img-full">
            </video>
    <center>
        <P class="opacity" style="position: absolute;left:700px;top:100px">
            Welcome to DreamLand</p>
        
        <form id="loginform" name="loginfrom" method="post" action="./login.php" style="position: absolute;left:700px;top:200px">
            <p calss="opacity"><label for ="username:">Username:</label>
                <input name="username" type="text" id="username" size="50"/><br />
                <label for ="password:">Password:</label>
                <input name="password" type="password" id="password" size="50"/><br />
        
            <input type="submit" name="login" id="login" value="Enter the dream"/><br/>
        </p>
        </form> 
        
        <form id="registerform" name="registerfrom" method="post" action="./register.php" style="position: absolute;left:850px;top:450px">
            <p><input type="submit" name="register" id="register" value="Join us now"/></p>
         </form>
    </center>
   
        <?php        
        require ("config.php");
        ?>
    </body>
</html>
