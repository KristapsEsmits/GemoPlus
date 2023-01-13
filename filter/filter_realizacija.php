<?php
include 'backend/Auth.php';
require('backend/db_con.php');

// Get the passed values from the JavaScript
$selected_param = $_POST["selected_param"];
$selected_param_value = $_POST["selected_param_value"];

// Prepare the query
$query = "SELECT * FROM realizacija WHERE $selected_param = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('s',$selected_param_value);

// Execute the query
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Display the filtered rows on the page
echo "<table>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Preces_ID'] . "</td>";
    echo "<td>" . $row['Nosaukums'] . "</td>";
    echo "<td>" . $row['Iev_datums'] . "</td>";
    echo "<td>" . $row['Termins'] . "</td>";
    echo "<td>" . $row['Cena_bez_PVN'] . "</td>";
    echo "<td>" . $row['PVN'] . "</td>";
    echo "<td>" . $row['Skaits'] . "</td>";
    echo "<td>" . $row['Pardotais_daudzums'] . "</td>";
    echo "<td>" . $row['Kategorijas_ID'] . "</td>";
    echo "<td>" . $row['Lietotaja_ID'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close the connection
$stmt->close();
$con->close();

?>
