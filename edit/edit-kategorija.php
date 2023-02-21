<?php
include '../backend/Auth.php';
require('../backend/db_con.php');

if (isset($_GET['kategorijas_id'])) {
  $kategorijas_id = $_GET['kategorijas_id'];
  $query = "SELECT * FROM kategorijas
            WHERE Kategorijas_ID = '$kategorijas_id'";
  $result = mysqli_query($con, $query);
  $kategorija = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_kategorija'])){

	$Kategorijas_ID = $_POST['kategorijas_id'];
  $nosaukums = $_POST['nosaukums'];

  $query = "UPDATE kategorijas
            SET Nosaukums='$nosaukums'
            WHERE Kategorijas_ID='$kategorijas_id'";
  $result = mysqli_query($con, $query);
  if ($result) {
    header('Location: ../noliktava.php');
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
          <h1 name="header-text">Kategorijas ar ID <?php echo $kategorijas_id; ?> rediģēšana</h1>
        </div>
        <div class="list">
            <div class="tabulaBox">
                <table class="table-sortable" id="trow">
                    <thead>
                        <th>Sektors</th>
                        <th>Stāvs</th>
                        <th>Kategorijas_Nosaukums</th>
                        <th>Rediģēt</th>
                    </thead>
                    <form action="" method="post">
                        <tr class="table">
                            <td hidden><input name='kategorijas_id' value="<?php echo $kategorija["Kategorijas_ID"]; ?>" hidden></input></td>
                            <td><input name='nosaukums' value="<?php echo $kategorija['Nosaukums']; ?>" required></input></td>
                              <td><button class='acceptbtn' type='submit' name='update_kategorija'>Saglabāt</button></td>
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
</html>