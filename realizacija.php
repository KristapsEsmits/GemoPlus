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
        <link rel="stylesheet" href="resources/css/table.css"/>
    </head>
    <body>
        <div class="Fields">
            <button id="add-btn">Meklēt preci</button>
            <form action="" method="post">
                <div id="add-pop">
                    <select class="sinput" id="condition_param" name="filter_param">
                        <option value='starts'>Sākas ar</option>
                        <option value='ends'>Beidzas ar</option>
                        <option value='includes'>Satur</option>
                        <option value="smaller">Mazāks par</option>
                        <option value='smallerequal'>Mazāks vai vienāds ar</option>
                        <option value='equal'>Vienāds ar</option>
                        <option value='biggerequal'>Lielāks vai vienāds ar</option>
                        <option value='bigger'>Lielāks</option>
                    </select>
                    <input id="Preces_ID" name="preces_ID" type="text" class="input" placeholder="ID">
                    <input id="Preces_nosaukums" name="Preces_nosaukums" type="text" class="input" placeholder="Nosaukums" hidden>
                    <label class="ievesana" hidden>Ievešanas datums:</label>
                    <input id="Datums" name="datums" type="date" class="input" placeholder="Ievešanas datums" hidden>
                    <label class="termins" hidden>Termiņš:</label>
                    <input id="Termins" name="termins" type="date" class="input" placeholder="Termiņš" hidden>
                    <input id="Cena_Bez_PVN" name="cena_bez_PVN" type="text" class="input" placeholder="Cena bez PVN" hidden>
                    <select id="PVN" class="sinput" name="pvn_izvele" hidden>
                        <option value="21">21%</option>
                        <option value="12">12%</option>
                        <option value="5">5%</option>
                    </select>
                    <input id="Skaits" name="skaits" type="text" class="input" placeholder="Skaits" hidden>
                    <input id="Pārdotais_daudzums" name="daudzums" type="text" class="input" placeholder="Pārdotais daudzums" hidden>
                    <select id="Kategorijas_ID" class="sinput" name="preces_kategorija" hidden>
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
                    <select id="Lietotaja_ID" class="sinput" name="lietotaja_ID" hidden>
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
                    <select class="sinput" id="filter_param" name="filter_param">
                        <option value="Preces_ID">Preces_ID</option>
                        <option value="Preces_nosaukums">Preces_nosaukums</option>
                        <option value="Datums">Datums</option>
                        <option value="Termins">Termins</option>
                        <option value="Cena_Bez_PVN">Cena_Bez_PVN</option>
                        <option value="PVN">PVN</option>
                        <option value="Skaits">Skaits</option>
                        <option value="Kategorijas_ID">Kategorijas_ID</option>
                        <option value="Pārdotais_daudzums">Pārdotais_daudzums</option>
                        <option value="Lietotaja_ID">Lietotaja_ID</option>
                    </select>
                    <input type="hidden" name="selected_param_value" id="selected_param_value">
                    <input class="btn" id="search-btn" type="submit" value="Meklēt"></input>
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
                            <a href="edit/edit-preces.php?preces_id=<?php echo $row["Preces_ID"]; ?>"><button class='labot1'>Labot</button></a>
                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
        <script src="resources/js/table.js"></script>
        <script src="resources/js/realizacija.js"></script>
    </body>
</html>