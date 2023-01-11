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
        <title>News</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/nothing.css"/>
    </head>
<body>
    <h1 class="virsraksts">Izmēģiniet mūsu lietotnes</h1>
    <h1 class="subvirsraksts">Iegūsti jaunākos atjauninajumus un labāku pieredzi izmantojot kādu no mūsu aplikācijām!</h1>
    <div class="pc">
        <h2>Download for PC:</h2>
    </div>
    <a href="https://drive.google.com/uc?export=download&id=1tccWMVvatjucFSWpTJNhMvHCIap6cvYP" target="_blank" rel="noopener noreferrer">
        <button class="exebtn" id="exebtn1"><span>Download</span></button>
    </a>
    <div class="phone">
        <h2>Download Android:</h2>
    </div>
    <a href="https://drive.google.com/uc?export=download&id=1tccWMVvatjucFSWpTJNhMvHCIap6cvYP" target="_blank" rel="noopener noreferrer">
        <button class="exebtn" id="exebtn2"><span>Download</span></button>
    </a>
</body>
</html>