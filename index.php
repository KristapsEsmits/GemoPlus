<?php
include("backend/Auth.php");
require("backend/db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel: Gemo+</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/index.css"/>
    </head>
<body>
    <section>
        <header class="menu">
            <a onClick="Funkcija0()"><img class="logo" src="resources/img/logo.png" alt="logo"></a>
            <div class="btn-panel">
                <a onClick="Funkcija1()"><button class="menu-btn">Preces</button>
                <a onClick="Funkcija4()"><button class="menu-btn">Noliktava</button>
                <button class="menu-btn">-</button>
                <button class="menu-btn">Inventarizācija</button>
                <button class="menu-btn">-</button>
                <?php
                    if ($_SESSION["userlevel"] == 1) {
                        echo "<a onClick=\"Funkcija2()\"><button class=\"menu-btn\">Darbinieki</button></a>";
                        echo "<a onClick=\"Funkcija3()\"><button class=\"menu-btn\">Kategorijas</button0></a>";
                    }
                ?>
            </div>
        </header>
        <div class="panel">
            <a href="backend/logout.php"><button class="exit-btn">Iziet</button></a>
        </div>
        <div class="content">
            <embed id="embed" class="html-embed" type="text/html" src="nothing.php"> 
        </div>
    </section>
    <script src="resources/js/index.js"></script>
</body>
</html>
