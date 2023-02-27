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

    $cena_bez_PVN = stripslashes($_REQUEST['cena_bez_PVN']);
	$cena_bez_PVN  = mysqli_real_escape_string($con,$cena_bez_PVN );

    $PVN_izvele = stripslashes($_REQUEST['pvn_izvele']);
    $PVN_izvele = mysqli_real_escape_string($con,$PVN_izvele );

    $skaits = stripslashes($_REQUEST['skaits']);
	$skaits = mysqli_real_escape_string($con,$skaits );

    $daudzums = stripslashes($_REQUEST['daudzums']);
	$daudzums  = mysqli_real_escape_string($con,$daudzums );

    $preces_kategorija = ($_REQUEST['preces_kategorija']);

    $plaukta_id = ($_REQUEST['plaukta_id']);

    $lietotaja_ID = ($_SESSION['userid']);

    $query = "INSERT INTO preces (Preces_nosaukums, Datums, Termins, Cena_Bez_PVN, PVN, Skaits, Pārdotais_daudzums, Preces_kategorija, Plaukta_ID, Lietotaja_ID)
    VALUES ('$preces_nosaukums','$datums','$termins','$cena_bez_PVN','$PVN_izvele','$skaits','$daudzums','$preces_kategorija','$plaukta_id','$lietotaja_ID')";
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
        <button id="add-btn">Pievienot Preci</button>
        <form action="eksports/export-preces.php" method="post">
            <button type="submit" name="submit" alt="Eksportēt preces" class="eksport_poga">
                <svg  class="eksport_poga" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/></svg>
            </button>
        </form>
        <form action="" method="post">
            <div id="add-pop">
                <input name="preces_nosaukums" type="text" class="input" placeholder="Nosaukums" required>
                <label class="ievesana">Ievešanas datums:</label>
                <input name="datums" type="date" class="input" placeholder="Ievešanas datums" value="Ievešanas datums" required>
                <label class="termins">Termiņš:</label>
                <input name="termins" type="date" class="input" placeholder="Termiņš">
                <input name="cena_bez_PVN" type="text" class="input" placeholder="Cena bez PVN" required>
                <select class="sinput" name="pvn_izvele">
                    <option value="21">21%</option>
                    <option value="12">12%</option>
                    <option value="5">5%</option>
                </select>
                <input name="skaits" type="text" class="input" placeholder="Skaits" required>
                <input name="daudzums" type="text" class="input" placeholder="Pārdotais daudzums" required>
                <select class="sinput" name="preces_kategorija">
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
                <select class="sinput" name="plaukta_id">
                    <?php
                        $query = "SELECT * FROM noliktava
                                  LEFT JOIN kategorijas
                                         ON kategorijas.Kategorijas_ID = noliktava.Kategorijas_ID";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="plaukta_nr" value="<?php echo $row["Plaukta_ID"]; ?>"><?php echo "Plaukts ar ID " . $row["Plaukta_ID"] . ", sektors " . $row["Sektors"] . ", stāvs " . $row["Stavs"] . ", kategorija " . $row["Nosaukums"]; ?></option>
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
                    <th>Nosaukums</th>
                    <th>Ievešanas datums</th>
                    <th>Termiņš</th>
                    <th>Cena Bez PVN</th>
                    <th>Cena PVN</th>
                    <th>Skaits</th>
                    <th>Pārdotais daudzums</th>
                    <th>Atlikums</th>
                    <th>Preces kategorija</th>
                    <th>Lietotāja ID</th>
                    <th>Rediģēt</th>
                </thead>
                <?php
                    $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                              LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="table">
                    <td><?php echo $row["Preces_ID"]; ?></td>
                    <td><?php echo $row['Preces_nosaukums']; ?></td>
                    <td><?php echo $row['Datums']; ?></td>
                    <td><?php 
                    if ($row['Termins'] == "0000-00-00") {
                        echo "<i>Beztermiņa</i>";
                    } else {
                        echo $row['Termins'];
                    }
                    ?></td>
                    <td><?php echo $row['Cena_Bez_PVN']; ?></td>
                    <td><?php echo $row['Cena_PVN']; ?></td>
                    <td><?php echo $row['Skaits']; ?></td>
                    <td><?php echo $row['Pārdotais_daudzums']; ?></td>
                    <td><?php echo $row['Precu_atlikums']; ?></td>
                    <td><?php echo $row['Nosaukums']; ?></td>
                    <td><?php echo $row['Lietotaja_ID']; ?></td>
                    <td>
                        <a href="backend/delete.php?Preces_ID=<?php echo $row["Preces_ID"]; ?>"><button class='dzest1' class='dzest'>Dzēst</button></a>
                        <br>
                        <a href="edit/edit-preces.php?preces_id=<?php echo $row["Preces_ID"]; ?>"><button class='labot1' class='labot'>Labot</button></a></td>
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