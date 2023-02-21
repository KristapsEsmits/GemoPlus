<?php
include("../backend/Auth.php");
require("../backend/db_con.php");
include("SimpleXLSXGen.php");

$kategorijas = [
  ['Kategorijas ID', 'Nosaukums']
];

$query = "SELECT * FROM kategorijas";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $row) {
    $kategorijas = array_merge($kategorijas, array(array($row['Kategorijas_ID'], $row['Nosaukums'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($kategorijas);
$xlsx->downloadAs('Kategorijas.xlsx');
?>