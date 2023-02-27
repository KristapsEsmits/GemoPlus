<?php
include '../backend/Auth.php';
require('../backend/db_con.php');

if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
  $query = "SELECT * FROM lietotaji WHERE Lietotaja_ID = '$user_id'";
  $result = mysqli_query($con, $query);
  $user = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_user'])) {
	$user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $admin_level = $_POST['admin_level'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $query = "UPDATE lietotaji
            SET Lietotajvards='$username', Vards='$firstname', Uzvards='$lastname', Talr_Nr='$phone', Admin='$admin_level'
            WHERE Lietotaja_ID = $user_id";
  $result = mysqli_query($con, $query);
  if ($result) {
    header('Location: ../darbinieki.php');
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
            <h1 name="header-text">Lietotāja ar ID 
                <?php echo $user_id; ?> rediģēšana
            </h1>
        </div>
        <div class="list">
            <div class="tabulaBox">
                <table class="table-sortable" id="trow">
                    <thead>
                        <th>ID</th>
                        <th>Lietotajvārds</th>
                        <th>Parole</th>
                        <th>Vārds</th>
                        <th>Uzvārds</th>
                        <th>Tālr_NR</th>
                        <th>Admin</th>
                        <th>Rediģēt</th>
                    </thead>
                    <form action="" method="post">
                        <tr class="table" id='datatable'>
                            <td>
                                <?php echo $user["Lietotaja_ID"]; ?>
                            </td>
                            <td hidden><input name='user_id' value="<?php echo $user['Lietotaja_ID']; ?>" hidden></input></td>
                            <td><input name='username' value="<?php echo $user['Lietotajvards']; ?>" required></input></td>
                            <td><input name='password' value="" required></input></td>
                            <td><input name='firstname' value="<?php echo $user['Vards']; ?>" required></input></td>
                            <td><input name='lastname' value="<?php echo $user['Uzvards']; ?>" required></input></td>
                            <td><input name='phone' value="<?php echo $user['Talr_Nr']; ?>" required></input></td>
                            <td><input name='admin_level' value="<?php echo $user['Admin']; ?>" required></input></td>
                            <td><button class='acceptbtn' type='submit' name='update_user'>Saglabāt</button></td>
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