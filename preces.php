<?php
include 'backend/Auth.php';
require('backend/db_con.php');
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
        <button id="add-btn">Pievienot Preci</button>
        <form action="" method="post">
            <div id="add-prece">
                <!--Pagaidu-->
                <input name="" type="text" class="input" placeholder="Nosaukums" required>
                <input name="" type="date" class="input" placeholder="Datums" required>
                <input name="" type="tel" class="input" placeholder="Skaits" required>
                <input name="" type="text" class="input" placeholder="Termiņš" required>
                <input name="" type="password" class="input" placeholder="Cena PVN" required>
                <input name="" type="password" class="input" placeholder="Cena Bez PVN" required>
                <input name="" type="password" class="input" placeholder="Pārdotais daudzums" required>
                <input name="" type="password" class="input" placeholder="Atlikums" required>
                <!--dropdown kategorija-->
                <!--kurš pievienoja-->
                <input class="btn" name=submit type="submit" value="Pievienot">
                <button id="close-btn">Atcelt</button>
            </div>
        </form>
    </div>
    <div class="list">
        
    </div>
</body>
</html>