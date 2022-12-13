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
        <button id="add-btn">Pievienot atrašanās vietu</button>
        <form action="" method="post">
            <div id="add-pop">
                <input name="" type="text" class="input" placeholder="Sektors" required>
                <input name="" type="text" class="input" placeholder="Stāvs" required>
                <!--dropdown kur izvēlās preces_nr-->
                <button id="close-btn">Atcelt</button>
            </div>
        </form>
    </div>
    <div class="list">
        <div class="tabulaBox">
            <table id="customers">
            <tr class="tabula">
                <th class="teksts">ID</th>
                <th class="teksts">Sektors</th>
                <th class="teksts">Stāvs</th>
                <th class="teksts">Preces_NR</th>
                <th class="teksts">Rediģēt</th>
            </tr>
            <?php
          $query = "SELECT * FROM noliktava";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="table">
            <td><?php echo $row["Plaukta_ID"]; ?></td>
            <td><?php echo $row['Sektors']; ?></td>
            <td><?php echo $row['Stavs']; ?></td>
            <td><?php echo $row['Preces_NR']; ?></td>
            <td><a href="delete.php?Plaukta_ID=<?php echo $row["Plaukta_ID"]; ?>"><button id='dzest'>Dzēst</button></a><br><a href="delete.php?userid=<?php echo $row["Plaukta_ID"]; ?>"><button id='labot'>Labot</button></a></td>
            </tr>
            <?php
            }
          ?>
        </div>
    </div>
    <script src="resources/js/darbinieki.js"></script>
</body>
</html>