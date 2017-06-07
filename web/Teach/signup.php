<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>07 Team</title>
    </head>
    <body>
        <div>
            <a href="login.php"><img src="byui-logo.png" alt="byui logo"></a>
        </div>
        <div>
            <h1>PROJECT TITLE: Personal Investments</h1>
            <h2>SIGN-UP: Create your username and password</h2>
        </div>
        <div class="container">
            <form action="signupDB.php" method="POST">
                <label>Username:</label><br>
                <input type="text" name="username"><br />
                <label>Email:</label><br>
                <input type="text" name="email"><br />
                <label>Password:</label><br>
                <input type="password" name="password"><br />
                <input type="submit" name="submit" value="SIGN-UP">
            </form>
        </div>
            
        <hr>

<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    </body>
</html>
