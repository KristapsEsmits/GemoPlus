<?php
include 'backend/db_con.php';
$sql = "DELETE FROM lietotaji WHERE Lietotaja_ID='" . $_GET["Lietotaja_ID"] . "'";
if (mysqli_query($con, $sql)) {
    header("Location: darbinieki.php");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>