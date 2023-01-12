<?php
include '../backend/Auth.php';
require('../backend/db_con.php');

if (isset($_GET['preces_id'])) {
  $preces_id = $_GET['preces_id'];
  $query = "SELECT * FROM preces WHERE Preces_ID = '$preces_id'";
  $result = mysqli_query($con, $query);
  $prece = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_prece'])){

	$Preces_ID = $_POST['preces_id'];
  $nosaukums = $_POST['nosaukums'];
  $datums = $_POST['datums'];
  $skaits = $_POST['skaits'];
  $termins = $_POST['termins'];
  $PVN = $_POST['PVN'];
  $cena_bez_PVN = $_POST['cena_bez_PVN'];
  $pardotais_daudzums = $_POST['pardotais_daudzums'];
  $kategorija = $_POST['kategorija'];
  $plaukta_id = $_POST['plaukta_id'];
  $lietotaja_id = $_SESSION['userid'];

  $query = "UPDATE preces
            SET Preces_nosaukums='$nosaukums', Datums='$datums', Skaits='$skaits', Termins='$termins', PVN='$PVN', Cena_Bez_PVN='$cena_bez_PVN', Pārdotais_daudzums='$pardotais_daudzums', Preces_kategorija='$kategorija', Plaukta_ID='$plaukta_id', Lietotaja_ID='$lietotaja_id'
            WHERE Preces_ID = $Preces_ID";
  $result = mysqli_query($con, $query);
  if ($result) {
    header('Location: ../preces.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lietotāji</title>
        <link rel="icon" href="../resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="../resources/css/table.css"/>
    </head>
<body>
<?php
      if ($_SESSION["userlevel"] == 1) { ?>
        <div class="Fields">
          <h1 name="header-text">Preces ar ID <?php echo $preces_id; ?> rediģēšana</h1>
        </div>
        <div class="list">
            <div class="tabulaBox">
                <table class="table-sortable" id="trow">
                    <thead>
                      <th>ID</th>
                      <th>Nosaukums</th>
                      <th>Ievešanas datums</th>
                      <th>Skaits</th>
                      <th>Termiņš</th>
                      <th>PVN likme</th>
                      <th>Cena bez PVN</th>
                      <th>Pārdotais daudzums</th>
                      <th>Preces kategorija</th>
                      <th>Plaukta ID</th>
                      <th>Lietotāja ID</th>
                      <th>Apstiprināt</th>
                    </thead>
                      <form action="" method="post">
                        <tr class="table" id='datatable'>
                            <td><?php echo $prece["Preces_ID"]; ?></td>
                            <td hidden><input name='preces_id' value="<?php echo $prece['Preces_ID']; ?>" hidden></input></td>
                            <td><input name='nosaukums' value="<?php echo $prece['Preces_nosaukums']; ?>" required></input></td>
                            <td><input name='datums' value="<?php echo $prece['Datums']; ?>" required></input></td>
                            <td><input name='skaits' value="<?php echo $prece['Skaits']; ?>" required></input></td>
                            <td><input name='termins' value="<?php echo $prece['Termins']; ?>" required></input></td>
                            <td><input name='PVN' value="<?php echo $prece['PVN']; ?>" required></input></td>
                            <td><input name='cena_bez_PVN' value="<?php echo $prece['Cena_Bez_PVN']; ?>" required></input></td>
                            <td><input name='pardotais_daudzums' value="<?php echo $prece['Pārdotais_daudzums']; ?>" required></input></td>
                            <td><select name='kategorija'>
                              <?php
                                  $query = "SELECT * FROM kategorijas";
                                  $result = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_array($result)) {
                                  ?>
                                  <option name="kategorijas_id" value=<?php echo $row["Kategorijas_ID"]; ?>><?php echo $row["Nosaukums"]; ?></option>
                                  <?php
                                  }
                              ?>
                            </select></td>
                            <td><input name='plaukta_id' value="<?php echo $prece['Plaukta_ID']; ?>" required></input></td>
                            <td><?php echo $prece['Lietotaja_ID']; ?></td>
                            <td><button class='acceptbtn' type='submit' name='update_prece'>Saglabāt</button></td>
                        </tr>
                      </form>
                </table>
            </div>
        </div>
        <script src="resources/js/table.js"></script>
      <?php } else {
        echo "<h1>get rēkt, tev nav pieejas</h1>";
      }
    ?>
</body>
</body>