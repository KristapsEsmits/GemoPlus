<?php
include("backend/Auth.php");
require("backend/db_con.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="eksports/export-preces.php" method="post">
        <input type="submit" name="submit" value="Preces eksports uz excel"/>
    </form>
    <form action="eksports/export-noliktava.php" method="post">
        <input type="submit" name="submit" value="Noliktava eksports uz excel"/>
    </form>
    <form action="eksports/export-darbinieki.php" method="post">
        <input type="submit" name="submit" value="Darbinieki eksports uz excel"/>
    </form>
    <form action="eksports/export-kat.php" method="post">
        <input type="submit" name="submit" value="Kategorijas eksports uz excel"/>
    </form>
</body>
</html>