<?php
include '../backend/Auth.php';
require('../backend/db_con.php');

// Get the passed values from the JavaScript
$selected_param = $_POST["selected_param"];
$selected_param_value = $_POST["selected_param_value"];
$condition_param = $_POST["condition_param"];

// Prepare the query
switch ($condition_param) {
    case 'starts':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param LIKE '$selected_param_value%'";
        break;
    case 'ends':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param LIKE '%$selected_param_value'";
        break;
    case 'includes':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param LIKE '%$selected_param_value%'";
        break;
    case 'smaller':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param < $selected_param_value";
        break;
    case 'smallerequal':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param <= $selected_param_value";
        break;
    case 'equal':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param = '$selected_param_value'";
        break;
    case 'biggerequal':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param >= $selected_param_value";
        break;
    case 'bigger':
        $query = "SELECT preces.*, kategorijas.Nosaukums, round((Cena_Bez_PVN + (Cena_Bez_PVN * (PVN*0.01))),2) AS Cena_PVN, (Skaits - Pārdotais_daudzums) AS Precu_atlikums FROM preces
                  LEFT JOIN kategorijas ON preces.Preces_kategorija = kategorijas.Kategorijas_ID
                  WHERE $selected_param > $selected_param_value";
        break;
}
$stmt = $con->prepare($query);

// Execute the query
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Initialize response variable
$response = "";

// Display the filtered rows on the page
while($row = mysqli_fetch_array($result)) {
    $response .= '
        <tr class="table">
            <td>'.$row["Preces_ID"].'</td>
            <td>'.$row['Preces_nosaukums'].'</td>
            <td>'.$row['Datums'].'</td>
            <td>';
            if (empty($row['Termins']) || is_null($row['Termins'])) {
                $response .= "<i>Beztermiņa</i>";
            } else {
                $response .= $row['Termins'];
            }
            $response .='</td>
            <td>'.$row['Cena_Bez_PVN'].'</td>
            <td>'.$row['Cena_PVN'].'</td>
            <td>'.$row['Skaits'].'</td>
            <td>'.$row['Pārdotais_daudzums'].'</td>
            <td>'.$row['Precu_atlikums'].'</td>
            <td>'.$row['Nosaukums'].'</td>
            <td>'.$row['Lietotaja_ID'].'</td>
            <td>
                <a href="'.$row["Preces_ID"].'"><button class="dzest1">Dzēst</button></a>
                <br>
                <a href="../edit/edit-preces.php?preces_id='.$row["Preces_ID"].'"><button class="labot1">Labot</button></a>
            </td>
        </tr>';
};

echo $response;
// Close the connection
$stmt->close();
$con->close();
?>