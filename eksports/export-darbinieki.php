<?php
include("../backend/Auth.php");
require("../backend/db_con.php");
include("SimpleXLSXGen.php");

$darbinieki = [
  ['Lietotaja_ID', 'Lietotajvards', 'Parole', 'Vards', 'Uzvards', 'Talr_Nr', 'Admin']
];

$query = "SELECT * FROM lietotaji";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $row) {
    $darbinieki = array_merge($darbinieki, array(array($row['Lietotaja_ID'], $row['Lietotajvards'], $row['Parole'], $row['Vards'], $row['Uzvards'], $row['Talr_Nr'], $row['Admin'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($darbinieki);
$xlsx->downloadAs('Darbinieki.xlsx');
?>