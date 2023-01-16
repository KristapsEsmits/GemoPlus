<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['nosaukums'])){
    $nosaukums = stripslashes($_REQUEST['nosaukums']);
	$nosaukums  = mysqli_real_escape_string($con,$nosaukums );

    $query = "INSERT INTO kategorijas (Nosaukums)
    VALUES ('$nosaukums')";
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
    <?php
      if ($_SESSION["userlevel"] == 1) { ?>
        <div class="Fields">
            <button id="add-btn">Pievienot Kategoriju</button>
            <form action="" method="post">
                <div id="add-pop">
                    <input name="nosaukums" type="text" class="input" placeholder="Nosaukums" required>
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
                        <th>Nosaukums</th>
                        <th>Rediģēt</th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM kategorijas";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="table">
                        <td><?php echo $row["Kategorijas_ID"]; ?></td>
                        <td><?php echo $row['Nosaukums']; ?></td>
                        <td><a href="backend/delete.php?Kategorijas_ID=<?php echo $row["Kategorijas_ID"];?>"><button class="dzest1" id='dzest'>Dzēst</button></a><br><a href="editdata.php>"><button class="labot1" id='labot'>Labot</button></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        <script src="resources/js/table.js"></script>
    <?php } else {
            echo "<h1>get rēkt, tev nav pieejas</h1>";
        }
    ?>
</body>
</html>