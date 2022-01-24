<!DOCTYPE html>
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
		header("Location:login.php");
        ?>
        <div id="user_logout" class="box-content">
            <h1>Log out successful</h1>
             <a href="index3.php">Back to Home Page</a><br>
            <a href="login.php">Re-Log in</a>
        </div>
    </body>
</html>