<?php
include("../backend/Auth.php");
require("../backend/db_con.php");
include("SimpleXLSXGen.php");

$noliktava = [
  ['Plaukta_ID', 'Sektors', 'Stavs', 'Kategorijas_ID']
];

$query = "SELECT * FROM noliktava";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $row) {
    $noliktava = array_merge($noliktava, array(array($row['Plaukta_ID'], $row['Sektors'], $row['Stavs'], $row['Kategorijas_ID'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($noliktava);
$xlsx->downloadAs('Noliktava.xlsx'); 