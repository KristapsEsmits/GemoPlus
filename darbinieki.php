<?php
include 'Auth.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lietotāji</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/darbinieki.css"/>
    </head>
<body>
    <div class="Fields">
        <button id="add-btn">Pievienot Lietotāju</button>
        <div id="add-user">
            <input type="text" class="input" placeholder="Vārds" required>
            <input type="text" class="input" placeholder="Uzvārds" required>
            <input type="tel" class="input" placeholder="Telefona numurs" required>
            <input type="email" class="input" placeholder="Lietotājvārds" required>
            <input type="password" class="input" placeholder="Parole" required>
            <input type="radio" id="html" name="fav_language" value="HTML">
            <label class="txt">Ir Admin</label>
            <input type="radio" id="css" name="fav_language" value="CSS">
            <label class="txt">Nav Admin</label>
            <button class="btn">Pievienot</button>
            <button id="close-btn">Atcelt</button>
        </div>
    </div>
    <div class="list">
    <div class="tabulaBox">
        <table class="tabula">
          <tr class="tabula">
            <th class="teksts">Vārds</th>
            <th class="teksts">Uzvārds</th>
            <th class="teksts">Telefona numurs</th>
            <th class="teksts">Lietotājvārds</th>
            <th class="teksts">Parole</th>
            <th class="teksts">Admin</th>
            <th class="teksts">Darbības</th>
          </tr>
          <tr class="tabula">
              <td class="dbteksts">Armands</td>
              <td class="dbteksts">Liepa</td>
              <td class="dbteksts">25988987</td>
              <td class="dbteksts">Pupsiks</td>
              <td class="dbteksts">qfwwwwwwwfffffffffffffqwqqqq</td>
              <td class="dbteksts">Ne</td>
              <td>
                <a href="roll.html"><button id=dzest>Delete</button></a>
                  <br>
                <a href="roll.html"><button id=labot>Update</button></a>
              </td>
            </tr>
    </div>
    <script src="resources/js/darbinieki.js"></script>
</body>
</html>