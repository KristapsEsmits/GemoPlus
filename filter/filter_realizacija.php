<?php
require('../backend/db_con.php');

$query = "SELECT * FROM preces WHERE 1 ";

if(isset($_POST['preces_ID'])){
    $preces_ID = $_POST['preces_ID'];
    $query .= "AND Preces_ID = '$preces_ID'";
}
if(isset($_POST['preces_nosaukums'])){
    $preces_nosaukums = $_POST['preces_nosaukums'];
    $query .= "AND Preces_nosaukums = '$preces_nosaukums'";
}
if(isset($_POST['datums'])){
    $datums = $_POST['datums'];
    $query .= "AND datums = '$datums'";
}
if(isset($_POST['termins'])){
    $termins = $_POST['termins'];
    $query .= "AND Termins = '$termins'";
}
if(isset($_POST['cena_bez_PVN'])){
    $cena_bez_PVN = $_POST['cena_bez_PVN'];
    $query .= "AND Cena_Bez_PVN = '$cena_bez_PVN'";
}
if(isset($_POST['pvn_izvele'])){
    $pvn_izvele = $_POST['pvn_izvele'];
    $query .= "AND PVN = '$pvn_izvele'";
}
if(isset($_POST['skaits'])){
    $skaits = $_POST['skaits'];
    $query .= "AND Skaits = '$skaits'";
}
if(isset($_POST['daudzums'])){
    $daudzums = $_POST['daudzums'];
    $query .= "AND Pārdotais_daudzums = '$daudzums'";
}
if(isset($_POST['preces_kategorija'])){
    $preces_kategorija = $_POST['preces_kategorija'];
    $query .= "AND Preces_kategorija = '$preces_kategorija'";
}
if(isset($_POST['lietotaja_ID'])){
    $lietotaja_ID = $_POST['lietotaja_ID'];
    $query .= "AND Lietotaja_ID = '$lietotaja_ID'";
}

$results = mysqli_query($con, $query);

$data = array();

while ($row = mysqli_fetch_assoc($results)) {
    echo $query;
    echo $data;
}

echo json_encode($data);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Realizācija</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/table.css"/>
    </head>
<body>
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
                    <td><a href="backend/delete.php?Preces_ID=<?php echo $row["Preces_ID"]; ?>"><button class='dzest'>Dzēst</button></a><br><a href="backend/delete.php?userid=<?php echo $row["Preces_ID"]; ?>"><button class='labot'>Labot</button></a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <script src="../resources/js/table.js"></script>
</body>
</html>