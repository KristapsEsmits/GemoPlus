<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['preces_nosaukums'])){
    $preces_nosaukums = stripslashes($_REQUEST['preces_nosaukums']);
	$preces_nosaukums = mysqli_real_escape_string($con,$preces_nosaukums );

    $datums = stripslashes($_REQUEST['datums']);
	$datums  = mysqli_real_escape_string($con,$datums );

    $termins = stripslashes($_REQUEST['termins']);
	$termins  = mysqli_real_escape_string($con,$termins );

    $cena_PVN = stripslashes($_REQUEST['cena_PVN']);
	$cena_PVN  = mysqli_real_escape_string($con,$cena_PVN );

    $skaits = stripslashes($_REQUEST['skaits']);
	$skaits = mysqli_real_escape_string($con,$skaits );

    $daudzums = stripslashes($_REQUEST['daudzums']);
	$daudzums  = mysqli_real_escape_string($con,$daudzums );

    $preces_kategorija = ($_REQUEST['preces_kategorija']);

    $lietotaja_ID = ($_REQUEST['lietotaja_ID']);

    $query = "INSERT INTO preces (Preces_nosaukums, Datums, Termins, Cena_PVN, Skaits, Pārdotais_daudzums, Preces_kategorija, Lietotaja_ID)
    VALUES ('$preces_nosaukums','$datums','$termins','$cena_PVN','$skaits','$daudzums','$preces_kategorija','$lietotaja_ID')";
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
        <button id="add-btn">Pievienot Preci</button>
        <form action="" method="post">
            <div id="add-pop">
                <!--Pagaidu-->
                <input name="preces_nosaukums" type="text" class="input" placeholder="Nosaukums" required>
                <input name="datums" type="date" class="input" placeholder="Ievešanas datums" required>
                <input name="termins" type="date" class="input" placeholder="Termiņš" required>
                <input name="cena_PVN" type="text" class="input" placeholder="Cena PVN" required>
                <!--Bez pvn aprēķins-->
                <input name="skaits" type="text" class="input" placeholder="Skaits" required>
                <input name="daudzums" type="text" class="input" placeholder="Pārdotais daudzums" required>
                <!--Atlikuma aprēķins-->
                <select name="preces_kategorija">
                    <?php
                        $query = "SELECT * FROM kategorijas";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="preces_NR" value=<?php echo $row["Kategorijas_ID"]; ?>><?php echo $row["Nosaukums"]; ?></option>
                        <?php
                        }
                    ?>
                </select>
                <select name="lietotaja_ID">
                    <?php
                        $query = "SELECT Lietotaja_ID, Lietotajvards FROM lietotaji";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="preces_NR" value=<?php echo $row["Lietotaja_ID"]; ?>><?php echo $row["Lietotajvards"]; ?></option>
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
                <th class="teksts">Nosaukums</th>
                <th class="teksts">Ievešanas datums</th>
                <th class="teksts">Termiņš</th>
                <th class="teksts">Cena PVN</th>
                <th class="teksts">Cena Bez PVN</th>
                <th class="teksts">Skaits</th>
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
            <td><?php echo $row['Termins']; ?></td>
            <td><?php echo $row['Cena_PVN']; ?></td>
            <td><?php echo $row['Cena_Bez_PVN']; ?></td>
            <td><?php echo $row['Skaits']; ?></td>
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
    <script src="resources/js/darbinieki.js"></script>
</body>
</html>