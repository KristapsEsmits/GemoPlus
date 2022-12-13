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
            <div id="add-pop">
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
        <div class="tabulaBox">
            <table id="customers">
            <tr class="tabula">
                <th class="teksts">ID</th>
                <th class="teksts">Nosaukums</th>
                <th class="teksts">Datums</th>
                <th class="teksts">Skaits</th>
                <th class="teksts">Termiņš</th>
                <th class="teksts">Cena PVN</th>
                <th class="teksts">Cena Bez PVN</th>
                <th class="teksts">Pārdotais daudzums</th>
                <th class="teksts">Atlikums</th>
                <th class="teksts">Preces kategorija</th>
                <th class="teksts">Lietotāja ID</th>
                <th class="teksts">Rediģēt</th>
            </tr>
            <?php
          $query = "SELECT * FROM preces";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="table">
            <td><?php echo $row["Preces_ID"]; ?></td>
            <td><?php echo $row['Preces_nosaukums']; ?></td>
            <td><?php echo $row['Datums']; ?></td>
            <td><?php echo $row['Skaits']; ?></td>
            <td><?php echo $row['Termins']; ?></td>
            <td><?php echo $row['Cena_PVN']; ?></td>
            <td><?php echo $row['Cena_Bez_PVN']; ?></td>
            <td><?php echo $row['Pārdotais_daudzums']; ?></td>
            <td><?php echo $row['Precu_atlikums']; ?></td>
            <td><?php echo $row['Preces_kategorija']; ?></td>
            <td><?php echo $row['Lietotaja_ID']; ?></td>
            <td><a href="delete.php?Preces_ID=<?php echo $row["Preces_ID"]; ?>"><button id='dzest'>Dzēst</button></a><br><a href="delete.php?userid=<?php echo $row["Preces_ID"]; ?>"><button id='labot'>Labot</button></a></td>
            </tr>
            <?php
            }
          ?>
        </div>
    </div>
</body>
</html>