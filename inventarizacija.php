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
    </div>
    <div class="list">
        <div class="tabulaBox">
            <table class="table-sortable" id="trow">
                <thead>
                    <th>Nosaukums</th>
                    <th>Ievešanas datums</th>
                    <th>Termiņš</th>
                    <th style="cursor: default;">Dienas</th>
                    <th>Kategorijas nosaukums</th>
                    <th>Plaukta ID</th>
                    <th>Sektors</th>
                    <th>Stavs</th>
                    <th>Rediģēt</th>
                </thead>
                <?php
                    $query = "SELECT preces.*, TIMESTAMPDIFF(DAY, preces.Datums, preces.Termins) AS Days_left, kategorijas.Nosaukums, preces.Plaukta_ID, noliktava.Sektors, noliktava.Stavs, noliktava.Kategorijas_ID
                    FROM preces
                    LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                    LEFT JOIN noliktava ON preces.Plaukta_ID = noliktava.Plaukta_ID;";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="table">
                    <td><?php echo $row["Preces_nosaukums"]; ?></td>
                    <td><?php echo $row['Datums']; ?></td>
                    <td><?php 
                    if ($row['Termins'] == "0000-00-00") {
                        echo "<i>Beztermiņa</i>";
                    } else {
                        echo $row['Termins'];
                    }
                    ?></td>
                    <td class="<?php 
                 if ($row['Days_left'] > 90) {
                     echo 'green';
                 } elseif ($row['Days_left'] <= 90 && $row['Days_left'] > 30) {
                     echo 'yellow';
                 } elseif ($row['Termins'] != "0000-00-00") {
                     echo 'red';
                 }
                 ?>"><?php if ($row['Termins'] != "0000-00-00") {
                               $days = $row['Days_left'];
                               $years = floor($days / 365);
                               $remainingDays = fmod($days, 365);
                               $months = floor($remainingDays / 30);
                               $remainingDays = fmod($remainingDays, 30);
                               $yearString = ($years % 10 == 1 && $years % 100 != 11) ? "$years gads" : "$years gadi";
                               $monthString = ($months % 10 == 1 && $months % 100 != 11) ? "$months mēnesis" : "$months mēneši";
                               $dayString = ($remainingDays % 10 == 1 && $remainingDays % 100 != 11) ? "$remainingDays diena" : "$remainingDays dienas";
                               echo "{$yearString}, {$monthString}, {$dayString}";
                           } ?></td>
                    <td><?php echo $row['Nosaukums']; ?></td>
                    <td><?php echo $row['Plaukta_ID']; ?></td>
                    <td><?php echo $row['Sektors']; ?></td>
                    <td><?php echo $row['Stavs']; ?></td>
                    <td>
                        <a href="backend/delete.php?Preces_ID=<?php echo $row["Preces_ID"]; ?>"><button class='dzest1'>Dzēst</button></a>
                        <br>
                        <a href="edit/edit-preces.php?preces_id=<?php echo $row["Preces_ID"]; ?>"><button class='labot1'>Labot</button></a></td>
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