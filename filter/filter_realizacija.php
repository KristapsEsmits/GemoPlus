<?php
require('../backend/db_con.php');

$query = "SELECT * FROM preces WHERE 1 ";

if(isset($_POST['preces_ID'])){
    $preces_ID = $_POST['preces_ID'];
    $query .= "AND preces_ID = '$preces_ID'";
}
if(isset($_POST['preces_nosaukums'])){
    $preces_nosaukums = $_POST['preces_nosaukums'];
    $query .= "AND preces_nosaukums = '$preces_nosaukums'";
}
if(isset($_POST['datums'])){
    $datums = $_POST['datums'];
    $query .= "AND datums = '$datums'";
}
if(isset($_POST['termins'])){
    $termins = $_POST['termins'];
    $query .= "AND termins = '$termins'";
}
if(isset($_POST['cena_bez_PVN'])){
    $cena_bez_PVN = $_POST['cena_bez_PVN'];
    $query .= "AND cena_bez_PVN = '$cena_bez_PVN'";
}
if(isset($_POST['pvn_izvele'])){
    $pvn_izvele = $_POST['pvn_izvele'];
    $query .= "AND pvn_izvele = '$pvn_izvele'";
}
if(isset($_POST['skaits'])){
    $skaits = $_POST['skaits'];
    $query .= "AND skaits = '$skaits'";
}
if(isset($_POST['daudzums'])){
    $daudzums = $_POST['daudzums'];
    $query .= "AND daudzums = '$daudzums'";
}
if(isset($_POST['preces_kategorija'])){
    $preces_kategorija = $_POST['preces_kategorija'];
    $query .= "AND preces_kategorija = '$preces_kategorija'";
}
if(isset($_POST['lietotaja_ID'])){
    $lietotaja_ID = $_POST['lietotaja_ID'];
    $query .= "AND lietotaja_ID = '$lietotaja_ID'";
}

$results = mysqli_query($con, $query);

$data = array();

while ($row = mysqli_fetch_assoc($results)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($con);

?>