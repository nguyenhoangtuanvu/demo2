<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Log out account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #user_logout form{
                width: 200px;
                margin: 40px auto;
            }
            #user_logout form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        $_SESSION[] =  array();
		session_destroy();
		header("Location:index3.php");
        ?>
        <div id="user_logout" class="box-content">
            <h1>Log out successful</h1>
            <a href="(admin)login.php">Log in again</a>
        </div>
    </body>
</html>
