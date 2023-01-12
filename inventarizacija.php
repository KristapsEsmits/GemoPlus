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
        <title>Inventarizācija</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/table.css"/>
    </head>
<body>
    <div class="Fields">
        <button id="add-btn">Pievienot Preci</button>
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
                        <a href="backend/delete.php?Preces_ID=<?php echo $row["Preces_ID"]; ?>"><button class='dzest'>Dzēst</button></a>
                        <br>
                        <a href="edit/edit-preces.php?preces_id=<?php echo $row["Preces_ID"]; ?>"><button class='labot'>Labot</button></a></td>
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