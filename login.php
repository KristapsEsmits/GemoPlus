<?php
require('backend/db_con.php');

session_start();

if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));

    $query = "SELECT * FROM `lietotaji` WHERE Lietotajvards='$username'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Error executing query: " . mysqli_error($con);
    } else if (mysqli_num_rows($result) == 0) {
        echo "<div class='NepareizaParole'>Parole vai lietotājvārds ir nepareizs!</div>";
    } else {
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row["Parole"])) {
            $_SESSION['username'] = $username;
            $_SESSION['userlevel'] = $row["Admin"];
            $_SESSION['userid'] = $row["Lietotaja_ID"];
            header("Location: index.php");
        }
    }
}
?>
<?php?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemo+</title>
    <link rel="icon" href="resources/favicons/fav.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="resources/css/login.css"/>
</head>
<body>
    <form class="contact-box" action="" method="post" name="login">
        <div class="content">
            <img class="logo" src="resources/img/logo.png" alt="Logo">
            <input name="username" type="text" class="input" placeholder="Lietotājvārds" required>
            <input name="password" type="password" class="input" placeholder="Parole" required>
            <a id="forgotbtn" class="fbtn">Aizmirsāt paroli?</a>
            <button name="Submit" type="submit" class="btn">Ienākt</button>
        </div>
    </form>
    <div id="popupwindow">
        <div id="popup">
            <div class="banner">
                <img src="resources/img/logo.png">
            </div>
            <button id="closepopup">Aizvērt</button>
            <p>Ja nespējat atcerēties savu lietotājvārdu un/vai paroli, kontaktējaties ar uzņēmuma administratoru.</p>
        </div>
    </div>
    <script src="resources/js/login.js"></script>
</body>
</html>