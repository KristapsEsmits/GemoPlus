<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['sektors'])){
    $sektors = stripslashes($_REQUEST['sektors']);
	$sektors  = mysqli_real_escape_string($con,$sektors );

    $stavs = stripslashes($_REQUEST['stavs']);
	$stavs  = mysqli_real_escape_string($con,$stavs );

    $preces_NR = ($_REQUEST['preces_NR']);

    $query = "INSERT INTO noliktava (Sektors,Stavs,Preces_NR)
    VALUES ('$sektors','$stavs','$preces_NR')";
    $result = mysqli_query($con,$query);

    if($result){
        echo("<h1 id='veiksmigi'>Veiksmīgi pievienots!</h1>");
    }
}
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
                <input name="sektors" type="number" class="input" placeholder="Sektors" required>
                <input name="stavs" type="number" class="input" placeholder="Stāvs" required>
              
                <select name="preces_NR">
                    <?php
                        $query = "SELECT Preces_ID, Preces_nosaukums FROM preces";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="preces_NR" value=<?php echo $row["Preces_ID"]; ?>><?php echo $row["Preces_nosaukums"]; ?></option>
                        <?php
                        }
                    ?>
                </select>
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
            <td><a href="backend/delete.php?Plaukta_ID=<?php echo $row["Plaukta_ID"]; ?>"><button id='dzest'>Dzēst</button></a><br><a href="backend/delete.php?userid=<?php echo $row["Plaukta_ID"]; ?>"><button id='labot'>Labot</button></a></td>
            </tr>
            <?php
            }
          ?>
        </div>
    </div>
    <script src="resources/js/darbinieki.js"></script>
</body>
</html>