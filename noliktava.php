<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['sektors'])){
    $sektors = stripslashes($_REQUEST['sektors']);
	$sektors  = mysqli_real_escape_string($con,$sektors );

    $stavs = stripslashes($_REQUEST['stavs']);
	$stavs  = mysqli_real_escape_string($con,$stavs );

    $kategorijas_ID = ($_REQUEST['kategorijas_ID']);

    $query = "INSERT INTO noliktava (Sektors,Stavs,Kategorijas_ID)
    VALUES ('$sektors','$stavs','$kategorijas_ID')";
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
        <link rel="stylesheet" href="resources/css/table.css"/>
    </head>
<body>
    <div class="Fields">
        <button id="add-btn">Pievienot atrašanās vietu</button>
        <form action="" method="post">
            <div id="add-pop">
                <input name="sektors" type="number" class="input" placeholder="Sektors" required>
                <input name="stavs" type="number" class="input" placeholder="Stāvs" required>
                <select class="sinput" name="kategorijas_ID">
                    <?php
                        $query = "SELECT Kategorijas_ID, Nosaukums FROM kategorijas";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="kategorijas_ID" value=<?php echo $row["Kategorijas_ID"]; ?>><?php echo $row["Nosaukums"]; ?></option>
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
            <table class="table-sortable" id="trow">
                <thead>
                    <th>ID</th>
                    <th>Sektors</th>
                    <th>Stāvs</th>
                    <th>Kategorijas_Nosaukums</th>
                    <th>Rediģēt</th>
                </thead>
                <?php
                    $query = "SELECT noliktava.Plaukta_ID, noliktava.Sektors, noliktava.Stavs, kategorijas.Nosaukums FROM noliktava
                              LEFT JOIN kategorijas
                                     ON noliktava.Kategorijas_ID = kategorijas.Kategorijas_ID";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="table">
                    <td><?php echo $row["Plaukta_ID"]; ?></td>
                    <td><?php echo $row['Sektors']; ?></td>
                    <td><?php echo $row['Stavs']; ?></td>
                    <td><?php echo $row['Nosaukums']; ?></td>
                    <td><a href="backend/delete.php?Plaukta_ID=<?php echo $row["Plaukta_ID"]; ?>"><button class="dzest1" id='dzest'>Dzēst</button></a><br><a href="backend/delete.php?userid=<?php echo $row["Plaukta_ID"]; ?>"><button class="labot1" id='labot'>Labot</button></a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <script src="resources/js/table.js"></script>
</body>
</html>