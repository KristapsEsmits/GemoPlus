<?php
include("../backend/Auth.php");
require("../backend/db_con.php");
include("SimpleXLSXGen.php");

$preces = [
  ["Preces ID", "Preces_nosaukums", "Datums", "Skaits", "Termins", "PVN", "Cena Bez PVN", "Pārdotais daudzums", "Preces kategorija", "Plaukta ID", "Lietotaja ID"]
];

$query = "SELECT * FROM preces";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $row) {
    $preces = array_merge($preces, array(array($row["Preces_ID"], $row["Preces_nosaukums"], $row["Datums"], $row["Skaits"], $row["Termins"], $row["PVN"], $row["Cena_Bez_PVN"], $row["Pārdotais_daudzums"], $row["Preces_kategorija"], $row["Plaukta_ID"], $row["Lietotaja_ID"])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($preces);
$xlsx->downloadAs('Preces.xlsx');
?>