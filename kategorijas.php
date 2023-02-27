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
            <form action="eksports/export-kat.php" method="post">
                <button type="submit" name="submit" alt="Eksportēt preces" class="eksport_poga">
                    <svg  class="eksport_poga" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/>
                    </svg>
                </button>
            </form>
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
                        <td><a href="backend/delete.php?Kategorijas_ID=<?php echo $row["Kategorijas_ID"];?>"><button class="dzest1" id='dzest'>Dzēst</button></a><br><a href="edit/edit-kategorija.php?kategorijas_id=<?php echo $row["Kategorijas_ID"]; ?>"><button class="labot1" id='labot'>Labot</button></a></td>
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