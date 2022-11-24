<?php
include 'Auth.php';
require('db_con.php');
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preces</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/darbinieki.css"/>
    </head>
<body>
    <div class="Fields">
        <input type="text" class="input" placeholder="Vārds" required>
        <input type="text" class="input" placeholder="Uzvārds" required>
        <input type="tel" class="input" placeholder="Telefona numurs" required>
        <input type="email" class="input" placeholder="Lietotājvārds" required>
        <input type="password" class="input" placeholder="Parole" required>
        <input type="radio" id="html" name="fav_language" value="HTML">
        <button class="btn">Pievienot</button>
        <button id="close-btn">Atcelt</button>
    </div>
    <div class="list">
        
    </div>
</body>
</html>